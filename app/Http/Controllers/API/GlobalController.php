<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departemen;
use App\Models\Program;
use App\Models\MatakuliahJenis;
use App\Models\Jurusan;
use App\Models\Dosen;
use App\Models\Status;
use App\Models\Kelas;
use Illuminate\Support\Facades\Validator;

class GlobalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $status = null;
    protected $err = null;
    protected $data = null;
    
    public function index()
    {
        $departemen = Departemen::get();
        $jurusan = Jurusan::get();
        $program = Program::get();
        $matkul_jenis = MatakuliahJenis::get();
        $status = Status::get();
        $dosen = Dosen::select(
            'pegawai.nomor',
            'pegawai.nip',
            'pegawai.nama',
            'pegawai.tgllahir',
            'pegawai.notelp',
            'pegawai.email',
            "staff.staff"
        )
        ->join("staff", "staff.nomor", "=", "pegawai.staff")
        ->where("pegawai.staff", "=", 4)
        ->get();
        $kelas = Kelas::select(
            'kelas.*',
            'jurusan.jurusan as nama_jurusan',
            'program.program as nama_program',
            'pegawai.nomor as id_wali_kelas',
            'pegawai.nama as wali_kelas',
        )
        ->join('jurusan', 'jurusan.nomor', '=', 'kelas.jurusan')
        ->join('program', 'program.nomor', '=', 'kelas.program')
        ->join('pegawai', 'pegawai.nomor', '=', 'kelas.wali_kelas','left')
        ->get();
        
        $this->status = "success";

        $this->data = [
            'program'=>$program,
            'jurusan'=>$jurusan,
            'departemen'=>$departemen,
            'dosen'=>$dosen,
            'kelas'=>$kelas,
            'mk_jenis'=>$matkul_jenis,
            'status'=>$status,
        ];

       
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->err
        ]);
    }
}