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
              <h2 class="mb-0">Tambah Data Jurusan</h2>
            </div>
          </div>
        </div>

        <hr class="mt">

        <form class="form-input mt-0">
          <div class="form-row">
            <div class="col-12 form-group pr-0 pr-md-1">
              <label for="nama-jurusan">Nama Jurusan</label>
              <input type="text" class="form-control" id="nama-jurusan" placeholder="Jurusan">
            </div>
          </div>

          <div class="form-row">
            <div class="col-12 form-group pr-0 pr-md-1">
              <label for="fakultas">Fakultas</label>
              <select class="form-control" id="fakultas">
                <option selected="true" disabled="disabled">Pilih Fakultas</option>
                <option>Teknologi Informasi</option>
                <option>Teknologi Informasi</option>
              </select>
            </div>
          </div>
          <button type="submit" class="btn--blue w-100 tambahData-btn">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection