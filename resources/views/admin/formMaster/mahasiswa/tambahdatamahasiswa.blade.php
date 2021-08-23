@extends('layouts.mainAdmin')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid" id="tambah_data">
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

        <hr class="my-4">

        <form class="form-input">
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
              <label>Tanggal Lahir</label>
              <div class="d-flex align-items-center date_picker">
                <input id="txtDate" type="text" class="form-control date-input cursor_default" value="23 Jul 2021"
                  readonly />
                <label class="input-group-btn" for="txtDate">
                  <span class="date_button">
                    <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                  </span>
                </label>
              </div>
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
          <button type="submit" class="btn btn-primary w-100 rounded-sm mt-4">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script>
  $(function () {
    $("#txtDate").datepicker({
        format: "dd MM yyyy",
    });
  });
</script>
@endsection