<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'price',
        'sell_price',
        'sku',
        'stock',
        'image',
        'short_detail',
        'long_detail',
        'additional_info',
        'featured',
        'top'
    ];

    function categories(){
        return $this->belongsToMany(Category::class);
    }


    function galleries(){
        return $this->hasMany(Gallery::class);
    }

    function reviews(){
        return $this->hasMany(Review::class);
    }


  
}
