<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersentaseNilai;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use DB;
class PersentaseNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $status = null;
    protected $error = null;
    protected $data = null;

    
    
    public function index(Request $request)
    {
        try {
            $persentase_nilai = PersentaseNilai::where('matakuliah',$request->matakuliah)->get();
            $this->data = $persentase_nilai;
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
        $data = $request->data;
       
        try {
            if ($data['id'] === "") {
                $data = PersentaseNilai::create($data);
            }else {
                $data = PersentaseNilai::where('id',$data['id'])->update($data);
            }
            $this->data = null;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_matkul)
    {
        try {
            $persentase_nilai = PersentaseNilai::where("matakuliah", $id_matkul)->get();
            $this->data = $persentase_nilai;
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