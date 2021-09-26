<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeuanganPembayaran extends Model
{
    use HasFactory;
    public $table = "keuangan_pembayaran";

    protected $fillable = [
        'id_mahasiswa',
        'id_piutang',
        'bulan',
        'nominal',
        'status',
        'keterangan',
        'nomor_va'
    ];
}
