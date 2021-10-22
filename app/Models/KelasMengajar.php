<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasMengajar extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "kelas_mengajar";

    public function rDosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen', 'nomor');
    }

    public function rKuliah()
    {
        return $this->belongsTo(Kuliah::class, 'kuliah', 'nomor');
    }
}
