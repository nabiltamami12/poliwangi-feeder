<?php

namespace App\Models\Kepegawain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanStruktural extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "jabatan_struktural";
    protected $fillable = [
        "nama_jabatan",
    ];
}
