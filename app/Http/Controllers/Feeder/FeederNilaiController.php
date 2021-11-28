<?php

namespace App\Http\Controllers\feeder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeederNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.feeder.feeder-data_nilai', [
                "title" => "admin-feeder",
                // "data" => $data
            ]);
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
    public function store(Request $request)
    {
        
$data = new \App\Services\FeederDiktiApiService('GetDetailNilaiPerkuliahanKelas');
$data->runWS();
$response = $data->runWS();

dd($response['data'][0]);

foreach ($response['data'] as $key => $value) {

// $kd_program_studi = $value->kode_program_studi;
// dd($value['kode_program_studi']);
if (DB::table('politeknik_jurusan')->where('kode_jurusan','=', $value['kode_program_studi'])->exists()) {
    DB::table('politeknik_jurusan')
    ->where('kode_jurusan', $value['kode_program_studi'])
    ->update([
    'jenjang' => $value['nama_jenjang_pendidikan'],
     'jurusan' => $value['nama_program_studi'],
     'akreditasi' => $value['status'],
     'id_prodi_feeder' => $value['id_prodi'],
 ]);
}

    else{

    DB::table('politeknik_jurusan')
    ->insert([
    'kode_jurusan'=> $value['kode_program_studi'],
    'jenjang' => $value['nama_jenjang_pendidikan'],
     'jurusan' => $value['nama_program_studi'],
     'akreditasi' => $value['status'],
     'id_prodi_feeder' => $value['id_prodi'],
     'id_politeknik' => "1",
 ]);

    }

}
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
