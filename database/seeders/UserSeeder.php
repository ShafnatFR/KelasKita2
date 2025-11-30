<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Admin
        User::create([
            'username' => 'admin',
            'email' => 'admin@kelaskita.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'status' => 'aktif',
        ]);

        // 2. Buat User Murid (untuk test login)
        User::create([
            'username' => 'murid_test',
            'email' => 'murid@kelaskita.com',
            'password' => Hash::make('password'),
            'role' => 'murid',
            'status' => 'aktif',
        ]);

        // 3. Buat 10 murid acak tambahan
        User::factory(10)->create(['role' => 'murid']);
    }
}