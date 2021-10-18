<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "nilai";
    protected $primaryKey = 'nomor';
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

    public function rKuliah()
    {
        return $this->belongsTo(Kuliah::class, 'kuliah', 'nomor');
    }

    public function rMahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa', 'nomor');
    }
}
