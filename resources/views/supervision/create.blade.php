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
                    <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
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
                            <div class="form-group col-md-12">
                                <label for="v_a_e_d_p_d_t">Verificar a existência de Plano de Trabalho do pessoal da US (Digitacão)<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="location" id="location" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
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
                                <select class="form-control select2" name="a_p_i" id="a_p_i" required>
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
                                <select class="form-control select2" name="a_p_i" id="a_p_i" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="date">Avaliações de Qualidade de implementação dos instrumentos<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="a_p_i" id="a_p_i" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="date">Desempenho dos indicadores programáticos<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="a_p_i" id="a_p_i" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Planos de acção (Se aplicável)<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="a_p_i" id="a_p_i" required>
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
                                <select class="form-control select2" name="a_p_i" id="a_p_i" required>
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
                                <select class="form-control select2" name="a_p_i" id="a_p_i" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="date">Lista de Pacientes para término de TPT<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="a_p_i" id="a_p_i" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="date">Lista de pacientes com rastreio positivo para TB<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="a_p_i" id="a_p_i" required>
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
                                <label for="resourse">Registados no período <b>(Registos)</b><span class="text-danger">*</span></label>
                                <input id="resourse" class="form-control @error('resourse') is-invalid @enderror" placeholder="Registados no período" type="number" name="resourse" value="{{ old('resourse') }}" required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registados no período <b>(Reg. correctos)</b><span class="text-danger">*</span></label>
                                <input id="resourse" class="form-control @error('resourse') is-invalid @enderror" placeholder="Registados no período" name="resourse" value="{{ old('resourse') }}" required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Registados no período <b>(Desvio (%)</b><span class="text-danger">*</span></label>
                                <input id="resourse" class="form-control @error('resourse') is-invalid @enderror" placeholder="Registados no período" name="resourse" value="{{ old('resourse') }}" required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Idade exata e sexo <b>(Registos)</b><span class="text-danger">*</span></label>
                                <input id="resourse" class="form-control @error('resourse') is-invalid @enderror" placeholder="Registados no período" name="resourse" value="{{ old('resourse') }}" required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Idade exata e sexo <b>(Reg. correctos)</b><span class="text-danger">*</span></label>
                                <input id="resourse" class="form-control @error('resourse') is-invalid @enderror" placeholder="Registados no período" name="resourse" value="{{ old('resourse') }}" required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Idade exata e sexo <b>(Desvio (%)</b><span class="text-danger">*</span></label>
                                <input id="resourse" class="form-control @error('resourse') is-invalid @enderror" placeholder="Registados no período" name="resourse" value="{{ old('resourse') }}" required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Idade exata e sexo <b>(Desvio (%)</b><span class="text-danger">*</span></label>
                                <input id="resourse" class="form-control @error('resourse') is-invalid @enderror" placeholder="Registados no período" name="resourse" value="{{ old('resourse') }}" required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Idade exata e sexo <b>(Desvio (%)</b><span class="text-danger">*</span></label>
                                <input id="resourse" class="form-control @error('resourse') is-invalid @enderror" placeholder="Registados no período" name="resourse" value="{{ old('resourse') }}" required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Idade exata e sexo <b>(Desvio (%)</b><span class="text-danger">*</span></label>
                                <input id="resourse" class="form-control @error('resourse') is-invalid @enderror" placeholder="Registados no período" name="resourse" value="{{ old('resourse') }}" required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Idade exata e sexo <b>(Desvio (%)</b><span class="text-danger">*</span></label>
                                <input id="resourse" class="form-control @error('resourse') is-invalid @enderror" placeholder="Registados no período" name="resourse" value="{{ old('resourse') }}" required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Idade exata e sexo <b>(Desvio (%)</b><span class="text-danger">*</span></label>
                                <input id="resourse" class="form-control @error('resourse') is-invalid @enderror" placeholder="Registados no período" name="resourse" value="{{ old('resourse') }}" required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                            <div class="header-title">
                             </div>
                                <label for="resourse">Idade exata e sexo <b>(Desvio (%)</b><span class="text-danger">*</span></label>
                                <input id="resourse" class="form-control @error('resourse') is-invalid @enderror" placeholder="Registados no período" name="resourse" value="{{ old('resourse') }}" required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="date">Lista de Pacientes para término de TPT<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="a_p_i" id="a_p_i" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="date">Lista de pacientes com rastreio positivo para TB<span class="text-danger">*</span></label>
                                <select class="form-control select2" name="a_p_i" id="a_p_i" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <option value="N/A">N/A</option>                                    
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                           





                            <div class="form-group col-md-6">
                                <label for="resourse"><b>Recursos necessários</b> <span class="text-danger">*</span></label>
                                <input id="resourse" class="form-control @error('resourse') is-invalid @enderror" placeholder="Descreva os recursos necessários para a actividade" name="resourse" value="{{ old('resourse') }}" required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status"><b>Status</b> <span class="text-danger">*</span></label>
                                <select class="form-control" name="status" required>
                                    <option selected value="pendente">Pendente</option>
                                    <option value="adiado">Adiado</option>
                                    <option value="completo">Completo</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="obs"><b>Observações</b> <span class="text-danger">*</span></label>
                                <input id="obs" class="form-control @error('obs') is-invalid @enderror" name="obs" value="sem notas..." required/>
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
                            <a class="btn bg-danger" href="{{ route('products.index') }}">Cancelar</a>
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
