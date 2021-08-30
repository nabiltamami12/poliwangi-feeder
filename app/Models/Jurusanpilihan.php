<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusanpilihan extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "jurusan_pilihan";
    protected $fillable = [
        "nomor",
        "program_studi",
        "kuota",
        "tahun"
    ];
}
