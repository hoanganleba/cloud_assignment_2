<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('home', [
            'products' => $products
        ]);
    }

    public function adminHome()
    {
        return view('adminHome');
    }
}
