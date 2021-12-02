<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\KunciNilai;
use App\Models\Mahasiswa;
use App\Models\Periode;
use App\Models\Perwalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Database\QueryException;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class PeriodeController extends Controller
{
    protected $status = null;
    protected $error = null;
    protected $data = null;
    protected $inserted = null;

    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $periode = Periode::get();
            $this->data = $periode;
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

    public function aktif()
    {
        try {
            $periode = Periode::select('tahun')->orderByDesc('status')->orderByDesc('tahun')->limit(1)->get();
            $this->data = $periode[0]->tahun;
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
        $mahasiswa = Mahasiswa::where('status', 'A')->get();

        $validator = Validator::make($data, [
            'tahun' => 'required',
            'status' => 'required'
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
            $periode = Periode::create($data);
            $insertedData = [];
            // return \dd($periode);
            for ($i = 1; $i <= 2; $i++) {
                // foreach ($mahasiswa as $m) {
                //     $perwalian = Perwalian::create([
                //         'periode_id' => $periode->id,
                //         'semester' => $i,
                //         'mahasiswa_id' => $m->nomor,
                //         'dosen_id' => $m->dosen_wali,
                //     ]);
                //     $insertedData[] = $perwalian;
                // }

                KunciNilai::create([
                    'semester' => $i,
                    'tahun_ajaran' => $periode->tahun,
                    'status' => 0
                ]);
            }


            $this->data = $periode;
            $this->status = "success";
            $this->inserted = $insertedData;
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }


        return response(
            [
                'status' => $this->status,
                'data' => $this->data,
                'error' => $this->error,
                'insertedData' => $this->inserted
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
        try {
            $periode = Periode::where('nomor', $id)->get();
            $this->data = $periode;
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
        //
        $periode = Periode::where('nomor', $id);
        $data = $request->all();

        $validate = Validator::make($data, []);

        if ($validate->fails()) {
            $this->status = "failed";
            $this->error = $validate->errors();
        } else if (!$periode) {
            $this->status = "failed";
            $this->error = "Data not found";
        } else {
            try {
                $periode->update($data);
                $this->data = $periode->get();
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

    public function change_status($id)
    {
        try {
            $periode = DB::table('periode')->update(['status' => 0]);
            $periode = Periode::where('nomor', $id)->update(['status' => 1]);

            $this->data = [];
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

    public function change_semester($id, $semester)
    {
        try {
            $periode = Periode::where('nomor', $id)->update(['semester' => $semester]);

            $this->data = [];
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $periode = Periode::where('nomor', $id);
            $periode->delete();

            $this->data = [];
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
