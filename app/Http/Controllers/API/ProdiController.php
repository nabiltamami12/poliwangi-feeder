<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodi;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProdiResource;
use DB;

class ProdiController extends Controller
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
        $this->data = Prodi::select(
            "program_studi.*",
            "program.program as nama_program",
            "jurusan.jurusan as nama_jurusan",
            "departemen.departemen as nama_departemen",
        )

            ->join("program", "program_studi.program", "=", "program.NOMOR")
            ->join("jurusan", "program_studi.jurusan", "=", "jurusan.NOMOR")
            ->join("departemen", "program_studi.departemen", "=", "departemen.NOMOR")
            ->get();
       
        return response()->json([
            "status" => true,
            "data" => $this->data,
            "error" => ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            // 'departemen' => 'required',
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

        $prodi = Prodi::create($data);

        return response(
            [
                'status' => "success",
                'data' => new ProdiResource($prodi),
                'error' => ''
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $prodi = Prodi::select(

            "program_studi.*",
            "program.program as nama_program",
            "jurusan.jurusan as nama_jurusan",
            "departemen.departemen as nama_departemen",


        )

            ->join("program", "program_studi.program", "=", "program.NOMOR")
            ->join("jurusan", "program_studi.jurusan", "=", "jurusan.NOMOR")
            ->join("departemen", "program_studi.departemen", "=", "departemen.NOMOR")
            ->where('program_studi.NOMOR', $id)
            ->get();
            return response()->json([
                "status" => 'success',
                "data" => $prodi,
                "error" => ''
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $check = Prodi::where('NOMOR', $id);
        $data = $request->all();

        if(!$check){
            $this->status = "failed";
            $this->err = "Data not found";
        }
        else {
            $check->update($data);
            $this->data = $check->get();
            $this->status = "success";
        }

        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'error' => $this->err
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
        $check = Prodi::where('NOMOR', $id);

        if ($check) {
            $this->status = "success";
            $this->data = $check->get();
            $check->delete();
        } else {
            $this->status = "failed";
        }

        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'error' => $this->err
        ]);
    }
}
