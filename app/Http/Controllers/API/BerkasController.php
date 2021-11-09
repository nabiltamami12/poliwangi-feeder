<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $token = $request->header('token');
        $id_pendaftar = Crypt::decrypt($token);

        $data = $request->all();
        $validator = Validator::make(
            $data,
            [
                'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
                'syarat' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }


        if ($files = $request->file('file')) {
            $namafile = 'brks_pdftr_'.\App\Helpers\CoreHelper::base64url_encode($id_pendaftar).'_'.time().'.'.$files->getClientOriginalExtension();
            $document = new Berkas();
            $document->file = $namafile;
            $document->id_syarat = $request->syarat;
            $document->id_pendaftar = $id_pendaftar;
            $document->status = '1';
            $files->move(public_path('/berkas/persyaratan_pendaftar/'), $namafile);
            $document->save();


            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $document
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

        $berkas = DB::table('pendaftar')
            ->select(
                'pendaftar.nomor',
                'pendaftar.nama',
                'syarat.id as id_syarat',
                'syarat.nama as syarat_nama',
                'jalur_syarat.id as jalur_syarat_id',
                'berkas.file',
            )
            ->join("jalur_penerimaan", "pendaftar.mahasiswa_jalur_penerimaan", "=", "jalur_penerimaan.id")
            ->join("jalur_syarat", "jalur_penerimaan.id", "=", "jalur_syarat.id_jalur")
            ->leftjoin('berkas', 'jalur_syarat.id', '=', 'berkas.id_syarat')
            ->join("syarat", "jalur_syarat.id_syarat", "=", "syarat.id")
            ->where("nomor", "=", $id)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $berkas,
            'error' => ''
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'syarat' => 'required',
            'file' => 'nullable|mimes:doc,docx,pdf,txt|max:2048'
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return response()->json([
                'status' => 'failed',
                'message' => $error,
                'data' => []
            ]);
        } else {
            $token = $request->header('token');
            $id_pendaftar = Crypt::decrypt($token);

            $berkas = Berkas::where('id_pendaftar', $id_pendaftar)->where('id_syarat', $request->syarat);
            $files = $request->file('file');
            if ($files && $request->file->isValid()) {
                $file_lama = $berkas->first()->file ? public_path('berkas/persyaratan_pendaftar/'.$berkas->first()->file) : null;
                if ($file_lama && file_exists($file_lama)) unlink($file_lama);
                $file_name = 'brks_pdftr_'.\App\Helpers\CoreHelper::base64url_encode($id_pendaftar).'_'.time().'.'.$files->getClientOriginalExtension();
                $files->move(public_path('berkas/persyaratan_pendaftar'), $file_name);
                $berkas->update([
                    "file" => $file_name,
                    "status" => '1'
                ]);
            }
            return response()->json([
                'status' => 'success',
                'data' => $berkas,
                'messagge' => 'data berhasil di update'
            ]);
        }
        // $old_image_name = $request->hidden_image;
        // $image = $request->file('file');
        // $data = $request->all();
        // if ($image != '') {
        //     $request->validate($data, [
        //         'id_syarat' => 'required',
        //         'id_pendaftar' => 'required',
        //         'file' => 'required|mimes:doc,docx,pdf,txt|max:2048'
        //     ]);
        //     $image_name = $old_image_name;
        //     $image->move(public_path() . '/berkas', $image_name);
        // } else {
        //     $request->validate($data, [
        //         'id_syarat' => 'required',
        //         'id_pendaftar' => 'required',
        //     ]);
        //     $image_name = $old_image_name;
        // }
        // $data_berkas = array(
        //     'id_pendaftar' => $request->id_pendaftar,
        //     'id_syarat' => $request->id_syarat,
        //     'file' => $image_name
        // );
        // $data = Berkas::find($id);
        // $data->update($data_berkas);

        // return response()->json([
        //     'status' => 'success',
        //     'data' => $data_berkas,
        //     'error' => ''
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ruangan = Berkas::where('id', $id);
        $ruangan->delete();

        return response(
            [
                'status' => "success",
                'data' => ["message" => "data berhasil di hapus"],
                'erorr' => ''
            ]
        );
    }
}
