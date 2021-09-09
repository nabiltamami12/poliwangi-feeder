<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Matakuliah;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use DB;
class kelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $status = null;
    protected $error = null;
    protected $data = null;
    
    public function index(Request $req)
    {   
        try {
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

    public function dosen($id_kelas)
    {
        try {
            // DB::enableQueryLog();
            $kelas = Kelas::select(
                'kelas.*',
                'program_studi.program_studi as nama_prodi',
                'program.program as nama_program')
                ->join('program_studi','program_studi.nomor','=','kelas.program_studi')
                ->join('program','program.nomor','=','program_studi.program')
                ->where('kelas.nomor',$id_kelas)
                ->get();

            $data_matkul = Matakuliah::select(
                    'matakuliah.nomor as id_matkul',
                    'matakuliah.matakuliah as matkul',
                    'dosen_pengampu.*'
                )
                ->join('dosen_pengampu','dosen_pengampu.matakuliah','=','matakuliah.nomor','left')
                ->where('matakuliah.kelas',$id_kelas)
                ->where('matakuliah.semester',1)
                ->where('matakuliah.program_studi',$kelas[0]['program_studi'])
                ->get();

            $this->data = [
                'program_studi' => $kelas[0]['nama_program']." ".$kelas[0]['nama_prodi'],
                'kelas' => $kelas[0]['kelas'].$kelas[0]['pararel'],
                'matkul' => $data_matkul
            ];
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validated = Validator::make($data, [
            // 'nomor' => 'required|integer|unique:KULIAH',
            // 'tahun' => 'required|integer',
            // 'semester' => 'required|integer',
            // 'kelas' => 'required|integer',
            // 'matakuliah' => 'required|integer',
            // 'ruang' => 'required|integer',
        ]);

        if ($validated->fails()) {
            $this->status = 'failed';
            $this->data = "Tidak ada data";
            $this->error = $validated->errors();
        } else {
            try {
                $data = Kelas::create($data);
                $this->data = $data;
                $this->status = "success";
            } catch (QueryException $e) {
                $this->status = "failed";
                $this->error = $e;
            }
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $check = Kelas::where('NOMOR', $id);
        $data = $request->all();

        $validate = Validator::make($data, [
            // 'matakuliah' => 'required|integer',
        ]);

        if ($validate->fails()) {
            $this->status = "error";
            $this->error = $validate->errors();
        } else if (!$check) {
            $this->status = "failed";
            $this->error = "Data not found";
        } else {
            try {
                $check->update($data);
                $this->data = $check->get();
                $this->status = "success";
            } catch (QueryException $e) {
                $this->status = "failed";
                $this->error = $e;
            }
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $check = Kelas::where('NOMOR', $id);
    
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
}