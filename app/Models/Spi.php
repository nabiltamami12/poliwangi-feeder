<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Spi extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "spi";

    protected $fillable = [
        'tahun',
        'id_mahasiswa',
        'tarif',
        'pembayaran',
        'tanggal_pembayaran',
        'piutang'
    ];
}
