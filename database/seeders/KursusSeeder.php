<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kursus;
use App\Models\User;

class KursusSeeder extends Seeder
{
    public function run(): void
    {
       
        $mentor = User::factory()->create(['role' => 'mentor']);
        Kursus::factory()->count(5)->create([
            'mentor_id' => $mentor->id
        ]);
    }
}
