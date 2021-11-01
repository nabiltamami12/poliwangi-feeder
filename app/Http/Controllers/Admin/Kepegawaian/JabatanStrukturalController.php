<?php

namespace App\Http\Controllers\Admin\Kepegawaian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Kepegawain\JabatanStruktural;


class JabatanStrukturalController extends Controller
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
        return view('admin.masterKepegawaian.jabatanStruktural.index', compact(['title']));
    }

    public function getJabatan(Request $request)
    {
        $data = JabatanStruktural::orderBy('id', 'desc')->get();
        return \DataTables::of($data)
            ->addColumn('Aksi', function($data) {
                return '<button type="button" class="btn btn-success btn-sm" id="getEditJabatanData" data-id="'.$data->id.'">Edit</button>
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
    public function store(Request $request, JabatanStruktural $jabatan)
    {
        //
        $validator = Validator::make($request->all(), [
            'nama_jabatan' => 'required',
        ]);
         
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
 
        $jabatan->create($request->all());
 
        return response()->json(['success'=>'Jabatan Struktural berhasil ditambahkan !']);
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
        $data = JabatanStruktural::find($id);
 
        $html = '<div class="form-group">
                    <label for="">Nama Jabatan</label>
                    <input type="text" class="form-control" name="nama_jabatan" id="editNamaJabatan" value="'.$data->nama_jabatan.'">
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
            'nama_jabatan' => 'required',
        ]);
         
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
 
        $jabatan = JabatanStruktural::find($id);
        $jabatan->update($request->all());
 
        return response()->json(['success'=>'Jabatan Struktural berhasil diupdate !!']);
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
        JabatanStruktural::destroy($id);
 
        return response()->json(['success'=>'Jabtan Struktural berhasil dihapus !!']);
    }
}
