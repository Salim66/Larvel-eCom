<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $products   = Product::latest()->get();
        $categories = Category::latest()->get();
        return view('front.home', compact('products', 'categories'));
    }

    /**
     * Shope page
     */
    public function shop(){
        $products   = Product::latest()->get();
        $categories = Category::latest()->get();
        return view('front.shop', compact('products', 'categories'));
    }

    /**
     * Contact page
     */
    public function contact(){
        return view('front.contact');
    }

    /**
     * Product details page
     */
    public function productDetails($id){
        $product = Product::findOrFail($id);
        return view('front.product_details', compact('product'));
    }

}
