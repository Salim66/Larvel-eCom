<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Cart page
     */
    public function index(){
        return view('cart.index');
    }

    /**
     * Add item
     */
    public function addItem($id){
        echo $id;
    }
}
