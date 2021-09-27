<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use DB;
use Illuminate\Database\QueryException;

class MatakuliahController extends Controller
{
    protected $status = null;
    protected $error = null;
    protected $data = null;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $matakuliah = Matakuliah::select(
                                'matakuliah.*',
                                'kelas.kode as kode_kelas',
                                'program_studi.program_studi as nama_program',
                                'matakuliah_jenis.matakuliah_jenis as nama_mk_jenis',
                            )
                            ->join('kelas', 'kelas.nomor', '=', 'matakuliah.kelas')
                            ->join('program_studi', 'program_studi.nomor', '=', 'matakuliah.program_studi')
                            ->join('matakuliah_jenis', 'matakuliah_jenis.nomor', '=', 'matakuliah.matakuliah_jenis','left')
                            ->get();
            $this->data = $matakuliah;
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

        try {
            $data['tahun'] = $this->tahun_aktif;
            $data['tanggal_mulai_efektif'] = Carbon::parse($data['tanggal_mulai_efektif'])->format('Y-m-d');
            $data['tanggal_akhir_efektif'] = Carbon::parse($data['tanggal_akhir_efektif'])->format('Y-m-d');
            $matakuliah = Matakuliah::create($data);
            $this->data = $matakuliah;
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
        //
        if ($id) {
            try {
                $matakuliah = Matakuliah::where('nomor', $id)->get();
                $this->data = $matakuliah;
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
        } else {
            return response()->json([
                "status" => 'failed',
                "data" => null,
                "error" => 'id required'
            ]);
        }
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
            $this->error = $validate->errors();
        } else if (!$matakuliah) {
            $this->status = "failed";
            $this->error = "Data not found";
        } else {
            try {
                $matakuliah->update($data);
                $this->data = $matakuliah->get();
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
        //
        try {
            $matakuliah = Matakuliah::where('nomor', $id);
            $matakuliah->delete();
            $this->data = $matakuliah;
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
