<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class RiwayatPembayaran extends Model
{
    use HasFactory;
    public $table = "v_riwayat_pembayaran";
    protected $fillable = [
        'id',
        'id_mahasiswa',
        'nama',
        'nrp',
        'nominal',
        'keterangan',
        'kategori',
        'created_at',
        'updated_at',
        'tabel'
    ];
}
