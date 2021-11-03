<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;

class Controller extends BaseController
{
    public $tahun_aktif;
    public $semester_aktif;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $data = DB::table('periode')->select('tahun','semester')->where('status',1)->first();
        $this->tahun_aktif = $data->tahun;
        $this->semester_aktif = $data->semester;
    }

    public function migration_data_mahasiswa($aksi=null)
    {
        switch ($aksi) {
            case '_sync':
                // step 1
                return $this->sync_kelas_dan_prodi();
                break;
            case '_prodi_mhs':
                // step 2
                return $this->add_prodi_mahasiswa();
                break;
            case '_all':
                $step_1 = $this->sync_kelas_dan_prodi(); // step 1
                echo $step_1.'<br>';
                $step_2 = $this->add_prodi_mahasiswa(); // step 2
                echo $step_2.'<br>';
                return "(migrasi data mahasiswa : proses selesai).";
                break;
            default:
                break;
        }
    }

    // step 1
    private function sync_kelas_dan_prodi()
    {
        // cari "kelas" yang tidak ada pada "program_studi", kemudian cari di "kelas_old" untuk mengisi "kelas"
        // mengambil kode "kelas" yang tidak ada di "program_studi" kemudian mencocokan dengan "kelas_old"
        $cek_program_studi_null = DB::select(DB::raw('
            SELECT ko.jurusan, ko.program, jo.jurusan as nama_jurusan, ko.kode FROM kelas_old ko 
            LEFT JOIN jurusan_old jo ON ko.jurusan = jo.nomor 
            WHERE ko.kode IN (
                SELECT k.kode FROM kelas k 
                LEFT JOIN program_studi ps  on k.program_studi = ps.nomor 
                WHERE ps.nomor is NULL 
            )
        '));

        $jurusan_aksi = [];
        $jurusan_arr = [];
        foreach ($cek_program_studi_null as $k => $v) {
            if(!in_array($v->jurusan, $jurusan_arr)) {
                $jurusan_aksi[$v->jurusan] = "insert";
                $jurusan_arr[] = $v->jurusan;
            }
        }

        // insert jursan dari "jurusan_old" ke "jurusan"
        if ($jurusan_arr) {
            $jurusan_cek = DB::table('jurusan')->whereIn('nomor', $jurusan_arr)->get();
            foreach ($jurusan_cek as $k => $v) {
                // jika field jurusan tidak ada isinya tapi exist
                if ($v->jurusan != '') {
                    unset($jurusan_aksi[$v->nomor]);
                    $idx = array_search($v->nomor, $jurusan_arr);
                    unset($jurusan_arr[$idx]);
                } elseif ($v->jurusan == '') {
                    $jurusan_aksi[$v->nomor] = 'update';
                }
            }

            $jurusan_old = DB::table('jurusan_old')
                ->selectRaw('nomor, jurusan, kajur as kepala, jurusan_inggris')
                ->whereIn('nomor', $jurusan_arr)
                ->get();
            foreach ($jurusan_old as $k => $v) {
                if($jurusan_aksi[$v->nomor] === 'insert') {
                    DB::table('jurusan')->insert([
                        "nomor" => $v->nomor,
                        "jurusan" => $v->jurusan,
                        "kepala" => $v->kepala,
                        "jurusan_inggris" => $v->jurusan_inggris
                    ]);
                } elseif($jurusan_aksi[$v->nomor] === 'update') {
                    DB::table('jurusan')->where('nomor', $v->nomor)->update([
                        "jurusan" => $v->jurusan,
                        "kepala" => $v->kepala,
                        "jurusan_inggris" => $v->jurusan_inggris
                    ]);
                }
            }
        }

        if ($cek_program_studi_null) {
            // update atau create ke tabel "program_studi"
            foreach ($cek_program_studi_null as $k => $v) {
                \App\Models\Prodi::updateOrCreate(
                    ['jurusan' => $v->jurusan, 'program' => $v->program, 'program_studi' => $v->nama_jurusan],
                    ['jurusan' => $v->jurusan, 'program' => $v->program, 'program_studi' => $v->nama_jurusan]
                );
            }

            // update field program_sutdi di tabel "kelas"
            foreach ($cek_program_studi_null as $k => $v) {
                $nomor_prodi = \App\Models\Prodi::select('nomor')->where([
                    ['program', '=', $v->program],
                    ['jurusan', '=', $v->jurusan],
                    ['program_studi', '=', $v->nama_jurusan]
                ])->first();
                if(!$nomor_prodi) continue;
                \App\Models\Kelas::where('kode', '=', $v->kode)->update(['program_studi' => $nomor_prodi->nomor]);
            }
        }
        return "(Sinkron data kelas dan program_studi : proses selesai).";
    }

    // step 2
    private function add_prodi_mahasiswa()
    {
        $obj = DB::select(DB::raw('
            SELECT m.nomor, m.nrp, m.nama, m.kelas, m.kelas_lama, m.program_studi, ko.kode ko_kode, k.kode k_kode, k.program_studi program_studi_kelas
            FROM mahasiswa m
            LEFT JOIN kelas_old ko ON m.kelas = ko.nomor
            LEFT JOIN kelas k ON ko.kode = k.kode 
            WHERE m.program_studi = 0 OR m.program_studi IS NULL
        '));

        // yang di update pada tabel "mahasiswa" hanya field program_studi saja
        foreach ($obj as $k => $v) {
            DB::beginTransaction();

            DB::table('mahasiswa')->where('nomor', '=', $v->nomor)->update([
                "program_studi" => $v->program_studi_kelas
            ]);

            DB::table('tmp_backup_migration_mahasiswa')->insert([
                "nomor" => $v->nomor,
                "nrp" => $v->nrp,
                "nama" => $v->nama,
                "kelas" => $v->kelas,
                "kelas_lama" => $v->kelas_lama,
                "program_studi" => $v->program_studi
            ]);

            DB::commit();
        }
        return "(add program_studi mahasiswa : proses selesai).";
    }
}
