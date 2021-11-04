<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodi;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProdiResource;
use Illuminate\Database\QueryException;
use DB;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $status = null;
    protected $error = null;
    protected $data = null;

    public function index()
    {
        try {
            $prodi = Prodi::select(
                "program_studi.*",
                "program.program as nama_program",
                "jurusan.jurusan as nama_jurusan",
                "pegawai.nama as kaprodi",
                "pegawai.gelar_blk as gelar",
            )
            ->join("pegawai", "program_studi.kepala", "=", "pegawai.nomor",'LEFT')
            ->join("program", "program_studi.program", "=", "program.nomor")
            ->join("jurusan", "program_studi.jurusan", "=", "jurusan.nomor")
            ->get();
            $this->data = $prodi;
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
    
    public function index_lama()
    {
        try {
            $program = DB::table('program_old')->get();
            $jurusan = DB::table('jurusan_old')->get();
            $kelas = DB::table('kelas_old')->get();
            $this->data = ['program'=>$program,'jurusan'=>$jurusan,'kelas'=>$kelas];
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
        //
        $data = $request->all();

        $validator = Validator::make($data, [
            // 'nomor' => 'required',
            // 'program' => 'required|unique:prodis',
            // 'jurusan' => 'required',
            // 'kepala' => 'required',
            // 'kode_epsbed' => 'required',
            // 'gelar' => 'required',
            // 'gelar_inggr' => 'required'
        ]);

        if ($validator->fails()) {
            return response(
                [
                    'status' => "failed",
                    'data' => ["message" => "data program sudah terdaftar"],
                    'error' => $validator->errors(),
                ]
            );
        }

        try {
            $prodi = Prodi::create($data);
            $this->data = $prodi;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $prodi = Prodi::select(
                "program_studi.*",
                "program.program as nama_program",
                "jurusan.jurusan as nama_jurusan",
            )
            ->join("program", "program_studi.program", "=", "program.nomor")
            ->join("jurusan", "program_studi.jurusan", "=", "jurusan.nomor")
            ->where('program_studi.nomor', $id)
            ->get();
            $this->data = $prodi;
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
        $check = Prodi::where('nomor', $id);
        $data = $request->all();

        if(!$check){
            $this->status = "failed";
            $this->error = "Data not found";
        }
        else {
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
            $check = Prodi::where('nomor', $id);
    
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
