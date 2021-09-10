<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    public $timestamps = false;
public $table = "nilai";
    protected $fillable = [
        'nomor',
        'kuliah',
        'mahasiswa',
        'quis1',
        'quis2',
        'tugas',
        'ujian',
        'na',
        'her',
        'nh',
        'keterangan',
        'nhu',
        'nsp',
        'kuis',
        'praktikum',
    ];
}
