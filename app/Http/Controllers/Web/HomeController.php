<?php

namespace App\Http\Controllers\Web;

use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends WebController
{
    public function index(Request $request)
    {
        $banners = Banner::with('product', 'product.author')
            ->published()
            ->get();

        return view('pages.home', [
            'banners' => $banners
        ]);
    }
}
