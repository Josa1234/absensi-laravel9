<?php

namespace App\Listeners;

use App\Events\JadwalSiswa;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HubungkanSiswaDenganJadwal implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(JadwalSiswa $event)
    {
        $jadwal = $event->jadwal;
        $siswas = $jadwal->materi->siswas;

        foreach ($siswas as $siswa) {
            $waktuAbsen = now(); // Sesuaikan dengan waktu absen
            $waktuMulai = $jadwal->jam_mulai->subMinutes(5);
            $waktuSelesai = $jadwal->jam_selesai->addMinutes(5);

            // Cek apakah siswa dapat melakukan absen IN
            if ($waktuAbsen >= $waktuMulai && $waktuAbsen <= $jadwal->jam_mulai) {
                $siswa->dataAbsen()->create([
                    'tanggal' => $jadwal->tanggal,
                    'status' => 'IN',
                    'waktu' => $waktuAbsen,
                ]);
            }

            // Cek apakah siswa dapat melakukan absen OUT
            if ($waktuAbsen > $jadwal->jam_selesai && $waktuAbsen <= $waktuSelesai) {
                $siswa->dataAbsen()->create([
                    'tanggal' => $jadwal->tanggal,
                    'status' => 'OUT',
                    'waktu' => $waktuAbsen,
                ]);
            }
        }
    }
}
