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
                            ->join('kelas as k','k.program_studi','=','ps.nomor')
                            ->join('kuliah as kl','kl.kelas','=','k.nomor')
                            ->where(function($query) use ($id)
                            {
                                $query->where('kl.dosen','=',$id)
                                    ->orWhere('kl.dosen2','=',$id)
                                    ->orWhere('kl.dosen3','=',$id)
                                    ->orWhere('kl.dosen4','=',$id)
                                    ->orWhere('kl.dosen5','=',$id);
                            })
                            // ->join('matakuliah as m','m.program_studi','=','ps.nomor')
                            // ->join('dosen_pengampu as dp','dp.matakuliah','=','m.nomor')
                            // ->where('dp.dosen',$id)
                            ->where('kl.tahun',$this->tahun_aktif)
                            ->groupBy('ps.nomor')
                            ->get();
            $kelas = DB::table('kelas as k')
                            ->select( 'k.nomor' , 'k.kelas', 'k.pararel' , 'k.kode', 'k.program_studi')
                            // ->select( 'm.nomor as matakuliah','k.nomor' , 'k.kelas', 'k.pararel' , 'k.kode', 'm.program_studi')
                            // ->join('matakuliah as m','m.kelas','=','k.nomor')
                            ->join('kuliah as kl','kl.kelas','=','k.nomor')
                            ->where(function($query) use ($id)
                            {
                                $query->where('kl.dosen','=',$id)
                                ->orWhere('kl.dosen2','=',$id)
                                ->orWhere('kl.dosen3','=',$id)
                                ->orWhere('kl.dosen4','=',$id)
                                ->orWhere('kl.dosen5','=',$id);
                            })
                            ->where('kl.tahun',$this->tahun_aktif)
                            ->groupBy('k.nomor')
                            ->get();
            $matkul = DB::table('matakuliah as m')
                            ->select('m.nomor','m.matakuliah','m.semester','m.program_studi','kl.kelas')
                            // ->join('program_studi as ps','m.program_studi','=','ps.nomor')
                            // ->join('dosen_pengampu as dp','dp.matakuliah','=','m.nomor')
                            // ->where('dp.dosen',$id)
                            ->join('kuliah as kl','kl.matakuliah','=','m.nomor')
                            ->join('kelas as k','kl.kelas','=','k.nomor')
                            ->where('kl.semester',$semester)
                            ->where('kl.tahun',$this->tahun_aktif)
                            ->where(function($query) use ($id)
                            {
                                $query->where('kl.dosen','=',$id)
                                ->orWhere('kl.dosen2','=',$id)
                                ->orWhere('kl.dosen3','=',$id)
                                ->orWhere('kl.dosen4','=',$id)
                                ->orWhere('kl.dosen5','=',$id);
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