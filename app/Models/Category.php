<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function subcategories(){
      return $this->hasmany(Category::class);
    }

    function category(){
        return $this->belongsTo(Category::class);
    }

    function products(){
      return $this->belongsToMany(Product::class);
    }


}
