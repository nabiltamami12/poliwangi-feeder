<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurusanAsal extends Model
{
    use HasFactory;
    protected $table = 'jurusan_asal';

    protected $fillable = [
        'id',
        'jenjang',
        'jurusan',
    ];
}