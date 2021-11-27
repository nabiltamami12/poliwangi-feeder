<?php

namespace App\Models\feeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matakuliah extends Model
{
    use HasFactory;
      protected $fillable = [
       'nama_mk',
          'jenis_mata_kuliah',
          'bobot_mk',
          'bobot_tatap_muka',
          'bobot_pratikum',
          'bobot_praktek_lapangan',
          'bobot_simulasi',
          'id_mk',
          'kode_mk',
          'prodi_mk',
        ];
}
