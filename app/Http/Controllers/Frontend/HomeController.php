<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    function index(){
        $categories = Category::whereHas('products')->latest()->get();
        $products = Product::select('id','title','slug','price','sell_price','image')->take(12)->get();
        return view('frontend.Homepage',compact('categories','products'));
    }
 
    function search(Request $request){
          if($request->search){
            $products = Product::where('title','LIKE','%'.$request->search.'%')->select('id','title','slug')->take(10)->get();
          }
          return $products;
     }

}
