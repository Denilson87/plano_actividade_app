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

class ActivityController extends Controller
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
            ->whereBetween('created_at', [Carbon::now()->subDays(60), Carbon::now()]) // Filtra últimos 60 dias
            ->orderBy('created_at', 'desc') // Ordena por created_at em ordem decrescente
            ->sortable()
            ->paginate($row)
            ->appends(request()->query());
    
        return view('activities.index', [
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
        // Validação dos dados
        $rules = [
            'activity' => 'string|nullable',
            'location' => 'required|string',
            'date' => 'date_format:Y-m-d|max:20|nullable',
            'resourse' => 'string|nullable',
            'status' => 'string|nullable',
            'obs' => 'string|nullable',
        ];
    
        $validatedData = $request->validate($rules);
    
        // Adicionar o valor do email do usuário como "employee"
        $validatedData['employee'] = auth()->user()->email;
        $validatedData['sector'] = auth()->user()->sector;
    
        // Criar o registro na tabela Activity
        Activity::create($validatedData);
    
        // Redirecionar com mensagem de sucesso
        return Redirect::route('dashboard')->with('success', 'Activity plan has been created!');
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
        $validatedData['employee'] = auth()->user()->email;
        $validatedData['sector'] = auth()->user()->sector;
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

    public function complete()
    {
        $row = (int) request('row', 10);
    
        if ($row < 1 || $row > 100) {
            abort(400, 'The per-page parameter must be an integer between 1 and 100.');
        }
    
        $activities = Activity::where('status', 'completo')
            ->filter(request(['search']))
            ->orderBy('created_at', 'desc') // Ordena por created_at em ordem decrescente
            ->sortable()
            ->paginate($row)
            ->appends(request()->query());
    
        return view('Geral.complete', [
            'activities' => $activities,
        ]);
    }
    


    public function rescheduled()
    {
        $row = (int) request('row', 10);
    
        if ($row < 1 || $row > 100) {
            abort(400, 'The per-page parameter must be an integer between 1 and 100.');
        }
    
        $activities = Activity::where('status', 'adiado')
            ->filter(request(['search']))
            ->orderBy('created_at', 'desc') // Ordena por created_at em ordem decrescente
            ->sortable()
            ->paginate($row)
            ->appends(request()->query());
    
        return view('Geral.adiadas', [
            'activities' => $activities,
        ]);
    }
    

    public function pending()
    {
        $row = (int) request('row', 10);
    
        if ($row < 1 || $row > 100) {
            abort(400, 'The per-page parameter must be an integer between 1 and 100.');
        }
    
        $activities = Activity::where('status', 'pendente')
            ->filter(request(['search']))
            ->orderBy('created_at', 'desc') // Ordena por created_at em ordem decrescente
            ->sortable()
            ->paginate($row)
            ->appends(request()->query());
    
        return view('Geral.pendentes', [
            'activities' => $activities,
        ]);
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
            'sector',
            'employee',
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
                'sector'=>$activity->sector,
                'employee'=>$activity->employee,
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

