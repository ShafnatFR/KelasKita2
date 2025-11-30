<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Kursus;

class UlasanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'kursus_id' => Kursus::factory(),
            'rating' => fake()->numberBetween(1, 5),
            'isi_ulasan' => fake()->sentence(10),
        ];
    }
}
