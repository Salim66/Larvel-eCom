<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Checkout
     */
    public function index(){
        if(Auth::check()){
            return view('front.checkout');
        }else {
            echo "Not Login";
        }
        return redirect('/products');
    }
}
