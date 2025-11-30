<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KursusPengguna;
use App\Models\User;
use App\Models\Kursus;

class KursusPenggunaSeeder extends Seeder
{
    public function run(): void
    {
        $murid = User::where('username','nadia')->first();
        $kursus = Kursus::all();

        foreach($kursus as $k) {
            KursusPengguna::create([
                'user_id' => $murid->id,
                'kursus_id' => $k->id,
                'status' => 'berlangsung'
            ]);
        }
    }
}
