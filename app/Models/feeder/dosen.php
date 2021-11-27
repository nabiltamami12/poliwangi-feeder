<?php

namespace App\Models\feeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    use HasFactory;
     protected $fillable = [
            'nip',
            'nidn',
            'nama_dosen',
            'kelamin',
            'agama',
            'tmpt_lahir',
            'tgl_lahir',
            'id_status_dosen',
            'email',
            'telp',
            'alamat',
            'foto_dosen',
            'id_dosen_feeder',
        ];
}
