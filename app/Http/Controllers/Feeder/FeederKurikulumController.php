<?php

namespace App\Http\Controllers\feeder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class FeederKurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = DB::table('feeder_kurikulums')
           // ->join('politeknik_jurusan', 'politeknik_jurusan.id', '=', 'matakuliah.program_studi')
           // ->join('matakuliah_jenis', 'matakuliah_jenis.nomor', '=', 'matakuliah.matakuliah_jenis')
        ->select('feeder_kurikulums.*')
        ->get();
        // dd($data);
        return view('admin.feeder.feeder-data_kurikulum', [
                "title" => "admin-feeder",
                "data" => $data
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
              $data = new \App\Services\FeederDiktiApiService('GetListKurikulum');
        $data->runWS();
        $response = $data->runWS();
// dd($response['data'][0]);
foreach ($response['data'] as $key => $value) {

// $kd_program_studi = $value->kode_program_studi;
// dd($value['kode_program_studi']);

if (DB::table('feeder_kurikulums')->where('id_kurikulum','=', $value['id_kurikulum'])
    ->exists()) {
    DB::table('feeder_kurikulums')
    ->where('id_kurikulum', $value['id_kurikulum'])
    ->update([
     'kode_kurikulum' => $key + 1,
        'nama_kurikulum' => $value['nama_kurikulum'],
        'kode_jurusan' => $value['nama_program_studi'],
        'kode_thn_ajaran' => $value['id_semester'],
        'jum_sks' => $value['jumlah_sks_lulus'],
        'jum_sks_wajib' => $value['jumlah_sks_wajib'],
        'jum_sks_pilihan' => $value['jumlah_sks_pilihan'],
        'status_kurikulum' => 1,
        'id_kurikulum' => $value['id_kurikulum'],
 ]);
}

    else{

    DB::table('feeder_kurikulums')
    ->insert([
     'kode_kurikulum' => $key + 1,
        'nama_kurikulum' => $value['nama_kurikulum'],
        'kode_jurusan' => $value['nama_program_studi'],
        'kode_thn_ajaran' => $value['id_semester'],
        'jum_sks' => $value['jumlah_sks_lulus'],
        'jum_sks_wajib' => $value['jumlah_sks_wajib'],
        'jum_sks_pilihan' => $value['jumlah_sks_pilihan'],
        'status_kurikulum' => 1,
        'id_kurikulum' => $value['id_kurikulum'],
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
