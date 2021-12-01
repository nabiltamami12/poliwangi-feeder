<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Kepegawaian\Report;
use App\Models\Kepegawaian\Pegawai;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class ReportController extends Controller
{
    public function getData(Request $request)
    {
        $data = Report::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('Aksi', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditData" data-id="'.$data->id.'">Edit</button>
                    <button type="button" data-id="'.$data->id.'" onclick="delete_btn()" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Aksi'])
            ->make(true);
    }

    public function getReport()
    {
        $pegawai = Pegawai::orderBy('nama', 'ASC')->get();
        return response()->json(['pegawai'=>$pegawai]);
    }
    public function store(Request $request, Report $data)
    {
        //
        $validator = Validator::make($request->all(), [
            'id_pegawai' => 'required',
            'keterangan' => 'required'
        ]);
         
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } 
        $data->create($request->all());
        
        
        return response()->json(['success'=>'Data Report berhasil ditambahkan !']);
    }

    public function edit($id)
    {
        //
        $data = Report::find($id);
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
            <label for="">Keterangan</label>
             <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukan Keterangan" value="'.$data->keterangan.'" required>
            </div>
          </div>';
 
        return response()->json(['html'=>$html, 'pegawai'=>$pegawai,'data'=>$data]);
    }
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'id_pegawai' => 'required',
            'keterangan' => 'required',
        ]);
         
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
 
        $data = Report::find($id);
        $data->update($request->all());
 
        return response()->json(['success'=>'Data Report berhasil diperbarui !']);
    }

    public function destroy($id)
    {
        //
        Report::destroy($id);
 
        return response()->json(['success'=>'Data Report berhasil dihapus !!']);
    }
}
