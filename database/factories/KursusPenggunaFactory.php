<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Kursus;

class KursusPenggunaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), 
            'kursus_id' => Kursus::factory(),
            'status' => fake()->randomElement(['berlangsung', 'selesai']),
        ];
    }
}
