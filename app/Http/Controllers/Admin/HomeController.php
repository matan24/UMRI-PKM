<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Info;

class HomeController extends Controller
{
    public function __construct()
    {
        // ketika kita sudah login maka kita bisa mengakses homepage
        $this->middleware('auth');
    }

    public function index()
    {
        $info = Info::all();
        return view('Admin/home', compact('info'));
    }

    public function gantipassword()
    {
    
        return view('Admin/gantipassword');
    }


}
