<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    protected $primaryKey = 'nip';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'phone',
        'alamat',
        'picture',
    ];

    protected $dates = ['tanggal_lahir'];

    public static function scopeInstruktur($query)
    {
        return $query->where('jabatan', 'instruktur');
    }
}
