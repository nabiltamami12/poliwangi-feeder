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
    protected $error = null;
    protected $data = null;
    
    public function index()
    {
        try {
            $dosenpengampu = DosenPengampu::select(
                'pegawai.nip',
                'pegawai.nama',
                'pegawai.gelar_blk',
                'pegawai.nomor',
                DB::raw('count(DISTINCT dosen_pengampu.matakuliah) as jumlah_matkul'),
            )
            ->join("pegawai", "dosen_pengampu.dosen", "=", "pegawai.nomor",'right')
            ->join("staff", "pegawai.staff", "=", "staff.nomor")
            ->where("pegawai.staff", "=", 4)
            ->groupBy('pegawai.nomor', 'pegawai.nama')
            ->get();
            $this->data = $dosenpengampu;
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
        $validated = Validator::make($data, [
            
        ]);

        

        if ($validated->fails()) {
            $this->status = 'error';
            $this->error = $validated->errors();
        } else {
            try {
                $input = DosenPengampu::create($data);
                $data = DosenPengampu::where("dosen_pengampu.nomor",$this->data->id)->get();
                $this->data = $data;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        DB::statement("SET SQL_MODE=''");
        $data = DosenPengampu::select(
            'dosen_pengampu.*',
            'matakuliah.program_studi',
            DB::raw('(select nomor from program_studi ps where ps.nomor = matakuliah.program_studi) as program_studi')
        )
        ->join("pegawai", "dosen_pengampu.dosen", "=", "pegawai.nomor",'right')
        ->join("matakuliah", "dosen_pengampu.matakuliah", "=", "matakuliah.nomor",'right')
        ->where("pegawai.staff", "=", 4)
        ->where("pegawai.nomor",$id)
        ->get();
        $dosen = Dosen::select('nama')
        ->where('nomor',$id)
        ->get();

        $this->data = [
            'nama' => $dosen[0]['nama'],
            'matkul' => $data
        ];

        $this->status = "success";
        

        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error,
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
        $check = DosenPengampu::where('nomor', $id);
        $data = $request->all();
        
        $validated = Validator::make($data, [
            
        ]);
        

        if ($validated->fails()) {
            $this->status = 'failed';
            $this->data = "Tidak ada data";
            $this->error = $validated->errors();
        } else if (!$check){
            $this->status = "failed";
            $this->error = "Data not found";
        } else {
            try {
                $check->update($data);
                $data = DosenPengampu::where("dosen_pengampu.nomor",$id)->get();
                $this->data = $data;
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
        try {
            $check = DosenPengampu::where('NOMOR', $id);
    
            if ($check) {
                $this->status = "success";
                $this->data = $check->get();
                $check->delete();
            } else {
                $this->status = "failed";
            }
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