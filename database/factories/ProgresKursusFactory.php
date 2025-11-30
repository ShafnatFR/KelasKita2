<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\KursusPengguna;
use App\Models\Materi;

class ProgresKursusFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => KursusPengguna::factory(), 
            'kursus_id' => KursusPengguna::factory(), 
            //'materi_id' => Materi::factory(),
            'selesai' => fake()->boolean(),
        ];
    }
}
