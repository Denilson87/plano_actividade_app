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
                        <h4 class="card-title">Nova supervisão</h4>
                    </div>
                    <div class="header-title">
                    <a href="{{ route('products.exportData') }}" class="btn btn-infor add-list"><b>Importar do Excel</b></a>
                    </div>
                </div>

                <div class="card-header d-flex justify-content-between">
                  
                </div>
                <div class="card-body">
                    <form action="{{ route('advance-salary.store') }}" method="POST">
                    @csrf
                        <!-- begin: Input Data -->
                        <div class=" row align-items-center">
                            <div class="form-group col-md-8">
                                <label for="employee_id">Divulgacão do Desempenho das Unidades Sanitárias<span class="text-danger">*</span></label>
                                <select class="form-control mb-3" id="employee_id" name="employee_id" required>
                                    <option value="AQD (POP Interno)">AQD (POP Interno)</option>
                                    <option value="AQD (POP MISAU/PEPFAR)">AQD (POP MISAU/PEPFAR)</option>
                                    <option value="Avaliações de Qualidade de implementação dos instrumentos">Avaliações de Qualidade de implementação dos instrumentos</option>
                                    <option value="Desempenho dos indicadores programáticos">Desempenho dos indicadores programáticos</option>
                                    <option value="Planos de acção (Se aplicável)">Planos de acção (Se aplicável)</option>
                                
                                </select>
                                <div class="invalid-feedback">
                                </div>                                
                            </div>
                            <div class="form-group col-md-4">
                                <label for="employee_id">Resposta<span class="text-danger">*</span></label>
                                <select class="form-control mb-3" id="employee_id" name="employee_id" required>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                    <option value="N/A">N/A</option>                               
                                </select>
                                <div class="invalid-feedback">
                                </div>                                
                            </div>
                             <div class="form-group col-md-8">
                                <label for="employee_id">Partilha de Listas com as áreas programáticas<span class="text-danger">*</span></label>
                                <select class="form-control mb-3" id="employee_id" name="employee_id" required>
                                    <option value="Listas de retencão precoce (do último mês)">Listas de retencão precoce (do último mês)</option>
                                    <option value="Listas de pacientes marcados para consulta (do último mês)">Listas de pacientes marcados para consulta (do último mês)</option>
                                    <option value="Lista de Pacientes possible LTFU (do último mês)">Lista de Pacientes possible LTFU (do último mês)</option>
                                    <option value="Lista de Pacientes para término de TPT">Lista de Pacientes para término de TPT</option>
                                    <option value="Lista de pacientes com rastreio positivo para TB">Lista de pacientes com rastreio positivo para TB</option>                                
                                </select>
                                <div class="invalid-feedback">
                                </div>                                
                            </div>
                            <div class="form-group col-md-4">
                                <label for="employee_id"> Resposta<span class="text-danger">*</span></label>
                                <select class="form-control mb-3" id="employee_id" name="employee_id" required>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                    <option value="N/A">N/A</option>                               
                                </select>
                                <div class="invalid-feedback">
                                </div>                                
                            </div>   
                            <div class="form-group col-md-8">
                                <label for="employee_id">Partilha de Listas com as áreas programáticas<span class="text-danger">*</span></label>
                                <select class="form-control mb-3" id="employee_id" name="employee_id" required>
                                    <option value="Listas de retencão precoce (do último mês)">Listas de retencão precoce (do último mês)</option>
                                    <option value="Listas de pacientes marcados para consulta (do último mês)">Listas de pacientes marcados para consulta (do último mês)</option>
                                    <option value="Lista de Pacientes possible LTFU (do último mês)">Lista de Pacientes possible LTFU (do último mês)</option>
                                    <option value="Lista de Pacientes para término de TPT">Lista de Pacientes para término de TPT</option>
                                    <option value="Lista de pacientes com rastreio positivo para TB">Lista de pacientes com rastreio positivo para TB</option>                                
                                </select>
                                <div class="invalid-feedback">
                                </div>                                
                            </div>
                            <div class="form-group col-md-4">
                                <label for="employee_id">Resposta<span class="text-danger">*</span></label>
                                <select class="form-control mb-3" id="employee_id" name="employee_id" required>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                    <option value="N/A">N/A</option>                               
                                </select>
                                <div class="invalid-feedback">
                                </div>                                
                            </div>                        
                        </div>
                        <!-- end: Input Data -->
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary mr-2">Save</button>
                            <a class="btn bg-danger" href="{{ route('advance-salary.index') }}">Cancel</a>
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
