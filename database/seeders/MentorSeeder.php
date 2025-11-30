<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mentor;
use Illuminate\Database\Seeder;

class MentorSeeder extends Seeder
{
    public function run(): void
    {
        // Buat 5 User yang sekaligus Mentor
        User::factory(5)->create(['role' => 'mentor'])->each(function ($user) {
            Mentor::create([
                'user_id' => $user->id,
                'keahlian' => 'Web Development', // Bisa diganti randomElement di Factory
                'pengalaman' => '5 Tahun di Industri Tech',
                'status' => 'aktif',
            ]);
        });
    }
}