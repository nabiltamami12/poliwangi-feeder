<?php

namespace App\Models\Kepegawain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "pangkat";
    protected $fillable = [
        'nama_pangkat',
        'golongan',
        'urut'
    ];
}
