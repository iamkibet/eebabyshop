<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
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
        $productImages = Storage::disk('public')->files('products');

        $name = $this->faker->sentence(5);

        // sample product categories
        $productCategories = [
            'Shoes'
        ];

        // Sample Product brands
        $productBrands = [
            'E $ E'
        ];

        $productGender = [
            'Male',
            'Female',
            'Unisex'
        ];

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->sentences(4, true),
            'category' => Arr::random($productCategories),
            'brand' => Arr::random($productBrands),
            'price' => $this->faker->randomFloat(2, 250, 3200),
            'stock_quantity' => rand(0, 52),
            'size' => $this->faker->numberBetween(0, 32),
            'gender' => $this->faker->randomElement(['male', 'female', 'unisex']),
            'color' => $this->faker->safeColorName(),
            'return_policy' => Arr::random(['30 days', '3 days', '7 days', '14 days']),
            'shipped_from' => $this->faker->city(),
            'image' => !empty($productImages) ? Arr::random($productImages) : 'default.jpg',
            'views' => rand(0, 150)
        ];
    }
}
