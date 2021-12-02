<?php

namespace App\Models\Kepegawaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $primaryKey = "id_kabupaten";
    protected $table = "tb_kabupaten";
    protected $fillable = [
        'nama',
        'id_provinsi'
    ];
    public function kecamatan() {
        return $this->hasMany(Kecamatan::class, 'id_kabupaten');
    }
    public function provinsi() {
        return $this->belongsTo(Provinsi::class, 'id_provinsi');
    }
    public function pegawai() {
        return $this->hasOne(Pegawai::class, 'kota');
    }
}
