<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function(){
    return view('front.about');
});

Route::get('/shop', function(){
    return view('front.shop');
});

Route::get('/products', function() {
    return view('front.shop');
});

// Route::get('/contact', function() {
//     return view('front.contact');
// })

// Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
