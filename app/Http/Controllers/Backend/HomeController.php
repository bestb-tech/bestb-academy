<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __invoke()
    {
        $a = Auth::guard('admin')->id();
        if($a === null){
            return redirect('/admin/login');
        }
        return view('backend.home');

    }
}
