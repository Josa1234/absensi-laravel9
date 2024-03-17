<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    public function run()
    {
        Jadwal::factory()->count(50)->create();
    }
}
