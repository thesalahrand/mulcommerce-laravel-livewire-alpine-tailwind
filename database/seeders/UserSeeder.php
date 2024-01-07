<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->count(20)->create([
            'role' => 'user',
        ]);

        \App\Models\User::factory()->count(10)->hasVendorDetails()->create([
            'role' => 'vendor',
            'is_active' => 0,
        ]);

        \App\Models\User::factory()->count(5)->create([
            'role' => 'admin',
        ]);
    }
}
