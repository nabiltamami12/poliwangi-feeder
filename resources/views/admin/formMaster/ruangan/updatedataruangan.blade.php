@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Edit Data Ruangan</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form class="form-input">
          <div class="form-row">
            <div class="col-12 form-group pr-0 pr-md-1">
              <label for="kode-kelas">Kode Kelas</label>
              <input type="text" class="form-control" id="kode-kelas" value="RKB001">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nama-ruang">Nama Ruang</label>
              <input type="text" class="form-control" id="nama-ruang" value="Ruang" 1>
            </div>
            <div class="col-md-6 form-group">
              <label for="kapasitas-ruang">Kapasitas</label>
              <input type="email" class="form-control" id="kapasitas-ruang" value="100">
            </div>
          </div>

          <div class="form-row">
            <div class="col-12 form-group pr-0 pr-md-1">
              <label for="keterangan-ruang">Keterangan</label>
              <input type="text" class="form-control" id="keterangan-ruang" value="Kelas besar">
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100 rounded-sm mt-4">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection