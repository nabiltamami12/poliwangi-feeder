<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\RuanganResource;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data = Ruangan::get();
       
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
            // 'ruang' => 'required|unique:RUANG',
            // 'keterangan' => 'required',
            // 'kepala' => 'required',
            // 'asisten' => 'required',
            // 'teknisi' => 'required',
            // 'jurusan' => 'required',
            // 'homepage' => 'required',
            // 'email' => 'required',
            // 'username' => 'required',
            // 'password' => 'required',
            // 'kode' => 'required',
            // 'telp' => 'required',
            // 'tender' => 'required',
            // 'is_ruang_kuliah' => 'required',
            // 'kapasitas_mahasiswa' => 'required',
            // 'pemakai' => 'required',
            // 'teknisi3' => 'required',
            // 'teknisi4' => 'required',
            // 'teknisi5' => 'required',
        ]);

        if ($validator->fails()) {
            return response(
                [
                    'status' => "failed",
                    'data' => ["message" => "data ruangan sudah terdaftar"],
                    'error' => $validator->errors(),
                ]
            );
        }

        $ruangan = Ruangan::create($data);

        return response(
            [
                'status' => "success",
                'data' => new RuanganResource($ruangan),
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
            $ruangan = Ruangan::where('nomor', $id)->get();
            return response()->json([
                "status" => 'success',
                "data" => $ruangan,
                "error" => ''
            ]);
        } else {
            $ruangan = Ruangan::get();
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
        $ruangan = Ruangan::where('NOMOR', $id);
        $data = $request->all();

        $validate = Validator::make($data, [
            // 'ruang' => 'required|unique:RUANG',
            // 'keterangan' => 'required',
            // 'kepala' => 'required',
            // 'asisten' => 'required',
            // 'teknisi' => 'required',
            // 'jurusan' => 'required',
            // 'homepage' => 'required',
            // 'email' => 'required',
            // 'username' => 'required',
            // 'password' => 'required',
            // 'kode' => 'required',
            // 'telp' => 'required',
            // 'tender' => 'required',
            // 'is_ruang_kuliah' => 'required',
            // 'kapasitas_mahasiswa' => 'required',
            // 'pemakai' => 'required',
            // 'teknisi3' => 'required',
            // 'teknisi4' => 'required',
            // 'teknisi5' => 'required',
        ]);

        if ($validate->fails()) {
            $this->status = "error";
            $this->err = $validate->errors();
        } else if (!$ruangan) {
            $this->status = "failed";
            $this->err = "Data not found";
        } else {
            $ruangan->update($data);
            $this->data = $ruangan->get();
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
        $ruangan = Ruangan::where('nomor', $id);
        $ruangan->delete();

        return response(
            [
                'status' => "success",
                'data' => ["message" => "data berhasil di hapus"],
                'erorr' => ''
            ]
        );
    }
}
