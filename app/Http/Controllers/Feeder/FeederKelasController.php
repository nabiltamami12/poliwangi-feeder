<?php

namespace App\Http\Controllers\feeder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class FeederKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$data =  DB::table('feeder_kelas')->get();

         return view('admin.feeder.feeder-data_kelas', [
                "title" => "admin-feeder",
                'data' => $data,
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
$data_feed_local = DB::table('feeder_kelas')
        ->get();

$update=0;
$tambah=0;
foreach ($data_feed_local as $key => $value) {

// dd($value->id_kurikulum);

if ($value->id_kelas_feeder == null) {
           
            
   // dd("kenek else e");
      $data_con = array(

      "id_kelas_kuliah"         => $value->id_kelas_feeder,
      "id_prodi"             => $value->kode_jurusan,
      "id_semester"          => $value->id_semester,
      "id_matkul"            => $value->id_mk,
      "nama_kelas_kuliah"    => $value->nama_kelas,
      "bahasan"              => $value->bahasan_case,
      "tanggal_mulai_efektif" => $value->tgl_mulai_kelas,
      "tanggal_akhir_efektif" => $value->tgl_selesai_kelas,



      
    );

    // dd("insert");
    $run = new \App\Services\FeederDiktiApiService('InsertKelasKuliah');
    $run->getToken();
    $token = $run->getToken();

    $run->InsertKelas($data_con);
    $response = $run->InsertKelas($data_con);
       
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
      "id_kelas_kuliah"         => $value->id_kelas_feeder,
      "id_prodi"             => $value->kode_jurusan,
      "id_semester"          => $value->id_semester,
      "id_matkul"            => $value->id_mk,
      "nama_kelas_kuliah"    => $value->nama_kelas,
      "bahasan"              => $value->bahasan_case,
      "tanggal_mulai_efektif" => $value->tgl_mulai_kelas,
      "tanggal_akhir_efektif" => $value->tgl_selesai_kelas,

    );
    
    // dd("Ndek update");
    $run = new \App\Services\FeederDiktiApiService('UpdateKelasKuliah');

    $run->getToken();
    $token = $run->getToken();
// dd($token);
    $run->UpdateKelas($data_con);
    $response = $run->UpdateKelas($data_con);

 

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
    {  set_time_limit(600);
        
        $data = new \App\Services\FeederDiktiApiService('GetDetailKelasKuliah');
        $data->runWS();
        $response = $data->runWS();
// dd($response['data'][0]);
foreach ($response['data'] as $key => $value) {
if (DB::table('feeder_kelas')->where('id_kelas_feeder','=', $value['id_kelas_kuliah'])->exists()) {
    DB::table('feeder_kelas')
    ->where('id_kelas_feeder', $value['id_kelas_kuliah'])
    ->update([
            'id_semester' => $value['id_semester'],
            'nama_semester' => $value['nama_semester'],
            'kode_mk' => $value['kode_mata_kuliah'],
            'nama_mk' => $value['nama_mata_kuliah'],
            'nama_kelas' => $value['nama_kelas_kuliah'],
            'kode_jurusan' => $value['id_prodi'],
            'nama_jurusan' => $value['nama_program_studi'],
            'id_kelas_feeder' => $value['id_kelas_kuliah'],
            'kode_ruang' => '1',
            'jam' => '',
            'hari' => '',
            'id_master_kurikulum' => '0',
            'status_error' => '0',
            'keterangan' => '',
            'bahasan_case' => '',
            'tgl_mulai_kelas' => '',
            'tgl_selesai_kelas' => '',
            'keterangan_upload_kelas' => '',
            'sks_mata_kuliah' => $value['sks_mata_kuliah'],
            'id_mk' => $value['id_matkul'],
  

 ]);
}

    else{

    DB::table('feeder_kelas')
    ->insert([
            'id_semester' => $value['id_semester'],
            'nama_semester' => $value['nama_semester'],
            'kode_mk' => $value['kode_mata_kuliah'],
            'nama_mk' => $value['nama_mata_kuliah'],
            'nama_kelas' => $value['nama_kelas_kuliah'],
            'kode_jurusan' => $value['id_prodi'],
            'nama_jurusan' => $value['nama_program_studi'],
            'id_kelas_feeder' => $value['id_kelas_kuliah'],
            'kode_ruang' => '1',
            'jam' => '',
            'hari' => '',
            'id_master_kurikulum' => '0',
            'status_error' => '0',
            'keterangan' => '',
            'bahasan_case' => '',
            'tgl_mulai_kelas' => '',
            'tgl_selesai_kelas' => '',
            'keterangan_upload_kelas' => '',
            'sks_mata_kuliah' => $value['sks_mata_kuliah'],
            'id_mk' => $value['id_matkul'],

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
