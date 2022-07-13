<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;

class ProductController extends Controller
{
    function index()
    {
        $products =  Product::all();
        return view('product', compact('products'));
    }

    function detail($id)
    {
        $product = Product::find($id);
        return view('detail', ['product' => $product]);
    }

    function search(Request $req)
    {
        $search = $req['search'];

        if ($search != "") {
            $products = Product::where('name', 'LIKE', "%$search%")->orWhere('category', 'LIKE', "%$search%")->get();
        } else {
            $products = Product::all();
        }

        return view('search', compact('products'));
    }

    function addToCard($id, Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart = new Cart();
            $cart->user_id = $req->session()->get('user')['user_id'];
            $cart->product_id = $id;
            $cart->save();
            return redirect()->back();
        }else{
            return view('login');
        }
    }

    function showCartProducts()
    {
        
        return view('cart');
    }
}
