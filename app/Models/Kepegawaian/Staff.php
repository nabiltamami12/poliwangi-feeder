<?php

namespace App\Models\Kepegawaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "stafs";
    protected $fillable = [
        // 'id_pegawai',
        'staf'
    ];

    public function pegawai() {
        return $this->hasOne(Pegawai::class, 'staff');
    }
}
