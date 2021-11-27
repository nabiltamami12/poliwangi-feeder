<?php

namespace App\Http\Controllers\Admin\Kepegawaian;

use Illuminate\Http\Request;
use App\Models\Kepegawaian\Report;
use App\Models\Kepegawaian\Pegawai;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $item = Report::all();
        return view('admin.masterKepegawaian.report.index',[
            "title" => "report kepegawaian",
            // "item" => $item,
        ]);
    }

    public function dataReport(Request $request)
    {
        $data = Report::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('Aksi', function($data) {
                return '<a href="'.route('reportPegawai.edit', $data->id).'" type="button" class="btn btn-success btn-sm">Edit</a>
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
        return view('admin.masterKepegawaian.report.create', [
            "id" => null,
            "title" => "Report kepegawaian",
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
        $Report = Report::create($request->all());
        $Report->save();
        return redirect()->route('reportPegawai.index');
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
        $item = Report::find($id);
        return view('admin.masterKepegawaian.report.edit', [
            "id" => $id,
            "title" => "Report kepegawaian",
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
        $rt = Report::find($id);
        $rt->update([
            'id_pegawai' => $request->id_pegawai,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('reportPegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Report::destroy($id); 
        return response()->json(['success'=>'Data report pegawai berhasil dihapus !!']);
    }
}
