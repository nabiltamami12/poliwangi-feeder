<?php

namespace App\Models\Kepegawaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "kecamatan";
    protected $fillable = [
        'id_kota',
        'nama'
    ];
    public function kota() {
        return $this->belongsTo(Kota::class, 'id');
    }

    public function pegawai() {
        return $this->hasOne(Pegawai::class, 'kecamatan');
    }
}
