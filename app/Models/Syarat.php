<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syarat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'syarat';

    protected $fillable = [
        'nama'
    ];
}
