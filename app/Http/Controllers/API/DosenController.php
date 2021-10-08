<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use DB;

class DosenController extends Controller
{
    protected $status = null;
    protected $error = null;
    protected $data = null;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter($id,$semester)
    {
        try {
            $prodi = DB::table('program_studi as ps')
                            ->select('ps.nomor','ps.program_studi','p.program as nama_program')
                            ->join('program as p','p.nomor','=','ps.program')
                            ->join('matakuliah as m','m.program_studi','=','ps.nomor')
                            ->join('dosen_pengampu as dp','dp.matakuliah','=','m.nomor')
                            ->where(function ($query) use ($id) {
                                if ($id !== 'null') $query->where('dp.dosen',$id);
                            })
                            ->groupBy('ps.nomor')
                            ->get();
            $kelas = DB::table('kelas as k')
                            ->select( 'm.nomor as matakuliah','k.nomor' , 'k.kelas', 'k.pararel' , 'k.kode', 'm.program_studi')
                            ->join('matakuliah as m','m.kelas','=','k.nomor')
                            ->join('dosen_pengampu as dp','dp.matakuliah','=','m.nomor')
                            ->where(function ($query) use ($id) {
                                if ($id !== 'null') $query->where('dp.dosen',$id);
                            })
                            ->get();
            $matkul = DB::table('matakuliah as m')
                            ->select('m.nomor','m.matakuliah','m.semester','m.program_studi')
                            ->join('program_studi as ps','m.program_studi','=','ps.nomor')
                            ->join('dosen_pengampu as dp','dp.matakuliah','=','m.nomor')
                            ->where('m.semester',$semester)
                            ->where(function ($query) use ($id) {
                                if ($id !== 'null') $query->where('dp.dosen',$id);
                            })
                            ->get();
            $this->status = "success";
            $this->data = [
                'prodi'=>$prodi,
                'kelas'=>$kelas,
                'matakuliah'=>$matkul,
            ];
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