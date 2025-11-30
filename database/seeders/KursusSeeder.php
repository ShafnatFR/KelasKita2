<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kursus;

class KursusSeeder extends Seeder
{
    public function run(): void
    {
        
        Kursus::factory()->count(5)->create();
    }
}
