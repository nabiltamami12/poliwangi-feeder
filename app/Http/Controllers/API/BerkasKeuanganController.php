<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use App\Models\BerkasKeuangan as BK;

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
            $namafile = $request->id_mahasiswa.'_'.$files->getClientOriginalName();
            $document = new BK();
            $document->path_pengajuan = '/berkas_keuangan/'.$namafile;
            $document->id_mahasiswa = $request->id_mahasiswa;
            $document->tahun = Carbon::now()->format('Y');
            $document->status_lunas = "belum_lunas";
            $document->status = "not_approved";

            $path = public_path(). '/berkas_keuangan/'.$namafile;
            $check = file_exists($path);
            if ($check) {
                $delete = File::delete($path);
                $files->storeAs('berkas_keuangan', $namafile, 'public');
            } else {
                $files->storeAs('berkas_keuangan', $namafile, 'public');
            }
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

    public function approve($id) {
        $data = BK::findOrFail($id);
        $data->status = "approved";
        $data->save();
        $this->data = $data;
        $this->status = "success";
        return response()->json([
            'status' => $this->status,
            'data' => $this->data,
            'error' => $this->err
        ]);
    }

    public function perjanjian(Request $request, $id) {
        $record = BK::findOrFail($id);
        $data = $request->all();
        $validator = Validator::make(
            $data,
            [
                'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'data' => $data], 401);
        }
        $files = $request->file('file');

        $namafile = $record->id_mahasiswa.'_'.$files->getClientOriginalName();
        $record->path_perjanjian = '/berkas_keuangan/'.$namafile;
        $path = public_path(). '/berkas_keuangan/'.$namafile;
        $check = file_exists($path);

        if ($check) {
            $delete = File::delete($path);
            $files->storeAs('berkas_keuangan', $namafile, 'public');
        } else {
            $files->move(public_path() . '/berkas_keuangan', $namafile);
        }

        $record->save();
        return response()->json([
                "status" => $this->status,
                "message" => "File successfully updated",
                "data" => $record,
                'error' => $this->err,
                'file' => $check
        ])
        ;

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
