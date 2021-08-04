<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "kelas";
    protected $fillable = [
        'nomor',
        'program',
        'jurusan',
        'kelas',
        'pararel',
        'kode',
        'kode_kelas_absen',
        'kode_epsbed',
        'kodesentrasi',
        'wali_kelas'
    ];
}
