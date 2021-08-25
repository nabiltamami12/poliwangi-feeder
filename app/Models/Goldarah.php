<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goldarah extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'goldarah';

    protected $fillable = [
        'nomor',
        'goldarah',
    ];
}