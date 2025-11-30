<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class KelasFactory extends Factory
{
    public function definition(): array
    {
        return [
            'mentor_id' => User::factory()->state(['role' => 'mentor']),
            'nama_kelas' => $this->faker->sentence(3),
            'kategori' => $this->faker->randomElement(['Programming', 'Design', 'Marketing']),
            'harga' => $this->faker->numberBetween(100000, 500000),
            'foto' => null,
            'deskripsi_kelas' => $this->faker->paragraph(),
            'status_publikasi' => $this->faker->randomElement(['draft', 'diterima']),
        ];
    }
}
