<?php

namespace Database\Factories;

use App\Models\Jadwal;
use App\Models\Materi;
use Illuminate\Database\Eloquent\Factories\Factory;


class JadwalFactory extends Factory
{
    protected $model = Jadwal::class;

    public function definition()
    {
        return [
            'tanggal_mulai' => $this->faker->date,
            'tanggal_selesai' => $this->faker->date,
            'nama_kelas' => substr($this->faker->word, 0, 10),
            'jam_mulai' => $this->faker->time,
            'jam_selesai' => $this->faker->time,
            'materi_id' => Materi::factory()->create()->id, 
            'instruktur' => $this->faker->name,
            'ruang' => substr($this->faker->word, 0, 5),
            'hari' => $this->faker->dayOfWeek,
        ];
    }
}
