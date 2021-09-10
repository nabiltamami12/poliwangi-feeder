@extends('layouts.mainAdmin')

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
              <h2 class="mb-0">Tambah Data Kelas</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form class="form-input">
          <div class="form-row">
            <div class="col-12 form-group pr-0 pr-md-1">
              <label for="kode-kelas">Kode Kelas</label>
              <input type="text" class="form-control" id="kode-kelas" placeholder="kode">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nama-kelas">Nama Kelas</label>
              <input type="text" class="form-control" id="nama-kelas" placeholder="Nama Kelas">
            </div>
            <div class="col-md-6 form-group">
              <label for="kapasitas-kelas">Kapasitas</label>
              <input type="email" class="form-control" id="kapasitas-kelas" placeholder="0">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="semester">Semester</label>
              <select class="form-control" id="semester">
                <option selected="true" disabled="disabled">Semester</option>
                <option>Semester 1</option>
                <option>Semester 2</option>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label for="program-studi">Program Studi</label>
              <select class="form-control" id="program-studi">
                <option selected="true" disabled="disabled">Program Studi</option>
                <option>Teknik Mesin</option>
                <option>Teknik Informatika</option>
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100 rounded-sm mt-4">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection