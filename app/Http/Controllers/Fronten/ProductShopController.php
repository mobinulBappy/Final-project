<?php

namespace App\Http\Controllers\Fronten;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductShopController extends Controller
{

    function archiveProduct($slug){
        $products = Product::whereHas('categories' ,function($q) use($slug){
            $q->where('slug',$slug);
        })->get();
        return view('frontend.shop',compact('products'));

    }

    function shop(){
        $categories  = Category::get();
        $products = Product::select('id','title','slug','price','sell_price','image')->latest()->paginate(12);
        return view('frontend.shop',compact('products','categories'));
    }

     function productFilter(Request $request){
        $query = Product::query();

        if($request->categories){
            $query->whereHas('categories', function($q)use($request){
                return $q->whereIn('slug',$request->categories);
            });
        }

        if($request->price){
            $query->whereBetween('price',[$request->price['min'], $request->price['max']]);
        }


    
        if (isset($request->ordering['order'])) {
        $orderString = $request->ordering['order']; 
        $orderParts = preg_split('/[.:]/', $orderString);
        $orderByColumn = $orderParts[0] ?? 'created_at';
        $sortByDirection = $orderParts[1] ?? 'desc';     
    } else {
        $orderByColumn = 'created_at';
        $sortByDirection = 'desc';
    }

    $sortByDirection = strtolower($sortByDirection); 
    $products = $query->orderBy($orderByColumn, $sortByDirection)->get();


    // $products = $query->orderBy('')->get();

    return $products;
    }

    function sidbar($slug){
        $product = Product::with('galleries','reviews.customer')->where('slug',$slug)->first();
        return view('frontend.sidbar',compact('product'));
    }

}
