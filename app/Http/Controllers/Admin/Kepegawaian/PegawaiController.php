<?php

namespace App\Http\Controllers\Admin\Kepegawaian;

use App\Http\Controllers\Controller;
use App\Models\Kepegawain\Jabatan_struktural;
use App\Models\Kepegawain\Kecamatan;
use App\Models\Kepegawain\Kota;
use App\Models\Kepegawain\Pangkat;
use App\Models\Kepegawain\Pegawai;
use App\Models\Kepegawain\Provinsi;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('admin.masterKepegawaian.pegawai.index',
        [
            "title" => "akademik-kepegawaian",
            'pegawai' => $pegawai
        ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $provinsi = Provinsi::all();
        $pangkat = Pangkat::all();
        $jabatan = Jabatan_struktural::all();
        return view('admin.masterKepegawaian.pegawai.create',[
                "id" => null,
                "title" => "akademik-kepegawaian",
                "kota" => $kota,
                "kecamatan" => $kecamatan,
                "provinsi" => $provinsi,
                "pangkat" => $pangkat,
                "jabatan" => $jabatan,
                
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
        //
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
