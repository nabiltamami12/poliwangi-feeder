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
                DB::raw("(select sum((select sks from matakuliah where matakuliah.nomor=mk.matakuliah)) from kurikulum_matkul mk where mk.kurikulum = kurikulum.id) as jumlah_matkul"),
                DB::raw("(select program_studi from program_studi p where p.nomor=kurikulum.prodi_id) as prodi"),
                DB::raw("(select tahun from periode p where p.nomor=kurikulum.periode_id) as periode"),
                DB::raw("(select semester from periode p where p.nomor=kurikulum.periode_id) as semester"),
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
            'prodi_id' => 'required',
            'periode_id' => 'required',
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

    public function matakuliah($id)
    {
        try {
            $kurikulum_matkul = DB::table('kurikulum_matkul as km')
                                    ->select('km.*','m.matakuliah as nama_matkul','m.kode','m.sks',DB::raw('CONCAT( p.program," ",ps.program_studi ) as prodi'))
                                    ->join('matakuliah as m','m.nomor','=','km.matakuliah')
                                    ->join('program_studi as ps','m.program_studi','=','ps.nomor')
                                    ->join('program as p','p.nomor','=','ps.program')
                                    ->where('km.kurikulum',$id)->get();
            $this->data = $kurikulum_matkul;
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
                $kurikulum->update($data);
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

    public function tambahMatkul(Request $request){
        $request->validate([
            'matakuliah' => 'required',
            'semester' => 'required|min:1',
            'status' => 'required'
        ]);

        $check_sks = Kurikulum::select([
            'jumlah_sks',
            'sks_wajib',
            'sks_pilihan',
            DB::raw("(select sum((select sks from matakuliah where matakuliah.nomor=mk.matakuliah)) from kurikulum_matkul mk where mk.kurikulum = kurikulum.id && status='wajib') as jumlah_sks_wajib"),
            DB::raw("(select sum((select sks from matakuliah where matakuliah.nomor=mk.matakuliah)) from kurikulum_matkul mk where mk.kurikulum = kurikulum.id && status='pilihan') as jumlah_sks_pilihan"),
            DB::raw("(select sum((select sks from matakuliah where matakuliah.nomor=mk.matakuliah)) from kurikulum_matkul mk where mk.kurikulum = kurikulum.id) as jumlah_sks_semua")
        ])->where('id', $request->kurikulum)->first();

        $matkul = DB::table('matakuliah')->where('nomor', $request->matakuliah)->first();

        if($request->status == 'wajib' && ($check_sks->jumlah_sks_wajib + $matkul->sks) > $check_sks->sks_wajib){
            $this->status = "failed";
            $this->error = ["code" => 422, "message" => "Jumlah Sks Wajib Melebihi batas yang telah ditentukan"];
        } else if($request->status == 'pilihan' && ($check_sks->jumlah_sks_pilihan + $matkul->sks) > $check_sks->sks_pilihan){
            $this->status = "failed";
            $this->error = ["code" => 422, "message" => "Jumlah Sks Wajib Melebihi batas yang telah ditentukan"];
        } else {
            try {
                $check = DB::table('kurikulum_matkul')->where(['kurikulum' => $request->kurikulum, 'matakuliah' => $request->matakuliah, 'semester' => $request->semester]);

                if($check->count() == 0){
                    $matakuliah = DB::table('kurikulum_matkul')->insert([
                        'id' => null,
                        'kurikulum' => $request->kurikulum,
                        'matakuliah' => $request->matakuliah,
                        'semester' => $request->semester,
                        'status' => $request->status
                    ]);

                    $this->data = $matakuliah;
                }

                $this->status = "success";
            } catch(QueryException $e){
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
            // $kurikulum = DB::table('kurikulum')->update(['status'=>0]);
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

    public function deleteMatkul($id)
    {
        try {
            $kurikulum_matkul = DB::table('kurikulum_matkul')->where('id', $id);
            $kurikulum_matkul->delete();

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
