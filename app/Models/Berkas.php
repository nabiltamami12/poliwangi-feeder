<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "berkas";
    protected $fillable = [
        'id',
        'id_syarat',
        'id_pendaftar',
        'file',
        'status'
    ];
}
