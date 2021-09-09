<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jalurpmb;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\JalurpmbResource;
use App\Models\Jalursyarat;
use DB;
use GuzzleHttp\Promise\Create;

class JalurpmbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    const FETCHED_ATTRIBUTE = [
        "jalur_daftar",
        "biaya",
        "is_active",
        "tahun",
        "kuota",
        "tanggal_tes",
        "tanggal_awal",
        "tanggal_akhir",
        "syarat"
    ];

    public function index()
    {
        try {
            $this->data = Jalurpmb::get();
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

        // $data = $request->only(self::FETCHED_ATTRIBUTE);
        // $pmb = Jalurpmb::create($data);
        // foreach ($data as $item) {
        //     $detail = array(
        //         'id_jalur' => $pmb->id,
        //         'id_syarat' => $item['syarat']
        //     );
        //     $details = Jalursyarat::create($detail);
        // }
        // if ($pmb) {
        //     //jika data berhasil ditambah
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Data Berhasil Ditambah',
        //         'data'    => $detail
        //     ], 201);
        // } else {
        //     //jika data gagal ditambah
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Data Gagal Ditambah',
        //     ], 409);
        // }
        try {
            $jalur = new Jalurpmb;
            $jalur->jalur_daftar = $request->jalur_daftar;
            $jalur->biaya = $request->biaya;
            $jalur->is_active = $request->is_active;
            $jalur->tahun = $request->tahun;
            $jalur->kuota = $request->kuota;
            $jalur->tanggal_tes = $request->tanggal_tes;
            $jalur->tanggal_awal = $request->tanggal_awal;
            $jalur->tanggal_akhir = $request->tanggal_akhir;
            $jalur->save();
            foreach ($request->syarat as $key => $value) {
                $score = array(
                    'id_jalur' => $jalur->id,
                    'id_syarat' => $value['id_syarat']
                );
                $scores = Jalursyarat::Create($score);
            }
            $this->data = $jalur;
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
        try {
            if ($id) {
                $pmb = Jalurpmb::with('jalur_syarat')->where('id', $id)->first();
            } else {
                $pmb = Jalurpmb::get();
            }
            $this->data = $pmb;
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
    public function update(Request $request, $pmb)
    {
        try {
            $jalur = Jalurpmb::where('id', $pmb)->first();
            // $data = $request->all();
            $jalur->update([
                'jalur_daftar' => $request->jalur_daftar,
                'biaya' => $request->biaya,
                'is_active' => $request->is_active,
                'tahun' => $request->tahun,
                'kuota' => $request->kuota,
                'tanggal_tes' => $request->tanggal_tes,
                'tanggal_awal' => $request->tanggal_awal,
                'tanggal_akhir' => $request->tanggal_akhir,
            ]);
    
            Jalursyarat::where('id_jalur', $pmb)->delete();
            foreach ($request->syarat as $key => $value) {
                $score = array(
                    'id_jalur' => $jalur->id,
                    'id_syarat' => $value['id_syarat']
                );
                $scores = Jalursyarat::Create($score);
            }
            $this->data = $jalur;
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
            $pmb = Jalursyarat::where('id_jalur', $id);
            $pmb->delete();
            Jalurpmb::where('id', $id)->delete();
            $this->data = "";
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
