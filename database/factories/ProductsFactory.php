<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'description' => fake()->text(),
            'original_price' => fake()->numberBetween(100, 1000),
            'discount_price' => fake()->numberBetween(100, 1000),
            'stock' => fake()->numberBetween(1, 100),
            'brand_id' => 2,
            'cover' => 'https://picsum.photos/200/300',
            'image_1' => 'https://picsum.photos/200/300',
            'image_2' => 'https://picsum.photos/200/300',
            'image_3' => 'https://picsum.photos/200/300',
            'image_4' => 'https://picsum.photos/200/300',
            'is_published' => true,
            'slug' => fake()->slug(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
