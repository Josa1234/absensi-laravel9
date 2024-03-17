<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSiswa extends Model
{
    use HasFactory;

    protected $table = 'jadwal_siswa';

    protected $fillable = [
        'jadwal_id', 'siswa_uid'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_uid', 'uid');
    }

    public function jadwal()
    {
        return $this->belongsTo(Materi::class, 'jadwal_id', 'id');
    }
}
