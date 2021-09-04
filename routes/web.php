<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Models\Product;

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
    $products = Product::latest()->get();
    return view('front.shop', compact('products'));
});

Route::get('shop', [HomeController::class, 'shop'])->name('shop');
Route::get('product_details/{id}', [HomeController::class, 'productDetails'])->name('product.details');

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::get('cart/addItem/{id}', [CartController::class, 'addItem'])->name('cart.addItem');



// Route::get('/contact', function() {
//     return view('front.contact');
// })

// Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']],function () {

    Route::get('/', function(){
        return view('admin.index');
    })->name('admin.index');

    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


    Route::resource('product', ProductController::class);

});

Route::get('cart/addItem/{id}', [HomeController::class, 'productDetails']);
Route::get('cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.remove');
Route::put('cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

