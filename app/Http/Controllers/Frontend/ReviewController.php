<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    function store(Request $request){
       $review = new Review();
       $review->product_id = $request->product_id;
       $review->customer_id = auth('customer')->user()->id;
       $review->detail = $request->detail;
       $review->rating = $request->rating;
        $review->save();
        return back();
    }
}
