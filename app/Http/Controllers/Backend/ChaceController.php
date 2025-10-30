<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class ChaceController extends Controller
{
    function chace(){
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        return back();
    }
}
