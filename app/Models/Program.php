<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'program';
    protected $primaryKey = 'nomor';

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