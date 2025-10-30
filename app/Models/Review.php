<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    function customer(){
        return $this->belongsTo(Customer::class)->select('id','name','profile_img');
    }
}
