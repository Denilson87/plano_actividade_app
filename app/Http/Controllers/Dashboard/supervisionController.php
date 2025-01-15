<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use Carbon\Carbon; 
use App\Models\Supervision;
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

class SupervisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view ('supervision.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $rules = [
           
                'location' => 'nullable|string',
                'exit_plan_trab_dig' => 'nullable|string',
                'aqd_pop_inter' => 'nullable|string',
                'aqd_pop_misau_pepfar' => 'nullable|string',
                'avaliacao_qualidade' => 'nullable|string',
                'desempenh_indi_pro' => 'nullable|string',
                'plano_accoes' => 'nullable|string',
                'list_ret_pr_ult_mes' => 'nullable|string',
                'list_pac_mar_consu_utl' => 'nullable|string',
                'list_pacient_possi_ltfu' => 'nullable|string',
                'list_pacient_termin_tpt' => 'nullable|string',
                'list_paci_rast_posi_tb' => 'nullable|string',            
                'regist_period_ats_reg' => 'nullable|numeric',
                'regist_period_ats_regcorr' => 'nullable|numeric',
                'regist_period_ats_regdesv' => 'nullable|numeric',
                'idade_exa_sex_reg' => 'nullable|numeric',
                'idade_exa_sex_regcorr' => 'nullable|numeric',
                'idade_exa_sex_regdesv' => 'nullable|numeric',
                'aplica_algo_test_reg' => 'nullable|numeric',
                'aplica_algo_test_regcorr' => 'nullable|numeric',
                'aplica_algo_test_regdesv' => 'nullable|numeric',
                'resul_test_sex_reg' => 'nullable|numeric',
                'resul_test_sex_regcorr' => 'nullable|numeric',
                'resul_test_sex_regdesv' => 'nullable|numeric',
                'trans_som_test_reg' => 'nullable|numeric',
                'trans_som_test_regcorr' => 'nullable|numeric',
                'trans_som_test_regdesv' => 'nullable|numeric',
                'regis_period_its_reg' => 'nullable|numeric',
                'regis_period_its_regcorr' => 'nullable|numeric',
                'regis_period_its_regdesv' => 'nullable|numeric',
                'prime_consu_circ_reg' => 'nullable|numeric',
                'prime_consu_circ_regcorr' => 'nullable|numeric',
                'prime_consu_circ_des' => 'nullable|numeric',
                'convits_contact_reg' => 'nullable|numeric',
                'convits_contact_regcorr' => 'nullable|numeric',
                'convits_contact_regdesv' => 'nullable|numeric',
                'total_pag_folha_reg' => 'nullable|numeric',
                'total_pag_folha_regcorr' => 'nullable|numeric',
                'total_pag_folha_regdesv' => 'nullable|numeric',
                'reg_transf_de_reg' => 'nullable|numeric',
                'reg_transf_de_regcorr' => 'nullable|numeric',
                'reg_transf_de_regdesv' => 'nullable|numeric',
                'reg_grav_tb_reg' => 'nullable|numeric',
                'reg_grav_tb_regcorr' => 'nullable|numeric',
                'reg_grav_tb_regdesv' => 'nullable|numeric',
                'reg_est_perma_reg' => 'nullable|numeric',
                'reg_est_perma_regcorr' => 'nullable|numeric',
                'reg_est_perma_regdesv' => 'nullable|numeric',
                'digac_corr3_reg' => 'nullable|numeric',
                'digac_corr3_regcorr' => 'nullable|numeric',
                'digac_corr3_regdesv' => 'nullable|numeric',
                'digac_corr6_reg' => 'nullable|numeric',
                'digac_corr6_regcorr' => 'nullable|numeric',
                'digac_corr6_regdesv' => 'nullable|numeric',
                'reg_corr_reg' => 'nullable|numeric',
                'reg_corr_regcorr' => 'nullable|numeric',
                'reg_corr_regdesv' => 'nullable|numeric',
                'pacient_ds_farm_reg' => 'nullable|numeric',
                'pacient_ds_farm_regcorr' => 'nullable|numeric',
                'pacient_ds_farm_regdesv' => 'nullable|numeric',
                'pacient_dd_open_reg' => 'nullable|numeric',
                'pacient_dd_open_regcorr' => 'nullable|numeric',
                'pacient_dd_open_regdesv' => 'nullable|numeric',
                'pont_ger_desemp_indi' => 'nullable|numeric',
                'pont_rh' => 'nullable|numeric',
                'pont_aval_sala' => 'nullable|numeric',
                'pont_livro_ats' => 'nullable|numeric',
                'pont_livro_its' => 'nullable|numeric',
                'pont_livro_tarv_fm_open' => 'nullable|numeric',
                'pont_rel_quality_dados' => 'nullable|numeric',
                'pont_extra_aqd_hiv' => 'nullable|numeric',
                'pont_extra_tarv_33' => 'nullable|numeric',
                        
        ];
    
        $validatedData = $request->validate($rules);
        // Criar o registro na tabela Supervision
        Supervision::create($validatedData);
    
        // Redirecionar com mensagem de sucesso
        return Redirect::route('supervision.create')->with('success', 'your supervision has been submited!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
