<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'isbn' => fake()->numerify('###-#-####-####-#'),
            'name' => Str::ucfirst(fake()->text(rand(10, 70))),
            'description' => Str::ucfirst(fake()->text(rand(15, 255))),
            'price' => fake()->randomFloat(2, 300, 10000),
            'quantity' => fake()->randomNumber(rand(0, 3)),
        ];
    }
}
