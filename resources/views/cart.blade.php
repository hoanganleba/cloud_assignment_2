@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="text-center">Cart</h2>
    @if (Session::has('cart'))
    <table class="table table-bordered table-responsive-sm mt-5">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Image</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                <th scope="row"></th>
                <td><img style="height: 200px; width:200px" src="/images/{{$product['item']['image']}}" alt="image"></td>
                <td><h4 class="card-title font-weight-bold">{{$product['item']['name']}}</h4></td>
                <td><h4 class="card-title font-weight-bold">$ {{$product['item']['price']}}</h4></td>
                    <td>
                       <a class="btn btn-danger" href="/shopping-cart/delete/{{$product['item']['id']}}">Delete</a>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h5 class="font-weight-bold">Total: {{$totalPrice}}</h5>
    <hr >
    <button type="button" class="btn btn-success">Checkout</button>
    @else
        <div class="row justify-content-center">
            <div class="col-sm-6 mt-3">
                <h2 class="text-center">No Items in Cart</h2>
            </div>
        </div>
    @endif
</div>
@endsection

