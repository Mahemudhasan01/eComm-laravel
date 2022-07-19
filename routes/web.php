<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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
//Index page
Route::get('/', function () {
    return view('login');
});
//Chech email and password
Route::post('/login', [UserController::class, 'login'])->name('login');
//Destroy and logout
Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/');
})->name('logout');

//Product Routes
Route::group(['prefix' => '/product'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('product');
    Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::get('/search', [ProductController::class, 'search'])->name('product.search');
    Route::get('/addtocard/{id}', [ProductController::class, 'addToCard'])->name('product.addToCard');
    Route::get('/cardproduct', [ProductController::class, 'showCartProducts'])->name('product.cart');
    Route::get('/cardproductremove/{id}', [ProductController::class, 'removeCartProduct'])->name('product.remove.cart');
    Route::get('/order/{id}', [ProductController::class, 'showOrder'])->name('product.order');
    Route::post('/buy', [ProductController::class, 'buyItems'])->name('product.buy');
    Route::get('/singleorder/{id}', [ProductController::class, 'orderSingleItem'])->name('product.single.order');
    Route::post('/buysingleorder', [ProductController::class, 'buySingleItem'])->name('product.buy.single');
    Route::get('/myorder', [ProductController::class, 'myOrders'])->name('product.my.order');
    Route::get('/status/{id}', [ProductController::class, 'showStatus'])->name('product.status');
    Route::get('/cancel/{id}', [ProductController::class, 'cancelOrder'])->name('product.order.cancel');
});

// To show Session
// Route::get('/getSession', function(){
//     $sess = session()->all('user');

//     echo "<pre>";
//     print_r($sess);
//     echo "<pre>";

//     // return redirect('/login');
// });
