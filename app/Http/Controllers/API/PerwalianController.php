<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Periode;
use App\Models\Perwalian;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerwalianController extends Controller
{
    protected $status = null;
    protected $error = null;
    protected $data = null;

    public function dosenPerwalian()
    {
        try {
            // Mode development, masih ada beberapa yang masih statis
            $periode = Periode::where('status', '=', 1)->first();
            $perwalian = Perwalian::select(
                'perwalian.*',
                'mahasiswa.nomor as nim',
                'mahasiswa.nama',
                'mahasiswa.angkatan',
                'kelas.kode',
                'program_studi.program_studi as nama_program',
            )
                ->join('mahasiswa', 'mahasiswa.nomor', '=', 'perwalian.mahasiswa_id')
                ->join('kelas', 'kelas.nomor', '=', 'mahasiswa.kelas')
                ->join('program_studi', 'program_studi.nomor', '=', 'mahasiswa.program_studi')
                ->where('perwalian.periode_id', $periode->nomor)
                ->where('perwalian.semester', $periode->semester)
                ->where('perwalian.dosen_id', '166')
                ->get();
            $this->data = $perwalian;
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

    public function change_status($id)
    {
        try {
            $perwalian = Perwalian::where('id', $id)->update(['status' => 1]);

            $this->data = [];
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

    public function adminPerwalian()
    {
        try {
            // Mode development, masih ada beberapa yang masih statis
            $periode = Periode::where('status', '=', 1)->first();
            $perwalianAdmin = Perwalian::select(
                'perwalian.*',
                'pegawai.nama',
                'pegawai.nip',
                'pegawai.gelar_dpn',
                'pegawai.gelar_blk',
                DB::raw('
                    COUNT(perwalian.mahasiswa_id) as jml_mahasiswa,
                    COUNT(CASE WHEN perwalian.status = 1 THEN 1 END) as sudah_acc,
                    COUNT(CASE WHEN perwalian.status = 0 THEN 1 END) as belum_acc
                '),

            )
                ->join('pegawai', 'pegawai.nomor', '=', 'perwalian.dosen_id')
                ->where('perwalian.periode_id', $periode->nomor)
                ->where('perwalian.semester', $periode->semester)
                ->groupBy('perwalian.dosen_id')
                ->get();
            $this->data = $perwalianAdmin;
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
