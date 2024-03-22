<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tutorial>
 */
class TutorialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'user_id' => 1,
            'is_published' => true,
            'description' => $this->faker->sentence(),
            'topics_id' => 1,
            'slug' => $this->faker->slug(),
            'image' => $this->faker->imageUrl(640, 480),
            'keywords' => $this->faker->word(),
            'created_at' => now(),
            'updated_at' => now(),
            
        ];
    }
}
