<?php

namespace App\Models\Kepegawain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "pegawais";
    protected $fillable = [
        'nip',
        'noid',
        'nama',
        'jurusan',
        'jenis_kelamin',
        'agama',
        'no_tlp',
        'tmp_lahir',
        'tgl_lahir',
        'shift',
        'gol_darah',
        'gelar_dpn',
        'gelar_blk',
        'status_kawin',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'askes',
        'kode_dosen',
        'nip_lama',
        'npwp',
        'nidn',
        'departemen',
        'praktisi',
        'nama_instansi',
        'alamat_instansi',
        'pendidikan_terakhir',
        'id_user',
        'id_jabatan',
        'id_pangkat',
        'kecamatan',
        'kota',
        'provinsi',
    ];
    
    public function user() {
        return $this->hasOne(User::class, 'id');
    }

    public function unit() {
        return $this->hasMany(Unit::class, 'id_pegawai');
    }

    public function staf() {
        return $this->hasMany(Staf::class, 'id_pegawai');
    }
    public function data_pns() {
        return $this->hasMany(Datapns::class, 'id_pegawai');
    }
    public function tidakMasukKerja() {
        return $this->hasMany(Pegawai_tidak_masuk_kerja::class, 'id_pegawai');
    }
    public function riwayatPekerjaan() {
        return $this->hasMany(Pegawai_riwayat_pekerjaan::class, 'id_pegawai');
    }
    public function dataStruktural() {
        return $this->hasMany(Data_struktural::class, 'id_pegawai');
    }
    public function pegawaiStatus() {
        return $this->hasMany(Pegawai_status::class, 'id_pegawai');
    }
    public function pegawaiPelatihan() {
        return $this->hasMany(Pegawai_pelatihan::class, 'id_pegawai');
    }
    public function pegawaiPendidikan() {
        return $this->hasMany(Pegawai_pendidikan::class, 'id_pegawai');
    }
    public function keluargaPegawai() {
        return $this->hasMany(Keluarga_pegawai::class, 'id_pegawai');
    }
    public function suamiIstri() {
        return $this->hasMany(Pegawai_suami_istri::class, 'id_pegawai');
    }
    public function ttdCuti() {
        return $this->hasMany(Pegawai_ttd_cuti::class, 'id_pegawai');
    }


    // wilayah
    public function kecamatan() {
        return $this->belongsTo(Kecamatan::class);
     }
     public function kota() {
        return $this->belongsTo(Kota::class);
     }
     public function provinsi() {
        return $this->belongsTo(Provinsi::class);
     }
}
