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
        $data = DB::table("DOSEN_PENGAMPU")
            ->select(
                "DOSEN_PENGAMPU.NOMOR",
                "DOSEN_PENGAMPU.DOSEN",
                "MATAKULIAH.MATAKULIAH",
                "PROGRAM_STUDI.PROGRAM_STUDI"

            )
            ->join("MATAKULIAH", "MATAKULIAH.NOMOR", "=", "DOSEN_PENGAMPU.MATAKULIAH")
            ->join("PROGRAM_STUDI", "PROGRAM_STUDI.NOMOR", "=", "MATAKULIAH.PROGRAM_STUDI")
            ->where("DOSEN_PENGAMPU.DOSEN", $id)
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
        $matakuliah = DaftarMatkul::where('DOSEN', $id);
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
