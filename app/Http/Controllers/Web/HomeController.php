<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

class HomeController extends WebController
{
    public function index(Request $request)
    {
        return view('pages.home');
    }
}
