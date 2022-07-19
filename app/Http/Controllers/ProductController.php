<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

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
        if ($req->session()->has('user')) {
            $cart = new Cart();
            $cart->user_id = $req->session()->get('user')['user_id'];
            $cart->product_id = $id;
            $cart->save();
            return redirect()->back();
        } else {
            return view('login');
        }
    }

    static function cartItems()
    {
        if (session()->has('user')) {
            $user_id = session()->get('user')['user_id'];

            return Cart::where('user_id', '=', $user_id)->pluck('user_id')->count();
        } else {
            return view('login');
        }
    }

    function showCartProducts()
    {
        if (session()->has('user')) {
            $user_id = session()->get('user')['user_id'];

            $cartItems = DB::table('cart')
                ->join('products', 'cart.product_id', 'products.product_id')
                ->where('cart.user_id', $user_id)
                ->get();
            return view('cart')->with('cartItems', $cartItems);
        } else {
            return view('login');
        }
    }

    function removeCartProduct($id)
    {
        Cart::where("product_id", $id)->delete();
        return redirect()->back();
    }

    function showOrder($id)
    {
        if (session()->has('user')) {
            $user_id = session()->get('user')['user_id'];

            $data = DB::table('cart')
                ->join('products', 'cart.product_id', 'products.product_id')
                ->where('cart.user_id', $user_id)
                ->sum('products.price');

            //Url for dynamic orderNow Page
            $url = url("product/buy");

            return view('orderNow', ['data' => $data, 'url' => $url]);
        } else {
            return view('login');
        }
    }

    function buyItems(Request $req)
    {
        if (session()->has('user')) {
            $user_id = session()->get('user')['user_id'];
            $allCart = Cart::where('user_id', $user_id)->get();

            foreach ($allCart as  $cart) {
                $orders = new Order();

                $orders->product_id = $cart['product_id'];
                $orders->user_id = $cart['user_id'];
                $orders->address = $req->address;
                $orders->status = "panding";
                $orders->payment_method = $req->payment;
                $orders->payment_status = "panding";
                $orders->save();
            }
            Cart::where('user_id', $user_id)->delete();

            return redirect('product/myorder');
        } else {
            return view('login');
        }
    }

    function orderSingleItem($id)
    {
        if (session()->has('user')) {

            $price = Product::where('product_id', $id)->get();

            //Url for dynamic orderNow Page
            $url = url('product/buysingleorder');

            return view('orderNow', ['price' => $price, 'url' => $url]);
        } else {
            return view('login');
        }
    }

    function buySingleItem(Request $req)
    {
        $user_id = session('user')['user_id'];
            
            $order = new Order();

            $order->product_id = $req->product_id;
            $order->user_id = $user_id;
            $order->address = $req->address;
            $order->status = "panding";
            $order->payment_method = $req->payment;
            $order->payment_status = "panding";
            $order->save();

        return redirect('product/myorder');
    }

    function myOrders()
    {
        if (session()->has('user')) {
            $user_id = session()->get('user')['user_id'];

            $orders = DB::table('orders')
                ->join('products', 'orders.product_id', 'products.product_id')
                ->where('orders.user_id', $user_id)
                ->get();

            return view('myOrders', compact('orders'));
        } else {
            return view('login');
        }
    }

    function showStatus($id)
    {
        $myOrder = Product::Where('product_id', 11)->get();

        return view('showStatus', ['myorder' => $myOrder]);
    }

    function cancelOrder($id)
    {
        Order::where('product_id', $id)->delete();

        return redirect()->back();
    }
}
