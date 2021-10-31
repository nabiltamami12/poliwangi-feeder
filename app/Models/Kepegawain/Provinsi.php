<?php

namespace App\Models\Kepegawain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "provinsi";
    protected $fillable = [
        'nama'
    ];
    public function kota() {
        return $this->hasMany(Kota::class, 'id_provinsi');
    }
    public function pegawai() {
        return $this->hasOne(Pegawai::class);
    }
}
