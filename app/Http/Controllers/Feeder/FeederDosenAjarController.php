<?php

namespace App\Http\Controllers\feeder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
class FeederDosenAjarController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('dosen_ajars')
        ->join('politeknik_jurusan', 'politeknik_jurusan.id_prodi_feeder', '=', 'dosen_ajars.kode_jurusan')
           ->join('feeder_kelas','feeder_kelas.id_kelas_feeder' ,'=', 'dosen_ajars.id_kelas')
        ->get();
        return view('admin.feeder.feeder-data_dosen_ajar', [
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
$data_feed_local = DB::table('dosen_ajars')
        ->get();

$update=0;
$tambah=0;
foreach ($data_feed_local as $key => $value) {

// dd($value->id_kurikulum);

if ($value->id_aktivitas_mengajar == null) {
    

           
            
   // dd("kenek else e");
      $data_con = array(

        "id_registrasi_dosen"  => $value->id_registrasi_dosen,
        "id_kelas_kuliah"      => $value->id_kelas,
        "id_substansi"         => $value->id_substansi,
        "sks_substansi_total"  => $value->sks_ajar,
        "rencana_tatap_muka"   => $value->rencana_tatap_muka,
        "realisasi_tatap_muka" => $value->tatap_muka_real,
        "id_jenis_evaluasi"    => $value->id_jenis_evaluasi,
        "id_aktivitas_mengajar"    => $value->id_aktivitas_mengajar,



      
    );

    // dd("insert");
    $run = new \App\Services\FeederDiktiApiService('InsertDosenPengajarKelasKuliah');
    $run->getToken();
    $token = $run->getToken();

    $run->InsertDosenAjar($data_con);
    $response = $run->InsertDosenAjar($data_con);
       
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

        "id_registrasi_dosen"  => $value->id_registrasi_dosen,
        "id_kelas_kuliah"      => $value->id_kelas,
        "id_substansi"         => $value->id_substansi,
        "sks_substansi_total"  => $value->sks_ajar,
        "rencana_tatap_muka"   => $value->rencana_tatap_muka,
        "realisasi_tatap_muka" => $value->tatap_muka_real,
        "id_jenis_evaluasi"    => $value->id_jenis_evaluasi,
        "id_aktivitas_mengajar"    => $value->id_aktivitas_mengajar,

    );
    
    // dd("Ndek update");
    $run = new \App\Services\FeederDiktiApiService('UpdateDosenPengajarKelasKuliah');

    $run->getToken();
    $token = $run->getToken();
// dd($token);
    $run->UpdateDosenAjar($data_con);
    $response = $run->UpdateDosenAjar($data_con);

 

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
  $data = new \App\Services\FeederDiktiApiService('GetDosenPengajarKelasKuliah');
$data->runWS();
$response = $data->runWS();

        set_time_limit(100);
 
// dd($response['data']);

// $value_kelas =  DB::table('feeder_kelas')->where('id_kelas_feeder', $value['id_kelas_kuliah'])->first();

        
         if ( DB::table('dosen_ajars')->get()->count() >= 1 ){

  foreach ($response['data'] as $key => $value) {

         DB::table('dosen_ajars')
    ->where('id_aktivitas_mengajar', $value['id_aktivitas_mengajar'])
    ->where('id_kelas', $value['id_kelas_kuliah'])
    ->where('semester', $value['id_semester'])
    ->update([

            'semester' => $value['id_semester'],
            'nidn' => $value['nidn'],
            'nama_dosen' => $value['nama_dosen'],
            'id_jenis_evaluasi' => $value['id_jenis_evaluasi'],
            'id_registrasi_dosen' => $value['id_registrasi_dosen'],
            'id_kelas' => $value['id_kelas_kuliah'],
            'rencana_tatap_muka' => $value['rencana_minggu_pertemuan'],
            'tatap_muka_real' => $value['realisasi_minggu_pertemuan'],
            'kode_jurusan' => $value['id_prodi'],
            'sks_ajar' => $value['sks_substansi_total'],
            'status_error' => '1',
            'keterangan' => '0',
            'id_aktivitas_mengajar' => $value['id_aktivitas_mengajar'],
            'id_substansi' => $value['id_substansi'],
          ]);



        
      }
    }
    else{
 

  foreach ($response['data'] as $key => $value) {

       DB::table('dosen_ajars')
    ->where('id_kelas', $value['id_kelas_kuliah'])
    ->where('semester', $value['id_semester'])
    ->insert([
            'semester' => $value['id_semester'],
            'nidn' => $value['nidn'],
            'nama_dosen' => $value['nama_dosen'],
            'id_jenis_evaluasi' => $value['id_jenis_evaluasi'],
            'id_registrasi_dosen' => $value['id_registrasi_dosen'],
            'id_kelas' => $value['id_kelas_kuliah'],
            'rencana_tatap_muka' => $value['rencana_minggu_pertemuan'],
            'tatap_muka_real' => $value['realisasi_minggu_pertemuan'],
            'kode_jurusan' => $value['id_prodi'],
            'sks_ajar' => $value['sks_substansi_total'],
            'status_error' => '1',
            'keterangan' => '0',
            'id_aktivitas_mengajar' => $value['id_aktivitas_mengajar'],
            'id_substansi' => $value['id_substansi'],

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
