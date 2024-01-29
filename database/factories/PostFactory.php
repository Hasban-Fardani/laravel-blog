<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'body' => fake()->paragraph(),
            'image' => fake()->imageUrl(),
            'user_id' => fake()->numberBetween(1, 2),
            'category_id' => fake()->numberBetween(1, 3),
            'views' => fake()->numberBetween(1, 100),
            'status' => fake()->randomElement(['published', 'draft', 'pending']),
        ];
    }
}
