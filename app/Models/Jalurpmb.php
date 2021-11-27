<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jalursyarat;
use Illuminate\Support\Carbon;

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
        "jml_seleksi",
        "is_active",
        "tahun",
        "kuota",
        "tanggal_buka",
        "tanggal_tutup",
        "jam_buka",
        "jam_tutup",
        "syarat"
    ];

}
