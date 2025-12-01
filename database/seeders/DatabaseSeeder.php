<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,   // 1. Buat User & Admin
            MentorSeeder::class, // 2. Buat Mentor
            KelasSeeder::class,  // 3. Buat Kelas (butuh Mentor)
            MateriSeeder::class, // 4. Buat Materi (butuh Kelas)
        ]);
    }
}