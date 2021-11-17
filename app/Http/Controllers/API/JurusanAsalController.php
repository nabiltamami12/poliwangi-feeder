<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JurusanAsal;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use DB;
class JurusanAsalController extends Controller
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
            $jurusan = JurusanAsal::select(
                    'jurusan_asal.*',
                    DB::raw('(select count(*) from jurusan_linear where id_jurusan_asal = jurusan_asal.id) as jml_prodi')
                )->get();
            $this->data = $jurusan;
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

    public function jurusan_linear($id)
    {
        try {
            $jurusan = DB::table('program_studi as ps')
                        ->select(        
                            'ps.nomor as id_prodi',
                            'j.jurusan',
                            DB::raw("CONCAT(p.program,' ',ps.program_studi) as prodi"),
                            DB::raw("IF(jl.id is null,0,1) as selected"),
                        )
                        ->join('jurusan as j','j.nomor','=','ps.jurusan')
                        ->join('program as p','p.nomor','=','ps.program')
                        ->join('jurusan_linear as jl','jl.id_program_studi','=','ps.nomor','left')
                        ->orderBy('ps.jurusan')
                        ->orderBy('p.program')
                        ->get();
            $this->data = $jurusan;
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

    public function update_jurusan_linear(Request $request,$id)
    {
        try {
            DB::table('jurusan_linear')->where('id_jurusan_asal',$id)->delete();
            foreach ($request->prodi as $key => $value) {
                $arr_prodi = [
                    'id_jurusan_asal'=>$id,
                    'id_program_studi'=>$value
                ];
                DB::table('jurusan_linear')->insert($arr_prodi);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validated = Validator::make($data, [
            'jenjang' => 'required',
            'jurusan' => 'required|unique:jurusan',
        ]);

        if ($validated->fails()) {
            $this->status = 'error';
            $this->error = $validated->errors();
        } else {
            try {
                $data = JurusanAsal::create($data);
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
        try {
            $jurusan = JurusanAsal::where("id", $id)->first();
            $list_sekolah = DB::select("  SHOW COLUMNS 
                FROM jurusan_asal 
                LIKE 'jenjang'"
            )[0]->type;
            $list_sekolah = explode(",",str_replace('\'','',substr($list_sekolah,5,-1)) );

            $this->data = ['jenjang'=>$list_sekolah,'data'=>$jurusan];
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validated = Validator::make($data, [
            'jenjang' => 'required',
            'jurusan' => 'required|unique:jurusan',
        ]);

        if ($validated->fails()) {
            $this->status = 'error';
            $this->error = $validated->errors();
        } else {
            try {
                $check = JurusanAsal::where('id',$id);
                $update = $check->update($data);
                $this->data = $check->first();
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
            $check = JurusanAsal::where('id', $id);
    
            if ($check) {
                $this->status = "success";
                $this->data = null;
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