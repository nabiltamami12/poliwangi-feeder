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
                return '<a href="" type="button" class="btn btn-success btn-sm">Edit</a>
                    <button type="button" data-id="'.$data->id.'" onclick="delete_btn()" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Aksi'])
            ->make(true);
    }
}
