<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarMatkul extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "DOSEN_PENGAMPU";

    protected $fillable = [
        'nomor',
        'dosen',
        'matakuliah',
    ];
}
