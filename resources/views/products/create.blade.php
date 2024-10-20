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
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <!-- begin: Input Image -->
                    
                        <!-- end: Input Image -->
                        <!-- begin: Input Data -->
                        <div class=" row align-items-center">
                            <div class="form-group col-md-12">
                                <label for="product_name">Actividade <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" value="{{ old('product_name') }}" required>
                                @error('product_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="category_id">Status <span class="text-danger">*</span></label>
                                <select class="form-control" name="category_id" required>
                                    <option selected="pendente" disabled>pendente</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                          
                            <div class="form-group col-md-6">
                                <label for="product_garage">Product Garage</label>
                                <input type="text" class="form-control @error('product_garage') is-invalid @enderror" id="product_garage" name="product_garage" value="{{ old('product_garage') }}">
                                @error('product_garage')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                           
                            <div class="form-group col-md-6">
                                <label for="expire_date">Expire Date</label>
                                <input id="expire_date" class="form-control @error('expire_date') is-invalid @enderror" name="expire_date" value="{{ old('expire_date') }}" />
                                @error('expire_date')
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
