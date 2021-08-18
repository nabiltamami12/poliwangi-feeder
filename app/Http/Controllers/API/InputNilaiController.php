<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\InputNilai;
use DB;
use App\Http\Requests\ImportNilai;

class InputNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(ImportNilai $request)
    {
        //
        $data = $request->all();
        $result = [];
        foreach ($data as $d) {
            $result[] = InputNilai::create($d);
        }
        return response()->json([
            "status" => 'success',
            "data" => $result,
            "error" => ''
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tahun, $mk, $kls, $prodi)
    {
        //
        $input = DB::table("NILAI")
            ->select(
                "MATAKULIAH.MATAKULIAH",
                "MAHASISWA.NAMA",
                "KULIAH.TAHUN",
                "KELAS.KODE",
                "NILAI.NOMOR",
                "NILAI.KULIAH",
                "NILAI.MAHASISWA",
                "NILAI.QUIS1",
                "NILAI.QUIS2",
                "NILAI.TUGAS",
                "NILAI.UJIAN",
                "NILAI.NA",
                "NILAI.HER",
                "NILAI.NH",
                "NILAI.KETERANGAN",
                "NILAI.NHU",
                "NILAI.NSP",
                "NILAI.KUIS",
                "NILAI.PRAKTIKUM"

            )
            ->join("MAHASISWA", "MAHASISWA.NOMOR", "=", "NILAI.MAHASISWA")
            ->join("KULIAH", "KULIAH.NOMOR", "=", "NILAI.KULIAH")
            ->join("KELAS", "KELAS.NOMOR", "=", "MAHASISWA.KELAS")
            ->join("MATAKULIAH", "MATAKULIAH.NOMOR", "=", "KULIAH.MATAKULIAH")
            ->where('KULIAH.TAHUN', $tahun)
            ->where('KULIAH.MATAKULIAH', $mk)
            ->where('MAHASISWA.KELAS', $kls)
            ->where('MATAKULIAH.PROGRAM', $prodi)
            ->get();

        return response()->json([
            'status' => 'berhasil',
            'data' => $input,
            'error' => ''
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
        //
        $prodi = Prodi::where('NOMOR', $id);
        $data = $request->all();

        $validate = Validator::make($data, [
            'program' => 'required',
            'jurusan' => 'required',
            'kepala' => 'required',
            'kode_epsbed' => 'required',
            'departemen' => 'required',
            'gelar' => 'required',
            'gelar_inggris' => 'required'
        ]);

        if ($validate->fails()) {
            $this->status = "error";
            $this->err = $validate->errors();
        } else if (!$prodi) {
            $this->status = "failed";
            $this->err = "Data not found";
        } else {
            $prodi->update($data);
            $this->data = $prodi->get();
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
    }
}
