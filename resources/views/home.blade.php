@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 pt-3">
                        <img class="card-img-top" src="/images/{{ $product->image }}" alt="Card image cap">
                        <div class="card-body mt-2">
                            <h4 class="card-title font-weight-bolder">{{ $product->name }}</h4>
                            <h5 class="card-subtitle mt-2">${{ $product->price }}</h5>
                            <div class="d-flex mt-3 align-items-center justify-content-between">
                                <a href="{{route('product.addToCart', $product->id)}}" class="btn btn-primary shadow-sm">Add to cart</a>
                                <a href="{{route('detail', $product->id)}}" class="card-link">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

