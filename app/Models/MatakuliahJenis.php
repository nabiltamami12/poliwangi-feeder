<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatakuliahJenis extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'matakuliah_jenis';

    protected $fillable = [
        // 'nomor',
        // 'jurusan',
        // 'kajur',
        // 'sekjur',
        // 'alias',
        // 'jurusan_inggris',
        // 'jurusan_lengkap',
        // 'konsentrasi',
        // 'akreditasi',
        // 'sk_akreditasi'
    ];
}