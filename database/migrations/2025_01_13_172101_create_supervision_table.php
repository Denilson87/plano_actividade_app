<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('supervision', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            //Partilha de Listas com as áreas programáticas
            $table->string('exit_plan_trab_dig');
           // Divulgacão do Desempenho das Unidades Sanitárias
            $table->string('aqd_pop_inter');
            $table->string('aqd_pop_misau_pepfar');
            $table->string('avaliacao_qualidade');
            $table->string('desempenh_indi_pro');
            $table->string('plano_accoes');
            //Partilha de Listas com as áreas programáticas
            $table->string('list_ret_pr_ult_mes');
            $table->string('list_pac_mar_consu_utl');
            $table->string('list_pacient_possi_ltfu');
            $table->string('list_pacient_termin_tpt');
            $table->string('list_paci_rast_posi_tb');
            //instrumentos de registos ATS
            $table->integer('regist_period_ats_reg');
            $table->integer('regist_period_ats_regcorr');
            $table->integer('regist_period_ats_regdesv');

            $table->integer('idade_exa_sex_reg');
            $table->integer('idade_exa_sex_regcorr');
            $table->integer('idade_exa_sex_regdesv');

            $table->integer('aplica_algo_test_reg');
            $table->integer('aplica_algo_test_regcorr');
            $table->integer('aplica_algo_test_regdesv');

            $table->integer('resul_test_sex_reg');
            $table->integer('resul_test_sex_regcorr');
            $table->integer('resul_test_sex_regdesv');

            $table->integer('trans_som_test_reg');
            $table->integer('trans_som_test_regcorr');
            $table->integer('trans_som_test_regdesv');
             //instrumentos de registos ITS
            $table->integer('regis_period_its_reg');
            $table->integer('regis_period_its_regcorr');
            $table->integer('regis_period_its_regdesv');

            $table->integer('prime_consu_circ_reg');
            $table->integer('prime_consu_circ_regcorr');
            $table->integer('prime_consu_circ_des');

            $table->integer('convits_contact_reg');
            $table->integer('convits_contact_regcorr');
            $table->integer('convits_contact_regdesv');

            $table->integer('total_pag_folha_reg');
            $table->integer('total_pag_folha_regcorr');
            $table->integer('total_pag_folha_regdesv');

            $table->integer('reg_transf_de_reg');
            $table->integer('reg_transf_de_regcorr');
            $table->integer('reg_transf_de_regdesv');

            $table->integer('reg_grav_tb_reg');
            $table->integer('reg_grav_tb_regcorr');
            $table->integer('reg_grav_tb_regdesv');

            $table->integer('reg_est_perma_reg');
            $table->integer('reg_est_perma_regcorr');
            $table->integer('reg_est_perma_regdesv');
            
            //triangulacao openmrs vs fm
            $table->integer('digac_corr3_reg');
            $table->integer('digac_corr3_regcorr');
            $table->integer('digac_corr3_regdesv');

            $table->integer('digac_corr6_reg');
            $table->integer('digac_corr6_regcorr');
            $table->integer('digac_corr6_regdesv');

            $table->integer('reg_corr_reg');
            $table->integer('reg_corr_regcorr');
            $table->integer('reg_corr_regdesv');

            $table->integer('pacient_ds_farm_reg');
            $table->integer('pacient_ds_farm_regcorr');
            $table->integer('pacient_ds_farm_regdesv');

            $table->integer('pacient_dd_open_reg');
            $table->integer('pacient_dd_open_regcorr');
            $table->integer('pacient_dd_open_regdesv');

            //pontuacao geral
            $table->integer('pont_ger_desemp_indi');
            $table->integer('pont_rh');
            $table->integer('pont_aval_sala');

            $table->integer('pont_livro_ats');
            $table->integer('pont_livro_its');
            $table->integer('pont_livro_tarv_fm_open');

            $table->integer('pont_rel_quality_dados');
            $table->integer('pont_extra_aqd_hiv');
            $table->integer('pont_extra_tarv_33');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supervision');
    }
};
