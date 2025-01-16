@extends('dashboard.body.main')

@section('specificpagestyles')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            @if (session()->has('success'))
                <div class="alert text-white bg-success" role="alert">
                    <div class="iq-alert-text">{{ session('success') }}</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="ri-close-line"></i>
                    </button>
                </div>
            @endif
            @if (session()->has('warning'))
                <div class="alert text-white bg-warning" role="alert">
                    <div class="iq-alert-text">{{ session('warning') }}</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="ri-close-line"></i>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Supervisão Critérios de Verificação</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('supervision.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- begin: Input Image -->                    
                        <!-- end: Input Image -->
                        <!-- begin: Input Data -->
                        <div class="form-group row align-items-center">
                            <div class="col-md-12">
                                <div class="profile-img-edit">
                                    <div class="crm-profile-img-edit">
                                        <img class="crm-profile-pic rounded-circle avatar-110" id="image-preview" src="{{ asset('assets/images/product/pngtree-work-plan-list-png-image_4896609.jpg') }}" alt="profile-pic">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Recursos Humanos</h4>
                    </div>
                   </div>
                         <div class="row align-items-center">
                            <div class="form-group col-md-6">
                                <label for="exit_plan_trab_dig">Verificar a existência de Plano de Trabalho do pessoal da US (Digitacão)<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="exit_plan_trab_dig" id="exit_plan_trab_dig" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="v_a_e_d_p_d_t">Unidade Sanitária<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="location" id="location" required>
                                    <option value="" disabled selected>Kampfumo</option>
                                    <option value="CS Alto Maé">CS Alto Maé</option>
                                    <option value="CS Porto">CS Porto</option>
                                    <option value="CS Maxaquene">CS Maxaquene</option>                                    
                                    <option value="CS Polana Cimento">CS Polana Cimento</option>                                    
                                    <option value="CS Malhangalene">CS Malhangalene</option>                                  
                                    <option value="" disabled >Kamavota</option>
                                    <option value="CS Pescadores">CS Pescadores</option>                                  
                                    <option value="CS Mavalane">CS Mavalane</option>                                  
                                    <option value="CS Albasine">CS Albasine</option> 
                                </select>
                            </div>
                            
                            <div class="form-group col-md-6">
                            <div class="header-title">
                        <h5 class="card-title">Divulgacão do Desempenho das Unidades Sanitárias</h5>
                       </div>
                            </div>

                            <div class="form-group col-md-6">
                            <div class="header-title">
                        <h4 class="card-title"> </h4>
                       </div>
                                
                            </div>
                            <div class="form-group col-md-4">
                            <div class="header-title">
                       </div>
                                <label for="tag">AQD (POP Interno)<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="aqd_pop_inter" id="aqd_pop_inter" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group col-md-4">
                            <div class="header-title">
                       </div>
                                <label for="tag">AQD (POP MISAU/PEPFAR)<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="aqd_pop_misau_pepfar" id="aqd_pop_misau_pepfar" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="date">Avaliações de Qualidade de implementação dos instrumentos<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="avaliacao_qualidade" id="avaliacao_qualidade" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="date">Desempenho dos indicadores programáticos<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="desempenh_indi_pro" id="desempenh_indi_pro" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Planos de acção (Se aplicável)<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="plano_accoes" id="plano_accoes" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                         
                            <div class="form-group col-md-6">
                            <div class="header-title">
                        <h4 class="card-title">Partilha de Listas com as áreas programáticas</h4>
                       </div>
                            </div>

                            <div class="form-group col-md-6">
                            <div class="header-title">
                        <h4 class="card-title"> </h4>
                       </div>
                                
                            </div>
                            <div class="form-group col-md-4">
                            <div class="header-title">
                       </div>
                                <label for="tag">Listas de retencão precoce (do último mês)<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="list_ret_pr_ult_mes" id="list_ret_pr_ult_mes" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group col-md-4">
                            <div class="header-title">
                       </div>
                                <label for="tag">Listas de pacientes marcados para consulta (do último mês)<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="list_pac_mar_consu_utl" id="list_pac_mar_consu_utl" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="date">Lista de Pacientes possible LTFU (do último mês)<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="list_pacient_possi_ltfu" id="list_pacient_possi_ltfu" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="date">Lista de Pacientes para término de TPT<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="list_pacient_termin_tpt" id="list_pacient_termin_tpt" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="date">Lista de pacientes com rastreio positivo para TB<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="list_paci_rast_posi_tb" id="list_paci_rast_posi_tb" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                           
                            <div class="form-group col-md-6">
                            <div class="header-title">
                        <h4 class="card-title">Instrumentos de Registo</h4>
                       </div>
                            </div>

                            <div class="form-group col-md-6">
                            <div class="header-title">
                        <h4 class="card-title"> </h4>
                       </div>
                                
                            </div>
                            
                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registados no período <b> ATS (Registos)</b><span class="text-danger">*</span></label>
                                <input id="regist_period_ats_reg" class="form-control @error('regist_period_ats_reg') is-invalid @enderror" type="number" placeholder="insira os valores" type="number" name="regist_period_ats_reg" value="{{ old('regist_period_ats_reg') }}" required/>
                              
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registados no período <b> ATS (Reg. correctos)</b><span class="text-danger">*</span></label>
                                <input id="regist_period_ats_regcorr" class="form-control @error('regist_period_ats_regcorr') is-invalid @enderror" type="number" placeholder="insira os valores" name="regist_period_ats_regcorr" value="{{ old('regist_period_ats_regcorr') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registados no período <b> ATS (Desvio (%)</b><span class="text-danger">*</span></label>
                                <input id="regist_period_ats_regdesv" class="form-control" type="number" name="regist_period_ats_regdesv"  placeholder="Desvio" readonly />
                            </div>
                         
                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Idade exata e sexo <b>(Registos)</b><span class="text-danger">*</span></label>
                                <input id="idade_exa_sex_reg" class="form-control @error('idade_exa_sex_reg') is-invalid @enderror"  type="number" placeholder="insira os valores" name="idade_exa_sex_reg" value="{{ old('idade_exa_sex_reg') }}" required/>
                                
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Idade exata e sexo <b>(Reg. correctos)</b><span class="text-danger">*</span></label>
                                <input id="idade_exa_sex_regcorr" class="form-control @error('idade_exa_sex_regcorr') is-invalid @enderror" type="number" placeholder="insira os valores" name="idade_exa_sex_regcorr" value="{{ old('idade_exa_sex_regcorr') }}" required/>
                                @error('idade_exa_sex_regcorr')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Idade exata e sexo <b>(Desvio (%)</b><span class="text-danger">*</span></label>
                                <input id="idade_exa_sex_regdesv" class="form-control @error('idade_exa_sex_regdesv') is-invalid @enderror" type="number" placeholder="Desvio" name="idade_exa_sex_regdesv" readonly/>
                                
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Aplicação do algoritmo da testagem do HIV <b>(Registos)</b><span class="text-danger">*</span></label>
                                <input id="aplica_algo_test_reg" class="form-control @error('aplica_algo_test_reg') is-invalid @enderror" type="number" placeholder="insira os valores" name="aplica_algo_test_reg" value="{{ old('aplica_algo_test_reg') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Aplicação do algoritmo da testagem do HIV <b>(Reg.correctos)</b><span class="text-danger">*</span></label>
                                <input id="aplica_algo_test_regcorr" class="form-control @error('aplica_algo_test_regcorr') is-invalid @enderror" type="number" placeholder="insira os valores" name="aplica_algo_test_regcorr" value="{{ old('aplica_algo_test_regcorr') }}" required/>
                                
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Aplicação do algoritmo da testagem do HIV <b>(Desvio %)</b><span class="text-danger">*</span></label>
                                <input id="aplica_algo_test_regdesv" class="form-control @error('aplica_algo_test_regdesv') is-invalid @enderror" type="number" placeholder="Desvio" name="aplica_algo_test_regdesv" readonly/>

                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Desvio do teste (por sexo e grupo etário) <b>(Registos)</b><span class="text-danger">*</span></label>
                                <input id="resul_test_sex_reg" class="form-control @error('resul_test_sex_reg') is-invalid @enderror" type="number" placeholder="insira os valores" name="resul_test_sex_reg" value="{{ old('resul_test_sex_reg') }}" required/>
                              
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Desvio do teste (por sexo e grupo etário) <b>(Re.correctos)</b><span class="text-danger">*</span></label>
                                <input id="resul_test_sex_regcorr" class="form-control @error('resul_test_sex_regcorr') is-invalid @enderror" type="number" placeholder="insira os valores" name="resul_test_sex_regcorr" value="{{ old('resul_test_sex_regcorr') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Desvio do teste (por sexo e grupo etário) <b>(Desvio (%)</b><span class="text-danger">*</span></label>
                                <input id="resul_test_sex_regdesv" class="form-control @error('resul_test_sex_regdesv') is-invalid @enderror" type="number" placeholder="Desvio" name="resul_test_sex_regdesv" value="{{ old('resul_test_sex_regdesv') }}" readonly/>
                             
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Transporte dos Somatórios de testados do mês<b> (Registos) </b><span class="text-danger">*</span></label>
                                <input id="trans_som_test_reg" class="form-control @error('trans_som_test_reg') is-invalid @enderror" type="number" placeholder="insira os valores" name="trans_som_test_reg" value="{{ old('trans_som_test_reg') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Transporte dos Somatórios de testados do mês<b> (Reg.correctos) </b><span class="text-danger">*</span></label>
                                <input id="trans_som_test_regcorr" class="form-control @error('trans_som_test_regcorr') is-invalid @enderror" type="number" placeholder="insira os valores" name="trans_som_test_regcorr" value="{{ old('trans_som_test_regcorr') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Transporte dos Somatórios de testados do mês<b> (Desvio %) </b><span class="text-danger">*</span></label>
                                <input id="trans_som_test_regdesv" class="form-control @error('trans_som_test_regdesv') is-invalid @enderror" type="number" placeholder="Desvio" name="trans_som_test_regdesv" value="{{ old('trans_som_test_regdesv') }}" readonly/>
                               
                            </div>

                            
                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registados no período<b> ITS (Registo) </b><span class="text-danger">*</span></label>
                                <input id="regis_period_its_reg" class="form-control @error('regis_period_its_reg') is-invalid @enderror" type="number" placeholder="insira os valores" name="regis_period_its_reg" value="{{ old('regis_period_its_reg') }}" required/>
                                
                            </div>

                                             
                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registados no período<b> ITS (Reg.correctos) </b><span class="text-danger">*</span></label>
                                <input id="regis_period_its_regcorr" class="form-control @error('regis_period_its_regcorr') is-invalid @enderror" type="number" placeholder="insira os valores" name="regis_period_its_regcorr" value="{{ old('regis_period_its_regcorr') }}" required/>
                               
                            </div>

                              
                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registados no período<b> ITS (Desvio %) </b><span class="text-danger">*</span></label>
                                <input id="regis_period_its_regdesv" class="form-control @error('regis_period_its_regdesv') is-invalid @enderror" type="number" placeholder="Desvio" name="regis_period_its_regdesv" value="{{ old('regis_period_its_regdesv') }}" readonly/>
                                
                            </div>
                               
                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Primeiras consultas circundadas<b> (Registos) </b><span class="text-danger">*</span></label>
                                <input id="prime_consu_circ_reg" class="form-control @error('prime_consu_circ_reg') is-invalid @enderror" type="number" placeholder="insira os valores" name="prime_consu_circ_reg" value="{{ old('prime_consu_circ_reg') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Primeiras consultas circundadas<b> (Reg.correctos) </b><span class="text-danger">*</span></label>
                                <input id="prime_consu_circ_regcorr" class="form-control @error('prime_consu_circ_regcorr') is-invalid @enderror" type="number" placeholder="insira os valores" name="prime_consu_circ_regcorr" value="{{ old('prime_consu_circ_regcorr') }}" required/>
                              
                            </div>
                               
                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Primeiras consultas circundadas<b> (Desvio %) </b><span class="text-danger">*</span></label>
                                <input id="prime_consu_circ_des" class="form-control @error('prime_consu_circ_des') is-invalid @enderror" type="number" placeholder="Desvio" name="prime_consu_circ_des" value="{{ old('prime_consu_circ_des') }}" readonly/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Convites de contactos de caso indice identificados no bloco de convites<b> (Registo) </b><span class="text-danger">*</span></label>
                                <input id="convits_contact_reg" class="form-control @error('convits_contact_reg') is-invalid @enderror" type="number" placeholder="insira os valores" name="convits_contact_reg" value="{{ old('convits_contact_reg') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Convites de contactos de caso indice identificados no bloco de convites<b> (Reg.correctos) </b><span class="text-danger">*</span></label>
                                <input id="convits_contact_regcorr" class="form-control @error('convits_contact_regcorr') is-invalid @enderror" type="number" placeholder="insira os valores" name="convits_contact_regcorr" value="{{ old('convits_contact_regcorr') }}" required/>
                               
                            </div>

                          <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Convites de contactos de caso indice identificados no bloco de convites<b> (Desvio %) </b><span class="text-danger">*</span></label>
                                <input id="convits_contact_regdesv" class="form-control @error('convits_contact_regdesv') is-invalid @enderror" type="number" placeholder="Desvio" name="convits_contact_regdesv" value="{{ old('convits_contact_regdesv') }}" readonly/>
                              
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Total da pagina registado no folha de preparação<b> (Registo) </b><span class="text-danger">*</span></label>
                                <input id="total_pag_folha_reg" class="form-control @error('total_pag_folha_reg') is-invalid @enderror" type="number" placeholder="insira os valores" name="total_pag_folha_reg" value="{{ old('total_pag_folha_reg') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Total da pagina registado no folha de preparação<b> (Reg.correctos) </b><span class="text-danger">*</span></label>
                                <input id="total_pag_folha_regcorr" class="form-control @error('total_pag_folha_regcorr') is-invalid @enderror" type="number" placeholder="insira os valores" name="total_pag_folha_regcorr" value="{{ old('total_pag_folha_regcorr') }}" required/>
                                
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Total da pagina registado no folha de preparação<b> (Desvio %) </b><span class="text-danger">*</span></label>
                                <input id="total_pag_folha_regdesv" class="form-control @error('total_pag_folha_regdesv') is-invalid @enderror" type="number" placeholder="Desvio" name="total_pag_folha_regdesv" value="{{ old('total_pag_folha_regdesv') }}" readonly/>
                                
                            </div>


                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registo de "Transferido de": Retirar 5 pacientes na BD e verificar a FM e Livro.<b> (Registo) </b><span class="text-danger">*</span></label>
                                <input id="reg_transf_de_reg" class="form-control @error('reg_transf_de_reg') is-invalid @enderror" type="number" placeholder="insira os valores" name="reg_transf_de_reg" value="{{ old('reg_transf_de_reg') }}" required/>
                               
                            </div>
                            
                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registo de "Transferido de": Retirar 5 pacientes na BD e verificar a FM e Livro.<b> (Reg.correctos) </b><span class="text-danger">*</span></label>
                                <input id="reg_transf_de_regcorr" class="form-control @error('reg_transf_de_regcorr') is-invalid @enderror" type="number" placeholder="insira os valores" name="reg_transf_de_regcorr" value="{{ old('reg_transf_de_regcorr') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registo de "Transferido de": Retirar 5 pacientes na BD e verificar a FM e Livro.<b> (Desvio %) </b><span class="text-danger">*</span></label>
                                <input id="reg_transf_de_regdesv" class="form-control @error('reg_transf_de_regdesv') is-invalid @enderror" type="number" placeholder="Desvio" name="reg_transf_de_regdesv" value="{{ old('reg_transf_de_regdesv') }}" readonly/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registo de "Grávida" e "TB": Retirar 5 FMs na CPN e 5 na TB e verificar o seu registo no OpenMRS.<b> (Registo) </b><span class="text-danger">*</span></label>
                                <input id="reg_grav_tb_reg" class="form-control @error('reg_grav_tb_reg') is-invalid @enderror" type="number" placeholder="insira os valores" name="reg_grav_tb_reg" value="{{ old('reg_grav_tb_reg') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registo de "Grávida" e "TB": Retirar 5 FMs na CPN e 5 na TB e verificar o seu registo no OpenMRS.<b> (Reg.correctos) </b><span class="text-danger">*</span></label>
                                <input id="reg_grav_tb_regcorr" class="form-control @error('reg_grav_tb_regcorr') is-invalid @enderror" type="number" placeholder="insira os valores" name="reg_grav_tb_regcorr" value="{{ old('reg_grav_tb_regcorr') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="reg_grav_tb_regdesv">Registo de "Grávida" e "TB": Retirar 5 FMs na CPN e 5 na TB e verificar o seu registo no OpenMRS.<b> (Desvio %) </b><span class="text-danger">*</span></label>
                                <input id="reg_grav_tb_regdesv" class="form-control @error('reg_grav_tb_regdesv') is-invalid @enderror" type="number" placeholder="Desvio" name="reg_grav_tb_regdesv" value="{{ old('reg_grav_tb_regdesv') }}" readonly/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="reg_est_perma_reg">Registo de Estado de Permanência: Retirar 5 "Trans. Para" e 5 "abandonos" na BD e verificar o registo no Livro.<b> (Registo) </b><span class="text-danger">*</span></label>
                                <input id="reg_est_perma_reg" class="form-control @error('reg_est_perma_reg') is-invalid @enderror" type="number" placeholder="insira os valores" name="reg_est_perma_reg" value="{{ old('reg_est_perma_reg') }}" required/>
                                @error('reg_grav_tb_regdesv')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registo de Estado de Permanência: Retirar 5 "Trans. Para" e 5 "abandonos" na BD e verificar o registo no Livro.<b> (Reg.correctos) </b><span class="text-danger">*</span></label>
                                <input id="reg_est_perma_regcorr" class="form-control @error('reg_est_perma_regcorr') is-invalid @enderror" type="number" placeholder="insira os valores" name="reg_est_perma_regcorr" value="{{ old('reg_est_perma_regcorr') }}" required/>
                              
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registo de Estado de Permanência: Retirar 5 "Trans. Para" e 5 "abandonos" na BD e verificar o registo no Livro.<b> (Desvio %) </b><span class="text-danger">*</span></label>
                                <input id="reg_est_perma_regdesv" class="form-control @error('reg_est_perma_regdesv') is-invalid @enderror" type="number" placeholder="Desvio" name="reg_est_perma_regdesv" value="{{ old('reg_est_perma_regdesv') }}" readonly/>
                               
                            </div>

                            
                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Digitação correcta dos dados: Extrair o RQD 3 e seleccionar uma amostra de 10 pacientes e verificar as fontes primárias (FM e Livro de TB)<b> (Registo) </b><span class="text-danger">*</span></label>
                                <input id="digac_corr3_reg" class="form-control @error('digac_corr3_reg') is-invalid @enderror" type="number" placeholder="insira os valores" name="digac_corr3_reg" value="{{ old('digac_corr3_reg') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Digitação correcta dos dados: Extrair o RQD 3 e seleccionar uma amostra de 10 pacientes e verificar as fontes primárias (FM e Livro de TB)<b> (Reg.correctos) </b><span class="text-danger">*</span></label>
                                <input id="digac_corr3_regcorr" class="form-control @error('digac_corr3_regcorr') is-invalid @enderror" type="number" placeholder="insira os valores" name="digac_corr3_regcorr" value="{{ old('digac_corr3_regcorr') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Digitação correcta dos dados: Extrair o RQD 3 e seleccionar uma amostra de 10 pacientes e verificar as fontes primárias (FM e Livro de TB)<b> (Desvio %) </b><span class="text-danger">*</span></label>
                                <input id="digac_corr3_regdesv" class="form-control @error('digac_corr3_regdesv') is-invalid @enderror" type="number" placeholder="Desvio" name="digac_corr3_regdesv" value="{{ old('digac_corr3_regdesv') }}" readonly/>
                                
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Digitação correcta dos dados: Extrair o RQD 6 e seleccionar uma amostra de 10 pacientes e verificar as fontes primárias (FM e iDART)<b> (Registo) </b><span class="text-danger">*</span></label>
                                <input id="digac_corr6_reg" class="form-control @error('digac_corr6_reg') is-invalid @enderror" type="number" placeholder="insira os valores" name="digac_corr6_reg" value="{{ old('digac_corr6_reg') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Digitação correcta dos dados: Extrair o RQD 6 e seleccionar uma amostra de 10 pacientes e verificar as fontes primárias (FM e iDART)<b> (Reg.correctos) </b><span class="text-danger">*</span></label>
                                <input id="digac_corr6_regcorr" class="form-control @error('digac_corr6_regcorr') is-invalid @enderror" type="number" placeholder="insira os valores" name="digac_corr6_regcorr" value="{{ old('digac_corr6_regcorr') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Digitação correcta dos dados: Extrair o RQD 6 e seleccionar uma amostra de 10 pacientes e verificar as fontes primárias (FM e iDART)<b> (Desvio %) </b><span class="text-danger">*</span></label>
                                <input id="digac_corr6_regdesv" class="form-control @error('digac_corr6_regdesv') is-invalid @enderror" type="number" placeholder="Desvio" name="digac_corr6_regdesv" value="{{ old('digac_corr6_regdesv') }}" readonly />
                                
                            </div>
                            
                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registo correcto do número de pacientes na Ficha de contagem: Extrair na BD a lista "AQD HIV MISAU" do último mês e filtrar todos os pacientes pediátricos compararando com a Ficha de contagem<b> (Registo) </b><span class="text-danger">*</span></label>
                                <input id="reg_corr_reg" class="form-control @error('reg_corr_reg') is-invalid @enderror" type="number" placeholder="insira os valores" name="reg_corr_reg" value="{{ old('reg_corr_reg') }}" required/>
                              
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registo correcto do número de pacientes na Ficha de contagem: Extrair na BD a lista "AQD HIV MISAU" do último mês e filtrar todos os pacientes pediátricos compararando com a Ficha de contagem<b> (Reg.correctos) </b><span class="text-danger">*</span></label>
                                <input id="reg_corr_regcorr" class="form-control @error('reg_corr_regcorr') is-invalid @enderror" type="number" placeholder="insira os valores" name="reg_corr_regcorr" value="{{ old('reg_corr_regcorr') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registo correcto do número de pacientes na Ficha de contagem: Extrair na BD a lista "AQD HIV MISAU" do último mês e filtrar todos os pacientes pediátricos compararando com a Ficha de contagem<b> (Desvio %) </b><span class="text-danger">*</span></label>
                                <input id="reg_corr_regdesv" class="form-control @error('reg_corr_regdesv') is-invalid @enderror" type="number" placeholder="insira os valores" name="reg_corr_regdesv" value="{{ old('reg_corr_regdesv') }}" readonly/>
                              
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Pacientes na DS na Farmácia vs FM<b> (Registo) </b><span class="text-danger">*</span></label>
                                <input id="pacient_ds_farm_reg" class="form-control @error('pacient_ds_farm_reg') is-invalid @enderror" type="number" placeholder="insira os valores" name="pacient_ds_farm_reg" value="{{ old('pacient_ds_farm_reg') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Pacientes na DS na Farmácia vs FM<b> (Reg.correcto) </b><span class="text-danger">*</span></label>
                                <input id="pacient_ds_farm_regcorr" class="form-control @error('pacient_ds_farm_regcorr') is-invalid @enderror" type="number" placeholder="insira os valores" name="pacient_ds_farm_regcorr" value="{{ old('pacient_ds_farm_regcorr') }}" required/>
                               
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Pacientes na DS na Farmácia vs FM<b> (Desvio %) </b><span class="text-danger">*</span></label>
                                <input id="pacient_ds_farm_regdesv" class="form-control @error('pacient_ds_farm_regdesv') is-invalid @enderror" type="number" placeholder="Desvio" name="pacient_ds_farm_regdesv" value="{{ old('pacient_ds_farm_regdesv') }}" readonly/>
                               
                            </div>

                            <div class="form-group col-md-4">
    <label for="campo1">Pacientes na DD vs OpenMRS<b> (Registo) </b><span class="text-danger">*</span></label>
    <input id="pacient_dd_open_reg" class="form-control" type="number" placeholder="Insira os valores" name="pacient_ds_farm_reg" required oninput="calcularDesvio()" />
</div>

<div class="form-group col-md-4">
    <label for="campo2">Pacientes na DD vs OpenMRS<b> (Reg.correctos) </b><span class="text-danger">*</span></label>
    <input id="pacient_dd_open_regcorr" class="form-control" type="number" placeholder="Insira os valores" name="pacient_dd_open_regcorr" required oninput="calcularDesvio()" />
</div>

<div class="form-group col-md-4">
    <label for="desvio">Pacientes na DD vs OpenMRS<b> (Desvio %) </b><span class="text-danger">*</span></label>
    <input id="pacient_dd_open_regdesv" class="form-control" type="number" name="pacient_dd_open_regdesv"  placeholder="Desvio" readonly />
</div>
<script>
function calcularDesvioCombinado() {
    // Calcular o desvio para o primeiro conjunto de campos
    const pacient_dd_open_reg = parseFloat(document.getElementById('pacient_dd_open_reg').value) || 0;
    const pacient_dd_open_regcorr = parseFloat(document.getElementById('pacient_dd_open_regcorr').value) || 0;

    if (pacient_dd_open_reg === 0) {
        document.getElementById('pacient_dd_open_regdesv').value = ''; // Limpa o campo de resultado
    } else {
        const pacient_dd_open_regdesv = 1 - (pacient_dd_open_regcorr / pacient_dd_open_reg); // Subtrai 1 do resultado
        const pacient_dd_open_regdesvFormatted = pacient_dd_open_regdesv.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('pacient_dd_open_regdesv').value = (pacient_dd_open_regdesvFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }

    // Calcular o desvio para o segundo conjunto de campos
    const regist_period_ats_reg = parseFloat(document.getElementById('regist_period_ats_reg').value) || 0;
    const regist_period_ats_regcorr = parseFloat(document.getElementById('regist_period_ats_regcorr').value) || 0;

    if (regist_period_ats_reg === 0) {
        document.getElementById('regist_period_ats_regdesv').value = ''; // Limpa o campo de resultado
    } else {
        const regist_period_ats_regdesv = 1 - (regist_period_ats_regcorr / regist_period_ats_reg); // Subtrai 1 do resultado
        const regist_period_ats_regdesvFormatted = regist_period_ats_regdesv.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('regist_period_ats_regdesv').value = (regist_period_ats_regdesvFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }

    // Calcular o desvio para o terceiro conjunto de campos (idade_exa_sex)
    const idade_exa_sex_reg = parseFloat(document.getElementById('idade_exa_sex_reg').value) || 0;
    const idade_exa_sex_regcorr = parseFloat(document.getElementById('idade_exa_sex_regcorr').value) || 0;

    if (idade_exa_sex_reg === 0) {
        document.getElementById('idade_exa_sex_regdesv').value = ''; // Limpa o campo de resultado
    } else {
        const idade_exa_sex_regdesv = 1 - (idade_exa_sex_regcorr / idade_exa_sex_reg); // Subtrai 1 do resultado
        const idade_exa_sex_regdesvFormatted = idade_exa_sex_regdesv.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('idade_exa_sex_regdesv').value = (idade_exa_sex_regdesvFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }

    // Calcular o desvio para o quarto conjunto de campos (aplica_algo_test)
    const aplica_algo_test_reg = parseFloat(document.getElementById('aplica_algo_test_reg').value) || 0;
    const aplica_algo_test_regcorr = parseFloat(document.getElementById('aplica_algo_test_regcorr').value) || 0;

    if (aplica_algo_test_reg === 0) {
        document.getElementById('aplica_algo_test_regdesv').value = ''; // Limpa o campo de resultado
    } else {
        const aplica_algo_test_regdesv = 1 - (aplica_algo_test_regcorr / aplica_algo_test_reg); // Subtrai 1 do resultado
        const aplica_algo_test_regdesvFormatted = aplica_algo_test_regdesv.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('aplica_algo_test_regdesv').value = (aplica_algo_test_regdesvFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }

    // Calcular o desvio para o quinto conjunto de campos (resul_test_sex)
    const resul_test_sex_reg = parseFloat(document.getElementById('resul_test_sex_reg').value) || 0;
    const resul_test_sex_regcorr = parseFloat(document.getElementById('resul_test_sex_regcorr').value) || 0;

    if (resul_test_sex_reg === 0) {
        document.getElementById('resul_test_sex_regdesv').value = ''; // Limpa o campo de resultado
    } else {
        const resul_test_sex_regdesv = 1 - (resul_test_sex_regcorr / resul_test_sex_reg); // Subtrai 1 do resultado
        const resul_test_sex_regdesvFormatted = resul_test_sex_regdesv.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('resul_test_sex_regdesv').value = (resul_test_sex_regdesvFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }

    // Calcular o desvio para o sexto conjunto de campos (trans_som_test)
    const trans_som_test_reg = parseFloat(document.getElementById('trans_som_test_reg').value) || 0;
    const trans_som_test_regcorr = parseFloat(document.getElementById('trans_som_test_regcorr').value) || 0;

    if (trans_som_test_reg === 0) {
        document.getElementById('trans_som_test_regdesv').value = ''; // Limpa o campo de resultado
    } else {
        const trans_som_test_regdesv = 1 - (trans_som_test_regcorr / trans_som_test_reg); // Subtrai 1 do resultado
        const trans_som_test_regdesvFormatted = trans_som_test_regdesv.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('trans_som_test_regdesv').value = (trans_som_test_regdesvFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }

    // Calcular o desvio para o novo conjunto de campos (regis_period_its_reg)
    const regis_period_its_reg = parseFloat(document.getElementById('regis_period_its_reg').value) || 0;
    const regis_period_its_regcorr = parseFloat(document.getElementById('regis_period_its_regcorr').value) || 0;

    if (regis_period_its_reg === 0) {
        document.getElementById('regis_period_its_regdesv').value = ''; // Limpa o campo de resultado
    } else {
        const regis_period_its_regdesv = 1 - (regis_period_its_regcorr / regis_period_its_reg); // Subtrai 1 do resultado
        const regis_period_its_regdesvFormatted = regis_period_its_regdesv.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('regis_period_its_regdesv').value = (regis_period_its_regdesvFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }

    // Calcular o desvio para o novo conjunto de campos (prime_consu_circ_reg)
    const prime_consu_circ_reg = parseFloat(document.getElementById('prime_consu_circ_reg').value) || 0;
    const prime_consu_circ_regcorr = parseFloat(document.getElementById('prime_consu_circ_regcorr').value) || 0;

    if (prime_consu_circ_reg === 0) {
        document.getElementById('prime_consu_circ_des').value = ''; // Limpa o campo de resultado
    } else {
        const prime_consu_circ_des = 1 - (prime_consu_circ_regcorr / prime_consu_circ_reg); // Subtrai 1 do resultado
        const prime_consu_circ_desFormatted = prime_consu_circ_des.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('prime_consu_circ_des').value = (prime_consu_circ_desFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }

     // Calcular o desvio para o novo conjunto de campos (convits_contact_reg)
     const convits_contact_reg = parseFloat(document.getElementById('convits_contact_reg').value) || 0;
     const convits_contact_regcorr = parseFloat(document.getElementById('convits_contact_regcorr').value) || 0;

    if (convits_contact_reg === 0) {
        document.getElementById('convits_contact_regdesv').value = ''; // Limpa o campo de resultado
    } else {
        const convits_contact_regdesv = 1 - (convits_contact_regcorr / convits_contact_reg); // Subtrai 1 do resultado
        const convits_contact_regdesvFormatted = convits_contact_regdesv.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('convits_contact_regdesv').value = (convits_contact_regdesvFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }

     // Calcular o desvio para o novo conjunto de campos (convits_contact_reg)
     const total_pag_folha_reg = parseFloat(document.getElementById('total_pag_folha_reg').value) || 0;
     const total_pag_folha_regcorr = parseFloat(document.getElementById('total_pag_folha_regcorr').value) || 0;

    if (total_pag_folha_reg === 0) {
        document.getElementById('total_pag_folha_regdesv').value = ''; // Limpa o campo de resultado
    } else {
        const total_pag_folha_regdesv = 1 - (total_pag_folha_regcorr / total_pag_folha_reg); // Subtrai 1 do resultado
        const total_pag_folha_regdesvFormatted = total_pag_folha_regdesv.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('total_pag_folha_regdesv').value = (total_pag_folha_regdesvFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }

     // Calcular o desvio para o novo conjunto de campos (convits_contact_reg)
     const reg_transf_de_reg = parseFloat(document.getElementById('reg_transf_de_reg').value) || 0;
     const reg_transf_de_regcorr = parseFloat(document.getElementById('reg_transf_de_regcorr').value) || 0;

    if (reg_transf_de_reg === 0) {
        document.getElementById('reg_transf_de_regdesv').value = ''; // Limpa o campo de resultado
    } else {
        const reg_transf_de_regdesv = 1 - (reg_transf_de_regcorr / reg_transf_de_reg); // Subtrai 1 do resultado
        const reg_transf_de_regdesvFormatted = reg_transf_de_regdesv.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('reg_transf_de_regdesv').value = (reg_transf_de_regdesvFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }

     // Calcular o desvio para o novo conjunto de campos (gravidas)
     const reg_grav_tb_reg = parseFloat(document.getElementById('reg_grav_tb_reg').value) || 0;
     const reg_grav_tb_regcorr = parseFloat(document.getElementById('reg_grav_tb_regcorr').value) || 0;

    if (reg_grav_tb_reg === 0) {
        document.getElementById('reg_grav_tb_regdesv').value = ''; // Limpa o campo de resultado
    } else {
        const reg_grav_tb_regdesv = 1 - (reg_grav_tb_regcorr / reg_grav_tb_reg); // Subtrai 1 do resultado
        const reg_grav_tb_regdesvFormatted = reg_grav_tb_regdesv.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('reg_grav_tb_regdesv').value = (reg_grav_tb_regdesvFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }

    // Calcular o desvio para o novo conjunto de campos (estado de permanencia)
    const reg_est_perma_reg = parseFloat(document.getElementById('reg_est_perma_reg').value) || 0;
     const reg_est_perma_regcorr = parseFloat(document.getElementById('reg_est_perma_regcorr').value) || 0;

    if (reg_est_perma_reg === 0) {
        document.getElementById('reg_est_perma_regdesv').value = ''; // Limpa o campo de resultado
    } else {
        const reg_est_perma_regdesv = 1 - (reg_est_perma_regcorr / reg_est_perma_reg); // Subtrai 1 do resultado
        const reg_est_perma_regdesvFormatted = reg_est_perma_regdesv.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('reg_est_perma_regdesv').value = (reg_est_perma_regdesvFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }
    

    // Calcular o desvio para o novo conjunto de campos (estado de permanencia)
     const digac_corr3_reg = parseFloat(document.getElementById('digac_corr3_reg').value) || 0;
     const digac_corr3_regcorr = parseFloat(document.getElementById('digac_corr3_regcorr').value) || 0;

    if (digac_corr3_reg === 0) {
        document.getElementById('digac_corr3_regdesv').value = ''; // Limpa o campo de resultado
    } else {
        const digac_corr3_regdesv = 1 - (digac_corr3_regcorr / digac_corr3_reg); // Subtrai 1 do resultado
        const digac_corr3_regdesvFormatted = digac_corr3_regdesv.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('digac_corr3_regdesv').value = (digac_corr3_regdesvFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }
    
    
    // Calcular o desvio para o novo conjunto de campos (estado de permanencia)
     const digac_corr6_reg = parseFloat(document.getElementById('digac_corr6_reg').value) || 0;
     const digac_corr6_regcorr = parseFloat(document.getElementById('digac_corr6_regcorr').value) || 0;

    if (digac_corr6_reg === 0) {
        document.getElementById('digac_corr6_regdesv').value = ''; // Limpa o campo de resultado
    } else {
        const digac_corr6_regdesv = 1 - (digac_corr6_regcorr / digac_corr6_reg); // Subtrai 1 do resultado
        const digac_corr6_regdesvFormatted = digac_corr6_regdesv.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('digac_corr6_regdesv').value = (digac_corr6_regdesvFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }


      // Calcular o desvio para o novo conjunto de campos (estado de permanencia)
     const reg_corr_reg = parseFloat(document.getElementById('reg_corr_reg').value) || 0;
     const reg_corr_regcorr = parseFloat(document.getElementById('reg_corr_regcorr').value) || 0;

    if (reg_corr_reg === 0) {
        document.getElementById('reg_corr_regdesv').value = ''; // Limpa o campo de resultado
    } else {
        const reg_corr_regdesv = 1 - (reg_corr_regcorr / reg_corr_reg); // Subtrai 1 do resultado
        const reg_corr_regdesvFormatted = reg_corr_regdesv.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('reg_corr_regdesv').value = (reg_corr_regdesvFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }

    
      // Calcular o desvio para o novo conjunto de campos (estado de permanencia)
     const pacient_ds_farm_reg = parseFloat(document.getElementById('pacient_ds_farm_reg').value) || 0;
     const pacient_ds_farm_regcorr = parseFloat(document.getElementById('pacient_ds_farm_regcorr').value) || 0;

    if (pacient_ds_farm_reg === 0) {
        document.getElementById('pacient_ds_farm_regdesv').value = ''; // Limpa o campo de resultado
    } else {
        const pacient_ds_farm_regdesv = 1 - (pacient_ds_farm_regcorr / pacient_ds_farm_reg); // Subtrai 1 do resultado
        const pacient_ds_farm_regdesvFormatted = pacient_ds_farm_regdesv.toFixed(2); // Formata para 2 casas decimais
        document.getElementById('pacient_ds_farm_regdesv').value = (pacient_ds_farm_regdesvFormatted * 100).toFixed(2); // Exibe o resultado formatado
    }
}

// Adiciona o evento de input para todos os campos relevantes
document.getElementById('pacient_dd_open_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('pacient_dd_open_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('regist_period_ats_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('regist_period_ats_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('idade_exa_sex_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('idade_exa_sex_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('aplica_algo_test_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('aplica_algo_test_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('resul_test_sex_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('resul_test_sex_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('trans_som_test_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('trans_som_test_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('regis_period_its_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('regis_period_its_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('prime_consu_circ_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('prime_consu_circ_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('convits_contact_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('convits_contact_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('total_pag_folha_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('total_pag_folha_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('total_pag_folha_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('total_pag_folha_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('reg_transf_de_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('reg_transf_de_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('reg_grav_tb_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('reg_grav_tb_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('reg_est_perma_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('reg_est_perma_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('digac_corr3_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('digac_corr3_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('digac_corr6_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('digac_corr6_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('reg_corr_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('reg_corr_regcorr').addEventListener('input', calcularDesvioCombinado);
document.getElementById('pacient_ds_farm_reg').addEventListener('input', calcularDesvioCombinado);
document.getElementById('pacient_ds_farm_regcorr').addEventListener('input', calcularDesvioCombinado);

</script>
         
                            <div class="form-group col-md-6">
                                <label for="obs"><b>Observações</b> <span class="text-danger"></span></label>
                                <input id="obs" class="form-control @error('obs') is-invalid @enderror" name="obs" placeholder="sem notas..." value="" />
                                @error('obs')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- end: Input Data -->
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary mr-2">Submeter</button>
                            <a class="btn bg-danger" href="#">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
    <!-- Page end  -->
</div>

<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
        // https://gijgo.com/datetimepicker/configuration/format
    });
</script>
@endsection
