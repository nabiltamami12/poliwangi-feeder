<?php

namespace App\Models\feeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akm extends Model
{
    use HasFactory;
      protected $fillable = [
            'semester',
            'nim',
            'nama',
            'ips',
            'ipk',
            'sks_smt',
            'sks_total',
            'kode_jurusan',
            'status_kuliah',
            'status_error',
            'valid',
            'keterangan',
        ];
}
