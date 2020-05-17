<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Product;
use DB;
use Session;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('admin.showProducts', [
            'products' => $products,
        ]);
    }

    public function search(Request $request) {
        $search = $request->get('search');
        if($search != ''){
            $product = Product::where('name', 'LIKE', '%' .$search. '%')->get();
            return view('admin.showProducts', [
                'products' => $product
            ]);
        }
        else{
            $products = Product::all();
            return view('admin.showProducts', [
            'products' => $products
            ]);
        }
    }

    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('welcome');
    }

    public function removeCartItem(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->remove($product->id);

        if( $cart->totalQty <= 0) {
            session()->forget('cart');
        } else {
            session()->put('cart', $cart);
        }

        return redirect()->route('product.shoppingCart');
    }

    public function getCart(){
        if(!Session::has('cart')) {
            return view('cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function show($id) {
        $product = Product::find($id);
        return view('details', ['product' => $product ]);
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('admin.editProduct', ['product' => $product]);
    }

    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return redirect(route('admin.product'))->with('msg', 'Product deleted');
    }

    public function update(Request $request, $id){

        request()->validate([
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required',
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->price = $request->price;
        $product->description = $request->description;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('images'), $filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect('/admin/products')->with('msg', 'Product updated');

    }

    public function create()
    {
        return view('admin.createProduct');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product = new Product();
        $product->name = request('name');
        $product->brand = request('brand');
        $product->price = request('price');
        $product->description = request('description');
        $image = request()->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $product->image = $imageName;
        $product->save();
        return redirect('/admin/products')->with('msg', 'Product added');
    }
}
