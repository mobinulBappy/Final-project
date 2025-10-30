<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\slugGenerator;
use App\Traits\Traits\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use slugGenerator,UploadImage;

    //CATEGORY View File
    function index($id = null){
        $categories = Category::with('subcategories')->where('category_id',null)->latest()->paginate(25);
        $editedcategory = $id ? Category::findOrFail($id) : null;
        $allcategories = Category::get();
        return view('backend.category.index',compact('categories','editedcategory','allcategories'));
    }
    //CATEGORY FEATURED
    function featured($id){
        $category = Category::findOrFail($id);
        $category->featured =! $category->featured;
        $category->save();
        return back();
    }
    //CATEGORY STORE
    function store(Request $request){
        $request->validate([
            'title'=>'required',
            'icon' => 'nullable|mimes:png,jpg,jepg,webp'
        ]);

        $slug = $this->slugBuild(Category::class,str($request->title)->slug());
        $upload = $this->uploadSingleImage($request->category_icon,$slug,'category');
        $category = new Category();
        $category->title = $request->title;
        $category->slug = $slug;
        $category->icon = $upload ?? $category->icon;
        $category->category_id = $request->parentCategory ?? $category->category_id;
        $category->save();
        return back();
    }
    //CATEGORY UPDATE
    function update(Request $request,$id){

      $slug = $this->slugBuild(Category::class,str($request->title)->slug());
      $category = Category::findOrFail($id);
      $category->slug = $slug;
      $category->title = $request->title;
      $category->category_id = $request->parentCategory ?? $category->category_id;
      $category->icon = $request->category_icon ? $this->uploadSingleImage($request->category_icon,$slug,'category',$category->icon) : $category->icon;
      $category->save();
      return back();
    }
    //CATEGORY DESTROY
    function destroy($id){
        $category = Category::findOrFail($id);
        if($category->icon && Storage::disk('public')->exists($category->icon)){
          Storage::disk('public')->delete($category->icon);
        }
        $category->delete();
        return back();
    }

}
