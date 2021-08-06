@extends('layouts.mainProdi')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__prodi container-fluid" id="tambah_data">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0 m-0 border-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Tambah Data Mahasiswa</h2>
            </div>
          </div>
        </div>

        <hr class="mt">

        <form class="form-input mt-0">
          <div class="form-row">
            <div class="col-12 form-group pr-0 pr-md-1">
              <label for="nim">Nomor Induk Mahasiswa</label>
              <input type="text" class="form-control" id="nim" placeholder="4592920134">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nama-mahasiswa">Nama Mahasiswa</label>
              <input type="text" class="form-control" id="nama-mahasiswa" placeholder="Nama Mahasiswa">
            </div>
            <div class="col-md-6 form-group">
              <label for="email-mahasiswa">Email</label>
              <input type="email" class="form-control" id="email-mahasiswa" placeholder="Email Mahasiswa">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="tempat-lahir">Tempat Lahir</label>
              <input type="text" class="form-control" id="tempat-lahir" placeholder="Tempat Lahir">
            </div>
            <div class="col-md-6 form-group">
              <label for="tanggal-lahir">Tanggal Lahir</label>
              <input class="form-control" type="date" value="2021-07-13" id="tanggal-lahir">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nomor-telepon">Nomor Telepon</label>
              <input type="text" class="form-control" id="nomor-telepon" placeholder="Nomor Telepon">
            </div>
            <div class="col-md-6 form-group">
              <label for="fakultas">Fakultas</label>
              <select class="form-control" id="fakultas">
                <option selected="true" disabled="disabled">Fakultas</option>
                <option>Teknologi Informasi</option>
                <option>Teknologi Informasi</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="program-studi">Program Studi</label>
              <select class="form-control" id="program-studi">
                <option selected>Program Studi</option>
                <option>Teknik Informatika</option>
                <option>Teknik Informatika</option>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label for="angkatan">Angkatan</label>
              <input type="text" class="form-control" id="angkatan" placeholder="-">
            </div>
          </div>
          <button type="submit" class="btn--blue w-100 tambahData-btn">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection