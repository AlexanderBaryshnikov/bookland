<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public static function getRelatives(Product $product);
}
