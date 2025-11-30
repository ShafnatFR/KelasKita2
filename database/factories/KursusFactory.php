<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Kursus;
use App\Models\User;

class KursusFactory extends Factory
{
    protected $model = Kursus::class;

    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(3),
            'deskripsi' => $this->faker->paragraph(),
            'thumbnail' => 'default-kursus.jpg',
            'mentor_id' => User::factory(), 
        ];
    }
}
