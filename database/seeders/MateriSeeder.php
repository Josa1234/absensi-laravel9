<?php

namespace Database\Seeders;

use App\Models\Materi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MateriSeeder extends Seeder
{
    public function run()
    {
        Materi::factory()->count(50)->create();
    }
}
