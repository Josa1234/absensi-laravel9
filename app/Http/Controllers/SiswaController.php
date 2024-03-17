<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $orderBy = $request->get('order') ?? 'uid';
        $sort = $request->get('sort') === 'desc' ? 'desc' : 'asc';

        $search = $request->get('search');
        $dataSiswa = Siswa::when($search, function ($query) use ($search) {
            return $query->where('nama', 'LIKE', "%$search%")
                ->orWhere('kelas', 'LIKE', "%$search%")
                ->orWhere('alamat', 'LIKE', "%$search%");
        })->orderBy($orderBy, $sort)->paginate(10);

        $rowcount = Siswa::count();
        return view('siswa.index', compact('dataSiswa', 'rowcount', 'search', 'sort'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'uid' => 'required',
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
            'uid.required' => 'Kolom UID wajib diisi.',
            'phone.required' => 'Kolom Nomor Telepon wajib diisi.',
            'phone.regex' => 'Format Nomor Telepon tidak valid. Gunakan format 62xxxxxxxxxx.',
            'phone.digits_between' => 'Panjang Nomor Telepon harus antara 12 dan 14 digit.',
            'alamat.required' => 'Kolom Alamat wajib diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('siswa.create')
                ->withErrors($validator)
                ->withInput();
        }

        $phoneNumber = $request->get('phone');

        $dataSiswa = new Siswa([
            'nama' => $request->get('nama'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'uid' => $request->get('uid'),
            'phone' => $phoneNumber,
            'alamat' => $request->get('alamat'),
            'picture' => '',
        ]);

        $dataSiswa->save();

        return redirect()->route('siswa.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($uid)
    {
        $dataSiswa = Siswa::find($uid);

        return view('siswa.show', ['datasiswa' => $dataSiswa]);
    }

    public function edit($id)
    {
        $dataSiswa = Siswa::find($id);

        return view('siswa.edit', ['datasiswa' => $dataSiswa]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'uid' => 'required',
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
            'uid.required' => 'Kolom UID wajib diisi.',
            'phone.required' => 'Kolom Nomor Telepon wajib diisi.',
            'phone.regex' => 'Format Nomor Telepon tidak valid. Gunakan format 62xxxxxxxxxx.',
            'phone.digits_between' => 'Panjang Nomor Telepon harus antara 10 dan 14 digit.',
            'alamat.required' => 'Kolom Alamat wajib diisi.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('siswa.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $phoneNumber = $request->get('phone');

        $dataSiswa = Siswa::find($id);

        $dataSiswa->update([
            'nama' => $request->get('nama'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'uid' => $request->get('uid'),
            'phone' => $phoneNumber,
            'alamat' => $request->get('alamat'),
            'picture' => '',
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate!');
    }


    public function deleteForm($id)
    {
        $dataSiswa = Siswa::findOrFail($id);
        return view('siswa.delete', compact('dataSiswa'));
    }

    public function destroy($id)
    {
        Siswa::destroy($id);

        return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus.');
    }
}