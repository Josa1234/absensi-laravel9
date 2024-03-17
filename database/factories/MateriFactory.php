<?php

namespace Database\Factories;

use App\Models\Materi;
use Illuminate\Database\Eloquent\Factories\Factory;

class MateriFactory extends Factory
{
    protected $model = Materi::class;

    public function definition()
    {
        return [
            'kode' => $this->faker->unique()->word,
            'materi' => $this->faker->text(50),
            'gambar' => $this->faker->imageUrl(),
        ];
    }
}
