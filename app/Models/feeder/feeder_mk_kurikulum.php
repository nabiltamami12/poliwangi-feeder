<?php

namespace App\Models\feeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feeder_mk_kurikulum extends Model
{
    use HasFactory;
             protected $fillable = [
            'kode_mk_kurikulum',
            'kode_mk',
            'kode_kurikulum',
            'nama_kurikulum',
            'nama_program_studi',
            'bobot_mk',
            'jenis_mata_kuliah',
            'semester',
            'status_mk',
            'id_prodi_feeder',
            'status_upload_mk_kurikulum',
            'keterangan_upload_mk_kurikulum',
        ];
}
