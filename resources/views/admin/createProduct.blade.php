@extends('layouts.adminApp')

@section('content')
    <h4 class="font-weight-bold">Add product</h4>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    @endif
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light pl-0">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.product')}}">Products</a></li>
            <li class="breadcrumb-item" aria-current="page">Add Product</li>
        </ol>
    </nav>
    <div class="card shadow-sm border-0 mt-2">
        <div class="card-body">
            <form method="POST" action="/admin/products" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Product Name</label>
                        <input name="name" type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="name">Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="price-field">$</span>
                            </div>
                            <input aria-describedby="price-field" name="price" type="number" class="form-control" id="price">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="brand">Brand</label>
                        <input name="brand" type="text" class="form-control" id="brand">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" rows="5" class="form-control" id="brand"></textarea>
                </div>
                <div class="input-group my-4">
                    <div class="custom-file">
                        <input name="image" type="file" class="custom-file-input" id="inputGroupFile02">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary shadow-sm mt-3">Save</button>
            </form>
        </div>
    </div>
@endsection
