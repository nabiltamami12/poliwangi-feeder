<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Database\QueryException;

class PeriodeController extends Controller
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
            $periode = Periode::get();
            $this->data = $periode;
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error->errorInfo
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

        try {
            $periode = Periode::create($data);
            $this->data = $periode;
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
            $periode = Periode::where('nomor', $id)->get();
            $this->data = $periode;
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error->errorInfo
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
        $periode = Periode::where('nomor', $id);
        $data = $request->all();

        $validate = Validator::make($data, [
        ]);

        if ($validate->fails()) {
            $this->status = "failed";
            $this->error = $validate->errors();
        } else if (!$periode) {
            $this->status = "failed";
            $this->error = "Data not found";
        } else {
            try {
                $periode->update($data);
                $this->data = $periode->get();
                $this->status = "success";
            } catch (QueryException $e) {
                $this->status = "failed";
                $this->error = $e;
            }
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error->errorInfo
        ]);
    }

    public function change_status($id)
    {
        try {
            $periode = DB::table('periode')->update(['status'=>0]);
            $periode = Periode::where('nomor',$id)->update(['status'=>1]);
    
            $this->data = [];
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error->errorInfo
        ]);
    }

    public function change_semester($id,$semester)
    {
        try {
            $periode = Periode::where('nomor',$id)->update(['semester'=>$semester]);
  
            $this->data = [];
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error->errorInfo
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
            $periode = Periode::where('nomor', $id);
            $periode->delete();
      
            $this->data = [];
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error->errorInfo
        ]);
    }
}
