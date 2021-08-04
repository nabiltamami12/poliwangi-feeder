<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Jamkuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\JamkuliahResource;

class JamkuliahController extends Controller
{
    /**
     * Display a listing  of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jamkuliah = Jamkuliah::select(
                                'jam.*',
                                'hari.hari as nama_hari',
                                'program.program as nama_program'
                            )
                            ->join('hari', 'hari.nomor', '=', 'jam.hari')
                            ->join('program', 'program.nomor', '=', 'jam.program')
                            ->get();
        return response()->json([
            "status" => 'success',
            "data" => $jamkuliah,
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

        $jamkuliah = Jamkuliah::create($data);

        return response(
            [
                'status' => "success",
                'data' => $jamkuliah,
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
        $jamkuliah = Jamkuliah::select(
            'jam.*',
            'hari.hari as nama_hari',
            'program.program as nama_program'
        )
        ->join('hari', 'hari.nomor', '=', 'jam.hari')
        ->join('program', 'program.nomor', '=', 'jam.program')
        ->where('jam.nomor', $id)
        ->get();
        return response()->json([
            "status" => 'success',
            "data" => $jamkuliah,
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
        $jamkuliah = Jamkuliah::where('NOMOR', $id);
        $data = $request->all();

        $validate = Validator::make($data, [
            
        ]);

        if ($validate->fails()) {
            $this->status = "error";
            $this->err = $validate->errors();
        } else if (!$jamkuliah) {
            $this->status = "failed";
            $this->err = "Data not found";
        } else {
            $jamkuliah->update($data);
            $this->data = $jamkuliah->get();
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
    public function destroy($id, Jamkuliah $jamkuliah)
    {
        //
        $jamkuliah = Jamkuliah::where('nomor', $id);
        $jamkuliah->delete();

        return response(
            [
                'status' => "success",
                'data' => ["message" => "data berhasil di hapus"],
                'erorr' => ''
            ]
        );
    }
}
