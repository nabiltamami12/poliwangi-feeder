<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Periode;
use App\Models\Kuliah;
use DB;

class PenjadwalanController extends Controller
{
    protected $status = null;
    protected $error = null;
    protected $data = null;

    public function index(Request $req)
    {
        try {
            $periode = Periode::where('status', '=', 1)->first();

            $kelas = Kelas::select(
                'kelas.*',
                'program_studi.program_studi as nama_prodi',
                DB::raw("(select count(*) from kuliah where kuliah.kelas=kelas.nomor && kuliah.tahun='". $periode->tahun ."' && kuliah.semester='". $periode->semester ."') as jumlah_matkul")
            )
            ->join('program_studi', 'program_studi.nomor', '=', 'kelas.program_studi')
            ->join('program', 'program.nomor', '=', 'program_studi.program')
            ->join('jurusan', 'jurusan.nomor', '=', 'program_studi.jurusan')
            ->join('pegawai', 'pegawai.nomor', '=', 'kelas.wali_kelas','left')
            ->orderBy('program_studi.program_studi', 'asc')
            ->orderBy('kelas.kelas', 'asc')
            ->orderBy('kelas.pararel', 'asc')
            ->get();
            $this->data = $kelas;
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error
        ]);
    }

    public function matakuliah(Request $req, $id)
    {
        try {
            $periode = Periode::where('status', '=', 1)->first();

            $kuliah = Kuliah::select(
                'kuliah.dosen',
                'kuliah.dosen2',
                'r.ruang',
                'r.keterangan',
                'h.hari',
                'j.jam',
                'm.matakuliah'
            )
            ->join('matakuliah as m', 'm.nomor', '=', 'kuliah.matakuliah')
            ->join('hari as h', 'h.nomor', '=', 'kuliah.hari')
            ->join('jam as j', 'j.nomor', '=', 'kuliah.jam')
            ->join('ruang as r', 'r.nomor', '=', 'kuliah.ruang')
            ->where([
                'kuliah.tahun' => $periode->tahun,
                'kuliah.semester' => $periode->semester,
                'kuliah.kelas' => $id
            ])
            ->get();

            $this->data = $kuliah;
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error
        ]);
    }

    public function tambahMatakuliah(Request $req, $id)
    {
        try {
            $periode = Periode::where('status', '=', 1)->first();
            $jumlah = Kuliah::all();

            $kuliah = Kuliah::create([
                'nomor' => $jumlah->count() + 1,
                'tahun' => $periode->tahun,
                'semester' => $periode->semester,
                'kelas' => $req->kelas,
                'matakuliah' => $req->matakuliah,
                'hari' => $req->hari,
                'jam' => $req->jam,
                'ruang' => $req->ruang,
                'dosen' => $req->dosen,
                'dosen2' => $req->dosen2
            ]);

            $this->data = $kuliah;
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error
        ]);
    }
}
