<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukt extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "tarif_kelompok";

    protected $fillable = [
        'program_studi',
        'jalur_seleksi',
        'spi',
        'kelompok_1',
        'kelompok_2',
        'kelompok_3',
        'kelompok_4',
        'kelompok_5',
        'kelompok_6',
        'kelompok_7',
        'kelompok_8',
        'tahun'
    ];
}
