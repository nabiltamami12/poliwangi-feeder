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
        $this->data = Jalurpmb::get();

        return response()->json([
            "status" => true,
            "data" => $this->data,
            "error" => ''
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

        return response()->json([
            'status' => 'berhasil',
            'data' => $jalur,
            'error' => ''
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
            $pmb = Jalurpmb::with('jalur_syarat')->where('id', $id)->first();
            return response()->json([
                "status" => 'success',
                "data" => $pmb,
                "error" => ''
            ]);
        } else {
            $pmb = Jalurpmb::get();
            return response()->json([
                "status" => 'failed',
                "data" => ["message" => "id required"],
                "error" => ''
            ]);
        }
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
    public function update(Request $request, $pmb)
    {
        //
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

        // $validate = Validator::make($data, []);

        // if ($validate->fails()) {
        //     $this->status = "error";
        //     $this->err = $validate->errors();
        // } else if (!$jalur) {
        //     $this->status = "failed";
        //     $this->err = "Data not found";
        // } else {
        //     $jalur->update($data);
        //     $this->data = $jalur->get();
        //     $this->status = "success";
        // }

        return response()->json([
            'status' => 'succes',
            'data' => $jalur,
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
        //
        $pmb = Jalursyarat::where('id_jalur', $id);
        $pmb->delete();
        Jalurpmb::where('id', $id)->delete();

        return response(
            [
                'status' => "success",
                'data' => ["message" => "data berhasil di hapus"],
                'erorr' => ''
            ]
        );
    }
}
