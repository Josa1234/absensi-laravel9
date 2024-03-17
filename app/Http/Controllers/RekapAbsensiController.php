<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;

class RekapAbsensiController extends Controller
{
    public function rekapHari(Request $request)
    {
        $searchDate = $request->input('searchDate');
        $search = $request->input('search');

        $query = Absen::query();

        if ($searchDate) {
            $query->whereDate('tanggal', $searchDate);
        }

        // if ($search) {
        //     $query->where('uid', 'like', '%' . $search . '%')
        //         ->orWhere('nama', 'like', '%' . $search . '%');
        // }

        $absensi = $query->get();

        return view('rekap.hari', compact('absensi'));
    }

    public function rekapBulan()
    {
        return view('rekap.bulan');
    }

    public function rekapTahun()
    {
        return view('rekap.tahun');
    }
}
