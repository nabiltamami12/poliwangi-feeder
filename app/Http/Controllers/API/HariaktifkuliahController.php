<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Hariaktifkuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Http\Requests\Import;

class HariaktifkuliahController extends Controller
{
    const FETCHED_ATTRIBUTE = [
        "tanggal",
        "libur"
    ];
    public function index()
    {
        $hari = Hariaktifkuliah::get();
        return response()->json([
            "status" => 'success ',
            "data" => $hari,
            "error" => ''
        ]);
    }
    
    public function upload(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }


        if ($files = $request->file('file')) {

            //store file into document folder
            $file = $files->storeAs('documents','sk_hari_aktif.pdf','public');

            //store your file into database
            // $document = new File();
            // $document->nilai = $file;
            // $document->nama = "file_sk_hari_aktif";
            // $document->keterangan = $request->keterangan;
            // $document->save();

            return response()->json([
                "status" => 'success',
                // "data" => $document,
                "error" => ''
            ]);
        }
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $result = [];
        // foreach ($data as $d) {
            $tanggal = Hariaktifkuliah::where('TANGGAL', $data['tanggal'])->first();

            if (!empty($tanggal)) {
                $tanggal_id = Hariaktifkuliah::where('TANGGAL', $data['tanggal']);
                $tanggal_id->update($data);
                $result[] = $tanggal_id;
            } else {
                $result[] = Hariaktifkuliah::create($data);
            }
        // }
        return response()->json([
            "status" => 'success',
            "data" => null,
            "error" => ''
        ]);
    }

    public function show($id, $tahun)
    {
        //
        if ($id & $tahun) {
            $hari = DB::table('TANGGAL')
                ->whereMonth('tanggal', $id)
                ->whereYear('tanggal', $tahun)
                ->get();

            return response()->json([
                "status" => 'success',
                "data" => $hari,
                "error" => ''
            ]);
        }
    }
}
