<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $table = 'absen';

    protected $fillable = ['uid', 'nama', 'tanggal', 'jam_masuk', 'jam_keluar', 'status'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'uid', 'uid');
    }
}
