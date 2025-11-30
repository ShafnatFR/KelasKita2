<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Ulasan;
use App\Models\Kelas;

class UlasanSeeder extends Seeder
{
    public function run(): void
    {
        $murid = User::where('username', 'nadia')->first();
        $kelas = Kelas::all();

        foreach ($kelas as $k) {
            Ulasan::create([
                'user_id' => $murid->id,
                'kursus_id' => $k->id,
                'rating' => null,
                'isi_ulasan' => null,
            ]);
        }
    }
}
