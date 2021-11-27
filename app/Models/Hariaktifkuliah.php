<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hariaktifkuliah extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "tanggal";
    protected $fillable = [
        'tanggal',
        'libur',
        'keterangan',
    ];
}
