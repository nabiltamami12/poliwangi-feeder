<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa as Mhs;
use App\Models\InputNilai;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        $where = [];
        if ( $request->program_studi != null ||  !isset($request->program_studi) ) {
            array_push($where,['m.program_studi','=',$request->program_studi]);
        }
        // // if ($request->jurusan != "null" || !isset($request->jurusan) ) {
        // //     array_push($where,['k.jurusan','=',$request->jurusan]);
        // // }
        // if ($request->kelas != "null" || !isset($request->kelas) ) {
        //     array_push($where,['m.kelas','=',$request->kelas]);
        // } 
        array_push($where,['m.status','=',$request->status]);
        $data = DB::table('mahasiswa as m')
                    ->select('m.nomor','m.nrp','m.nama','m.tgllahir','m.notelp','m.email',)
                    ->join('kelas as k','m.kelas','=','k.nomor','left')
                    ->join('program_studi as ps','ps.nomor','=','m.program_studi')
                    // ->join('jurusan as j','j.nomor','=','k.jurusan')
                    ->where($where)
                    ->get();
        return response()->json([
            "status" => 'success',
            "data" => $data,
            "error" => ''
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validated = Validator::make($data, [
        ]);

        if ($validated->fails()) {
            $this->status = 'error';
            $this->err = $validated->errors();
        } else {
            $data = Mhs::create($data);
            $this->data = $data;
            $this->status = "success";
        }
        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'error' => ''
        ]);

        
    }

    public function show($id)
    {
        $this->data = Mhs::where("nomor", $id)->get();
        $this->status = "success";

        
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => ''
        ]);
    }

    public function update(Request $request, $id)
    {
        $check = Mhs::where('NOMOR', $id);
        $data = $request->all();

        $validate = Validator::make($data, [
           
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
            'error' => ''
        ]);
    }

    public function destroy($id)
    {
        $check = Mhs::where('NOMOR', $id);

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
            'error' => ''
        ]);
    }
}