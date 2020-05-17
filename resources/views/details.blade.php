@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-4 offset-1">
            <img class="card-img" src="/images/{{$product->image}}" alt="{{$product->name}}">
        </div>
        <div class="col-md-6 p-2">
            <div class="card-body">
                <h3 class="card-title font-weight-bold">{{$product->name}}</h3>
                <h4 class="card-subtitle mt-4">$ {{$product->price}}</h4>
                <a href="{{route('product.addToCart', $product->id)}}" class="btn btn-primary shadow-sm mt-4">Add to cart</a>
                <h5 class="card-subtitle mt-4 mb-2">Description:</h5>
                <p class="card-text">{{$product->description}}</p>
            </div>
        </div>
        </div>
    </div>
@endsection
