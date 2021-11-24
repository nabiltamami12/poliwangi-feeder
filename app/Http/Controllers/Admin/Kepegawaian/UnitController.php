<?php

namespace App\Http\Controllers\Admin\Kepegawaian;

use Illuminate\Http\Request;
use App\Models\Kepegawaian\Unit;
use App\Models\Kepegawaian\Pegawai;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.masterKepegawaian.unit.index', [
                    "title" => "Unit-kepegawaian"
                ]);
    }

    public function getUnit(Request $request)
    {
        $data = Unit::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('Aksi', function($data) {
                return '<a href="'.route('dataUnit.edit', $data->id).'" class="btn btn-success btn-sm">Edit</a>
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
        $pgw = Pegawai::all();
        return view('admin.masterKepegawaian.unit.create', [
            "id" => null,
            "title" => "Unit-kepegawaian",
            "pegawai" => $pgw
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit = Unit::create($request->all());
        $unit->save();
        return redirect()->route('dataUnit.index');
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
        $pgw = Pegawai::all();
        $item = Unit::find($id);
        return view('admin.masterKepegawaian.unit.edit', [
            "id" => $id,
            "title" => "Unit-kepegawaian",
            "item" => $item,
            "pegawai" => $pgw
        ]);
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
        $unit = Unit::find($id);
        $unit->update([
            'id_pegawai' => $request->id_pegawai,
            'unit' => $request->unit,
            'kepala' => $request->kepala,
        ]);
        return redirect()->route('dataUnit.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Unit::destroy($id); 
        return response()->json(['success'=>'Unit berhasil dihapus !!']);
    }
}
