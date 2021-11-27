<?php

namespace App\Models\feeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahaasiswa extends Model
{
    use HasFactory;
      protected $fillable = [
            'a_terima_kps',
            'no_kps',
            'stat_pd',
            'nik_ayah',
            'nama_ayah',
            'tgl_lahir_ayah',
            'id_jenjang_pendidikan_ayah',
            'id_kebutuhan_khusus_ayah',
            'id_kebutuhan_khusus_ibu',
            'id_pekerjaan_ayah',
            'id_penghasilan_ayah',
            'nik_ibu',
            'nama_ibu',
            'tgl_lahir_ibu',
            'id_jenjang_pendidikan_ibu',
            'id_pekerjaan_ibu',
            'id_penghasilan_ibu',
            'nik_wali',
            'nama_wali',
            'tgl_lahir_wali',
            'id_jenjang_pendidikan_wali',
            'id_pekerjaan_wali',
            'id_penghasilan_wali',
            'kewarganegaraan',
            'kode_jurusan',
            'id_jenis_daftar',
            'nim',
            'tgl_masuk_sp',
            'mulai_smt',
            'id_pembayaran',
            'id_jalur_masuk',
            'status_error',
            'keteangan',
            'password',
            'biaya_masuk_kuliah',
            'id_reg_mahasiswa',
            'foto_mahasiswa',
            'status_mahasiswa',
            'kode_paket',
        ];
}
