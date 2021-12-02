<?php

namespace App\Models\Kepegawaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiStatus extends Model
{
    use HasFactory;
    protected $table = "pegawai_status";
    protected $fillable = [
        "id_pegawai",
        "status",
        "status_karyawan"
    ];

    public function pegawai() {
        return $this->belongsTo(Pegawai::class, 'id');
    }
}
