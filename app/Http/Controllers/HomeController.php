<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): view {
        return view('home');
    }
}
