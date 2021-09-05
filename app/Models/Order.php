<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orderFields(){
        return $this->belongsToMany('App\Models\Product')->withPivot('qty', 'total');
    }

    public static function createOrder(){
        // for order insert to database
        // dd("order done");

        $user   = Auth::user();
        $order  = $user->orders()->create([
            'total'     => Cart::total(),
            'status'    => 'pending'
        ]);

        $cartItems  = Cart::content();

        foreach ($cartItems as $cartItem) {
            $order->orderFields()->attach($cartItem->id, ['qty' => $cartItem->qty, 'txt' => $cartItem->tax(), 'total' => $cartItem->qty * $cartItem->pro_price]);
        }

    }

}
