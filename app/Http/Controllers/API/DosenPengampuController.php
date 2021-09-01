<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DosenPengampu;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Matakuliah;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class DosenPengampuController extends Controller
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
        
        $this->data = DosenPengampu::select(
            'pegawai.nama',
            'pegawai.nomor',
            DB::raw('count(DISTINCT dosen_pengampu.matakuliah) as jumlah_matkul'),
        )
        ->join("pegawai", "dosen_pengampu.dosen", "=", "pegawai.nomor",'right')
        ->join("staff", "pegawai.staff", "=", "staff.nomor")
        ->where("pegawai.staff", "=", 4)
        ->groupBy('pegawai.nomor', 'pegawai.nama')
        ->get();
        $this->status = "success";

       
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->err,
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
            
        ]);

        

        if ($validated->fails()) {
            $this->status = 'error';
            $this->err = $validated->errors();
        } else {
            $data = DosenPengampu::create($data);
            $this->data = $data;
            $this->status = "success";
        }

        $data = DosenPengampu::where("dosen_pengampu.nomor",$this->data->id)->get();

        return response()->json([
            'status' => $this->status,
            'data' => $data,
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
        // DB::statement("SET SQL_MODE=''");
        // $data = DosenPengampu::select(
        //     'dosen_pengampu.*',
        //     'matakuliah.program_studi',
        //     DB::raw('(select nomor from program_studi ps where ps.nomor = matakuliah.program_studi) as program_studi')
        // )
        // ->join("pegawai", "dosen_pengampu.dosen", "=", "pegawai.nomor",'right')
        // ->join("matakuliah", "dosen_pengampu.matakuliah", "=", "matakuliah.nomor",'right')
        // ->where("pegawai.staff", "=", 4)
        // ->where("pegawai.nomor",$id)
        // ->get();
        // $dosen = Dosen::select('nama')
        // ->where('nomor',$id)
        // ->get();

        // $this->data = [
        //     'nama' => $dosen[0]['nama'],
        //     'matkul' => $data
        // ];

        // $this->status = "success";
        

        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->err,
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
        $check = DosenPengampu::where('nomor', $id);
        $data = $request->all();
        
        $validated = Validator::make($data, [
            
        ]);
        

        if ($validated->fails()) {
            $this->status = 'failed';
            $this->data = "Tidak ada data";
            $this->err = $validated->errors();
        } else if (!$check){
            $this->status = "failed";
            $this->err = "Data not found";
        } else {
            $check->update($data);
            $this->data = $data;
            $this->status = "success";
        }

        $data = DosenPengampu::where("dosen_pengampu.nomor",$id)->get();
        return response()->json([
            'status' => $this->status,
            'data' => $data,
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
        $check = DosenPengampu::where('NOMOR', $id);

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