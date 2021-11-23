<?php

namespace App\Models\Kepegawaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiKaryawan extends Model
{
    use HasFactory;
    protected $table = "absensikaryawan";
    protected $fillable = [
        'pegawai',
        'tanggal',
        'masuk',
        'pulang',
        'terlambat1',
        'terlambat2',
        'pulangawal',
        'tidakabsen',
        'tidakmasuk',
        'libur',
        'lembur',
        'mulai_istirahat',
        'akhir_istirahat',
        'keterangan'
    ];

    public function pegawai() {
        return $this->belongsToMany(Pegawai::class, 'id');
    }
}
