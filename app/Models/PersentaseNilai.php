<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersentaseNilai extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'persentase_nilai';

    protected $fillable = [
        'id',
        'matakuliah',
        'persentase_uts',
        'persentase_uas',
        'persentase_tugas',
        'persentase_kuis',
        'persentase_kehadiran',
        'persentase_praktikum',
        'total',
        'dosen',
    ];
}