<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = Product::all();
    return view('welcome', [
        'products' => $products
    ]);
})->name('welcome');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('add-to-cart/{id}', 'ProductController@getAddToCart')->name('product.addToCart');
Route::get('shopping-cart', 'ProductController@getCart')->name('product.shoppingCart');
Route::get('shopping-cart/delete/{id}', 'ProductController@removeCartItem');
Route::get('admin/home', 'AdminController@index')->name('admin.home')->middleware('is_admin');
Route::get('admin/products', 'ProductController@index')->name('admin.product');
Route::post('admin/products', 'ProductController@store');

Route::get('admin/products/search', 'ProductController@search');

Route::get('detail/{id}', 'ProductController@show')->name('detail');

Route::get('admin/products/edit/{id}', 'ProductController@edit');
Route::put('admin/products/update/{id}', 'ProductController@update');
Route::delete('admin/products/delete/{id}', 'ProductController@destroy');
Route::get('admin/products/addProduct', 'ProductController@create');
