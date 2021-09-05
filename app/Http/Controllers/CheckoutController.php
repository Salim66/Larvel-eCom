<?php

namespace App\Http\Controllers;

use App\Models\Address;
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
            return redirect()->route('login');
        }
    }

    /**
     * Store Checkout page
     */
    public function formvalidate(Request $request){
        // $this->validate($request, [
        //     'fullname'  => 'required|min:5|max:35',
        //     'username'  => 'required|min:5|max:30',
        //     'password'  => 'required|min:5|max:25',
        //     'cpassword' => 'required|min:5|max:30|name:password'
        // ],
        // [
        //     'fullname.required'     =>  "Enter full name",
        //     'password.required'     =>  "Please provide password",
        //     'cpassword.required'    =>  "Password does not match"
        // ]);

        $this->validate($request, [
            'fullname'  => 'required|min:5|max:30',
            'state'     => 'required|min:2|max:25',
            'pincode'   => 'required|numeric',
            'city'      => 'required|min:5|max:30',
            'country'   => 'required|min:5|max:30'
        ]);

        Address::create([
            'fullname'  => $request->fullname,
            'state'     => $request->state,
            'pincode'   => $request->pincode,
            'city'      => $request->city,
            'country'   => $request->country,
            'user_id'   => Auth::id(),
        ]);
        dd("done");

    }

}
