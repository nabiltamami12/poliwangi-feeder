<?php

namespace App\Http\Controllers\feeder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class FeederDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('dosens')
        ->get();
         return view('admin.feeder.feeder-data_dosen', [
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
           
        

$data = new \App\Services\FeederDiktiApiService('GetListDosen');
$data->runWS();
$response = $data->runWS();
  


foreach ($response['data'] as $key => $value) {

if (DB::table('dosens')->where('id_dosen_feeder','=', $value['id_dosen'])->exists()) {
    DB::table('dosens')
    ->where('id_dosen_feeder', $value['id_dosen'])
    ->update([
            'nip' => $value['nip'],
            'nidn' => $value['nidn'],
            'nama_dosen' => $value['nama_dosen'],
            'kelamin' => $value['jenis_kelamin'],
            'agama' => $value['nama_agama'],
            'tmpt_lahir' => '',
            'tgl_lahir' => 'tanggal_lahir',
            'id_status_dosen' => 'nama_status_aktif',
            'email' => '',
            'telp' => '',
            'alamat' => '',
            'foto_dosen' => '',
            'id_dosen_feeder' => $value['id_dosen'],
 ]);
}

    else{

    DB::table('dosens')
    ->insert([
            'nip' => $value['nip'],
            'nidn' => $value['nidn'],
            'nama_dosen' => $value['nama_dosen'],
            'kelamin' => $value['jenis_kelamin'],
            'agama' => $value['nama_agama'],
            'tmpt_lahir' => '',
            'tgl_lahir' => 'tanggal_lahir',
            'id_status_dosen' => 'nama_status_aktif',
            'email' => '',
            'telp' => '',
            'alamat' => '',
            'foto_dosen' => '',
            'id_dosen_feeder' => $value['id_dosen'],
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
