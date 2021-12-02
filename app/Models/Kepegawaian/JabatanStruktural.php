<?php

namespace App\Models\Kepegawaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanStruktural extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "jabatan_struktural";
    protected $fillable = [
        "nama_jabatan",
    ];

    public function dataStruktural()
    {
        return $this->hasMany(DataStruktural::class, 'id_jabatan_struktural');
    }
}
