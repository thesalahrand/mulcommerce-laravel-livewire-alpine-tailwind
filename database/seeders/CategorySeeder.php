<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::factory()->count(100)->create();

        \App\Models\Category::all()->each(function ($category) {
            $category->update(['parent_id' => fake()->boolean(90) || $category->id === 1 ? rand(1, $category->id - 1) : null]);
        });
    }
}
