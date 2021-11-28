<?php

namespace App\Http\Controllers\feeder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class FeederAKMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $data = DB::table('feeder_akms')
        ->get();
        return view('admin.feeder.feeder-data_akm', [
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
          $data = new \App\Services\FeederDiktiApiService('GetListPerkuliahanMahasiswa');
$data->runWS();
$response = $data->runWS();


// dd($response['data']);

foreach ($response['data'] as $key => $value) {

 // "id_registrasi_mahasiswa" => "631a2033-6950-47e4-b2a0-b291645f4d1a"
 //    "nim" => "361741311044"
 //    "nama_mahasiswa" => "IKE LUTFI NURHAVIVA"
 //    "id_prodi" => "c5de86f9-c6b4-4740-961b-32da3b1c003a"
 //    "nama_program_studi" => "D4 Agribisnis"
 //    "angkatan" => "2017"
 //    "id_periode_masuk" => "20171"
 //    "id_semester" => "20172"
 //    "nama_semester" => "2017/2018 Genap"
 //    "id_status_mahasiswa" => "A"
 //    "nama_status_mahasiswa" => "Aktif"
 //    "ips" => "3.72"
 //    "ipk" => "3.78"
 //    "sks_semester" => "23"
 //    "sks_total" => "45"
 //    "biaya_kuliah_smt" => null


// $kd_program_studi = $value->kode_program_studi;
if (DB::table('feeder_akms')->where('nim','=', $value['nim'])->exists()) {
    DB::table('feeder_akms')
    ->where('nim', $value['nim'])
    ->update([
         'id_registrasi_mahasiswa' => $value['id_registrasi_mahasiswa'],
           'semester' => $value['nama_semester'],
            'nim' => $value['nim'],
            'nama' => $value['nama_mahasiswa'],
            'ips' => $value['ips'],
            'ipk' => $value['ipk'],
            'sks_smt' => $value['sks_semester'],
            'sks_total' => $value['sks_total'],
            'kode_jurusan' => $value['id_prodi'],
            'status_kuliah' => $value['nama_status_mahasiswa'],
            'status_error' => '0',
            'valid' => '0',
            'keterangan' => '0',


 ]);
}

    else{

    DB::table('feeder_akms')
    ->insert([
       'id_registrasi_mahasiswa' => $value['id_registrasi_mahasiswa'],
         'semester' => $value['nama_semester'],
            'nim' => $value['nim'],
            'nama' => $value['nama_mahasiswa'],
            'ips' => $value['ips'],
            'ipk' => $value['ipk'],
            'sks_smt' => $value['sks_semester'],
            'sks_total' => $value['sks_total'],
            'kode_jurusan' => $value['id_prodi'],
            'status_kuliah' => $value['nama_status_mahasiswa'],
            'status_error' => '0',
            'valid' => '0',
            'keterangan' => '0',


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
