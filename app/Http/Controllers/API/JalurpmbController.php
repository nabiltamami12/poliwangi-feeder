<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jalurpmb;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\JalurpmbResource;
use DB;

class JalurpmbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
        $data = $request->all();

        $validator = Validator::make($data, []);

        if ($validator->fails()) {
            return response(
                [
                    'status' => "failed",
                    'data' => ["message" => "data jalur pmb sudah terdaftar"],
                    'error' => $validator->errors(),
                ]
            );
        }

        $pmb = Jalurpmb::create($data);

        return response(
            [
                'status' => "success",
                'data' => new JalurpmbResource($pmb),
                'error' => ''
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
        //
        if ($id) {
            $pmb = Jalurpmb::where('id', $id)->get();
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
        $jurusan = Jalurpmb::where('id', $pmb);
        $data = $request->all();

        $validate = Validator::make($data, []);

        if ($validate->fails()) {
            $this->status = "error";
            $this->err = $validate->errors();
        } else if (!$jurusan) {
            $this->status = "failed";
            $this->err = "Data not found";
        } else {
            $jurusan->update($data);
            $this->data = $jurusan->get();
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
        //
        $pmb = Jalurpmb::where('id', $id);
        $pmb->delete();

        return response(
            [
                'status' => "success",
                'data' => ["message" => "data berhasil di hapus"],
                'erorr' => ''
            ]
        );
    }
}
