<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\RuanganResource;
use Illuminate\Database\QueryException;

class RuanganController extends Controller
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
            $ruangan = Ruangan::get();
            $this->data = $ruangan;
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

        try {
            $ruangan = Ruangan::create($data);
            $this->data = $ruangan;
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
        //
        try {
            if ($id) {
                $ruangan = Ruangan::where('nomor', $id)->get();
            } else {
                $ruangan = Ruangan::get();
            }
            $this->data = $ruangan;
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
            $this->error = $validate->errors();
        } else if (!$ruangan) {
            $this->status = "failed";
            $this->error = "Data not found";
        } else {
            try {
                $ruangan->update($data);
                $this->data = $ruangan->get();
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
        //
        try {
            $ruangan = Ruangan::where('nomor', $id);
            $ruangan->delete();
            $this->data = $ruangan;
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
