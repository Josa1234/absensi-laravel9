<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        Karyawan::create([
            'nama' => 'John Doe',
            'nip' => Str::random(10),
            'jabatan' => 'instruktur',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'Laki-laki',
            'phone' => '081234567890',
            'alamat' => 'Jl. Contoh No. 123',
            'picture' => 'john_doe.jpg',
        ]);

        Karyawan::create([
            'nama' => 'Jane Doe',
            'nip' => Str::random(10),
            'jabatan' => 'instruktur',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '1992-03-15',
            'jenis_kelamin' => 'Perempuan',
            'phone' => '087654321098',
            'alamat' => 'Jl. Contoh No. 456',
            'picture' => 'jane_doe.jpg',
        ]);

        Karyawan::create([
            'nama' => 'David Smith',
            'nip' => Str::random(10),
            'jabatan' => 'instruktur',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '1988-07-20',
            'jenis_kelamin' => 'Laki-laki',
            'phone' => '081112223334',
            'alamat' => 'Jl. Contoh No. 789',
            'picture' => 'david_smith.jpg',
        ]);
    }
}
