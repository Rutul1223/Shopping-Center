<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //
    function index(){
        $data = Product::all();
        return view('product',['products'=>$data]);
    }
    function detail($id){
        $data =  Product::find($id);
        return view('detail',['product'=>$data]);

    }
    function search(Request $req){
        $data = Product::where('name','like','%'.$req->input('query').'%')->get();
        return view('search',['products'=>$data]);
    }
    function addToCart(Request $req){
        if($req->session()->has('user')){

            $cart = new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('/');
        }else{
            return redirect('/login');
        }
    }
    static function cartItem(){
        $userId=Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    function cartList(){
        $userId=Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_Id')
        ->get();
        return view('cartlist',['products'=>$products]);
    }
    function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }
    function orderNow(){
        $userId=Session::get('user')['id'];
        $total =  $products = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.price');
        return view('ordernow',['total'=>$total]);
    }
    function orderPlace(Request $req)
    {
        // Validate the request
        $validator = Validator::make($req->all(), [
            'address' => 'required',
            'payment_method' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')->withErrors($validator)->withInput();
        }

        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $userId)->get();
        $total = 0;

        // Calculate the total amount
        foreach ($allCart as $cart) {
            // Assuming you have a 'price' column in the 'products' table
            $productPrice = $cart->product->price ?? 0;
            $total += $productPrice;
        }

        // Create a new order with a dummy product ID
        $order = new Order;
        $order->user_id = $userId;
        $order->product_id = 1; // Assign a default or dummy product ID
        $order->status = "pending";
        $order->payment_method = $req->payment_method;
        $order->payment_status = "pending";
        $order->address = $req->address;
        $order->save();

        // Clear the cart
        Cart::where('user_id', $userId)->delete();

        // Additional processing or redirect as needed
        return redirect('/');
    }

    function myOrders(){

        $userId=Session::get('user')['id'];
        $orders= $products = DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userId)
        ->get();
        return view('myorders',['orders'=>$orders]);

    }

}
