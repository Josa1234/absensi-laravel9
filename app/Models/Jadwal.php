<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'nama_kelas',
        'jam_mulai',
        'jam_selesai',
        'materi_id',
        'instruktur',
        'ruang',
        'tanggal_mulai',
        'tanggal_selesai',
        'hari',
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'jadwal_siswa')
            ->withTimestamps();
    }
}
