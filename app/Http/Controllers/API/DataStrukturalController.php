<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kepegawaian\Pegawai;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Kepegawaian\DataStruktural;
use App\Models\Kepegawaian\JabatanStruktural;
use Illuminate\Support\Facades\Validator;

class DataStrukturalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getData(Request $request)
    {
        $data = DataStruktural::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('Aksi', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditData" data-id="'.$data->id.'">Edit</button>
                <button type="button" class="btn btn-secondary btn-sm" id="getDetailData" data-id="'.$data->id.'">Detail</button>
                    <button type="button" data-id="'.$data->id.'" onclick="delete_btn()" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Aksi'])
            ->make(true);
    }

    public function getDataStruktural()
    {
        $pegawai = Pegawai::orderBy('nama', 'ASC')->get();
        $jabatan = JabatanStruktural::orderBy('nama_jabatan', 'ASC')->get();
        return response()->json(['pegawai'=>$pegawai, 'jabatan'=>$jabatan]);
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
    public function store(Request $request, DataStruktural $data)
    {
        //
        $validator = Validator::make($request->all(), [
            'id_pegawai' => 'required',
            'nama_jabatan' => 'required',
            'nomor_sk' => 'required',
            'tanggal_sk' => 'required',
            'pejabat_yg_mengesahkan' => 'required',
            'keterangan' => 'required',
            'jabatan_fungsional' => 'required',
            'id_jabatan_struktural' => 'required',
            'status' => 'required',
            'tmt_struktural' => 'required',
            'tmt_kerja' => 'required',
            'tmt_kontrak' => 'required',
        ]);
         
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
 
        $data->create($request->all());
 
        return response()->json(['success'=>'Data Struktural berhasil ditambahkan !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $data = Pegawai::with(['dataStruktural'])->find($id);
        $data = DataStruktural::with(['jabatanStruktural'])->find($id);
        $pegawai = Pegawai::find($data->id_pegawai);
 
        $html = '<div class="form-row">
              <div class="form-group col-md-6">
                <label for="">Pegawai</label>
                <input type="text" class="form-control" value="'.$pegawai->nama.'" disabled>
              </div>
              <div class="form-group col-md-6">
                <label for="">Nama Jabatan</label>
                <input type="text" class="form-control" value="'.$data->nama_jabatan.'" disabled>
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Nomor SK</label>
                <input type="text" class="form-control" value="'.$data->nomor_sk.'" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="">Tanggal SK</label>
              <input type="date" class="form-control" value="'.$data->tanggal_sk.'" disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="">Yang Mengesahkan</label>
                <input type="text" class="form-control" value="'.$data->pejabat_yg_mengesahkan.'" disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Jabatan Fungsional</label>
              <input type="text" class="form-control" value="'.$data->jabatan_fungsional.'" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="">Jabatan Struktural</label>
              <input type="text" class="form-control" value="'.$data->jabatanStruktural->nama_jabatan.'" disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Tmt Struktural</label>
              <input type="text" class="form-control" value="'.$data->tmt_struktural.'" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="">Tmt Kerja</label>
              <input type="text" class="form-control" value="'.$data->tmt_kerja.'" disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Tmt Kontrak</label>
              <input type="text" class="form-control" value="'.$data->tmt_kontrak.'" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="">Status</label>
              <input type="text" class="form-control" value="'.$data->status.'" disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="">Keterangan</label>
              <textarea name="keterangan" id="keterangan" class="form-control" rows="7" disabled>'.$data->keterangan.'</textarea>
            </div>
          </div>';
 
        return response()->json(['html'=>$html]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = DataStruktural::find($id);
        $pegawai = Pegawai::orderBy('nama', 'ASC')->get();
        $jabatan = JabatanStruktural::orderBy('nama_jabatan', 'ASC')->get();
 
        $html = '<div class="form-row">
              <div class="form-group col-md-6">
                <label for="">Pegawai</label>
                <select name="id_pegawai" class="form-control js-example-basic-single" id="editIdPegawai" required>
                  <option selected disabled>Pilih Pegawai</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="">Nama Jabatan</label>
                <input type="text" class="form-control" name="nama_jabatan" id="editNamaJabatan" placeholder="Nama jabatan" value="'.$data->nama_jabatan.'" required>
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Nomor SK</label>
                <input type="text" class="form-control" name="nomor_sk" id="editNomorSk" placeholder="Nomor SK" value="'.$data->nomor_sk.'" required>
            </div>
            <div class="form-group col-md-6">
              <label for="">Tanggal SK</label>
              <input type="date" class="form-control" name="tanggal_sk" id="editTanggalSk" placeholder="Tanggal SK" value="'.$data->tanggal_sk.'" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="">Yang Mengesahkan</label>
                <input type="text" class="form-control" name="pejabat_yg_mengesahkan" id="editPejabatYgMengesahkan" placeholder="Yang Mengesahkan" value="'.$data->pejabat_yg_mengesahkan.'" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Jabatan Fungsional</label>
              <input type="text" class="form-control" name="jabatan_fungsional" id="editJabatanFungsional" placeholder="Jabatan Fungsional" value="'.$data->jabatan_fungsional.'" required>
            </div>
            <div class="form-group col-md-6">
              <label for="">Jabatan Struktural</label>
              <select name="jabatan_struktural" class="form-control js-example-basic-single" id="editJabatanStruktural" required>
                  <option selected disabled>Pilih Jabatan</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Tmt Struktural</label>
              <input type="text" class="form-control" name="tmt_struktural" id="editTmtStruktural" placeholder="Tmt Struktural" value="'.$data->tmt_struktural.'" required>
            </div>
            <div class="form-group col-md-6">
              <label for="">Tmt Kerja</label>
              <input type="text" class="form-control" name="tmt_kerja" id="editTmtKerja" placeholder="Tmt Kerja" value="'.$data->tmt_kerja.'" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Tmt Kontrak</label>
              <input type="text" class="form-control" name="tmt_kontrak" id="editTmtKontrak" placeholder="Tmt Kontrak" value="'.$data->tmt_kontrak.'" required>
            </div>
            <div class="form-group col-md-6">
              <label for="">Status</label>
              <input type="text" class="form-control" name="status" id="editStatus" placeholder="Status" value="'.$data->status.'" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="">Keterangan</label>
              <textarea name="keterangan" id="editKeterangan" class="form-control" rows="7" placeholder="keterangan" required>'.$data->keterangan.'</textarea>
            </div>
          </div>';
 
        return response()->json(['html'=>$html, 'pegawai'=>$pegawai, 'jabatan'=>$jabatan, 'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'id_pegawai' => 'required',
            'nama_jabatan' => 'required',
            'nomor_sk' => 'required',
            'tanggal_sk' => 'required',
            'pejabat_yg_mengesahkan' => 'required',
            'keterangan' => 'required',
            'jabatan_fungsional' => 'required',
            'id_jabatan_struktural' => 'required',
            'status' => 'required',
            'tmt_struktural' => 'required',
            'tmt_kerja' => 'required',
            'tmt_kontrak' => 'required',
        ]);
         
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
 
        $data = DataStruktural::find($id);
        $data->update($request->all());
 
        return response()->json(['success'=>'Data Struktural berhasil diperbarui !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DataStruktural::destroy($id);
 
        return response()->json(['success'=>'Data Struktural berhasil dihapus !!']);
    }
}
