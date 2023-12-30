<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company,
            'slug' => fake()->unique()->slug,
            'logo' => fake()->imageUrl(),
            'email' => fake()->companyEmail,
            'phone' => fake()->phoneNumber,
            'website' => fake()->url,
            'country_of_origin' => fake()->country,
            'founded_in' => fake()->date,
            'additional_info' => fake()->text(500),
            'is_active' => fake()->boolean(90)
        ];
    }
}
