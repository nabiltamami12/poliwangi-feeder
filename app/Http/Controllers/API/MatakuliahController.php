<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use DB;
use Illuminate\Database\QueryException;

class MatakuliahController extends Controller
{
    protected $status = null;
    protected $error = null;
    protected $data = null;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $matakuliah = Matakuliah::select(
                                'matakuliah.*',
                                'program_studi.program_studi as nama_program',
                                'matakuliah_jenis.matakuliah_jenis as nama_mk_jenis',
                            )
                            ->join('program_studi', 'program_studi.nomor', '=', 'matakuliah.program_studi')
                            ->join('matakuliah_jenis', 'matakuliah_jenis.nomor', '=', 'matakuliah.matakuliah_jenis','left')
                            ->get();
            $this->data = $matakuliah;
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
        //
        $data = $request->all();

        $validator = Validator::make($data, [
            // 'nomor' => 'required|unique:MATAKULIAH',
            // 'program' => 'required',
            // 'jurusan' => 'required',
            // 'kelas' => 'required',
            // 'semester' => 'required',
            // 'kode' => 'required',
            // 'matakuliah' => 'required',
            // 'jam' => 'required',
            // 'sks' => 'required',
            // 'mk_group' => 'required',
            // 'mk_wajib' => 'required',
            // 'tahun' => 'required',
            // 'matakuliah_inggris' => 'required',
            // 'matakuliah_singkatan' => 'required',
            // 'tanggal_mulai_efektif' => 'required',
            // 'tanggal_akhir_efektif' => 'required',
            // 'matakuliah_jenis' => 'required',
            // 'masuk_penilaian' => 'required',
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
            $data['tahun'] = $this->tahun_aktif;
            $matakuliah = Matakuliah::create($data);
            $this->data = $matakuliah;
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
    public function show($id)
    {
        //
        if ($id) {
            try {
                $matakuliah = Matakuliah::where('nomor', $id)->get();
                $this->data = $matakuliah;
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
        } else {
            return response()->json([
                "status" => 'failed',
                "data" => null,
                "error" => 'id required'
            ]);
        }
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
        $matakuliah = Matakuliah::where('NOMOR', $id);
        $data = $request->all();

        $validate = Validator::make($data, [
            // 'program' => 'required',
            // 'jurusan' => 'required',
            // 'kelas' => 'required',
            // 'semester' => 'required',
            // 'kode' => 'required',
            // 'matakuliah' => 'required',
            // 'jam' => 'required',
            // 'sks' => 'required',
            // 'mk_group' => 'required',
            // 'mk_wajib' => 'required',
            // 'tahun' => 'required',
            // 'matakuliah_inggris' => 'required',
            // 'matakuliah_singkatan' => 'required',
            // 'tanggal_mulai_efektif' => 'required',
            // 'tanggal_akhir_efektif' => 'required',
            // 'matakuliah_jenis' => 'required',
            // 'masuk_penilaian' => 'required',
        ]);

        if ($validate->fails()) {
            $this->status = "error";
            $this->error = $validate->errors();
        } else if (!$matakuliah) {
            $this->status = "failed";
            $this->error = "Data not found";
        } else {
            try {
                $matakuliah->update($data);
                $this->data = $matakuliah->get();
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
        //
        try {
            $matakuliah = Matakuliah::where('nomor', $id);
            $matakuliah->delete();
            $this->data = $matakuliah;
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

    public function select_option(Request $req)
	{
		try {
			$q = $req->input('q');
			$page = $req->input('page') ?? 1;
			$limit = 15;
			$offset = ($page - 1) * $limit;
			$obj = DB::table('matakuliah as m')
                ->select(DB::raw('m.nomor as id, CONCAT( m.kode," : ",m.matakuliah ) as text,m.program_studi,m.sks'))
                ->join('kurikulum_matkul as km','km.matakuliah','=','m.nomor','left')
				->where('m.kode','like', '%'.$q.'%')
				->orWhere('m.matakuliah', 'like', '%'.$q.'%')
				->offset($offset)
				->limit($limit)
				->get();
			$obj_count = Matakuliah::where('kode', 'like', '%'.$q.'%')->orWhere('matakuliah','like', '%'.$q.'%')->count();
			$this->data = array('items' => $obj, 'total_count' => $obj_count);
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
