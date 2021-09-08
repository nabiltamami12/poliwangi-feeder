<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RangeNilai;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class RangeNilaiController extends Controller
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
            $rangenilai = RangeNilai::get();
            $this->data = $rangenilai;
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
        $validated = Validator::make($data, [
        ]);

        if ($validated->fails()) {
            $this->status = 'error';
            $this->error = $validated->errors();
        } else {
            try {
                $data = RangeNilai::create($data);
                $this->data = $data;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $rangenilai = RangeNilai::where("nomor", $id)->get();
            $this->data = $rangenilai;
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
        $check = RangeNilai::where('NOMOR', $id);
        $data = $request->all();

        $validate = Validator::make($data, [
            // 'jurusan' => 'required|string|unique:JURUSAN',
            // 'kajur' => 'integer',
            // 'sekjur' => 'integer',
            // 'alias' => 'string|unique:JURUSAN|max:10',
            // 'jurusan_inggris' => 'string|unique:JURUSAN',
            // 'jurusan_lengkap' => 'string|unique:JURUSAN',
            // 'konsentrasi' => 'string',
            // 'akreditasi' => 'string',
            // 'sk_akreditasi' => 'string|unique:JURUSAN'
        ]);

        if ($validate->fails()) {
            $this->status = "error";
            $this->error = $validate->errors();
        } else if(!$check){
            $this->status = "failed";
            $this->error = "Data not found";
        }
        else {
            try {
                $check->update($data);
                $this->data = $check->get();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $check = RangeNilai::where('NOMOR', $id);
    
            if ($check) {
                $this->status = "success";
                $this->data = $check->get();
                $check->delete();
            } else {
                $this->status = "failed";
            }
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