<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DaftarMatkul;
use DB;

class DaftarMatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $validator = Validator::make($data, []);

        if ($validator->fails()) {
            return response(
                [
                    'status' => "failed",
                    'data' => ["message" => "data program sudah terdaftar"],
                    'error' => $validator->errors(),
                ]
            );
        }

        $matakuliah = DaftarMatkul::create($data);

        return response(
            [
                'status' => "success",
                'data' => $matakuliah,
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
        $data = DB::table("dosen_pengampu")
            ->select(
                "dosen_pengampu.nomor",
                "dosen_pengampu.dosen",
                "matakuliah.matakuliah",
                "program_studi.program_studi"

            )
            ->join("matakuliah", "matakuliah.nomor", "=", "dosen_pengampu.matakuliah")
            ->join("program_studi", "program_studi.nomor", "=", "matakuliah.program_studi")
            ->where("dosen_pengampu.nomor", $id)
            ->get();

        return response()->json([
            'status' => 'berhasil',
            'data' => $data,
            'error' => ''
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
        //
        $matakuliah = DaftarMatkul::where('nomor', $id);
        $data = $request->all();

        $validate = Validator::make($data, [
            'dosen' => 'required',
            'matakuliah' => 'required'
        ]);

        if ($validate->fails()) {
            $this->status = "error";
            $this->err = $validate->errors();
        } else if (!$matakuliah) {
            $this->status = "failed";
            $this->err = "Data not found";
        } else {
            $matakuliah->update($data);
            $this->data = $matakuliah->get();
            $this->status = "success";
        }

        return response()->json([
            'status' => $this->status,
            'data' => $data,
            'error' => ''
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
        $daftar = DaftarMatkul::where('nomor', $id);
        $daftar->delete();

        return response(
            [
                'status' => "success",
                'data' => ["message" => "data berhasil di hapus"],
                'erorr' => ''
            ]
        );
    }
}
