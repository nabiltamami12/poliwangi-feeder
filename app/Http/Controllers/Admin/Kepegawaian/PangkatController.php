<?php

namespace App\Http\Controllers\Admin\Kepegawaian;

use Illuminate\Http\Request;
use App\Models\Kepegawaian\Pangkat;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "akademik-kepegawaian";
        return view('admin.masterKepegawaian.pangkat.index', compact(['title']));
    }

    public function getPangkat(Request $request)
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
    public function store(Request $request, Pangkat $pangkat)
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Pangkat::destroy($id);
 
        return response()->json(['success'=>'Pangkat berhasil dihapus !!']);
    }
}
