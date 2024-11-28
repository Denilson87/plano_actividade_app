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
                        <h4 class="card-title">Actualizar Actividade</h4>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                            <div class="col-md-12">
                                <div class="profile-img-edit">
                                    <div class="crm-profile-img-edit">
                                        <img class="crm-profile-pic rounded-circle avatar-110" id="image-preview" src="{{ asset('assets/images/product/pngtree-work-plan-list-png-image_4896609.jpg') }}" alt="profile-pic">
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="card-body">
                    <form action="{{ route('activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <!-- begin: Input Image -->
                       

                        <div class="row">
                           
                        </div>
                        <!-- end: Input Image -->
                        <!-- begin: Input Data -->
                        <div class=" row align-items-center">
                            <div class="form-group col-md-12">
                                <label for="activity">Actividade <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('activity') is-invalid @enderror" id="activity" name="activity" value="{{ old('activity', $activity->activity) }}" required>
                                @error('activity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="location">Local <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $activity->location) }}" required>
                                @error('activity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Data de execução <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $activity->date) }}" required>
                                @error('activity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Recurcos necessários <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('resourse') is-invalid @enderror" id="resourse" name="resourse" value="{{ old('resourse', $activity->resourse) }}" required>
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
    <option value="cancelado" >cancelado</option>

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
    $('#expire_date').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
        // https://gijgo.com/datetimepicker/configuration/format
    });
</script>

@include('components.preview-img-form')
@endsection
