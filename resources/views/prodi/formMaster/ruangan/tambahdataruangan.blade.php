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
              <h2 class="mb-0">Tambah Data Ruangan</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form class="form-input">
          <div class="form-row">
            <div class="col-12 form-group pr-0 pr-md-1">
              <label for="kode-kelas">Kode Kelas</label>
              <input type="text" class="form-control" id="kode-kelas" placeholder="kode kelas">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nama-ruang">Nama Ruang</label>
              <input type="text" class="form-control" id="nama-ruang" placeholder="Nama Ruang">
            </div>
            <div class="col-md-6 form-group">
              <label for="kapasitas-ruang">Kapasitas</label>
              <input type="email" class="form-control" id="kapasitas-ruang" placeholder="0">
            </div>
          </div>

          <div class="form-row">
            <div class="col-12 form-group pr-0 pr-md-1">
              <label for="keterangan-ruang">Keterangan</label>
              <input type="text" class="form-control" id="keterangan-ruang" placeholder="Keterangan">
            </div>
          </div>
          <button type="submit" class="btn-primary w-100 tambahData-btn">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection