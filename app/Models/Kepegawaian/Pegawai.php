<?php

namespace App\Models\Kepegawaian;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "pegawai";
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
        'kode_dosen_sk034',
        'dosen_vedc',
        'nip_lama',
        'npwp',
        'nidn',
        'departemen',
        'praktisi',
        'nama_instansi',
        'alamat_instansi',
        'pendidikan_terakhir',
        'id_user',
        'staff',
        'id_pangkat',
        'nik'
    ];
    
    public function user() {
        return $this->hasOne(User::class, 'id');
    }

    public function unit() {
        return $this->hasMany(Unit::class, 'id_pegawai');
    }

    public function staf() {
        return $this->belongsTo(Staff::class, 'id');
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
    public function dataStruktural()
    {
        return $this->hasMany(DataStruktural::class, 'id_pegawai');
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

    public function report() {
        return $this->hasMany(Report::class, 'id_pegawai');
    }

    // absensi
    public function totalpresensi() {
        return $this->hasMany(AbsensiKaryawan::class, 'pegawai');
    }
    public function hadir() {
        return $this->hasMany(AbsensiKaryawan::class, 'pegawai')->where('tidakmasuk', 0)->where('libur', 0);
    }

    public function statuspegawai() {
        return $this->hasMany(PegawaiStatus::class, 'id_pegawai');
    }

    // wilayah
    public function kecamatan() {
        return $this->belongsTo(Kecamatan::class, 'id');
     }
     public function kota() {
        return $this->belongsTo(Kota::class, 'id');
     }
     public function provinsi() {
        return $this->belongsTo(Provinsi::class, 'id');
     }
}
