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
              <h2 class="mb-0">Tambah Data Dosen</h2>
            </div>
          </div>
        </div>

        <hr class="mt">

        <form class="form-input mt-0">
          <div class="form-row">
            <div class="col-12 form-group pr-0 pr-md-1">
              <label for="nid">Nomor Induk Dosen</label>
              <input type="text" class="form-control" id="nid" placeholder="nomor induk dosen">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nama-dosen">Nama Dosen</label>
              <input type="text" class="form-control" id="nama-dosen" placeholder="Nama Dosen">
            </div>
            <div class="col-md-6 form-group">
              <label for="email-dosen">Email</label>
              <input type="email" class="form-control" id="email-dosen" placeholder="Email Dosen">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nomor-telepon">Nomor Telepon</label>
              <input type="text" class="form-control" id="nomor-telepon" placeholder="nomor telepon dosen">
            </div>
            <div class="col-md-6 form-group">
              <label for="tanggal-lahir">Tanggal Lahir</label>
              <input class="form-control" type="date" id="tanggal-lahir">
            </div>
          </div>
          <button type="submit" class="btn--blue w-100 tambahData-btn">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection