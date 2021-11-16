<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunciNilai extends Model
{
    use HasFactory;

    protected $table = "kunci_nilai";
    protected $fillable = ["semester", "tahun_ajaran", "status"];
    public $timestamps = false;
}
