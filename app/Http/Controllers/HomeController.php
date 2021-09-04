<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Shop page view
     */
    public function shop(){
        return view('front.shop');
    }

}
