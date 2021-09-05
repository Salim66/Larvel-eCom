<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $address_data   = DB::table('addresses')->where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        // dd($address_data);
        return view('profile.address', compact('address_data'));
    }

    /**
     * Update address
     */
    public function updateAddress(Request $request){
        $this->validate($request, [
            'fullname'  => 'required|min:5|max:30',
            'pincode'   => 'required|numeric',
            'city'      => 'required|min:3|max:25',
            'state'     => 'required|min:3|max:35',
            'country'   => 'required|min:3|max:35'
        ]);

        DB::table('addresses')->where('id', Auth::id())->update($request->all());

        return redirect()->back()->with('msg', 'Your address has been updated!');
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
    public function updatePassword(Request $request){

        $old_password = $request->oldPassword;
        $new_password = $request->newPassword;

        if(!Hash::check($old_password, Auth::user()->password)){
            return back()->with('msg', 'Password does not match our record, Please try again!');
        }else {
            $request->user()->file('password', Hash::make($new_password))->save();
            return redirect()->back()->with('msg', 'Password has been updated');
        }

    }
}
