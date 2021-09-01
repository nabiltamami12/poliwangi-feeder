<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jalursyarat;

class Jalurpmb extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "jalur_penerimaan";
    public function jalur_syarat()
    {
        return $this->hasMany(Jalursyarat::class, "id_jalur");
    }
    protected $fillable = [
        "id",
        "jalur_daftar",
        "biaya",
        "is_active",
        "tahun",
        "kuota",
        "tanggal_tes",
        "tanggal_awal",
        "tanggal_akhir",
        "syarat"
    ];
}
