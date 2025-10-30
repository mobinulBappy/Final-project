<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CustomerLoginController extends Controller
{
     use AuthenticatesUsers;
     protected $redirectTo = '/my-profile';
     
         function showLoginForm(){
        return view('auth.signin');
    }


      protected function guard()
    {
        return Auth::guard('customer');
    }
}
