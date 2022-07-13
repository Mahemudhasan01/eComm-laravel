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

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/login');
})->name('logout');

Route::get('/home', function () {
    return view('home');
})->name('home');

//Product Routes
Route::group(['prefix' => '/product'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('product');
    Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::get('/search', [ProductController::class, 'search'])->name('product.search');
    Route::get('/addtocard/{id}', [ProductController::class, 'addToCard'])->name('product.addToCard');
    Route::get('/cardproduct', [ProductController::class, 'showCartProducts'])->name('product.cart');
});

// To show Session
// Route::get('/getSession', function(){
//     $sess = session()->all('user');

//     echo "<pre>";
//     print_r($sess);
//     echo "<pre>";

//     // return redirect('/login');
// });
