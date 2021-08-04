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
              <h2 class="mb-0">Edit Data Kelas</h2>
            </div>
          </div>
        </div>

        <hr class="mt">

        <form class="form-input mt-0">
          <div class="form-row">
            <div class="col-12 form-group pr-0 pr-md-1">
              <label for="kode-kelas">Kode Kelas</label>
              <input type="text" class="form-control" id="kode-kelas" value="KGA001">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nama-kelas">Nama Kelas</label>
              <input type="text" class="form-control" id="nama-kelas" value="Ilmu Gigi Anak ">
            </div>
            <div class="col-md-6 form-group">
              <label for="kapasitas-kelas">Kapasitas</label>
              <input type="email" class="form-control" id="kapasitas-kelas" value="40">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="semester">Semester</label>
              <select class="form-control" id="semester">
                <option disabled="disabled">Semester</option>
                <option>1</option>
                <option selected>2</option>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label for="program-studi">Program Studi</label>
              <select class="form-control" id="program-studi">
                <option disabled="disabled">Program Studi</option>
                <option selected>Ilmu kedokteran gigi anak</option>
                <option>Teknik Informatika</option>
              </select>
            </div>
          </div>
          <button type="submit" class="btn--blue w-100 simpanData-btn">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection