<?php

namespace App\Models\Kepegawaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiShift extends Model
{
    use HasFactory;
    protected $table = "absensi_shift";
    protected $primaryKey = "nomor";
    protected $fillable = [
        'pegawai',
        'tanggal',
        'masuk',
        'pulang',
        'shift'
    ];

    public function pegawai() {
        return $this->belongsToMany(Pegawai::class, 'id');
    }
}
