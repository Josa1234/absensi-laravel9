<?php

namespace App\Http\Controllers;

use App\Events\JadwalSiswa;
use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Karyawan;
use App\Models\Materi;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    public function index()
    {
        $tanggalMulai = Jadwal::min('tanggal_mulai');
        $tanggalSelesai = Jadwal::max('tanggal_selesai');
        $hariHari = Jadwal::select('hari')->distinct()->get()->pluck('hari')->toArray();
        $jadwalGrouped = [];
        $currentDate = $tanggalMulai;
        while ($currentDate <= $tanggalSelesai) {
            $query = Jadwal::with('materi')
                ->whereRaw('? BETWEEN tanggal_mulai AND tanggal_selesai', [$currentDate])
                ->whereIn('hari', $hariHari)
                ->orderBy('hari')
                ->orderBy('jam_mulai');
            $jadwalHariIni = $query->get();
            if ($jadwalHariIni->isNotEmpty()) {
                $jadwalGrouped[$currentDate] = $jadwalHariIni;
            }
            $currentDate = date('Y-m-d', strtotime($currentDate . ' + 1 day'));
        }

        return view('jadwal.index', compact('jadwalGrouped', 'hariHari'));
    }

    public function create()
    {
        $dataMateri = Materi::pluck('materi', 'id');
        $dataInstruktur = Karyawan::instruktur()->pluck('nama', 'nip');
        $dataSiswa = Siswa::pluck('nama', 'uid');
        $hariOptions = $this->getHariOptions();

        return view('jadwal.create', compact('dataMateri', 'dataInstruktur', 'dataSiswa', 'hariOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required',
            'instruktur' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'hari' => 'required|array',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruang' => 'required',
            'materi' => 'required',
        ]);

        $hariDipilih = $request->input('hari', []);
        $hariString = implode(',', $hariDipilih);

        $jadwal = Jadwal::create([
            'nama_kelas' => $request->kelas,
            'instruktur' => $request->instruktur,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'hari' => $hariString,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'ruang' => $request->ruang,
            'materi_id' => $request->materi,
        ]);

        $jadwal->save();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }


    public function showAddSiswaForm(Jadwal $jadwal)
    {
        $dataSiswa = Siswa::all();
        return view('jadwal.siswa', compact('jadwal', 'dataSiswa'));
    }

    public function addSiswaToJadwal(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'siswa' => 'required|array',
        ]);

        $siswaIDs = $request->siswa;

        $jadwal->siswa()->attach($siswaIDs);

        return redirect()->route('jadwal.index')->with('success', 'Siswa berhasil ditambahkan ke jadwal.');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::find($id);
        $dataMateri = Materi::pluck('materi', 'id');
        $dataInstruktur = Karyawan::instruktur()->pluck('nama', 'nip');
        $hariOptions = $this->getHariOptions();

        return view('jadwal.edit', ['jadwal' => $jadwal, 'dataMateri' => $dataMateri, 'dataInstruktur' => $dataInstruktur, 'hariOptions' => $hariOptions]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kelas' => 'required',
            'instruktur' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'hari' => 'required|array',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruang' => 'required',
            'materi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('jadwal.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $jadwal = Jadwal::find($id);

        $hariDipilih = $request->input('hari', []);

        $jadwal->update([
            'nama_kelas' => $request->kelas,
            'instruktur' => $request->instruktur,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'hari' => implode(',', $hariDipilih),
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'ruang' => $request->ruang,
            'materi_id' => $request->materi,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diupdate.');
    }

    public function deleteForm($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('jadwal.delete', compact('jadwal'));
    }

    public function destroy($id)
    {
        Jadwal::destroy($id);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
