<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kelas ;
use Illuminate\Support\Facades\Validator;

class kelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $status = null;
    protected $err = null;
    protected $data = null;
    
    public function index(Request $req)
    {   
        // Mengecek ada parameter kuota apa tidak.
        // $check = $req->kuota;

        // if ($check) {
        //     $this->status = "success";
        //     $this->data = Kelas::select(
        //         'KULIAH.nomor',
        //         'jurusan.jurusan',
        //         'MATAKULIAH.kode', 'RUANG.kapasitas_mahasiswa',
        //         'RUANG.ruang'
        //     )
        //     ->join('kelas', 'KULIAH.kelas', '=', 'kelas.nomor')
        //     ->join('jurusan', 'jurusan.nomor', '=', 'kelas.jurusan')
        //     ->join('RUANG', 'KULIAH.ruang', '=', 'RUANG.nomor')
        //     ->where('RUANG.kapasitas_mahasiswa', '=', $check)
        //     ->get();
        // } else {
        //     $this->status = 'success';
        //     $this->data = Kelas::select(
        //         'KULIAH.nomor',
        //         'jurusan.jurusan',
        //         'kelas.kode', 'RUANG.kapasitas_mahasiswa',
        //         'RUANG.ruang'
        //     )
        //     ->join('kelas', 'KULIAH.kelas', '=', 'kelas.nomor')
        //     ->join('jurusan', 'jurusan.nomor', '=', 'kelas.jurusan')
        //     ->join('RUANG', 'KULIAH.ruang', '=', 'RUANG.nomor')
        //     ->get();
        // }
        
        $this->status = "success";
        $this->data = Kelas::select(
            'kelas.*',
            'pegawai.nama as wali_kelas',
            'pegawai.nomor as id_wali_kelas',
            'pegawai.nama as wali_kelas',
            'program_studi.program_studi as nama_prodi',
            'program.program as nama_program',
        )
        ->join('program_studi', 'program_studi.nomor', '=', 'kelas.program_studi')
        ->join('program', 'program.nomor', '=', 'program_studi.program')
        ->join('jurusan', 'jurusan.nomor', '=', 'program_studi.jurusan')
        ->join('pegawai', 'pegawai.nomor', '=', 'kelas.wali_kelas','left')
        ->get();
       
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
            // 'nomor' => 'required|integer|unique:KULIAH',
            // 'tahun' => 'required|integer',
            // 'semester' => 'required|integer',
            // 'kelas' => 'required|integer',
            // 'matakuliah' => 'required|integer',
            // 'ruang' => 'required|integer',
        ]);

        if ($validated->fails()) {
            $this->status = 'failed';
            $this->data = "Tidak ada data";
            $this->err = $validated->errors();
        } else {
            $data = Kelas::create($data);
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
              
        // $this->data = Kelas::select(
        //     'KULIAH.nomor',
        //     'MATAKULIAH.matakuliah AS nama_kelas',
        //     'MATAKULIAH.kode', 'RUANG.kapasitas_mahasiswa',
        //     'RUANG.ruang'
        // )->join('MATAKULIAH', 'KULIAH.matakuliah', '=', 'MATAKULIAH.nomor')
        // ->join('kelas', 'KULIAH.kelas', '=', 'kelas.nomor')
        // ->join('RUANG', 'KULIAH.ruang', '=', 'RUANG.nomor')
        // ->where('KULIAH.nomor', '=', $id)
        // ->get();
        // $this->status = "success";
        $this->status = "success";
        $this->data = Kelas::select(
            'kelas.*',
            'pegawai.nama as wali_kelas',
            'pegawai.nomor as id_wali_kelas',
            'pegawai.nama as wali_kelas',
            'program_studi.program_studi as nama_prodi',
            'program.program as nama_program',
        )
        ->join('program_studi', 'program_studi.nomor', '=', 'kelas.program_studi')
        ->join('program', 'program.nomor', '=', 'program_studi.program')
        ->join('jurusan', 'jurusan.nomor', '=', 'program_studi.jurusan')
        ->join('pegawai', 'pegawai.nomor', '=', 'kelas.wali_kelas','left')
        ->get();
       

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
        $check = Kelas::where('NOMOR', $id);
        $data = $request->all();

        $validate = Validator::make($data, [
            // 'matakuliah' => 'required|integer',
        ]);

        if ($validate->fails()) {
            $this->status = "error";
            $this->err = $validate->errors();
        } else if (!$check) {
            $this->status = "failed";
            $this->err = "Data not found";
        } else {
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
        $check = Kelas::where('NOMOR', $id);

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