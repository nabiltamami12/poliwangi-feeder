<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "absensi_mahasiswa";

    protected $fillable = [
        'kuliah',
        'mahasiswa',
        'tanggal',
        'status',
        'dosen',
        'tanggal_entry',
        'minggu'
    ];
}
