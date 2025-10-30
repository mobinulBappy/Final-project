<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  function product(){
    return $this->belongsTo(Product::class)->select('id','title','slug','image','price','sell_price');
  }
}
