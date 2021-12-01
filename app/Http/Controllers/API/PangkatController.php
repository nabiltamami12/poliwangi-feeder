<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Kepegawaian\Pangkat;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PangkatController extends Controller
{
    public function getData(Request $request)
    {
        $data = Pangkat::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('Aksi', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditPangkatData" data-id="'.$data->id.'">Edit</button>
                    <button type="button" data-id="'.$data->id.'" onclick="delete_btn()" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Aksi'])
            ->make(true);
    }

    // public function getUnit()
    // {
    //     $pegawai = Pegawai::orderBy('nama', 'ASC')->get();
    //     return response()->json(['pegawai'=>$pegawai]);
    // }
    public function store(Request $request, Pangkat $pangkat)
    {
        $validator = Validator::make($request->all(), [
            'nama_pangkat' => 'required',
            'golongan' => 'required',
            'urut' => 'required|numeric',
        ]);
         
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
 
        $pangkat->create($request->all());
 
        return response()->json(['success'=>'Pangkat berhasil ditambahkan !']);
    }

    public function edit($id)
    {
        $data = Pangkat::find($id);
 
        $html = '<div class="form-group">
                    <label for="">Nama pangkat</label>
                    <input type="text" class="form-control" name="nama_pangkat" id="editNamaPangkat" value="'.$data->nama_pangkat.'">
                </div>
                <div class="form-group">
                    <label for="">Golongan</label>
                    <input type="text" class="form-control" name="golongan" id="editGolongan" value="'.$data->golongan.'">
                </div>
                <div class="form-group">
                    <label for="">Urut</label>
                    <input type="number" class="form-control" name="urut" id="editUrut" value="'.$data->urut.'">
                </div>';
 
        return response()->json(['html'=>$html]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_pangkat' => 'required',
            'golongan' => 'required',
            'urut' => 'required|numeric',
        ]);
         
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
 
        $pangkat = Pangkat::find($id);
        $pangkat->update($request->all());
 
        return response()->json(['success'=>'Pangkat berhasil diupdate !!']);
    }

    public function destroy($id)
    {
        Pangkat::destroy($id);
 
        return response()->json(['success'=>'Pangkat berhasil dihapus !!']);
    }
}
