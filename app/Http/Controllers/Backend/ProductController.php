<?php

namespace App\Http\Controllers\Backend;

use App\Models\Gallery;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\slugGenerator;
use App\Traits\Traits\UploadImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use slugGenerator, UploadImage;
    //PRODUCT LISTS VIEW FILE
    function index(){
        $products = Product::with('galleries')->latest()->paginate(20);
        return view('backend.product.index',compact('products'));
    }

    //PRODUCT CREATE VIEW FILE
    function create($id = null){
        $categories = Category::get();
        $editedproduct = $id ? Product::findOrFail($id) : null;
        return view('backend.product.create',compact('categories','editedproduct'));
    }

    function featured($id){
        $product = Product::findOrFail($id);
        $product->featured =! $product->featured;
        $product->save();
        return back();
    }

    //PRODUCT STORE
    function store(Request $request){
        $request->validate([
            'title'=> 'required',
            'price'=> 'required|numeric',
            'sell_price'=>'nullable|numeric',
            'stock'=>'integer',
            'image'=>'nullable|mimes:png,jpg,svg,jepg,webp',
            'gall_img.*'=>'nullable|mimes:png,jpg,svg,jepg,webp',
        ]);

        $slug = $this->slugBuild(Product::class,str($request->title)->slug());
        $galleryImages = $this->uploadMultiMedia($request->gall_img,$slug,'gallery');

        $product = new Product();
        $product->title = str($request->title)->headline();
        $product->slug = $slug;
        $product->price = $request->price;
        $product->sell_price = $request->sell_price;
        $product->sku = $request->sku;
        $product->stock = $request->stock;
        $product->short_detail = $request->short_detail;
        $product->long_detail = $request->long_detail;
        $product->image = $request->image ? $this->uploadSingleImage($request->image,$slug,'product') : $product->image;
        $product->additional_info = $request->additional_info;
        $product->save(); 
        if($product){
            foreach($galleryImages as $galleryImage){
            $gall= new Gallery();
            $gall->product_id = $product->id;
            $gall->gall_img = $galleryImage;
            $gall->save();
            }
           $product->categories()->sync($request->categories) ;
        }
        return back();
    }

    //PRODUCT UPDATE
    function update(Request $request,$id){
        $slug = $this->slugBuild(Product::class,str($request->title)->slug());
        $product = Product::findOrFail($id);
        $product->title = str($request->title)->headline();
        $product->slug = $slug;
        $product->price = $request->price;
        $product->sell_price= $request->sell_price;
        $product->sku = $request->sku;
        $product->stock = $request->stock;
        $product->short_detail = $request->short_detail;
        $product->long_detail = $request->long_detail;
        $product->additional_info = $request->additional_info;
        $product->image = $request->image ? $this->uploadSingleImage($request->image,$slug,'product',$product->image) : $product->image;
        
        if(count($request->gall_img ?? []) > 0){
            $galeries = Gallery::where('product_id',$product->id)->get();

            foreach($galeries as $gallery){
                if($gallery->gall_img && Storage::disk('public')->exists($gallery->gall_img)){
                Storage::disk('public')->delete($gallery->gall_img);
                }
            }
            $gallery->delete();
        }

        $gallImages = $this->uploadMultiMedia($request->gall_img,$slug,'gallery');
        foreach($gallImages as $gallery){
        $gall = new Gallery();
        $gall->product_id = $product->id;
        $gall->gall_img = $gallery;
        $gall->save();
        }

        $product->save();
        return back();
    }

    //PRODUCT DESTROY
    function destroy($id){
        $product = Product::findOrFail($id);
        if($product->image && Storage::disk('public')->exists($product->image)){
          Storage::disk('public')->delete($product->image);
        }

        if(count($request->gall_img ?? []) > 0){
            $galleries = Gallery::where('product_id',$product->id)->get();
            foreach($galleries as $gallery){
                if($gallery->gall_img && Storage::disk('public')->exists($gallery->gall_img)){
                Storage::disk('public')->delete($gallery->gall_img);
                }
            }
            $gallery->delete();
        }

        $product->delete();
        return back();
    }

}


