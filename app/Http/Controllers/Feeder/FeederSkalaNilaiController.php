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
public function UploadFeeder(Request $request)
    {

        set_time_limit(600);

// $data_feed_local = DB::table('feeder_mk_kurikulums')->get();
$data_feed_local = DB::table('skala_nilais')
        ->get();

$update=0;
$tambah=0;
foreach ($data_feed_local as $key => $value) {

// dd($value->id_kurikulum);

if ($value->id_bobot_nilai == null) {
           
            
   // dd("kenek else e");
      $data_con = array(

      "id_bobot_nilai"          => $value->id_bobot_nilai,     
        "id_prodi"              => $value->kode_jurusan,
        "nilai_huruf"           => $value->nilai_huruf,
        "nilai_indeks"          => $value->nilai_indeks,
        "bobot_minimum"         => $value->bobot_nilai_min,
        "bobot_maksimum"        => $value->bobot_nilai_maks,
        "tanggal_mulai_efektif" => $value->tgl_mulai_efektif,
        "tanggal_akhir_efektif" => $value->tgl_akhir_efektif, 

    
    );

    // dd("insert");
    $run = new \App\Services\FeederDiktiApiService('InsertSkalaNilaiProdi');
    $run->getToken();
    $token = $run->getToken();

    $run->InsertSkalaNilai($data_con);
    $response = $run->InsertSkalaNilai($data_con);
       
    if ($response) {
                   echo "Sukses Insert";

    }
    else{
        echo "gagal insert";
    }



}
  
    else{
    
    // $key = $value->id_kurikulum;
    $data_con = array(
       "id_bobot_nilai"          => $value->id_bobot_nilai,     
        "id_prodi"              => $value->kode_jurusan,
        "nilai_huruf"           => $value->nilai_huruf,
        "nilai_indeks"          => $value->nilai_indeks,
        "bobot_minimum"         => $value->bobot_nilai_min,
        "bobot_maksimum"        => $value->bobot_nilai_maks,
        "tanggal_mulai_efektif" => $value->tgl_mulai_efektif,
        "tanggal_akhir_efektif" => $value->tgl_akhir_efektif, 

    );
    
    // dd("Ndek update");
    $run = new \App\Services\FeederDiktiApiService('UpdateSkalaNilaiProdi');

    $run->getToken();
    $token = $run->getToken();
// dd($token);
    $run->UpdateSkalaNilai($data_con);
    $response = $run->UpdateSkalaNilai($data_con);

 

    if ($response) {
            echo "Sukses Update";
    }
    else{
        echo "gagal update";
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
