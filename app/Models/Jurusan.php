<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'jurusan';

    protected $fillable = [
        'nomor',
        'jurusan',
        'kepala',
        'jurusan_inggris',
    ];
}