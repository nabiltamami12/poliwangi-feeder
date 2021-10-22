<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Database\QueryException;

class KurikulumController extends Controller
{
    protected $status = null;
    protected $error = null;
    protected $data = null;

    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $kurikulum = Kurikulum::select(
                            'kurikulum.*',
                            DB::raw("(select count(*) from kurikulum_matkul mk where mk.kurikulum = kurikulum.id) as jumlah_matkul"),
                            )
                            ->get();
            $this->data = $kurikulum;
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

        $validator = Validator::make($data, [
            'kurikulum' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response(
                [
                    'status' => "failed",
                    'data' => ["message" => "data program sudah terdaftar"],
                    'error' => $validator->errors(),
                ]
            );
        }

        try {
            $kurikulum = Kurikulum::create($data);
            $this->data = $kurikulum;
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }


        return response(
            [
                'status' => $this->status,
                'data' => $this->data,
                'error' => $this->error
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
        try {
            $kurikulum = Kurikulum::where('id', $id)->get();
            $kurikulum_matkul = DB::table('kurikulum_matkul as km')
                                    ->select('km.*','m.matakuliah as nama_matkul','m.kode','m.sks',DB::raw('CONCAT( p.program," ",ps.program_studi ) as prodi'))
                                    ->join('matakuliah as m','m.nomor','=','km.matakuliah')
                                    ->join('program_studi as ps','m.program_studi','=','ps.nomor')
                                    ->join('program as p','p.nomor','=','ps.program')
                                    ->where('km.kurikulum',$id)->get();
            $this->data = [
                'kurikulum' => $kurikulum,
                'kurikulum_matkul' => $kurikulum_matkul
            ];
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
        //
        $kurikulum = Kurikulum::where('id', $id);
        $data = $request->all();

        $validate = Validator::make($data, [
        ]);

        if ($validate->fails()) {
            $this->status = "failed";
            $this->error = $validate->errors();
        } else if (!$kurikulum) {
            $this->status = "failed";
            $this->error = "Data not found";
        } else {
            try {
                if ($request->matkul) {
                    foreach ($request->matkul as $key => $value) {
                        
                        if ($key=="hapus") {
                            foreach ($value as $key_hapus => $value_hapus) {
                                DB::table('kurikulum_matkul')->where('id',$value_hapus['id'])->delete();
                            }
                        }
                        if ($key=="tambah") {
                            foreach ($value as $key_tambah => $value_tambah) {
                                DB::table('kurikulum_matkul')->insert($value_tambah);
                            }
                        }
                        if ($key=="update") {
                            foreach ($value as $key_update => $value_update) {
                                DB::table('kurikulum_matkul')->where('id',$value_update)->update($value_update);
                            }
                        }
                    }
                } 
                $kurikulum->update(['kurikulum'=>$request->kurikulum]);
                $this->data = $kurikulum->get();
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

    public function change_status($id)
    {
        try {
            $kurikulum = DB::table('kurikulum')->update(['status'=>0]);
            $kurikulum = Kurikulum::where('id',$id)->update(['status'=>1]);
    
            $this->data = [];
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $kurikulum = Kurikulum::where('id', $id);
            $kurikulum->delete();
      
            $this->data = [];
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
