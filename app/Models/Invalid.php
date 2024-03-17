<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invalid extends Model
{
    use HasFactory;

    protected $table = 'invalid';
    protected $fillable = ['waktu', 'uid', 'status', 'nama'];

    protected $last_status;
    protected $nama;

    public function dataSiswa()
    {
        return $this->belongsTo(Siswa::class, 'uid', 'uid');
    }
}
