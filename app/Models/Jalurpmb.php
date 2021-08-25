<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jalurpmb extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "jalur_penerimaan";
    protected $fillable = [
        "id",
        "jalur_daftar",
        "biaya",
        "is_active",
        "tahun",
        "kuota"
    ];
}
