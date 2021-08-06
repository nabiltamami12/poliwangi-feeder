<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "program_studi";
    protected $fillable = [
        'nomor',
        'program',
        'jurusan',
        'kepala',
        'kode_epsbed',
        'departemen',
        'gelar',
        'gelar_inggris'
    ];
}