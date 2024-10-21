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
                        <h4 class="card-title">Aicionar Actividade</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <!-- begin: Input Image -->                    
                        <!-- end: Input Image -->
                        <!-- begin: Input Data -->
                        <div class=" row align-items-center">
                            <div class="form-group col-md-12">
                                <label for="activity"><b>Actividade</b> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('activity') is-invalid @enderror" id="activity" name="activity" value="{{ old('activity') }}" required>
                                @error('activity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="location"><b>local da actividade</b> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}">
                                @error('location')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date"><b>Data</b> <span class="text-danger">*</span></label>
                                <input id="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" />
                                @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="resourse"><b>Recurcos necessários</b> <span class="text-danger">*</span></label>
                                <input id="resourse" class="form-control @error('resourse') is-invalid @enderror" name="resourse" value="{{ old('resourse') }}" />
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
                                <input id="obs" class="form-control @error('obs') is-invalid @enderror" name="obs" value="sem notas..." />
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

@include('components.preview-img-form')
@endsection
