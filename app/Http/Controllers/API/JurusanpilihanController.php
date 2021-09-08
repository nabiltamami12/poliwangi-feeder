<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusanpilihan;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\JurusanpilihanResource;
use App\Models\Jurusan;
use Illuminate\Database\QueryException;
use DB;

class JurusanpilihanController extends Controller
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
            $jurusan = DB::table("jurusan_pilihan")
            ->select(
                "jurusan_pilihan.nomor",
                "program_studi.program_studi",
                "jurusan_pilihan.kuota",
                "jurusan_pilihan.tahun"

            )
            ->join("program_studi", "jurusan_pilihan.program_studi", "=", "program_studi.nomor")
            ->get();
            $this->data = $jurusan;
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error->errorInfo
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

        $validator = Validator::make($data, []);

        if ($validator->fails()) {
            return response(
                [
                    'status' => "failed",
                    'data' => ["message" => "data jurusan pilihan sudah terdaftar"],
                    'error' => $validator->errors(),
                ]
            );
        }

        try {
            $jurusan = Jurusanpilihan::create($data);
            $this->data = $jurusan;
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error->errorInfo
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
            if ($id) {
                $jurusan = Jurusanpilihan::select(
                    "jurusan_pilihan.nomor",
                    "program_studi.program_studi",
                    "jurusan_pilihan.kuota",
                    "jurusan_pilihan.tahun"
    
                )
                    ->join("program_studi", "jurusan_pilihan.program_studi", "=", "program_studi.nomor")
                    ->where('jurusan_pilihan.nomor', $id)
                    ->get();
            } else {
                $jurusan = Jurusanpilihan::get();
            }
            $this->data = $jurusan;
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error->errorInfo
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
        $jurusan = Jurusanpilihan::where('nomor', $id);
        $data = $request->all();

        $validate = Validator::make($data, []);

        if ($validate->fails()) {
            $this->status = "error";
            $this->error = $validate->errors();
        } else if (!$jurusan) {
            $this->status = "failed";
            $this->error = "Data not found";
        } else {
            try {
                $jurusan->update($data);
                $this->data = $jurusan->get();
                $this->status = "success";
            } catch (QueryException $e) {
                $this->status = "failed";
                $this->error = $e;
            }
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error->errorInfo
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
            $jurusan = Jurusanpilihan::where('nomor', $id);
            $jurusan->delete();
            $this->data = $jurusan;
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error->errorInfo
        ]);
    }
}
