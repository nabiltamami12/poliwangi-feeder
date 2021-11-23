<?php

namespace App\Models\Kepegawaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "pegawai_report";
    protected $fillable = [
       'id_pegawai','keterangan'
    ];

    public function pegawai() {
        return $this->belongsTo(Pegawai::class, 'id');
    }
}
