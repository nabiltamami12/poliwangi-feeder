@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header padding--medium">
          <div class="row align-items-center">
            <div class="col-12 col-sm-6">
              <h2 class="mb-0 text-center text-sm-left">Jurusan Pilihan</h2>
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-right mt-3 mt-md-0">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
        <hr>

        <form class="form-input padding--medium">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nama-jurusan">Nama Jurusan</label>
              <input type="text" class="form-control" id="nama-jurusan" value="Jurusan Teknik Informatika">
            </div>
            <div class="col-md-6 form-group">
              <label for="kuota">Kuota</label>
              <input type="text" class="form-control" id="kuota" value="130">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nama-jurusan">Nama Jurusan</label>
              <input type="text" class="form-control" id="nama-jurusan" value="Jurusan Teknik Informatika">
            </div>
            <div class="col-md-6 form-group">
              <label for="kuota">Kuota</label>
              <input type="text" class="form-control" id="kuota" value="130">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nama-jurusan">Nama Jurusan</label>
              <input type="text" class="form-control" id="nama-jurusan" value="Jurusan Teknik Informatika">
            </div>
            <div class="col-md-6 form-group">
              <label for="kuota">Kuota</label>
              <input type="text" class="form-control" id="kuota" value="130">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection