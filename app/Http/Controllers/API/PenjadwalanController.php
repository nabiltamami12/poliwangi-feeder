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
                DB::raw("(select count(*) from kuliah where kuliah.kelas=kelas.nomor && kuliah.tahun='" . $periode->tahun . "' && kuliah.semester='" . $periode->semester . "') as jumlah_matkul")
            )
                ->join('program_studi', 'program_studi.nomor', '=', 'kelas.program_studi')
                ->join('program', 'program.nomor', '=', 'program_studi.program')
                ->join('jurusan', 'jurusan.nomor', '=', 'program_studi.jurusan')
                ->join('pegawai', 'pegawai.nomor', '=', 'kelas.wali_kelas', 'left')
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
                'kuliah.nomor',
                'kuliah.dosen',
                'kuliah.dosen2',
                'r.ruang',
                'r.keterangan',
                'h.hari',
                'j.jam',
                'm.matakuliah',
                'm.kode',
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

            $dosenValidator1 = Kuliah::where(['tahun' => $periode->tahun, 'semester' => $periode->semester, 'hari' => $req->hari, 'jam' => $req->jam, 'dosen' => $req->dosen])->first();
            $dosenValidator2 = Kuliah::where(['tahun' => $periode->tahun, 'semester' => $periode->semester, 'hari' => $req->hari, 'jam' => $req->jam, 'dosen2' => $req->dosen2])->first();
            $ruanganValidator = Kuliah::where(['tahun' => $periode->tahun, 'semester' => $periode->semester, 'hari' => $req->hari, 'jam' => $req->jam, 'ruang' => $req->ruang])->first();
            $matkulValidator = Kuliah::where(['tahun' => $periode->tahun, 'semester' => $periode->semester, 'hari' => $req->hari, 'jam' => $req->jam])->first();

            if ($matkulValidator != null) {
                $this->status = "failed";
                $this->error['message'] = "Jadwal pada hari dan jam tersebut sudah ada!";
            } else if ($dosenValidator1 != null) {
                $this->status = "failed";
                $this->error['message'] = "Dosen 1 pada hari dan jam tersebut sudah ada!";
            } else if ($dosenValidator2 != null && $req->dosen2 != null) {
                $this->status = "failed";
                $this->error['message'] = "Dosen 2 pada hari dan jam tersebut sudah ada!";
            } else if ($ruanganValidator != null) {
                $this->status = "failed";
                $this->error['message'] = "Ruangan pada hari dan jam tersebut sudah ada!";
            } else {

                $kuliah = Kuliah::create([
                    'nomor' => $jumlah->count(),
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
            }
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

    public function destroy($id)
    {
        try {
            $check = Kuliah::where('nomor', $id);

            if ($check) {
                $this->status = "success";
                $this->data = $check->get();
                $check->delete();
            } else {
                $this->status = "failed";
            }
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

    public function editMatakuliah(Request $req, $id)
    {
        try {
            $kuliah = Kuliah::where('nomor', $id)->first();
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

    public function updateMatakuliah(Request $req, $id, $kode)
    {
        try {
            $periode = Periode::where('status', '=', 1)->first();

            $kuliah = Kuliah::where('nomor', $kode)->update([
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
