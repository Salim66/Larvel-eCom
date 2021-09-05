<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;

class order extends Model
{
    //
    protected $fillable = ['total', 'status'];


    public function orderFields() {
       return $this->belongsToMany(Product::class)->withPivot('qty', 'total');
    }

    public static function createOrder() {

        // for order inserting to database

           // echo 'order done';

          $user = Auth::user();
          $order = $user->orders()->create(['total' => Cart::total(), 'status' => 'pending']);

         $cartItems = Cart::content();

         foreach ($cartItems as $cartItem) {
            OrderProduct::create([
                'order_id'      => $order->id,
                'product_id'    => $cartItem->id,
                'qty'           => $cartItem->qty,
                'tax'           => $cartItem->tax(),
                'total'         => ($cartItem->qty * $cartItem->price)
            ]);
        }
     }

}
