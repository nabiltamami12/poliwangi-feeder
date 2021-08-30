<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusanpilihan;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\JurusanpilihanResource;
use App\Models\Jurusan;
use DB;

class JurusanpilihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = DB::table("jurusan_pilihan")
            ->select(
                "jurusan_pilihan.nomor",
                "program_studi.program_studi",
                "jurusan_pilihan.kuota",
                "jurusan_pilihan.tahun"

            )
            ->join("program_studi", "jurusan_pilihan.program_studi", "=", "program_studi.nomor")
            ->get();

        return response()->json([
            'status' => 'berhasil',
            'data' => $jurusan,
            'error' => ''
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

        $jurusan = Jurusanpilihan::create($data);

        return response(
            [
                'status' => "success",
                'data' => new JurusanpilihanResource($jurusan),
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
            $jurusan = Jurusanpilihan::select(
                "jurusan_pilihan.nomor",
                "program_studi.program_studi",
                "jurusan_pilihan.kuota",
                "jurusan_pilihan.tahun"

            )
                ->join("program_studi", "jurusan_pilihan.program_studi", "=", "program_studi.nomor")
                ->where('jurusan_pilihan.nomor', $id)
                ->get();

            return response()->json([
                'status' => 'berhasil',
                'data' => $jurusan,
                'error' => ''
            ]);
        } else {
            $jurusan = Jurusanpilihan::get();
            return response()->json([
                "status" => 'failed',
                "data" => ["message" => "id required"],
                "error" => ''
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
        $jurusan = Jurusanpilihan::where('nomor', $id);
        $data = $request->all();

        $validate = Validator::make($data, []);

        if ($validate->fails()) {
            $this->status = "error";
            $this->err = $validate->errors();
        } else if (!$jurusan) {
            $this->status = "failed";
            $this->err = "Data not found";
        } else {
            $jurusan->update($data);
            $this->data = $jurusan->get();
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
        $jurusan = Jurusanpilihan::where('nomor', $id);
        $jurusan->delete();
        return response(
            [
                'status' => "success",
                'data' => ["message" => "data berhasil di hapus"],
                'erorr' => ''
            ]
        );
    }
}
