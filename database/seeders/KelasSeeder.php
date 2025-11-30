<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\User; // Kita ambil user yang role-nya mentor
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua ID user yang role-nya mentor
        $mentorIds = User::where('role', 'mentor')->pluck('id')->toArray();

        if (empty($mentorIds)) {
            $this->command->info('Tidak ada mentor ditemukan. Jalankan MentorSeeder terlebih dahulu.');
            return;
        }

        // Buat 15 Kelas, assign mentor secara acak dari yang sudah ada
        foreach (range(1, 15) as $index) {
            Kelas::factory()->create([
                'mentor_id' => $mentorIds[array_rand($mentorIds)],
            ]);
        }
    }
}