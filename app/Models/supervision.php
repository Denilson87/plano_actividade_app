<?php

namespace App\Models;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervision extends Model

{
    use HasFactory;

    protected $table = 'supervision';
    
    protected $fillable = [
         'location',
         'exit_plan_trab_dig',
         'aqd_pop_inter',
         'aqd_pop_misau_pepfar',
         'avaliacao_qualidade',
         'desempenh_indi_pro',
         'plano_accoes',
         'list_ret_pr_ult_mes',
         'list_pac_mar_consu_utl',
         'list_pacient_possi_ltfu',
         'list_pacient_termin_tpt',
         'list_paci_rast_posi_tb',
         'regist_period_ats_reg',
         'regist_period_ats_regcorr',
         'regist_period_ats_regdesv',
         'idade_exa_sex_reg',
         'idade_exa_sex_regcorr',
         'idade_exa_sex_regdesv',
         'aplica_algo_test_reg',
         'aplica_algo_test_regcorr',
         'aplica_algo_test_regdesv',
         'resul_test_sex_reg',
         'resul_test_sex_regcorr',
         'resul_test_sex_regdesv',
         'trans_som_test_reg',
         'trans_som_test_regcorr',
         'trans_som_test_regdesv',
         'regis_period_its_reg',
         'regis_period_its_regcorr',
         'regis_period_its_regdesv',
         'prime_consu_circ_reg',
         'prime_consu_circ_regcorr',
         'prime_consu_circ_des',
         'convits_contact_reg',
         'convits_contact_regcorr',
         'convits_contact_regdesv',
         'total_pag_folha_reg',
         'total_pag_folha_regcorr',
         'total_pag_folha_regdesv',
         'reg_transf_de_reg',
         'reg_transf_de_regcorr',
         'reg_transf_de_regdesv',
         'reg_grav_tb_reg',
         'reg_grav_tb_regcorr',
         'reg_grav_tb_regdesv',
         'reg_est_perma_reg',
         'reg_est_perma_regcorr',
         'reg_est_perma_regdesv',
         'digac_corr3_reg',
         'digac_corr3_regcorr',
         'digac_corr3_regdesv',
         'digac_corr6_reg',
         'digac_corr6_regcorr',
         'digac_corr6_regdesv',
         'reg_corr_reg',
         'reg_corr_regcorr',
         'reg_corr_regdesv',
         'pacient_ds_farm_reg',
         'pacient_ds_farm_regcorr',
         'pacient_ds_farm_regdesv',
         'pacient_dd_open_reg',
         'pacient_dd_open_regcorr',
         'pacient_dd_open_regdesv',
         'pont_ger_desemp_indi',
         'pont_rh',
         'pont_aval_sala',
         'pont_livro_ats',
         'pont_livro_its',
         'pont_livro_tarv_fm_open',
         'pont_rel_quality_dados',
         'pont_extra_aqd_hiv',
         'pont_extra_tarv_33',   
       
    ];

    public $sortable = [
        'location',
        
    ];

    protected $guarded = [
        'id',
    ];
}
