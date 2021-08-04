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
    public function create()
    {
        //
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
