<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return view('User/home', compact('info'));
    }
}
