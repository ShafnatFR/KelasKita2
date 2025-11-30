<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        
        User::create([
            'username' => 'nadia',
            'email' => 'nadia@example.com',
            'password' => Hash::make('nadia29'),
            'no_telpon' => '081234567890',
            'alamat' => 'Bandung',
            'foto_profil' => 'default.png',
            'status' => 'aktif',
            'role' => 'murid',
        ]);

        
        User::factory()->count(10)->create();
    }
}
