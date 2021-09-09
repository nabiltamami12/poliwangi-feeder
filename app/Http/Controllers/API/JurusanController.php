<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use DB;
class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $status = null;
    protected $error = null;
    protected $data = null;

    
    
    public function index()
    {
        try {
            $jurusan = Jurusan::select('jurusan.*','pegawai.nama as kajur')
            ->join('pegawai','pegawai.nomor','=','jurusan.kepala')
            ->get();
            $this->data = $jurusan;
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
        $validated = Validator::make($data, [
            // 'nomor' => 'required|string|unique:JURUSAN',
            // 'jurusan' => 'required|string|unique:JURUSAN',
            // 'kajur' => 'required|integer',
            // 'sekjur' => 'required|integer',
            // 'alias' => 'required|string|unique:JURUSAN|max:10',
            // 'jurusan_inggris' => 'required|string|unique:JURUSAN',
            // 'jurusan_lengkap' => 'required|string|unique:JURUSAN',
            // 'konsentrasi' => 'required|string',
            // 'akreditasi' => 'required|string',
            // 'sk_akreditasi' => 'required|string|unique:JURUSAN'
        ]);

        if ($validated->fails()) {
            $this->status = 'error';
            $this->error = $validated->errors();
        } else {
            try {
                $data = Jurusan::create($data);
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
            $jurusan = Jurusan::where("nomor", $id)->get();
            $this->data = $jurusan;
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
        $check = Jurusan::where('nomor', $id);
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
            $check = Jurusan::where('nomor', $id);
    
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
            "error" => $this->error
        ]);
    }
}