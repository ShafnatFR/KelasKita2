<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ProgresKursus;

class ProgresKursusSeeder extends Seeder
{
    public function run(): void
    {
        $murid = \App\Models\User::where('username', 'nadia')->first();
        $materi = \App\Models\Materi::all();

        foreach ($materi as $m) {
            ProgresKursus::create([
                'user_id' => $murid->id,
                'kursus_id' => $m->kelas_id, 
                'materi_id' => $m->id,
                'selesai' => false,
            ]);
        }
    }
}
