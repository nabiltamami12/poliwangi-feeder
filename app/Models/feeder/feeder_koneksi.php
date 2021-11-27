<?php

namespace App\Models\feeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feeder_koneksi extends Model
{
    use HasFactory;
         protected $fillable = [
        'id',
        'username',
        'password',
        'url', 
        'port',
        'token',
        'kode_pt',
        'id_pt',
        'created_at',
        'updated_at',
    ];
}
