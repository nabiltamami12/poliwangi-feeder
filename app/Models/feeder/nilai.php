<?php

namespace App\Models\feeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;
       protected $fillable = [
            'nim',
            'nama',
            'kode_mk',
            'nama_mk',
            'nama_kelas',
            'semester',
            'kode_jurusan',
            'status_error',
            'keterangan',
            'nilai_huruf',
            'nilai_index',
            'nilai_angka',
            'tugas',
            'uts',
            'uas',
        ];
}
