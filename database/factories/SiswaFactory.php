<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    protected $model = Siswa::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date,
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'uid' => $this->faker->numberBetween(1000000000, 999999999999999),
            'phone' => $this->faker->numberBetween(1000000000, 999999999999999),
            'alamat' => $this->faker->address,
            'picture' => $this->faker->imageUrl(),
        ];
    }
}
