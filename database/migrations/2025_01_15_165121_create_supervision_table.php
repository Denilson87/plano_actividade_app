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
            $table->string('location')->nullable();
            //Partilha de Listas com as áreas programáticas
            $table->string('exit_plan_trab_dig')->nullable();
           // Divulgacão do Desempenho das Unidades Sanitárias
            $table->string('aqd_pop_inter')->nullable();
            $table->string('aqd_pop_misau_pepfar')->nullable();
            $table->string('avaliacao_qualidade')->nullable();
            $table->string('desempenh_indi_pro')->nullable();
            $table->string('plano_accoes')->nullable();
            //Partilha de Listas com as áreas programáticas
            $table->string('list_ret_pr_ult_mes')->nullable();
            $table->string('list_pac_mar_consu_utl')->nullable();
            $table->string('list_pacient_possi_ltfu')->nullable();
            $table->string('list_pacient_termin_tpt')->nullable();
            $table->string('list_paci_rast_posi_tb')->nullable();
            //instrumentos de registos ATS
            $table->integer('regist_period_ats_reg')->nullable();
            $table->integer('regist_period_ats_regcorr')->nullable();
            $table->integer('regist_period_ats_regdesv')->nullable();

            $table->integer('idade_exa_sex_reg')->nullable();
            $table->integer('idade_exa_sex_regcorr')->nullable();
            $table->integer('idade_exa_sex_regdesv')->nullable();

            $table->integer('aplica_algo_test_reg')->nullable();
            $table->integer('aplica_algo_test_regcorr')->nullable();
            $table->integer('aplica_algo_test_regdesv')->nullable();

            $table->integer('resul_test_sex_reg')->nullable();
            $table->integer('resul_test_sex_regcorr')->nullable();
            $table->integer('resul_test_sex_regdesv')->nullable();

            $table->integer('trans_som_test_reg')->nullable();
            $table->integer('trans_som_test_regcorr')->nullable();
            $table->integer('trans_som_test_regdesv')->nullable();
             //instrumentos de registos ITS
            $table->integer('regis_period_its_reg')->nullable();
            $table->integer('regis_period_its_regcorr')->nullable();
            $table->integer('regis_period_its_regdesv')->nullable();

            $table->integer('prime_consu_circ_reg')->nullable();
            $table->integer('prime_consu_circ_regcorr')->nullable();
            $table->integer('prime_consu_circ_des')->nullable();

            $table->integer('convits_contact_reg')->nullable();
            $table->integer('convits_contact_regcorr')->nullable();
            $table->integer('convits_contact_regdesv')->nullable();

            $table->integer('total_pag_folha_reg')->nullable();
            $table->integer('total_pag_folha_regcorr')->nullable();
            $table->integer('total_pag_folha_regdesv')->nullable();

            $table->integer('reg_transf_de_reg')->nullable();
            $table->integer('reg_transf_de_regcorr')->nullable();
            $table->integer('reg_transf_de_regdesv')->nullable();

            $table->integer('reg_grav_tb_reg')->nullable();
            $table->integer('reg_grav_tb_regcorr')->nullable();
            $table->integer('reg_grav_tb_regdesv')->nullable();

            $table->integer('reg_est_perma_reg')->nullable();
            $table->integer('reg_est_perma_regcorr')->nullable();
            $table->integer('reg_est_perma_regdesv')->nullable();
            
            //triangulacao openmrs vs fm
            $table->integer('digac_corr3_reg')->nullable();
            $table->integer('digac_corr3_regcorr')->nullable();
            $table->integer('digac_corr3_regdesv')->nullable();

            $table->integer('digac_corr6_reg')->nullable();
            $table->integer('digac_corr6_regcorr')->nullable();
            $table->integer('digac_corr6_regdesv')->nullable();

            $table->integer('reg_corr_reg')->nullable();
            $table->integer('reg_corr_regcorr')->nullable();
            $table->integer('reg_corr_regdesv')->nullable();

            $table->integer('pacient_ds_farm_reg')->nullable();
            $table->integer('pacient_ds_farm_regcorr')->nullable();
            $table->integer('pacient_ds_farm_regdesv')->nullable();

            $table->integer('pacient_dd_open_reg')->nullable();
            $table->integer('pacient_dd_open_regcorr')->nullable();
            $table->integer('pacient_dd_open_regdesv')->nullable();

            //pontuacao geral
            $table->integer('pont_ger_desemp_indi')->nullable();
            $table->integer('pont_rh')->nullable();
            $table->integer('pont_aval_sala')->nullable();

            $table->integer('pont_livro_ats')->nullable();
            $table->integer('pont_livro_its')->nullable();
            $table->integer('pont_livro_tarv_fm_open')->nullable();

            $table->integer('pont_rel_quality_dados')->nullable();
            $table->integer('pont_extra_aqd_hiv')->nullable();
            $table->integer('pont_extra_tarv_33')->nullable();

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
