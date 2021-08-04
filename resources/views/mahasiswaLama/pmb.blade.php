@extends('layouts.mainMala')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="pmb">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <form class="form-select">
          <div class="form-row">
            <div class="form-group p-0 m-0 col-12">
              <label for="paketKRS">Pilih Jalur Seleksi </label>
              <select class="form-control" id="paketKRS">
                <option>Jalur Seleksi</option>
                <option>Jalur Seleksi</option>
                <option>Jalur Seleksi</option>
              </select>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow mt-0 padding--big">
        <div class="card-header p-0 m-0 border-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Data Siswa</h2>
            </div>
          </div>
        </div>
        <hr class="mt">
        <form class="form-input">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nama-siswa">Nama</label>
              <input type="text" class="form-control" id="nama-siswa" placeholder="Nama Siswa">
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="asal-sekolah">Asal Sekolah</label>
              <input type="text" class="form-control" id="asal-sekolah" placeholder="Nama Sekolah Asal">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nama-ayah">Nama Ayah</label>
              <input type="text" class="form-control" id="nama-ayah" placeholder="Nama Ayah">
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="nama-ibu">Nama Ibu</label>
              <input type="text" class="form-control" id="nama-ibu" placeholder="Nama Ibu">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="telepon-ortu">Nomor Telepon Orang Tua</label>
              <input type="text" class="form-control" id="telepon-ortu" placeholder="085769124578">
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="tanggal-lahir">Tanggal Lahir</label>
              <input class="form-control" type="date" value="2000-11-23" id="tanggal-lahir">
            </div>
          </div>
          <div class="form-row">
            <div class="col form-group form-image">
              <label for="foto-siswa">Foto Calon Peserta Didik</label>
              <div class="file-input">
                <label for="file-input">
                  <span class="iconify fileUpload-icon" data-icon="bx:bx-image-add" data-inline="true"></span>
                </label>
              </div>
              <input type="file" class="form-control-file" id="file-input">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection