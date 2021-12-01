<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Kepegawaian\Pegawai;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PegawaiController extends Controller
{
    public function getData(Request $request)
    {
        $data = Pegawai::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('Aksi', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditData" data-id="'.$data->id.'">Edit</button>
                    <button type="button" data-id="'.$data->id.'" onclick="delete_btn()" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Aksi'])
            ->make(true);
    }
    // public function getPegawai()
    // {
    //     $pegawai = Pegawai::orderBy('nama', 'ASC')->get();
    //     $jabatan = JabatanStruktural::orderBy('nama_jabatan', 'ASC')->get();
    //     return response()->json(['pegawai'=>$pegawai, 'jabatan'=>$jabatan]);
    // }
}
