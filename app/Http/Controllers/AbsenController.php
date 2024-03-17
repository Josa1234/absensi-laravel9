<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\JadwalSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AbsenController extends Controller
{
    public function index(Request $request)
    {
        $today = Carbon::now()->toDateString();
        $absens = Absen::whereDate('tanggal', $today)->get();

        return view('absen.index', compact('absens'));
    }

    public function create(Request $request)
    {
        $tanggal = Carbon::now('Asia/Jakarta')->toDateString();
        $jam = Carbon::now('Asia/Jakarta')->format('H:i:s');

        $request->validate([
            'uid' => 'required|string|max:20'
        ]);

        $uid = $request->input('uid');
        $dataSiswa = Siswa::where('uid', $uid)->first();

        if ($dataSiswa) {
            $siswa = Siswa::where('uid', $uid)
                ->with('jadwalSiswa')
                ->first();

            $jadwalSiswa = JadwalSiswa::where('siswa_uid', $uid)
                ->join('jadwal', 'jadwal.id', '=', 'jadwal_siswa.jadwal_id')
                ->select('jadwal.*', 'jadwal_siswa.*')
                ->first();

            if ($jadwalSiswa) {
                $inStart = Carbon::parse($jadwalSiswa->jam_mulai)->subMinutes(15)->format('H:i:s');
                $inEnd = Carbon::parse($jadwalSiswa->jam_mulai)->addMinutes(15)->format('H:i:s');
                $outStart = Carbon::parse($jadwalSiswa->jam_selesai)->subMinutes(15)->format('H:i:s');
                $outEnd = Carbon::parse($jadwalSiswa->jam_selesai)->addMinutes(15)->format('H:i:s');

                $cek = DB::table('absen')->whereDate('tanggal', $tanggal)->where('uid', $uid)->count();
                if ($cek > 0) {
                    if ($jam >= $outStart && $jam <= $outEnd) {
                        $data_out = [
                            'jam_keluar' => $jam,
                        ];
                        $data_res = [
                            'tanggal' => $tanggal,
                            'uid' => $uid,
                            'nama' => $siswa->nama,
                            'jam_keluar' => $jam,
                        ];
                        DB::table('absen')->whereDate('tanggal', $tanggal)->where('uid', $uid)->update($data_out);
                        $this->sendMessage($dataSiswa->phone, $dataSiswa->nama, 'Anak anda baru pulang');
                        return response()->json($data_res, 200);
                    }
                } elseif ($jam >= $inStart && $jam <= $inEnd) {
                    $data_in = [
                        'tanggal' => $tanggal,
                        'uid' => $uid,
                        'nama' => $siswa->nama,
                        'jam_masuk' => $jam,
                    ];
                    DB::table('absen')->insert($data_in);

                    $this->sendMessage($dataSiswa->phone, $dataSiswa->nama, 'Anak sudah berada di tempat');

                    return response()->json($data_in, 200);
                } else {
                    return response()->json([
                        'message' => "Belum waktunya",
                        'jam' => $jam,
                        'jam_masuk' => $inStart,
                        'jam_keluar' => $inEnd,
                    ], 404);
                }
            } else {
                return response()->json(['message' => "Jadwal siswa tidak ditemukan"], 404);
            }
        } else {
            $status = 'INVALID';
            $nama = "Invalid";

            $dataInvalid = [
                "tanggal" => $tanggal,
                "waktu" => $jam,
                "uid" => $uid,
                "status" => $status
            ];
            DB::table('invalid')->insert($dataInvalid);

            return response()->json($dataInvalid, 404);
        }
    }

    public function sendMessage($phone, $name, $message)
    {
        $apiKey = "02bIj3qLH1uwqP8qTUAjhbmI1XY8et";
        $sender = "629504904884";

        $message = "Halo $name, $message";

        $response = Http::post('https://wabot.falnain.com/send-message', [
            'api_key' => $apiKey,
            'sender' => $sender,
            'number' => $phone,
            'message' => $message,
        ]);

        if ($response->successful()) {
            return response()->json(['status' => 'success', 'message' => 'Pesan WhatsApp berhasil dikirim']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Gagal mengirim pesan WhatsApp', 'response' => $response->body()]);
        }
    }
}
