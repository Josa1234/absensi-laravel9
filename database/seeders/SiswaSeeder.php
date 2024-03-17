<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    
    public function run()
    {
        Siswa::factory()->count(50)->create();
    }
}
