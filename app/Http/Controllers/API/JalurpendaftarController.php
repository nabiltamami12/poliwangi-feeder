<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jalurpendaftar;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\JalurpendaftarResource;
use Illuminate\Database\QueryException;

class JalurpendaftarController extends Controller
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
            $this->data = Jalurpendaftar::get();
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
                    'data' => ["message" => "data pendafttar sudah terdaftar"],
                    'error' => $validator->errors(),
                ]
            );
        }

        try {
            $jalurpendaftar = Jalurpendaftar::create($data);
            $this->data = $jalurpendaftar;
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
                $jalurpendaftar = Jalurpendaftar::where('nomor', $id)->get();
            } else {
                $jalurpendaftar = Jalurpendaftar::get();
            }
            $this->data = $jalurpendaftar;
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
        $jalurpendaftar = Jalurpendaftar::where('nomor', $id);
        $data = $request->all();

        $validate = Validator::make($data, []);

        if ($validate->fails()) {
            $this->status = "error";
            $this->error = $validate->errors();
        } else if (!$jalurpendaftar) {
            $this->status = "failed";
            $this->error = "Data not found";
        } else {
            try {
                $jalurpendaftar->update($data);
                $this->data = $jalurpendaftar->get();
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
            $jalurpendaftar = Jalurpendaftar::where('nomor', $id);
            $jalurpendaftar->delete();
            $this->data = $jalurpendaftar;
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
