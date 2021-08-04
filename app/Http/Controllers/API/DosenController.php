<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
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
        //
        $this->data = Dosen::select(
            'PEGAWAI.nomor',
            'PEGAWAI.nip',
            'PEGAWAI.nama',
            'PEGAWAI.tgllahir',
            'PEGAWAI.notelp',
            'PEGAWAI.email',
            "STAFF.staff"
        )
        ->join("STAFF", "STAFF.nomor", "=", "PEGAWAI.staff")
        ->where("PEGAWAI.staff", "=", 4)
        ->get();
        $this->status = "success";

       
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->err
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
        $data = $request->all();
        $validated = Validator::make($data, [
            'nomor' => 'required|integer|unique:PEGAWAI',
            'nip' => 'required|integer|unique:PEGAWAI',
            'nama' => 'required|string|unique:PEGAWAI',
            'tgllahir' => 'required|date',
            'notelp' => 'required|string|unique:PEGAWAI',
            'email' => 'required|string|unique:PEGAWAI',
            'staff' => 'required|integer|required'
        ]);

        if ($validated->fails()) {
            $this->status = 'error';
            $this->err = $validated->errors();
        } else {
            $data = Dosen::create($data);
            $this->data = $data;
            $this->status = "success";
        }
        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'error' => $this->err
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
        $this->data = Dosen::select(
            'PEGAWAI.nip',
            'PEGAWAI.nama',
            'PEGAWAI.tgllahir',
            'PEGAWAI.notelp',
            'PEGAWAI.email',
            "STAFF.staff"
        )
        ->join("STAFF", "STAFF.nomor", "=", "PEGAWAI.staff")
        ->where("PEGAWAI.staff", "=", 4)
        ->where("PEGAWAI.nomor", "=", $id)
        ->get();
        $this->status = "success";

        
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->err
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
        $check = Dosen::where('NOMOR', $id);
        $data = $request->all();

        $validate = Validator::make($data, [
            'nip' => 'integer|unique:PEGAWAI',
            'nama' => 'required|string|unique:PEGAWAI',
            'tgllahir' => 'date',
            'notelp' => 'string|unique:PEGAWAI',
            'email' => 'string|unique:PEGAWAI',
            'staff' => 'integer'
        ]);

        if ($validate->fails()) {
            $this->status = "error";
            $this->err = $validate->errors();
        } else if(!$check){
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
        $check = Dosen::where('NOMOR', $id);

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