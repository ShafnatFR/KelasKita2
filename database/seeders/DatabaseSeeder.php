<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,          
            KelasSeeder::class,         
            MateriSeeder::class,        
            KursusPenggunaSeeder::class,
            ProgresKursusSeeder::class, 
            UlasanSeeder::class,       
        ]);
    }
}
