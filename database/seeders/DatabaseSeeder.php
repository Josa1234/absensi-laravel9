<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(MateriSeeder::class);
        $this->call(KaryawanSeeder::class);
        $this->call(SiswaSeeder::class);
        $this->call(JadwalSeeder::class);
    }
}
