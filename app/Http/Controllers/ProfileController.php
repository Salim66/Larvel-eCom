<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Profile page
     */
    public function index(){
        return view('profile.index');
    }

    /**
     * orders user
     */
    public function orders(){
        $user_id    = Auth::id();
        $orders     = DB::table('order_products')->leftJoin('products', 'products.id', '=', 'order_products.product_id')->leftJoin('orders', 'orders.id', 'order_products.order_id')->where('orders.user_id', '=', $user_id)->get();
        return view('profile.orders', compact('orders'));
    }

    /**
     * Profile address
     */
    public function address(){
        return view('profile.address');
    }

    /**
     * Update address
     */
    public function updateAddress(Request $request){
        echo "here update query for address";
        dd($request);
    }

    /**
     * update password
     */
    public function password(){
        return view('profile.updatePassword');
    }

    /**
     * Update password page
     */
    public function updatePassword(){

        return view('profile.updatePassword');
    }
}
