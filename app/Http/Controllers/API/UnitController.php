<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Kepegawaian\Unit;
use App\Models\Kepegawaian\Pegawai;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class UnitController extends Controller
{
    public function getData(Request $request)
    {
        $data = Unit::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('Aksi', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditData" data-id="'.$data->id.'">Edit</button>
                    <button type="button" data-id="'.$data->id.'" onclick="delete_btn()" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Aksi'])
            ->make(true);
    }

    public function getUnit()
    {
        $pegawai = Pegawai::orderBy('nama', 'ASC')->get();
        return response()->json(['pegawai'=>$pegawai]);
    }
    public function store(Request $request, Unit $data)
    {
        $validator = Validator::make($request->all(), [
            'id_pegawai' => 'required',
            'unit' => 'required',
            'kepala' => 'required'
        ]);
         
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
 
        $data->create($request->all());

        // $staff = Unit::create($request->all());
        // $staff->save();
        
 
        return response()->json(['success'=>'Data Unit berhasil ditambahkan !']);
    }

    public function edit($id)
    {
        //
        $data = Unit::find($id);
        $pegawai = Pegawai::orderBy('nama', 'ASC')->get();
        // $jabatan = JabatanStruktural::orderBy('nama_jabatan', 'ASC')->get();
 
        $html = '<div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Pegawai</label>
                        <select name="id_pegawai" class="form-control js-example-basic-single" id="editIdPegawai" required>
                            <option selected disabled>Pilih Pegawai</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Nama Unit</label>
                        <input type="text" class="form-control" name="unit" id="unit" placeholder="Masukan nama unit" value="'.$data->unit.'" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Nama Kepala</label>
                        <input type="text" class="form-control" name="kepala" id="kepala" placeholder="Masukan nama kepala unit" value="'.$data->kepala.'" required>
                    </div>
                </div>';
 
        return response()->json(['html'=>$html, 'pegawai'=>$pegawai,'data'=>$data]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_pegawai' => 'required',
            'unit' => 'required',
            'kepala' => 'required'
        ]);
         
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
 
        $data = Unit::find($id);
        $data->update($request->all());
 
        return response()->json(['success'=>'Data Unit berhasil diperbarui !']);
    }

    public function destroy($id)
    {
        //
        Unit::destroy($id);
 
        return response()->json(['success'=>'Data Unit berhasil dihapus !!']);
    }
}
