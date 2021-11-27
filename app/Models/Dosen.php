<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "pegawai";

    protected $fillable = [
        'nip',
        'nama',
        'tgllahir',
        'notelp',
        'email',
        'staff',
        'nomor',
        'status'
    ];
}