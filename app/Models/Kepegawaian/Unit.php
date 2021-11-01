<?php

namespace App\Models\Kepegawaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "units";
    protected $fillable = [
        'unit', 'kepala', 'id_pegawai'
    ];

    public function pegawai() {
        return $this->belongsToMany(Pegawai::class, 'id');
    }
}
