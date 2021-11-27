<?php

namespace App\Models\feeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feeder_kurikulum extends Model
{
    use HasFactory;
       protected $fillable = [
        'kode_kurikulum',
        'nama_kurikulum',
        'kode_jurusan',
        'kode_thn_ajaran',
        'jum_sks',
        'jum_sks_wajib',
        'jum_sks_pilihan',
        'status_kurikulum',
        'id_kurikulum',
        ];
}
