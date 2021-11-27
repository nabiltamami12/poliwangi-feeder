<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Va extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "nomor_va";

    protected $fillable = [
        'id',
        'id_pendaftar',
        'id_mahasiswa',
        'status',
        'nomor_va'
    ];
}
