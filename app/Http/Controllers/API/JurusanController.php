<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Validator;
use DB;
class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $status = null;
    protected $err = null;
    protected $data = null;

    
    
    public function index()
    {
        $this->data = Jurusan::get();
        $this->status = "success";

       
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->err
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
            $this->err = $validated->errors();
        } else {
            $data = Jurusan::create($data);
            $this->data = $data;
            $this->status = "success";
        }
        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'error' => $this->err
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
        $this->data = Jurusan::where("nomor", $id)->get();
        $this->status = "success";

        
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->err
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
        $check = Jurusan::where('NOMOR', $id);
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
            $this->err = $validate->errors();
        } else if(!$check){
            $this->status = "failed";
            $this->err = "Data not found";
        }
        else {
            $check->update($data);
            $this->data = $check->get();
            $this->status = "success";
        }

        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'error' => $this->err
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
        $check = Jurusan::where('NOMOR', $id);

        if ($check) {
            $this->status = "success";
            $this->data = $check->get();
            $check->delete();
        } else {
            $this->status = "failed";
        }

        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'error' => $this->err
        ]);
    }
}