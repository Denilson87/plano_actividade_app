@extends('dashboard.body.main')

@section('specificpagestyles')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
@endsection

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Adicionar Actividade</h4>
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
                        <div class="row align-items-center">
                            <div class="form-group col-md-12">
                                <label for="activity"><b>Actividade</b> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('activity') is-invalid @enderror" placeholder="Descreva a actividade" id="activity" name="activity" value="{{ old('activity') }}" required>
                                @error('activity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="tag"><b>Local da actividade</b> <span class="text-danger">*</span></label>
                                <select class="form-control select2" name="location" id="location" required>
                                    <option value="" disabled selected>Selecione o local</option>
                                    <option value="CS Escritório HO">Escritório HO</option>
                                    <option value="CS Escritório MC">Escritório MC</option>
                                    <option value="Kampfumo" disabled >Kampfumo</option>
                                    <option value="CS Alto Mae">CS Alto Mae</option>
                                    <option value="CS Malhangalene">CS Malhangalene</option>
                                    <option value="CS Polana cimento">CS Polana cimento</option>
                                    <option value="CS Porto">CS Porto</option>
                                    <option value="Kamavota" disabled >Kamavota</option>
                                    <option value="CS Albasine">CS Albasine</option>
                                    <option value="CS Hulene">CS Hulene</option>
                                    <option value="CS Romão">CS Romão</option>
                                    <option value="CS Mavalane">CS Mavalane</option>
                                    <option value="CS Pescadores">CS Pescadores</option>
                                    <option value="Chamanculo" disabled >Kamavota</option>
                                    <option value="CS Xipamanine">CS Xipamanine</option>
                                    <option value="CS Chamanculo">CS Chamanculo</option>
                                    <option value="CS Jose Macamo">CS Jose Macamo</option>
                                    <option value="Kamaxaquene" disabled >Kamavota</option>
                                    <option value="CS 1 de Maio">CS Xipamanine</option>
                                    <option value="CS Chamanculo">CS Chamanculo</option>
                                    <option value="CS Jose Macamo">CS Jose Macamo</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="date">Data de execução <span class="text-danger">*</span></label>
                                <input id="date" class="form-control @error('date') is-invalid @enderror" name="date" placeholder="2024/01/01" value="{{ old('date') }}" required />
                                @error('activity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
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
                            <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                            <a class="btn bg-danger" href="{{ route('products.index') }}">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Selecione o local",
            allowClear: true
        });

        $('#buying_date').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
        // https://gijgo.com/datetimepicker/configuration/format
    });
    $('#date').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
        // https://gijgo.com/datetimepicker/configuration/format
    });
    });
</script>

<script>
    $('#buying_date').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
        // https://gijgo.com/datetimepicker/configuration/format
    });
    $('#date').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
        // https://gijgo.com/datetimepicker/configuration/format
    });
</script>

@include('components.preview-img-form')
@endsection
