<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matakuliah = Matakuliah::select(
                            'matakuliah.*',
                            'kelas.kode as kode_kelas',
                            'jurusan.jurusan as nama_jurusan',
                            'program.program as nama_program',
                            'matakuliah_jenis.matakuliah_jenis as nama_mk_jenis',
                        )
                        ->join('kelas', 'kelas.nomor', '=', 'matakuliah.kelas')
                        ->join('jurusan', 'jurusan.nomor', '=', 'matakuliah.jurusan')
                        ->join('program', 'program.nomor', '=', 'matakuliah.program')
                        ->join('matakuliah_jenis', 'matakuliah_jenis.nomor', '=', 'matakuliah.matakuliah_jenis')
                        ->get();
        return response()->json([
            "status" => 'success ',
            "data" => $matakuliah,
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
            // 'nomor' => 'required|unique:MATAKULIAH',
            // 'program' => 'required',
            // 'jurusan' => 'required',
            // 'kelas' => 'required',
            // 'semester' => 'required',
            // 'kode' => 'required',
            // 'matakuliah' => 'required',
            // 'jam' => 'required',
            // 'sks' => 'required',
            // 'mk_group' => 'required',
            // 'mk_wajib' => 'required',
            // 'tahun' => 'required',
            // 'matakuliah_inggris' => 'required',
            // 'matakuliah_singkatan' => 'required',
            // 'tanggal_mulai_efektif' => 'required',
            // 'tanggal_akhir_efektif' => 'required',
            // 'matakuliah_jenis' => 'required',
            // 'masuk_penilaian' => 'required',
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

        $matakuliah = Matakuliah::create($data);

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
        if ($id) {
            $matakuliah = Matakuliah::where('nomor', $id)->get();
            return response()->json([
                "status" => 'success',
                "data" => $matakuliah,
                "error" => ''
            ]);
        } else {
            return response()->json([
                "status" => 'failed',
                "data" => null,
                "error" => 'id required'
            ]);
        }
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
        $matakuliah = Matakuliah::where('NOMOR', $id);
        $data = $request->all();

        $validate = Validator::make($data, [
            // 'program' => 'required',
            // 'jurusan' => 'required',
            // 'kelas' => 'required',
            // 'semester' => 'required',
            // 'kode' => 'required',
            // 'matakuliah' => 'required',
            // 'jam' => 'required',
            // 'sks' => 'required',
            // 'mk_group' => 'required',
            // 'mk_wajib' => 'required',
            // 'tahun' => 'required',
            // 'matakuliah_inggris' => 'required',
            // 'matakuliah_singkatan' => 'required',
            // 'tanggal_mulai_efektif' => 'required',
            // 'tanggal_akhir_efektif' => 'required',
            // 'matakuliah_jenis' => 'required',
            // 'masuk_penilaian' => 'required',
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
        //
        $matakuliah = Matakuliah::where('nomor', $id);
        $matakuliah->delete();

        return response(
            [
                'status' => "success",
                'data' => ["message" => "data berhasil di hapus"],
                'erorr' => ''
            ]
        );
    }
}
