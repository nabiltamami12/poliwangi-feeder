<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    protected $status = null;
    protected $error = null;
    protected $data = null;

    public function index_admin(Request $request)
    {
        try {
            $tahun = DB::table('mahasiswa as m')
                        ->select(
                            'm.angkatan as title',
                            DB::raw('(select count(*) from mahasiswa where jenis_kelamin="L" and angkatan = m.angkatan) as jml_pria'),
                            DB::raw('(select count(*) from mahasiswa where jenis_kelamin="P" and angkatan = m.angkatan) as jml_wanita'),
                        )
                        ->groupBy('angkatan')->get();
            
            $mahasiswa = DB::table('mahasiswa')
                        ->select(
                            DB::raw('(select count(*) from mahasiswa where jenis_kelamin="L" and status = "A") as jml_pria'),
                            DB::raw('(select count(*) from mahasiswa where jenis_kelamin="P" and status = "A") as jml_wanita'),
                        )
                        ->first();
            $alumni = DB::table('mahasiswa')
                        ->select(
                            DB::raw('(select count(*) from mahasiswa where jenis_kelamin="L" and status = "L") as jml_pria'),
                            DB::raw('(select count(*) from mahasiswa where jenis_kelamin="P" and status = "L") as jml_wanita'),
                        )
                        ->first();
                        
            $dosen = DB::table('pegawai')
                        ->select(
                            DB::raw('(select count(*) from pegawai where jenis_kelamin="L" and staff = "4") as jml_pria'),
                            DB::raw('(select count(*) from pegawai where jenis_kelamin="P" and staff = "4") as jml_wanita'),
                        )
                        ->first();
            
            $pegawai = DB::table('pegawai')
                        ->select(
                            DB::raw('(select count(*) from pegawai where jenis_kelamin="L") as jml_pria'),
                            DB::raw('(select count(*) from pegawai where jenis_kelamin="P") as jml_wanita'),
                        )
                        ->first();
            $data = [
                'tahun' => $tahun,
                'mahasiswa' => $mahasiswa,
                'alumni' => $alumni,
                'dosen' => $dosen,
                'pegawai' => $pegawai,
            ];
            $this->data = $data;
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

    public function index_akademik(Request $request)
    {
        try {
            $tahun = DB::table('program_studi as ps')
                        ->select(
					        DB::raw('CONCAT(p.program," ",ps.program_studi) as title'),
                            DB::raw('(select count(*) from mahasiswa where jenis_kelamin="L" and program_studi = ps.nomor) as jml_pria'),
                            DB::raw('(select count(*) from mahasiswa where jenis_kelamin="P" and program_studi = ps.nomor) as jml_wanita'),
                        )
                        ->join('program as p','p.nomor','=','ps.program')
                        ->get();
            
            $mahasiswa = DB::table('mahasiswa')
                        ->select(
                            DB::raw('(select count(*) from mahasiswa where jenis_kelamin="L" and status = "A") as jml_pria'),
                            DB::raw('(select count(*) from mahasiswa where jenis_kelamin="P" and status = "A") as jml_wanita'),
                        )
                        ->first();
            $alumni = DB::table('mahasiswa')
                        ->select(
                            DB::raw('(select count(*) from mahasiswa where jenis_kelamin="L" and status = "L") as jml_pria'),
                            DB::raw('(select count(*) from mahasiswa where jenis_kelamin="P" and status = "L") as jml_wanita'),
                        )
                        ->first();
                        
            $dosen = DB::table('pegawai')
                        ->select(
                            DB::raw('(select count(*) from pegawai where jenis_kelamin="L" and staff = "4") as jml_pria'),
                            DB::raw('(select count(*) from pegawai where jenis_kelamin="P" and staff = "4") as jml_wanita'),
                        )
                        ->first();
            
            $pegawai = DB::table('pegawai')
                        ->select(
                            DB::raw('(select count(*) from pegawai where jenis_kelamin="L") as jml_pria'),
                            DB::raw('(select count(*) from pegawai where jenis_kelamin="P") as jml_wanita'),
                        )
                        ->first();
            $data = [
                'tahun' => $tahun,
                'mahasiswa' => $mahasiswa,
                'alumni' => $alumni,
                'dosen' => $dosen,
                'pegawai' => $pegawai,
            ];
            $this->data = $data;
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