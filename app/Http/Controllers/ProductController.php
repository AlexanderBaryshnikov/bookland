<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Web\WebController;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends WebController
{
    public function show(Request $request, Product $product)
    {
        if (!$product->published) {
            abort(404);
        }

        return view('pages.product', [
            'product' => $product,
            'related_products' => ProductRepository::getRelatives($product)->random(3),
        ]);
    }
}
