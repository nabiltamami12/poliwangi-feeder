<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogMahasiswaStatus extends Model
{
    use HasFactory;
    public $table = "log_mahasiswa_status";
    protected $fillable = [
        'id',
        'mahasiswa',
        'tahun',
        'semester',
        'status',
    ];
}
