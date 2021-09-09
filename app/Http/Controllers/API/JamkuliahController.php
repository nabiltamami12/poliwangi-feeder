<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Jamkuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use App\Http\Resources\JamkuliahResource;

class JamkuliahController extends Controller
{
    protected $status = null;
    protected $error = null;
    protected $data = null;

    /**
     * Display a listing  of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $jamkuliah = Jamkuliah::select(
                'jam.*',
                'hari.hari as nama_hari',
                'program.program as nama_program'
            )
            ->join('hari', 'hari.nomor', '=', 'jam.hari')
            ->join('program', 'program.nomor', '=', 'jam.program')
            ->get();
            $this->data = $jamkuliah;
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

        $validator = Validator::make($data, [
            
        ]);

        if ($validator->fails()) {
            return response(
                [
                    'status' => "failed",
                    'data' => ["message" => "data jam kuliah sudah terdaftar"],
                    'error' => $validator->errors(),
                ]
            );
        }
        try {
            $jamkuliah = Jamkuliah::create($data);
            $this->data = $jamkuliah;
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
            $jamkuliah = Jamkuliah::select(
                'jam.*',
                'hari.hari as nama_hari',
                'program.program as nama_program'
            )
            ->join('hari', 'hari.nomor', '=', 'jam.hari')
            ->join('program', 'program.nomor', '=', 'jam.program')
            ->where('jam.nomor', $id)
            ->get();
            $this->data = $jamkuliah;
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
        $jamkuliah = Jamkuliah::where('NOMOR', $id);
        $data = $request->all();

        $validate = Validator::make($data, [
            
        ]);

        if ($validate->fails()) {
            $this->status = "error";
            $this->error = $validate->errors();
        } else if (!$jamkuliah) {
            $this->status = "failed";
            $this->error = "Data not found";
        } else {
            try {
                $jamkuliah->update($data);
                $this->data = $jamkuliah->get();
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
    public function destroy($id, Jamkuliah $jamkuliah)
    {
        //
        try {
            $jamkuliah = Jamkuliah::where('nomor', $id);
            $jamkuliah->delete();
            $this->data = $jamkuliah;
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
