<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function index()
    // {
    //     return view('admin.index');
    // }
    public function index()
    {
        return view('admin.index');
    }



    public function profile()
    {
        return view('admin.profile');
    }
}
