<?php

namespace App\Models\feeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkalaNilai extends Model
{
    use HasFactory;
          protected $fillable = [
            'nilai_huruf',
            'nilai_indeks',
            'bobot_nilai_min',
            'bobot_nilai_maks',
           'tgl_mulai_efektif',
           'tgl_akhir_efektif',
            'kode_jurusan',
            'id_bobot_nilai',
          ];
}
