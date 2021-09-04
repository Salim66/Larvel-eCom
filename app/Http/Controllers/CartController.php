<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Cart page
     */
    public function index(){
        $cartItems = Cart::content();
        return view('cart.index', compact('cartItems'));
    }

    /**
     * Add item
     */
    public function addItem($id){

        $product = Product::findOrFail($id);
        Cart::add($product->pro_name, $id, 1, $product->pro_price);
        return view('cart.index');
    }

    /**
     * Remove from cart
     */
    public function destroy($id){
        Cart::remove($id);
        return redirect()->back();
    }

    /**
     * Cart update
     */
    public function update(Request $request, $id){
        Cart::update($id, $request->qty);
        return back();
    }
}
