@extends('layouts.mainProdi')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__prodi container-fluid" id="update_data">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0 m-0 border-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Edit Data Mahasiswa</h2>
            </div>
          </div>
        </div>

        <hr class="mt">

        <form class="form-input mt-0">
          <div class="form-row">
            <div class="col-12 form-group pr-0 pr-md-1">
              <label for="nim">Nomor Induk Mahasiswa</label>
              <input type="text" class="form-control" id="nim" value="4592920134">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nama-mahasiswa">Nama Mahasiswa</label>
              <input type="text" class="form-control" id="nama-mahasiswa" value="Jessica Wijaya">
            </div>
            <div class="col-md-6 form-group">
              <label for="email-mahasiswa">Email</label>
              <input type="email" class="form-control" id="email-mahasiswa" value="JessicaWijaya@gmail.com ">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="tempat-lahir">Tempat Lahir</label>
              <input type="text" class="form-control" id="tempat-lahir" value="Kota Banyuwangi">
            </div>
            <div class="col-md-6 form-group">
              <label for="tanggal-lahir">Tanggal Lahir</label>
              <input class="form-control" type="date" value="2021-07-13" id="tanggal-lahir">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nomor-telepon">Nomor Telepon</label>
              <input type="text" class="form-control" id="nomor-telepon" value="081276483729">
            </div>
            <div class="col-md-6 form-group">
              <label for="fakultas">Fakultas</label>
              <select class="form-control" id="fakultas">
                <option selected>kedokteran gigi</option>
                <option>Teknologi Informasi</option>
                <option>Teknologi Informasi</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="program-studi">Program Studi</label>
              <select class="form-control" id="program-studi">
                <option selected>Ilmu kedokteran gigi anak</option>
                <option>Teknik Informatika</option>
                <option>Teknik Informatika</option>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label for="angkatan">Angkatan</label>
              <input type="text" class="form-control" id="angkatan" value="2018">
            </div>
          </div>
          <button type="submit" class="btn--blue w-100 simpanData-btn">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection