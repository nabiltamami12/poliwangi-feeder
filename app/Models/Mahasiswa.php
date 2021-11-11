<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nomor';

    protected $fillable = [
        'nama',
        'status',
        'program_studi',
        'kelas',
        'dosen_wali',
        'nrp',
        'nik',
        'nisn',
        'tmplahir',
        'tgllahir',
        'tglmasuk',
        'mahasiswa_jalur_penerimaan',
        'jalur_daftar',
        'anak_ke',
        'jenis_kelamin',
        'warga',
        'agama',
        'darah',
        'tahun_lulus',
        'notelp',
        'prestasi_olahraga',
        'beasiswa',
        'alamat',
        'jalan',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kabupaten_kota',
        'propinsi',
        'kode_pos',
        'ayah',
        'kerja_ayah',
        'penghasilan_ayah',
        'tempat_lahir_ayah',
        'tanggal_lahir_ayah',
        'pendidikan_ayah',
        'ibu',
        'kerja_ibu',
        'penghasilan_ibu',
        'tempat_lahir_ibu',
        'tanggal_lahir_ibu',
        'pendidikan_ibu',
        'angkatan',
        'semester_masuk',
        'notelp_ortu',
        'alamat_ortu',
        'jalan_ortu',
        'rt_ortu',
        'rw_ortu',
        'kecamatan_ortu',
        'kelurahan_ortu',
        'kabupaten_kota_ortu',
        'kode_pos_ortu',
        'sekolah',
        'smu',
        'nun',
        'tgllulus',
        'tahun_lulus',
        'lulussmu',
        'nomor',
        'id_pendaftar',
        'jumlah_anak'
    ];

    public function rProdi()
    {
        return $this->belongsTo(Prodi::class, 'program_studi', 'nomor');
    }
}