<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use NumberFormatter;

class HomeController extends Controller
{
    public function index()
    {
        return view('shop.home');
    }
}
