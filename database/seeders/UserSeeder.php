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
        'username' => 'admin',
            'email' => 'admin@kelaskita.com',
            'password' => 12345678,
            'role' => 'admin',
            'status' => 'aktif',
            'role' => 'murid',
        ]);

        
        User::factory()->count(10)->create();
    }
}
