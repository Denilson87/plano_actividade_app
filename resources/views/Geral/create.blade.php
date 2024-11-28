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
                        <div class=" row align-items-center">
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
                                <label for="location"><b>local da actividade</b> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" placeholder="Descreva o local da actividade" id="location" name="location" value="{{ old('location') }}" required>
                                @error('location')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date"><b>Data</b> <span class="text-danger">*</span></label>
                                <input id="date" class="form-control @error('date') is-invalid @enderror" name="date" placeholder="2024/01/01" value="{{ old('date') }}"required />
                                @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            

                            <div class="form-group col-md-6">
                                <label for="resourse"><b>Recurcos necessários</b> <span class="text-danger">*</span></label>
                                <input id="resourse" class="form-control @error('resourse') is-invalid @enderror" placeholder="Descreva os recursos necessários para a actividade" name="resourse" value="{{ old('resourse') }}" required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                           
                            <div class="form-group col-md-6">
<label for="category_id"><b>Status</b> <span class="text-danger">*</span></label>
<select class="form-control" name="status" required>
    <option selected="pendente" >pendente</option>status
    <option value="adiado" >Adiado</option>
    <option value="completo" >Conpleto</option>
</select>
@error('category_id')
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror
</div>

                             <div class="form-group col-md-6">
                                <label for="obs"><b>Observações</b> <span class="text-danger">*</span></label>
                                <input id="obs" class="form-control @error('obs') is-invalid @enderror" name="obs" value="sem notas..." required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="obs"><b>Observações</b> <span class="text-danger">*</span></label>
                                <input id="obs" class="form-control @error('obs') is-invalid @enderror" name="obs" value="sem notas..." required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                             </div>


                        <!-- end: Input Data -->
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary mr-2">Save</button>
                            <a class="btn bg-danger" href="{{ route('products.index') }}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page end  -->
</div>

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

<!-- <option value="" disabled selected>Selecione uma tag</option>
                                <option value="" disabled selected>Kampfumo</option>
                                    <option value="CS Alto Mae">CS Alto Mae</option>
                                    <option value="CS Malhangalene">CS Malhangalene</option>
                                    <option value="CS Polana cimento">CS Polana cimento</option>
                                    <option value="CS Polana cimento">CS Porto</option>
                                    <option value="CS Polana cimento">CS Maxaquene</option> -->

@include('components.preview-img-form')
@endsection
