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

    /**
     * Store Checkout page
     */
    public function formvalidate(Request $request){
        $this->validate($request, [
            'fullname'  => 'required|min:5|max:35',
            'username'  => 'required|min:5|max:30',
            'password'  => 'required|min:5|max:25',
            'cpassword' => 'required|min:5|max:30|name:password'
        ],
        [
            'fullname.required'     =>  "Enter full name",
            'password.required'     =>  "Please provide password",
            'cpassword.required'    =>  "Password does not match"
        ]);



    }

}
