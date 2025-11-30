<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\IsiMateri;
use Illuminate\Database\Seeder;

class MateriSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua kelas yang ada
        $kelas = Kelas::all();

        if ($kelas->isEmpty()) {
            $this->command->info('Tidak ada kelas ditemukan. Jalankan KelasSeeder terlebih dahulu.');
            return;
        }

        // Untuk setiap kelas, buatkan 3-5 materi
        foreach ($kelas as $k) {
            Materi::factory(rand(3, 5))->create([
                'kelas_id' => $k->id // Pastikan materi terhubung ke kelas ini
            ])->each(function ($materi) {
                
                // Untuk setiap materi, buatkan 1 isi materi
                IsiMateri::factory()->create([
                    'id_materi' => $materi->id
                ]);
            });
        }
    }
}