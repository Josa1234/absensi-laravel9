<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();

        return view('karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'nip' => 'required|unique:karyawan,nip|max:20',
            'jabatan' => 'required|max:255',
            'phone' => [
                'required',
                'regex:/^62[0-9]+$/',
                'digits_between:10,14',
            ],
            'alamat' => 'required',
        ], [
            'nama.required' => 'Kolom Nama wajib diisi.',
            'tempat_lahir.required' => 'Kolom Tempat Lahir wajib diisi.',
            'tanggal_lahir.required' => 'Kolom Tanggal Lahir wajib diisi.',
            'tanggal_lahir.date' => 'Format Tanggal Lahir tidak valid.',
            'jenis_kelamin.required' => 'Kolom Jenis Kelamin wajib diisi.',
            'jenis_kelamin.in' => 'Pilih salah satu opsi untuk Jenis Kelamin.',
            'nip.required' => 'Kolom NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan. Pilih NIP yang lain.',
            'nip.max' => 'Panjang NIP tidak boleh lebih dari :max karakter.',
            'jabatan.required' => 'Kolom Jabatan wajib diisi.',
            'jabatan.max' => 'Panjang Jabatan tidak boleh lebih dari :max karakter.',
            'phone.required' => 'Kolom Nomor Telepon wajib diisi.',
            'phone.regex' => 'Format Nomor Telepon tidak valid. Gunakan format 62xxxxxxxxxx.',
            'phone.digits_between' => 'Panjang Nomor Telepon harus antara 10 dan 14 digit.',
            'alamat.required' => 'Kolom Alamat wajib diisi.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('karyawan.create')
                ->withErrors($validator)
                ->withInput();
        }
    
        $phoneNumber = $request->get('phone');
        $dataKaryawan = new Karyawan([
            'nama' => $request->get('nama'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'nip' => $request->get('nip'),
            'jabatan' => $request->get('jabatan'),
            'phone' => $phoneNumber,
            'alamat' => $request->get('alamat'),
            'picture' => '', 
        ]);
    
        $dataKaryawan->save();
    
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }
}
