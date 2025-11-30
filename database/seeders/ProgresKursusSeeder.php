<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgresKursus;
use App\Models\KursusPengguna;
use App\Models\Materi;

class ProgresKursusSeeder extends Seeder
{
    public function run(): void
    {
        $kp = KursusPengguna::all();

        foreach($kp as $k) {
            $materi = $k->kursus->materi;
            foreach($materi as $m) {
                ProgresKursus::create([
                    'user_id' => $k->user_id,
                    'kursus_id' => $k->kursus_id,
                    'materi_id' => $m->id,
                    'selesai' => false,
                ]);
            }
        }
    }
}
