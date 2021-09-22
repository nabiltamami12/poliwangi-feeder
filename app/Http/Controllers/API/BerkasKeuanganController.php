<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Models\BerkasKeuangan;

class BerkasKeuanganController extends Controller
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
        //
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
        $validator = Validator::make(
            $data,
            [
                'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
                'id_mahasiswa' => 'required',
                'jenis' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }


        if ($files = $request->file('file')) {
            $namafile = $files->getClientOriginalName();
            $document = new BerkasKeuangan();
            $document->path_pengajuan = '/berkas_keuangan/'.$namafile;
            $document->id_mahasiswa = $request->id_mahasiswa;
            $document->tahun = Carbon::now()->format('Y');
            $document->status_lunas = "belum_lunas";
            $document->status = "not_approved";
            $files->move(public_path() . '/berkas_keuangan', $namafile);
            $document->save();
            $this->status = "success";


            return response()->json([
                "status" => $this->status,
                "message" => "File successfully uploaded",
                "data" => $document,
                'error' => $this->err
            ]);
        }
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
    }
}
