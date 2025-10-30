<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function customer(){
        $cus = Customer::latest()->paginate(30);
        return view('backend.customer.index',compact('cus'));
    }
}
