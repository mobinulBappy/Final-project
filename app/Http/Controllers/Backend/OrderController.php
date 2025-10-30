<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Chackout;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(){
        $orders = Chackout::latest()->paginate(20);
        return view('backend.order.index',compact('orders'));
    }

public function updateStatus(Request $request, Chackout $order)
{
    $request->validate([
        'new_status' => 'required|in:Processing,Delivered', 
    ]);
    $order->status = $request->new_status;
    $order->save();
    return back(); 
}

    function pending(){
        $orders = Chackout::where('status','pending')->latest()->paginate(20);
        return view('backend.order.pending',compact('orders'));
    }
    function confirm(){
        $orders = Chackout::where('status','confirm')->latest()->paginate(20);
        return view('backend.order.confirm',compact('orders'));
    }
    function deliver(){
        $orders = Chackout::where('status','confirm')->latest()->paginate(20);
        return view('backend.order.deliver');
    }
    function complete(){
        return view('backend.order.complete');
    }
}
