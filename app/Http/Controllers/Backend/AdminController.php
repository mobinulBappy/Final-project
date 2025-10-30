<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function admin(){
        $admins = User::get();
        return view('backend.admin.index',compact('admins'));
    }
}
