<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'no_telpon' => fake()->phoneNumber(),
            'alamat' => fake()->address(),
            'foto_profil' => 'default.png',
            'status' => 'aktif',
            'role' => 'murid'
        ];
    }
}
