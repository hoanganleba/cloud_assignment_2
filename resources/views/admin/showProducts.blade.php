@extends('layouts.adminApp')

@section('content')
    <h4 class="font-weight-bold">Products</h4>
    @if(session('msg'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{session('msg')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light pl-0">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Products</li>
        </ol>
    </nav>

    <div class="card shadow-sm border-0 mt-2">
        <div class="card-body table-responsive mt-2">
            <div class="d-flex justify-content-between">
                <form class="w-25" method="get" action="/admin/products/search" role="search">
                    @csrf
                    <div class="input-group">
                        <input id="search" name="search" type="search" class="form-control" placeholder="Search"/>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-outline-primary">Search</button>
                        </div>
                    </div>
                </form>
                <a class="btn btn-primary shadow-sm" href='products/addProduct'>Add new product</a>
            </div>
            <table class="table table-bordered mt-4">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @if($products)
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>
                            <img style="width: 100px; height: 100px" src="/images/{{ $product->image }}" alt="product-image">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a class="btn btn-link" href="/admin/products/edit/{{$product->id}}">Edit</a>
                            <form action="/admin/products/delete/{{$product->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-link text-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                    @else
                    <tr><td>Data Not Found</td></tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection


