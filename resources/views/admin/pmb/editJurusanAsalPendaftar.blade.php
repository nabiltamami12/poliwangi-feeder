@extends('layouts.mainAdmin')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header padding--medium m-0 border-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Jurusan Asal Pendaftar</h2>
            </div>
            <div class="col text-right">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>

        <hr>

        <form class="form-input padding--medium">
          <div class="form-row">
            <div class="col">
              <label for="nama-jurusan">Nama Jurusan</label>
              <input type="text" class="form-control" id="nama-jurusan" value="Ilmu Pengetahuan Alam">
            </div>
          </div>

          <div class="form-row">
            <div class="col">
              <label for="nama-jurusan">Nama Jurusan</label>
              <input type="text" class="form-control" id="nama-jurusan" value="Ilmu Pengetahuan Sosial">
            </div>
          </div>

          <div class="form-row">
            <div class="col">
              <label for="nama-jurusan">Nama Jurusan</label>
              <input type="text" class="form-control" id="nama-jurusan" value="Bahasa">
            </div>
          </div>

          <div class="form-row">
            <div class="col">
              <label for="nama-jurusan">Nama Jurusan</label>
              <input type="text" class="form-control" id="nama-jurusan" value="Teknik Komputer dan Jaringan">
            </div>
          </div>

          <div class="form-row">
            <div class="col">
              <label for="nama-jurusan">Nama Jurusan</label>
              <input type="text" class="form-control" id="nama-jurusan" value="Rekayasa Perangkat Lunak">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection