<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

class ProductRepository implements ProductRepositoryInterface
{
    public static function getRelatives(Product $product): Collection
    {
        return Product::whereHas('categories', function (Builder $query) use ($product) {
            return $query->whereIn('category_id', $product->categories->pluck('id'));
        })->with('categories')->get()->filter(function ($item) use ($product) {
            return $item->id !== $product->id;
        });
    }
}
