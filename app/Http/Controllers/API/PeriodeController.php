<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class PeriodeController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = Periode::get();
            return response()->json([
                "status" => 'success',
                "data" => $periode,
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

        $validator = Validator::make($data, [
            'tahun' => 'required',
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

        $periode = Periode::create($data);

        return response(
            [
                'status' => "success",
                'data' => $periode,
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
        $periode = Periode::where('nomor', $id)->get();
        return response()->json([
            "status" => 'success',
            "data" => $periode,
            "error" => ''
        ]);
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
    public function update(Request $request, $id)
    {
        //
        $periode = Periode::where('nomor', $id);
        $data = $request->all();

        $validate = Validator::make($data, [
        ]);

        if ($validate->fails()) {
            $this->status = "error";
            $this->err = $validate->errors();
        } else if (!$periode) {
            $this->status = "failed";
            $this->err = "Data not found";
        } else {
            $periode->update($data);
            $this->data = $periode->get();
            $this->status = "success";
        }

        return response()->json([
            'status' => $this->status,
            'data' => $data,
            'error' => ''
        ]);
    }

    public function change_status($id)
    {
        $periode = DB::table('periode')->update(['status'=>0]);
        $periode = Periode::where('nomor',$id)->update(['status'=>1]);

        return response()->json([
            'status' => 'success',
            'data' => null,
            'error' => ''
        ]);
    }
    public function change_semester($id,$semester)
    {
        $periode = Periode::where('nomor',$id)->update(['semester'=>$semester]);

        return response()->json([
            'status' => 'success',
            'data' => null,
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
        $periode = Periode::where('nomor', $id);
        $periode->delete();

        return response(
            [
                'status' => "success",
                'data' => ["message" => "data berhasil di hapus"],
                'erorr' => ''
            ]
        );
    }
}
