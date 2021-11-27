<?php

namespace App\Models\feeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class krs extends Model
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
            'id_krs',
            'acc_dosen_wali',
            'acc_keuangan',
            'tgl_acc_dosen_wali',
            'tgl_acc_keuangan',
            'hari',
            'jam',
            'nama_ruang',
        ];

}
