<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Category;
use App\Models\Product;
use App\Models\Property;
use App\Models\Publisher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_count = 100;
        $properties = Property::all();
        $categories = Category::all();
        $authors = Author::all();
        $publishers = Publisher::all();

        while ($product_count) {
            Product::factory()
                ->for($authors->random())
                ->for($publishers->random())
                ->hasAttached(
                    $properties,
                    function () use (&$property_values) {
                        return [
                            'value' => Str::random(rand(5, 9))
                        ];
                    }
                )
                ->hasAttached(
                    $categories->random(rand(1,4))
                )
                ->count(1)
                ->create();

            --$product_count;
        }
    }
}
