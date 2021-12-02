<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "matakuliah";
    protected $primaryKey = 'nomor';
    protected $fillable = [
        'nomor',
        'program_studi',
        'semester',
        'kode',
        'matakuliah',
        'jam',
        'sks',
        'bobot',
        'mk_group',
        'mk_wajib',
        'tahun',
        'matakuliah_inggris',
        'matakuliah_singkatan',
        'tanggal_mulai_efektif',
        'tanggal_akhir_efektif',
        'matakuliah_jenis',
        'masuk_penilaian'
    ];

    public function rProdi()
    {
        return $this->belongsTo(Prodi::class, 'program_studi', 'nomor');
    }
}
