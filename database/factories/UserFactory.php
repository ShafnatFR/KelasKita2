<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'username' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'), 
            'no_telpon' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'foto_profil' => 'default.png',
            'status' => 'aktif',
            'role' => 'murid',
        ];
    }
}
