<?php

namespace App\Models\Kepegawaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $primaryKey = "id_kecamatan";
    protected $table = "tb_kecamatan";
    protected $fillable = [
        'id_kabupaten',
        'nama'
    ];
    public function kota() {
        return $this->belongsTo(Kota::class, 'id_kabupaten');
    }

    public function pegawai() {
        return $this->hasOne(Pegawai::class, 'kecamatan');
    }
}
