<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\KursusPengguna;
use App\Models\Kelas;

class KursusPenggunaSeeder extends Seeder
{
    public function run(): void
    {
        $murid = User::where('username', 'nadia')->first();
        $kelas = Kelas::all();

        foreach ($kelas as $k) {
            KursusPengguna::create([
                'user_id' => $murid->id,
                'kursus_id' => $k->id,
                'status' => 'berlangsung',
            ]);
        }
    }
}
