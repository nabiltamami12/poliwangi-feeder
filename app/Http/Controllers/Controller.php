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

    public function migration_data_mahasiswa()
    {
        // cari "kelas" yang tidak ada pada "program_studi", kemudian cari di "kelas_old" untuk mengisi "kelas"
        // mengambil kode "kelas" yang tidak ada di "program_studi" kemudian mencocokan dengan "kelas_old"
        $cek_program_studi_null = DB::select(DB::raw('
            SELECT * FROM kelas_old ko 
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

        return $jurusan_old;
        return $cek_program_studi_null;

        /**
        $data = DB::table('mahasiswa as x')
            ->selectRaw('x.nomor, x.nrp, x.nama, x.program_studi, x.kelas, x.kelas_lama')
            ->leftJoin('kelas_old as ko', 'x.kelas', '=', 'ko.nomor')
            ->where(function($query) {
                $query->whereNull('x.program_studi')
                      ->orWhere('x.program_studi', '=', 0);
            })
            ->whereNotNull('ko.nomor')
            ->get();

        foreach ($data as $k => $v) {
            DB::beginTransaction();
            try {

                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
            } catch (\Throwable $e) {
                DB::rollback();
            }
        }
        */
    }
}
