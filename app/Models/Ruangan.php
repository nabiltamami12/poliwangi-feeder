<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "ruang";
    protected $fillable = [
        'nomor',
        'ruang',
        'keterangan',
        'kepala',
        'asisten',
        'teknisi',
        'jurusan',
        'homepage',
        'email',
        'username',
        'password',
        'kode',
        'telp',
        'tender',
        'is_ruang_kuliah',
        'kapasitas_mahasiswa',
        'pemakai',
        'teknisi3',
        'teknisi4',
        'teknisi5',
        'ruang_ujian'
    ];
}
