<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KelasMengajar extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "kelas_mengajar";
    protected $fillable = [
        'tahun',
        'dosen',
        'kuliah',
        'pertemuan',
        'jam_mulai',
        'status',
        'status_kelas'
    ];

    public function rDosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen', 'nomor');
    }

    public function rKuliah()
    {
        return $this->belongsTo(Kuliah::class, 'kuliah', 'nomor');
    }

    public function absensi_dosen($arr)
    {
        // SELECT kelas_mengajar.dosen, p.nama, kelas_mengajar.tahun, k.semester, COUNT(kelas_mengajar.dosen) kehadiran, COUNT(DISTINCT k.matakuliah) jumlah_matakuliah
        // FROM `kelas_mengajar`
        // LEFT JOIN `kuliah` as `k` ON `kelas_mengajar`.`kuliah` = `k`.`nomor`
        // LEFT JOIN `pegawai` as `p` ON `kelas_mengajar`.`dosen` = `p`.`nomor` 
        // WHERE `kelas_mengajar`.`tahun` = '2021' AND `k`.`semester` = '1' AND (`kelas_mengajar`.`status` = "hadir" OR `kelas_mengajar`.`status` = "mengajar")
        // GROUP BY `kelas_mengajar`.`dosen`
        return $this->select(DB::raw('kelas_mengajar.dosen, p.nama, kelas_mengajar.tahun, k.semester, COUNT(kelas_mengajar.dosen) kehadiran, COUNT(DISTINCT k.matakuliah) jumlah_matakuliah'))
            ->leftJoin('kuliah as k', 'kelas_mengajar.kuliah', '=', 'k.nomor')
            ->leftJoin('pegawai as p', 'kelas_mengajar.dosen', '=', 'p.nomor')
            ->where('kelas_mengajar.tahun', '=', $arr['tahun'])
            ->where('k.semester', '=', $arr['semester'])
            ->whereNotNull('kelas_mengajar.dosen')
            ->where(function($query) {
                $query->orWhere('kelas_mengajar.status', '=', 'hadir')
                      ->orWhere('kelas_mengajar.status', '=', 'mengajar');
            })
            ->groupBy('kelas_mengajar.dosen')
            ->get();
    }

    public function absensi_pertemuan_dosen($arr)
    {
        return $this->select(DB::raw('kelas_mengajar.kuliah, kl.kode as kelas, m.matakuliah, GROUP_CONCAT(kelas_mengajar.pertemuan,"=",kelas_mengajar.id,"=",kelas_mengajar.status) detail'))
            ->leftJoin('kuliah as k', 'kelas_mengajar.kuliah', '=', 'k.nomor')
            ->leftJoin('matakuliah as m', 'k.matakuliah', '=', 'm.nomor')
            ->leftJoin('kelas as kl', 'k.kelas', '=', 'kl.nomor')
            ->where('kelas_mengajar.tahun', '=', $arr['tahun'])
            ->where('k.semester', '=', $arr['semester'])
            ->where('kelas_mengajar.dosen', '=', $arr['dosen'])
            ->groupBy('kelas_mengajar.kuliah')
            ->get();
    }
}
