<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Kepegawaian\Staff;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function getData(Request $request)
    {
        $data = Staff::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('Aksi', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditJabatan" data-id="'.$data->id.'">Edit</button>
                    <button type="button" data-id="'.$data->id.'" onclick="delete_btn()" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Aksi'])
            ->make(true);
    }
    public function store(Request $request, Staff $data)
    {
        //
        $validator = Validator::make($request->all(), [
            'staf' => 'required',
        ]);
         
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
 
        $data->create($request->all());
 
        return response()->json(['success'=>'Jabatan berhasil ditambahkan !']);
    }

    public function edit($id)
    {
        //
        $data = Staff::find($id);
 
        $html = '<div class="form-group">
                <label for="">Nama Jabatan</label>
                <input type="text" class="form-control" name="staf" id="editstaff" placeholder="Nama jabatan" value="'.$data->staf.'" required>
              </div>';
 
        return response()->json(['html'=>$html]);
    }

    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'staf' => 'required',
        ]);
         
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
 
        $data = Staff::find($id);
        $data->update($request->all());
 
        return response()->json(['success'=>'Jabatan berhasil diperbarui !']);
    }
    public function destroy($id)
    {
        //
        Staff::destroy($id);
        return response()->json(['success' => 'Jabatan berhasil dihapus!']);
    }
}
