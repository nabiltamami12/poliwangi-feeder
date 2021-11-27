<?php

namespace App\Http\Controllers\feeder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\feeder\SkalaNilai;
use DB;
class FeederSkalaNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('skala_nilais')
        ->select('skala_nilais.*')
        ->get();
        //  $data = DB::table('skala_nilais')->join('politeknik_jurusan', 'politeknik_jurusan.id_prodi_feeder', '=', 'skala_nilais.kode_jurusan')
        // ->select('politeknik_jurusan.jurusan as nm_jrsn','skala_nilais.*')
        // ->get();
        //  $data = DB::table('politeknik_jurusan')->where('id_politeknik = 1')->where('')->join('skala_nilais', 'politeknik_jurusan.id_prodi_feeder', '=', 'skala_nilais.kode_jurusan')
        // ->select('politeknik_jurusan.jurusan as nm_jrsn','skala_nilais.*')
        // ->get();

        // dd($data);
        return view('admin.feeder.feeder-skala_nilai', [
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
        
$data = new \App\Services\FeederDiktiApiService('GetListSkalaNilaiProdi');
$data->runWS();
$response = $data->runWS();





  foreach ($response['data'] as $key => $value) {

// dd($response['data']);

if (DB::table('skala_nilais')->where('kode_jurusan','=', $value['id_prodi'])->exists()) {
    DB::table('skala_nilais')
    ->where('kode_jurusan', $value['id_prodi'])
    ->update([
       'nilai_huruf' => $value['nilai_huruf'],
            'nilai_indeks' => $value['nilai_indeks'],
            'bobot_nilai_min' => $value['bobot_minimum'],
            'bobot_nilai_maks' => $value['bobot_maksimum'],
           'tgl_mulai_efektif' => $value['tanggal_mulai_efektif'],
           'tgl_akhir_efektif' => $value['tanggal_akhir_efektif'],
            'kode_jurusan' => $value['id_prodi'],
            'id_bobot_nilai' => $value['id_bobot_nilai'],
            'nama_program_studi' => $value['nama_program_studi'],

   
 ]);
}

    else{

    DB::table('skala_nilais')
    ->insert([
     'nilai_huruf' => $value['nilai_huruf'],
            'nilai_indeks' => $value['nilai_indeks'],
            'bobot_nilai_min' => $value['bobot_minimum'],
            'bobot_nilai_maks' => $value['bobot_maksimum'],
           'tgl_mulai_efektif' => $value['tanggal_mulai_efektif'],
           'tgl_akhir_efektif' => $value['tanggal_akhir_efektif'],
            'kode_jurusan' => $value['id_prodi'],
            'id_bobot_nilai' => $value['id_bobot_nilai'],
            'nama_program_studi' => $value['nama_program_studi'],

   
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
