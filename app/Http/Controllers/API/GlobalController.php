<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\MatakuliahJenis;
use App\Models\Jurusan;
use App\Models\Dosen;
use App\Models\Status;
use App\Models\Agama;
use App\Models\Goldarah;
use App\Models\Kelas;
use App\Models\Matakuliah;
use App\Models\Prodi;
use App\Models\Jalurpmb;
use App\Models\Periode;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class GlobalController extends Controller
{
    protected $status = null;
    protected $error = null;
    protected $data = null;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
        try {
            $periode = Periode::select('tahun','semester')->where('status',1)->first();
            $jurusan = Jurusan::where('jurusan', '!=', '')->get();
            $agama = Agama::get();
            $goldarah = Goldarah::get();
            $jalur_pmb =  Jalurpmb::get();;
            $program = Program::get();
            $matkul_jenis = MatakuliahJenis::get();
            $status = Status::get();
            $dosen = Dosen::select(
                'pegawai.nomor',
                'pegawai.nip',
                'pegawai.nama',
                // 'pegawai.tgllahir',
                // 'pegawai.notelp',
                // 'pegawai.email',
                "staff.staff"
            )
            ->join("staff", "staff.nomor", "=", "pegawai.staff")
            ->where("pegawai.staff", "=", 4)
            ->get();
            $kelas = Kelas::select(
                'kelas.*',
                'pegawai.nama as wali_kelas',
                'pegawai.nomor as id_wali_kelas',
                'pegawai.nama as wali_kelas',
                'program_studi.program_studi as nama_prodi',
                'program.program as nama_program',
            )
            ->join('program_studi', 'program_studi.nomor', '=', 'kelas.program_studi')
            ->join('program', 'program.nomor', '=', 'program_studi.program')
            ->join('jurusan', 'jurusan.nomor', '=', 'program_studi.jurusan')
            ->join('pegawai', 'pegawai.nomor', '=', 'kelas.wali_kelas','left')
            ->get();
            $prodi = Prodi::select(
                "program_studi.*",
                "program.program as nama_program",
                "jurusan.jurusan as nama_jurusan",
                "program_studi.alias",
            )
            ->join("program", "program_studi.program", "=", "program.NOMOR")
            ->join("jurusan", "program_studi.jurusan", "=", "jurusan.NOMOR")
            ->get();
    
            $matakuliah = Matakuliah::select(
                'matakuliah.*',
                'kelas.kode as kode_kelas',
                'program_studi.program_studi as nama_program',
                'matakuliah_jenis.matakuliah_jenis as nama_mk_jenis',
            )
            ->join('kelas', 'kelas.nomor', '=', 'matakuliah.kelas')
            ->join('program_studi', 'program_studi.nomor', '=', 'matakuliah.program_studi')
            ->join('jurusan', 'jurusan.nomor', '=', 'program_studi.jurusan')
            ->join('matakuliah_jenis', 'matakuliah_jenis.nomor', '=', 'matakuliah.matakuliah_jenis')
            ->get();
    
            $this->data = [
                'periode'=>$periode,
                'program'=>$program,
                'jurusan'=>$jurusan,
                'dosen'=>$dosen,
                'jalur_pmb'=>$jalur_pmb,
                'kelas'=>$kelas,
                'mk_jenis'=>$matkul_jenis,
                'status'=>$status,
                'prodi'=>$prodi,
                'matakuliah'=>$matakuliah,
                'agama'=>$agama,
                'goldarah'=>$goldarah,
                'user'=>[]
            ];
    
            if ($id!=null) {
                $pegawai = DB::table('pegawai')->select('nomor','nama')->where('nomor',$id)->get();
                $this->data['user'] = $pegawai[0];
            }else{
    
            }
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

    public function pendaftar()
    {
        try {
            $jurusan    = Jurusan::where('jurusan', '!=', '')->get();
            $prodi      = Prodi::select(
                "program_studi.*",
                "program.program as nama_program",
                "jurusan.jurusan as nama_jurusan",
                "program_studi.alias",
            )
            ->join("program", "program_studi.program", "=", "program.NOMOR")
            ->join("jurusan", "program_studi.jurusan", "=", "jurusan.NOMOR")
            ->get();
    
            $this->data = [
                'jurusan'   => $jurusan,
                'prodi'     => $prodi
            ];
            $this->status   = "success";
        } catch (QueryException $e) {
            $this->status   = "failed";
            $this->error    = $e;
        }
        return response()->json([
            "status"        => $this->status,
            "data"          => $this->data,
            "error"         => $this->error
        ]);
    }

    public function get_provinsi()
    {
        $data = DB::table('tb_provinsi')->get();
        return response()->json([
            "status"        => 'success',
            "data"          => $data,
            "error"         => $this->error
        ]);
    }

    public function get_kabupaten($id_provinsi)
    {
        $data = DB::table('tb_kabupaten')->select('id_kabupaten', 'nama')->where('id_provinsi', $id_provinsi)->get();
        return response()->json([
            "status"        => 'success',
            "data"          => $data,
            "error"         => $this->error
        ]);
    }

    public function get_kecamatan($id_kabupaten)
    {
        $data = DB::table('tb_kecamatan')->select('id_kecamatan', 'nama')->where('id_kabupaten', $id_kabupaten)->get();
        return response()->json([
            "status"        => 'success',
            "data"          => $data,
            "error"         => $this->error
        ]);
    }

    public function get_kelurahan($id_kecamatan)
    {
        $data = DB::table('tb_kelurahan')->select('id_kelurahan', 'nama')->where('id_kecamatan', $id_kecamatan)->get();
        return response()->json([
            "status"        => 'success',
            "data"          => $data,
            "error"         => $this->error
        ]);
    }
}