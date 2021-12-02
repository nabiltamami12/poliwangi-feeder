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
        'na_atas',
        'versi',
        'tanggal_awal',
        'tanggal_akhir'
    ];

    public static function last_version()
    {
        $max_version = RangeNilai::max('versi');
        return RangeNilai::orderBy('nh')->where('versi', $max_version)->get();
    }
}