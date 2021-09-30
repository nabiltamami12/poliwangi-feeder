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
        "biaya",
        "is_active",
        "tahun",
        "kuota",
        "tanggal_tes",
        "tanggal_awal",
        "tanggal_akhir",
        "syarat"
    ];


    public function getTanggalAwalAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_awal'])
            ->isoFormat('D MMMM Y');
    }
    public function getTanggalAkhirAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_akhir'])
            ->isoFormat('D MMMM Y');
    }
    public function setTanggalAwalAttribute($value)
    {
        $this->attributes['tanggal_awal'] = Carbon::parse($value)->format('Y-m-d');
    }
    public function setTanggalAkhirAttribute($value)
    {
        $this->attributes['tanggal_akhir'] = Carbon::parse($value)->format('Y-m-d');
    }
}
