<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    function index(){
        $carts = Cart::where('customer_id',auth('customer')->id())->with('product')->latest()->get();
        return view('frontend.Cart',compact('carts'));
    }

    function store(Request $request){
        $cart = new Cart();
        $cart->product_id = $request->product_id;
        $cart->customer_id = auth('customer')->user()->id;
        $cart->qty = $request->qty;
        $cart->total_amount = $request->total_amount * $cart->qty ;
        $cart->save();
        return back();
    }

    function update(Request $request){
       foreach($request->qty as $productId=>$quantity){
         $cart = Cart::where('product_id',$productId)->where('customer_id',auth('customer')->id())->first();


        if ($cart && $quantity >= 1) {
            $product = Product::find($productId);
            if ($product) {
                $unit_price = $product->sell_price ?? $product->price;
                $cart->qty = $quantity;
                $cart->total_amount = $unit_price * $quantity; 
                
                $cart->save();
            }
         } elseif ($cart && $quantity < 1) {
             $cart->delete();
        }
        }
        return back();
    }

    function destroy($id){
        $cart = Cart::find($id)->delete();
        return back();
    }
}
