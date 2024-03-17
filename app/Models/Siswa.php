<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'uid';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'uid',
        'phone',
        'alamat',
        'picture',
    ];
    
    
    public function jadwal()
    {
        return $this->belongsToMany(Jadwal::class, 'jadwal_siswa')
            ->withTimestamps();
    }

    public function dataAbsen()
    {
        return $this->hasMany(Absen::class, 'uid', 'uid');
    }

    public function dataInvalid()
    {
        return $this->hasMany(Invalid::class, 'uid', 'uid');
    }

    public function jadwalSiswa()
    {
        return $this->hasMany(JadwalSiswa::class, 'siswa_uid', 'uid');
    }
}
