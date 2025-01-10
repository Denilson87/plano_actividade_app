<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//NUMERO TOTAL DOS SIMS DIVIDIDO PELA SOMA DOS SIMS E DOS NAOS

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('supervision', function (Blueprint $table) {
            $table->id();
            $table->string('verificar_a_existencia_de_plano_de_trabalho_do_pessoal_da_us_digitacao');
            $table->string('aqd_pop_interno');
            $table->string('aqd_pop_misau_pepfar');
            $table->string('avaliacoes_de_qualidade_de_implementacao_dos_instrumentos');
            $table->string('desempenho_dos_indicadores_programaticos');
            $table->string('planos_de_acao_se_aplicavel');
            $table->string('listas_de_retencao_precoce_do_ultimo_mes');
            $table->string('listas_de_pacientes_marcados_para_consulta_do_ultimo_mes');
            $table->string('lista_de_pacientes_possivel_ltfu_do_ultimo_mes');
            $table->string('lista_de_pacientes_para_termino_de_tpt');
            $table->string('lista_de_pacientes_com_rastreio_positivo_para_tb');
            
            $table->string('registados_no_periodo_ats_registos');
            $table->string('registados_no_periodo_ats_reg_correctos');
            $table->string('registados_no_periodo_ats_desvio');
            
            $table->string('idade_exata_e_sexo_registos');
            $table->string('idade_exata_e_sexo_reg_correctos');
            $table->string('idade_exata_e_sexo_desvio');
            
            $table->string('aplicacao_do_algoritmo_da_testagem_do_hiv_registos');
            $table->string('aplicacao_do_algoritmo_da_testagem_do_hiv_reg_correctos');
            $table->string('aplicacao_do_algoritmo_da_testagem_do_hiv_desvio');
            
            $table->string('resultado_do_teste_por_sexo_e_grupo_etario_registos');
            $table->string('resultado_do_teste_por_sexo_e_grupo_etario_reg_correctos');
            $table->string('resultado_do_teste_por_sexo_e_grupo_etario_desvio');
            
            $table->string('transporte_dos_somatorios_de_testados_do_mes_registos');
            $table->string('transporte_dos_somatorios_de_testados_do_mes_reg_correctos');
            $table->string('transporte_dos_somatorios_de_testados_do_mes_desvio');
            
            $table->string('convites_de_contactos_de_caso_indice_identificados_no_bloco_de_convites_registos');
            $table->string('convites_de_contactos_de_caso_indice_identificados_no_bloco_de_convites_reg_correctos');
            $table->string('convites_de_contactos_de_caso_indice_identificados_no_bloco_de_convites_desvio');
            
            $table->string('primeiras_consultas_circundadas_registos');
            $table->string('primeiras_consultas_circundadas_reg_correctos');
            $table->string('primeiras_consultas_circundadas_desvio');
            
            $table->string('convites_de_contactos_de_caso_indice_identificados_no_bloco_de_convites_registos');
            $table->string('convites_de_contactos_de_caso_indice_identificados_no_bloco_de_convites_reg_correctos');
            $table->string('convites_de_contactos_de_caso_indice_identificados_no_bloco_de_convites_desvio');
            
            $table->string('total_da_pagina_registado_no_folha_de_preparacao_registos');
            $table->string('total_da_pagina_registado_no_folha_de_preparacao_reg_correctos');
            $table->string('total_da_pagina_registado_no_folha_de_preparacao_desvio');
            
            $table->string('registo_de_transferido_de_retirar_5_pacientes_na_bd_e_verificar_a_fm_e_livro_registos');
            $table->string('registo_de_transferido_de_retirar_5_pacientes_na_bd_e_verificar_a_fm_e_livro_reg_correctos');
            $table->string('registo_de_transferido_de_retirar_5_pacientes_na_bd_e_verificar_a_fm_e_livro_desvio');
            
            $table->string('registo_de_gravida_e_tb_retirar_5_fms_na_cpn_e_5_na_tb_e_verificar_o_seu_registo_no_openmrs_registos');
            $table->string('registo_de_gravida_e_tb_retirar_5_fms_na_cpn_e_5_na_tb_e_verificar_o_seu_registo_no_openmrs_reg_correctos');
            $table->string('registo_de_gravida_e_tb_retirar_5_fms_na_cpn_e_5_na_tb_e_verificar_o_seu_registo_no_openmrs_desvio');
            
            $table->string('registo_de_estado_de_permanencia_retirar_5_trans_para_e_5_abandonos_na_bd_e_verificar_o_registo_no_livro_registos');
            $table->string('registo_de_estado_de_permanencia_retirar_5_trans_para_e_5_abandonos_na_bd_e_verificar_o_registo_no_livro_reg_correctos');
            $table->string('registo_de_estado_de_permanencia_retirar_5_trans_para_e_5_abandonos_na_bd_e_verificar_o_registo_no_livro_desvio');
            
            $table->string('digitacao_correcta_dos_dados_extrair_o_rqd_3_e_selecionar_uma_amostra_de_10_pacientes_e_verificar_as_fontes_primarias_fm_e_livro_de_tb_registos');
            $table->string('digitacao_correcta_dos_dados_extrair_o_rqd_3_e_selecionar_uma_amostra_de_10_pacientes_e_verificar_as_fontes_primarias_fm_e_livro_de_tb_reg_correctos');
            $table->string('digitacao_correcta_dos_dados_extrair_o_rqd_3_e_selecionar_uma_amostra_de_10_pacientes_e_verificar_as_fontes_primarias_fm_e_livro_de_tb_desvio');
            
            $table->string('digitacao_correcta_dos_dados_extrair_o_rqd_6_e_selecionar_uma_amostra_de_10_pacientes_e_verificar_as_fontes_primarias_fm_e_idart_registos');
            $table->string('digitacao_correcta_dos_dados_extrair_o_rqd_6_e_selecionar_uma_amostra_de_10_pacientes_e_verificar_as_fontes_primarias_fm_e_idart_reg_correctos');
            $table->string('digitacao_correcta_dos_dados_extrair_o_rqd_6_e_selecionar_uma_amostra_de_10_pacientes_e_verificar_as_fontes_primarias_fm_e_idart_desvio');
            
            $table->string('registo_correcto_do_numero_de_pacientes_na_ficha_de_contagem_extrair_na_bd_a_lista_aqd_hiv_misau_do_ultimo_mes_e_filtrar_todos_os_pacientes_pediatricos_comparando_com_a_ficha_de_contagem_registos');
            $table->string('registo_correcto_do_numero_de_pacientes_na_ficha_de_contagem_extrair_na_bd_a_lista_aqd_hiv_misau_do_ultimo_mes_e_filtrar_todos_os_pacientes_pediatricos_comparando_com_a_ficha_de_contagem_reg_correctos');
            $table->string('registo_correcto_do_numero_de_pacientes_na_ficha_de_contagem_extrair_na_bd_a_lista_aqd_hiv_misau_do_ultimo_mes_e_filtrar_todos_os_pacientes_pediatricos_comparando_com_a_ficha_de_contagem_desvio');
            
            $table->string('pacientes_na_ds_na_farmacia_vs_fm_registos');
            $table->string('pacientes_na_ds_na_farmacia_vs_fm_reg_correctos');
            $table->string('pacientes_na_ds_na_farmacia_vs_fm_desvio');
            
            $table->string('pacientes_na_dd_vs_openmrs_registos');
            $table->string('pacientes_na_dd_vs_openmrs_reg_correctos');
            $table->string('pacientes_na_dd_vs_openmrs_desvio');
            
            $table->integer('pontuacao_padroes_de_desempenho_indicadores');
            $table->integer('pontuacao_recursos_humanos');
            $table->integer('pontuacao_verifique_se_os_resultados_das_avaliacoes_estao_coladas_na_sala');
            
            $table->integer('pontuacao_verifique_se_o_registo_do_Livro_ATS_1_sector_contempla_os_seguintes_criterios:');
            $table->integer('pontuacao_verifique_se_o_registo_diario_de_ITS_1_sector_contempla_os_seguintes_criterios:');
            $table->integer('pontuacao_verifique_se_o_registo_do_ivro_tarv_fm_openmrs_seguintes_criterios');
       
            $table->integer('pontuacao_avaliar_a_qualidade_digitacao_registo_da_fm_extracao_do_relatorio_de_qualidade_de_dados_e_analise');
            $table->integer('pontuacao_avaliar_a_qualidade_de_digitacao_e_registo_da_fm_ficha_de_contagem_extracao_do_relatorio_aqd_hiv_e_analise_dos_seguintes_aspectos');
            $table->integer('pontuaca_avaliar_a_qualidade_de_digitacao_e_registo_da_fm_extracao_do_lista_de_atualmente_em_tarv_33_dias__e_analise_dos_seguintes_aspectos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       schema::dropIfExists('supervision');
    }
};
