<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'mahasiswa';

    protected $fillable = [
        'nomor',
        'nama',
        'nrp',
        'kelas',
        'status',
        'nik',
        'nisn',
        'tmplahir',
        'tgllahir',
        'anak_ke',
        'jenis_kelamin',
        'lulussmu',
        'sekolah',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kabupaten_kota',
        'propinsi',
        'kode_pos'
    ];
}