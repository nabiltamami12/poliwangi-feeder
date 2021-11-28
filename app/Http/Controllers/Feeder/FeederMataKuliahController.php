<?php

namespace App\Http\Controllers\feeder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class FeederMataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $data = DB::table('feeder_mata_kuliahs')
        //    ->join('politeknik_jurusan', 'politeknik_jurusan.id', '=', 'matakuliah.program_studi')
        //    ->join('matakuliah_jenis', 'matakuliah_jenis.nomor', '=', 'matakuliah.matakuliah_jenis')
        // ->select('matakuliah_jenis.matakuliah_jenis as jenis_mk','politeknik_jurusan.jurusan as nm_jrsn','matakuliah.*')
        ->get();
        return view('admin.feeder.feeder-data_mata_kuliah', [
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
  public function UploadFeeder(Request $request)
    {

        set_time_limit(600);

$data_feed_local = DB::table('feeder_mata_kuliahs')->get();

$update=0;
$tambah=0;
foreach ($data_feed_local as $key => $value) {

if ($value->id_mk != null) {
    $key = $value->id_mk;
    $data_con = array(
      'nama_mata_kuliah'=> $value->nama_mk,
      'id_jenis_mata_kuliah'=> $value->jenis_mata_kuliah,
      'sks_mata_kuliah'=> $value->bobot_mk,
      'sks_tatap_muka'=> $value->bobot_tatap_muka,
      'sks_praktek'=> $value->bobot_pratikum,
      'sks_praktek_lapangan'=> $value->bobot_praktek_lapangan,
      'sks_simulasi'=> $value->bobot_simulasi,
      'id_matkul'=> $value->id_mk,
      'kode_mata_kuliah'=> $value->kode_mk,
      'nama_program_studi'=> $value->prodi_mk,
      'tanggal_mulai_efektif'=> "",
      'tanggal_akhir_efektif'=> "",      
    );
    
    $run = new \App\Services\FeederDiktiApiService('UpdateMataKuliah');

    $run->getToken();
    $token = $run->getToken();

    $run->UpdateMataKuliah($data_con);
    $response = $run->UpdateMataKuliah($data_con);
    if ($response) {
            echo "Sukses Update";
    }
    else{
        echo "gagal update";
    }

}

    else{
        // dd("kenek else e");
      $data_con = array(
     'nama_mata_kuliah'=> $value->nama_mk,
      'id_jenis_mata_kuliah'=> $value->jenis_mata_kuliah,
      'sks_mata_kuliah'=> $value->bobot_mk,
      'sks_tatap_muka'=> $value->bobot_tatap_muka,
      'sks_praktek'=> $value->bobot_pratikum,
      'sks_praktek_lapangan'=> $value->bobot_praktek_lapangan,
      'sks_simulasi'=> $value->bobot_simulasi,
      'id_matkul'=> $value->id_mk,
      'kode_mata_kuliah'=> $value->kode_mk,
      'nama_program_studi'=> $value->prodi_mk,
      'tanggal_mulai_efektif'=> "",
      'tanggal_akhir_efektif'=> "",      
    );

    // dd($data_con);
    $run = new \App\Services\FeederDiktiApiService('InsertMataKuliah');
    $run->getToken();
    $token = $run->getToken();

    $run->InsertMataKuliah($data_con);
    $response = $run->InsertMataKuliah($data_con);
    if ($response) {
                   echo "Sukses Insert";

    }
    else{
        echo "gagal insert";
    }
    }

}

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        set_time_limit(600);
        
        $data = new \App\Services\FeederDiktiApiService('GetDetailMataKuliah');
        $data->runWS();
        $response = $data->runWS();
// dd($response['data'][0]);
foreach ($response['data'] as $key => $value) {
if (DB::table('feeder_mata_kuliahs')->where('id_mk','=', $value['id_matkul'])->exists()) {
    DB::table('feeder_mata_kuliahs')
    ->where('id_mk', $value['id_matkul'])
    ->update([
          'nama_mk'=> $value['nama_mata_kuliah'],
          'jenis_mata_kuliah'=> $value['id_jenis_mata_kuliah'],
          'bobot_mk'=> $value['sks_mata_kuliah'],
          'bobot_tatap_muka'=> $value['sks_tatap_muka'],
          'bobot_pratikum'=> $value['sks_praktek'],
          'bobot_praktek_lapangan'=> $value['sks_praktek_lapangan'],
          'bobot_simulasi'=> $value['sks_simulasi'],
          'id_mk'=> $value['id_matkul'],
          'kode_mk'=> $value['kode_mata_kuliah'],
          'prodi_mk'=> $value['nama_program_studi'],
  

 ]);
}

    else{

    DB::table('feeder_mata_kuliahs')
    ->insert([
           'nama_mk'=> $value['nama_mata_kuliah'],
          'jenis_mata_kuliah'=> $value['id_jenis_mata_kuliah'],
          'bobot_mk'=> $value['sks_mata_kuliah'],
          'bobot_tatap_muka'=> $value['sks_tatap_muka'],
          'bobot_pratikum'=> $value['sks_praktek'],
          'bobot_praktek_lapangan'=> $value['sks_praktek_lapangan'],
          'bobot_simulasi'=> $value['sks_simulasi'],
          'id_mk'=> $value['id_matkul'],
          'kode_mk'=> $value['kode_mata_kuliah'],
          'prodi_mk'=> $value['nama_program_studi'],
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
