<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Syarat;
use App\Models\Jalursyarat;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\SyaratResource;
use Illuminate\Support\Facades\Crypt;
use DB;
class SyaratController extends Controller
{
    protected $status = null;
    protected $error = null;
    protected $data = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const FETCHED_ATTRIBUTE = [
        "nama",
    ];

    public function index()
    {
        try {
            $this->data = Syarat::get();
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

        $validator = Validator::make($data, []);

        if ($validator->fails()) {
            return response(
                [
                    'status' => "failed",
                    'data' => ["message" => "data ruangan sudah terdaftar"],
                    'error' => $validator->errors(),
                ]
            );
        }
        try {
            $syarat = Syarat::create($data);
            $this->data = $syarat;
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
        try {
            if ($id) {
                $syarat = Syarat::where('id', $id)->first();
            } else {
                $syarat = Syarat::get();
            }
            $this->data = $syarat;
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

    public function get_syarat_pendaftar(Request $request)
    {
        $token = $request->header('token');
		try {
            $id = Crypt::decrypt($token);
            $this->data = \App\Models\Pendaftar::where('nomor', $id)
                ->selectRaw('pendaftar.nodaftar, s.nama, b.file, b.status, js.id_syarat')
                ->rightJoin('jalur_syarat as js', 'pendaftar.jalur_daftar', '=', 'js.id_jalur')
                ->leftJoin('syarat as s', 'js.id_syarat', '=', 's.id')
                ->leftJoin('berkas as b', function ($join) {
                    $join->on('js.id_syarat', '=', 'b.id_syarat')
                        ->on('pendaftar.nomor', '=', 'b.id_pendaftar');
                })
                ->get();
            foreach ($this->data as $key => $value) {
                $file_lama = $value->file ? public_path('berkas/persyaratan_pendaftar/'.$value->file) : null;
                if ($file_lama && !file_exists($file_lama)) $this->data[$key]->status = '0';
            }
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
        $syarat = Syarat::where('id', $id);
        $data = $request->all();

        $validate = Validator::make($data, []);

        if ($validate->fails()) {
            $this->status = "error";
            $this->error = $validate->errors();
        } else if (!$syarat) {
            $this->status = "failed";
            $this->error = "Data not found";
        } else {
            try {
                $syarat->update($data);
                $this->data = $syarat->get();
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
            $syarat = Syarat::where('id', $id);
            $syarat->delete();
            $this->data = $syarat;
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
