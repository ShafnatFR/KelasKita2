<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ulasan;
use App\Models\User;
use App\Models\Kursus;

class UlasanSeeder extends Seeder
{
    public function run(): void
    {
        $murid = User::where('username','nadia')->first();
        $kursus = Kursus::all();

        foreach($kursus as $k) {
            Ulasan::create([
                'user_id' => $murid->id,
                'kursus_id' => $k->id,
                'rating' => 0,
                'isi_ulasan' => null
            ]);
        }
    }
}
