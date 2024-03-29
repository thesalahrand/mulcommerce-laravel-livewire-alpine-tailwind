<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'parent_id' => fake()->boolean(70) ? Category::inRandomOrder()->first()?->id : null,
            'name' => fake()->sentence(2),
            'slug' => fake()->unique()->slug,
            'photo' => fake()->imageUrl(),
            'additional_info' => fake()->text(500),
            'is_active' => fake()->boolean(90)
        ];
    }
}
