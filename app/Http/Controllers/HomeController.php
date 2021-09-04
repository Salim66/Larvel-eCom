<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front.home');
    }

    /**
     * Shope page
     */
    public function shop(){
        $products = Product::latest()->get();
        return view('front.shop', compact('products'));
    }

    /**
     * Contact page
     */
    public function contact(){
        return view('front.contact');
    }
}
