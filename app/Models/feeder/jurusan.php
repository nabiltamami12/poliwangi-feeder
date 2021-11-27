<?php

namespace App\Models\feeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'kode_jurusan',
        'nama_jurusan',
        'kode_fakultas', 
        'program',
        'kaprodi',
        'akreditasi',
        'sk_ban_pt',
        'tgl_akhir_sk',
        'nip_kaprodi',
        'id_prodi',
        'status_prodi',
        'model_perwalian',
        'created_at',
        'updated_at',
    ];
}
