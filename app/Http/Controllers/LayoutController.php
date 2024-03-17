<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Invalid;
use App\Models\Jadwal;
use App\Models\Siswa;

class LayoutController extends Controller
{
    public function dashboard()
    {
        $rowcount = Siswa::count();
        $today = now()->toDateString();
        $absensi = Absen::join('siswa', 'absen.uid', '=', 'siswa.uid')
            ->whereDate('absen.tanggal', $today)
            ->select(
                'absen.uid',
                'absen.tanggal',
                'absen.nama',
                'absen.jam_masuk',
                'absen.jam_keluar'
            )
            ->get();
        $jumlahAbsensi = $absensi->count();
        $invalid = Invalid::count();

        $jadwalList = Jadwal::whereDate('tanggal_mulai', $today)
            ->orWhereDate('tanggal_selesai', $today)
            ->get();

        return view('layouts.dashboard', compact('rowcount', 'invalid', 'jumlahAbsensi', 'jadwalList'));
    }

    public function scan()
    {
        return view('layouts.scan');
    }
}
