<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class BerkasKeuangan extends Model
{
    use HasFactory;
    public $table = "keuangan_piutang";
    protected $fillable = [
        'id_mahasiswa',
        'path_perjanjian',
        'path_pengajuan',
        'jenis',
        'status',
        'tenor',
        'bulan',
        'nominal',
        'total',
        'status_lunas',
        'tahun',
    ];
}
