<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invalid;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InvalidController extends Controller
{
    public function index(Request $request)
    {
        $orderBy = $request->get('order') ?? 'id';
        $sort = $request->get('sort') === 'desc' ? 'desc' : 'asc';

        $search = $request->get('search');
        $dataInvalid = Invalid::when($search, function ($query) use ($search) {
            return $query->where('tanggal', 'LIKE', "%$search%")
                ->orWhere('waktu', 'LIKE', "%$search%")
                ->orWhere('uid', 'LIKE', "%$search%")
                ->orWhere('status', 'LIKE', "%$search%");
        })->orderBy($orderBy, $sort)->paginate(10);

        $rowcount = Invalid::count();
        return view('invalid.index', compact('dataInvalid', 'rowcount', 'search', 'sort'));
    }

    public function create(Request $request)
    {
        $uid = $request->input('uid');
        $dataInvalid = Invalid::where('uid', $uid)->first();
        return view('invalid.create', compact('dataInvalid'));
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
            return redirect()->route('invalid.create')
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
        Invalid::where('uid', $request->input('uid'))->delete();
        return redirect()->route('invalid.index')->with('success', 'Data kartu invalid berhasil ditambahkan!');
    }

    public function deleteForm($id)
    {
        $dataInvalid = Invalid::findOrFail($id);
        return view('invalid.delete', compact('dataInvalid'));
    }

    public function destroy($id)
    {
        Invalid::destroy($id);

        return redirect()->route('invalid.index')->with('success', 'Data berhasil dihapus.');
    }

    public function delete()
    {
        $data = DB::table('invalid')->get();
        $rowcount = count($data);

        return view('invalid.deleteAll', compact('rowcount'));
    }

    public function deleteAll()
    {
        DB::table('invalid')->truncate();

        return redirect()->route('invalid.index')->with('success', 'Seluruh Data berhasil dihapus');
    }
}
