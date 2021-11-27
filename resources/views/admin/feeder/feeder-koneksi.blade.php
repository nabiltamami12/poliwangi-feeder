@extends('layouts.main')
@section('content')

<?php

use App\Models\feeder\feeder_koneksi as fd;




$data_config = fd::all();
$token_id = fd::first();

    // dd( $response['data']);




    # dd($token['data']['token']);

if(isset($_POST["konek"]))
{

$data = new \App\Services\FeederDiktiApiService("GetProfilPT");
$data->runWS();
$response = $data->runWS();
$token = $data->getToken();
$token = $token['data']['token'];
$id = $response['data'][0]['id_perguruan_tinggi'];

              $username =  $_POST["username"];
              $password = $_POST["password"];
              $url = $_POST["url"];
              $port =  $_POST["port"];

  if (fd::all()->count() > 0 ){

      fd::where('id',$token_id->id)->update([
            'username' => $_POST["username"],
            'password' => $_POST["password"],
            'url' => $_POST["url"],
            'port' => $_POST["port"],
            'kode_pt' => $_POST["kodept"],
            'id_pt' => $_POST["id"],
            'token' => $token,
 
        ]);

  }
    
  else{
        
        foreach($response['data']  as $key => $value)   {

           fd::create([
                'username' => $username,
                'password' => $password,
                'url' => $url,
                'port' => $port,
                'kode_pt' => $value["kode_perguruan_tinggi"],
                'id_pt' => $value["id_perguruan_tinggi"],
                'token' => $token,
         
                ]);
    }
  }
}

?>
<!-- Header -->
<header class="header"></header>

<div id="loading"></div>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">

        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">
              @forelse($data_config as $key => $data_cek)
              @php
              $token = $data_cek['id_pt'];
              @endphp
              @if($token == null)
              <div class="callout callout-danger">
              <h4>STATUS FEEDER : BELUM TERKONEKSI</h4>
              </div>
              @else
              <div class="callout callout-success">
              <h4>STATUS FEEDER : TERKONEKSI</h4>
              </div>
              @endif
              @empty
              <div class="callout callout-danger">
              <h4>STATUS FEEDER : BELUM TERKONEKSI</h4>
              </div>
              @endforelse
  </h2>
            </div>
        <!--     <div class="col text-right">
              <button type="button" onclick="add_btn()" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-plus-circle'></i> Tambah</button>
            </div> -->
          </div>
        </div>
        <hr class="mt">
        <div class="table-responsive">
  
            <div class="box box-primary">


              <form role="form" action="" method="POST">
              @csrf
                @if (fd::all()->count() > 0)
              
                @foreach($data_config as $key => $value) 
                <div class="box-body">

                  <div class="form-group">
                    <label>ID Perguruan Tinggi</label>
                    <input type="text" name="id" value="<?php echo $value['id_pt']; ?>" class="form-control" readonly autofocus>
                  </div>
                  <div class="form-group">
                    <label>Username Feeder</label>
                    <input type="text" name="username" value="<?php echo  $value['username']; ?>" class="form-control" autofocus required>
                  </div>
                  <div class="form-group">
                    <label>Password Feeder</label>
                    <input type="text" name="password" value="<?php echo $value['password']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>URL Feeder</label>
                    <input type="text" name="url" value="<?php echo $value['url']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>PORT</label>
                    <input type="text" name="port" value="<?php echo $value['port'] ; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Kode Perguruan Tinggi</label>
                    <input type="text" name="kodept" value="<?php echo $value['kode_pt'] ; ?>" class="form-control" required>
                  </div>
                </div>
               
                @endforeach
                @else
                <div class="box-body">
                  <div class="form-group">
                    <label>ID Perguruan Tinggi</label>
                    <input type="text" name="id" value="<?php echo $id; ?>" class="form-control" readonly autofocus>
                  </div>
                  <div class="form-group">
                    <label>Username Feeder</label>
                    <input type="text" name="username" value="" class="form-control" autofocus required>
                  </div>
                  <div class="form-group">
                    <label>Password Feeder</label>
                    <input type="text" name="password" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>URL Feeder</label>
                    <input type="text" name="url" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>PORT</label>
                    <input type="text" name="port" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Kode Perguruan Tinggi</label>
                    <input type="text" name="kodept" value="" class="form-control" required>
                  </div>
                </div>
                @endif
                <div class="box-footer pt-5 ml-4">
                  <button type="submit" name="konek" class="btn btn-danger"><i class="fa fa-retweet"></i> UPDATE KONEKSI</button>
                </div>
          
        </div>
      </div>
    </div>
  </div>
@endsection
