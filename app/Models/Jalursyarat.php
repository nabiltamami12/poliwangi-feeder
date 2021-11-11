<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jalurpmb;

class Jalursyarat extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "jalur_syarat";
    public function details()
    {
        return $this->hasMany(Jalurpmb::class, "id_jalur");
    }
    protected $fillable = [
        "id",
        "id_jalur",
        "id_syarat"
    ];

    public function rSyarat()
    {
        return $this->belongsTo(Syarat::class, 'id_syarat');
    }
}
