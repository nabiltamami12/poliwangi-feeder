<?php

namespace App\Http\Controllers\Admin\Kepegawaian;

use App\Http\Controllers\Controller;
use App\Models\Kepegawaian\Pegawai;
use App\Models\Kepegawaian\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::all();
        return view('admin.masterKepegawaian.unit.index', [
                    "title" => "akademik-kepegawaian",
                    "unit" => $unit,
                ]);
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
            "title" => "akademik-kepegawaian",
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
            "title" => "akademik-kepegawaian",
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
        //
    }
}
