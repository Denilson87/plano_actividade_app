<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use Carbon\Carbon;
use App\Models\Activity;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Redirect;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Picqer\Barcode\BarcodeGeneratorHTML;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class GeralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $row = (int) request('row', 10);
    
        if ($row < 1 || $row > 100) {
            abort(400, 'The per-page parameter must be an integer between 1 and 100.');
        }
    
        $activities = Activity::filter(request(['search']))
            ->whereMonth('date', Carbon::now()->month) // Filtra pelo mês atual
            ->whereYear('date', Carbon::now()->year)   // Filtra pelo ano atual
            ->sortable()
            ->paginate($row)
            ->appends(request()->query())
    
        return view('Geral.index', [
            'activities' => $activities,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
           
            'activity' => 'string|nullable',
            'location' => 'required|string',
            'date'=> 'date_format:Y-m-d|max:20|nullable',
            'resourse' => 'string|nullable',
            'status' => 'string|nullable',
            'obs' => 'string|nullable',
            
        ];

        $validatedData = $request->validate($rules);

        Activity::create($validatedData);

        return Redirect::route('activities.index')->with('success', 'Activity plan been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        $orderedActivities = Activity::orderBy('created_at', 'asc')->get();
        
        return view('activities.show', [
            'activity' => $activity,
            'orderedActivities' => $orderedActivities,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.edit', compact('activity'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Int $id)
    {
        $rules = [

            'activity' => 'string|nullable',
            'location' => 'required|string',
            'date'=> 'date_format:Y-m-d|max:20|nullable',
            'resourse' => 'string|nullable',
            'status' => 'string|nullable',
            'obs' => 'string|nullable',
            ];

        $validatedData = $request->validate($rules);

        Activity::where('id', $id)->update($validatedData);        

        return Redirect::route('activities.index')->with('success', 'Activity has been updated!');
    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Int $id)
    {
        Activity::destroy($id); // Para deletar permanentemente
    
        return Redirect::route('activities.index')->with('success', 'Activity has been deleted!');
    }

    /**
     * Show the form for importing a new resource.
     */
    public function importView()
    {
        return view('products.import');
    }

    public function importStore(Request $request)
    {
        $request->validate([
            'upload_file' => 'required|file|mimes:xls,xlsx',
        ]);

        $the_file = $request->file('upload_file');

        try{
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range( 2, $row_limit );
            $column_range = range( 'J', $column_limit );
            $startcount = 2;
            $data = array();
            foreach ( $row_range as $row ) {
                $data[] = [
                    'product_name' => $sheet->getCell( 'A' . $row )->getValue(),
                    'category_id' => $sheet->getCell( 'B' . $row )->getValue(),
                    'supplier_id' => $sheet->getCell( 'C' . $row )->getValue(),
                    'product_code' => $sheet->getCell( 'D' . $row )->getValue(),
                    'product_garage' => $sheet->getCell( 'E' . $row )->getValue(),
                    'product_image' => $sheet->getCell( 'F' . $row )->getValue(),
                    'product_store' =>$sheet->getCell( 'G' . $row )->getValue(),
                    'buying_date' =>$sheet->getCell( 'H' . $row )->getValue(),
                    'expire_date' =>$sheet->getCell( 'I' . $row )->getValue(),
                    'buying_price' =>$sheet->getCell( 'J' . $row )->getValue(),
                    'selling_price' =>$sheet->getCell( 'K' . $row )->getValue(),
                ];
                $startcount++;
            }

            Product::insert($data);

        } catch (Exception $e) {
            // $error_code = $e->errorInfo[1];
            return Redirect::route('products.index')->with('error', 'There was a problem uploading the data!');
        }
        return Redirect::route('products.index')->with('success', 'Data has been successfully imported!');
    }

    public function exportExcel($activities){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');

        try {
            $spreadSheet = new Spreadsheet();
            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
            $spreadSheet->getActiveSheet()->fromArray($activities);
            $Excel_writer = new Xls($spreadSheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Activity_ExportedData.xls"');
            header('Cache-Control: max-age=0');
            ob_end_clean();
            $Excel_writer->save('php://output');
            exit();
        } catch (Exception $e) {
            return;
        }
    }

    /**
     *This function loads the customer data from the database then converts it
     * into an Array that will be exported to Excel
     */
    function exportData(){
        $activities = Activity::all()->sortByDesc('id');

        $activity_array [] = array(
            'activity',
            'location',
            'date',
            'resourse',
            'status',
            'obs',
        );

        foreach($activities as $activity)
        {
            $activity_array[] = array(
                'activity' => $activity->activity,
                'location'=>$activity->location,
                'date'=>$activity->date,
                'resourse'=>$activity->resourse,
                'status'=>$activity->status,
                'obs'=>$activity->obs,
            );
        }

        $this->ExportExcel($activity_array);
    }
}

