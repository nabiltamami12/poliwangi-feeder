<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RangeNilai extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'nh';

    protected $fillable = [
        'na',
        'nh',
        'akumulasi',
        'na_atas'
    ];
}