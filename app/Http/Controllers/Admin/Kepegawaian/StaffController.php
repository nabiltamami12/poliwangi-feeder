<?php

namespace App\Http\Controllers\Admin\Kepegawaian;

use App\Http\Controllers\Controller;
use App\Models\Kepegawaian\Pegawai;
use App\Models\Kepegawaian\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stf = Staff::all();
        return view('admin.masterKepegawaian.staff.index', [
                    "title" => "Staff",
                    "stf" => $stf,
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
        return view('admin.masterKepegawaian.staff.create', [
            "id" => null,
            "title" => "Staff",
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
        $staff = Staff::create($request->all());
        $staff->save();
        return redirect()->route('dataStaff.index');
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
        $item = Staff::find($id);
        return view('admin.masterKepegawaian.staff.edit', [
            "id" => $id,
            "title" => "Staff",
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
        $st = Staff::find($id);
        $st->update([
            'id_pegawai' => $request->id_pegawai,
            'staf' => $request->staf,
        ]);
        return redirect()->route('dataStaff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Staff::findOrFail($id);
        $item->delete();
        return redirect()->route('dataStaff.index');
    }
}
