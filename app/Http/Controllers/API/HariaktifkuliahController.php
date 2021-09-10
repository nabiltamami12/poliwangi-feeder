<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Hariaktifkuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Http\Requests\Import;
use Illuminate\Database\QueryException;

class HariaktifkuliahController extends Controller
{
    const FETCHED_ATTRIBUTE = [
        "tanggal",
        "libur"
    ];
    protected $status = null;
    protected $error = null;
    protected $data = null;

    public function index()
    {
        try {
            $hari = Hariaktifkuliah::get();
            $this->data = $hari;
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
            
            try {
                $file = $files->storeAs('documents','sk_hari_aktif.pdf','public');
                $this->data = $file;
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
        
        if ($id & $tahun) {
            try {
                $hari = DB::table('TANGGAL')
                ->whereMonth('tanggal', $id)
                ->whereYear('tanggal', $tahun)
                ->get();

                $this->data = $hari;
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
}
