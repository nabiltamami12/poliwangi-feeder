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
              <h2 class="mb-0">Edit Data Fakultas</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form class="form-input">
          <div class="form-row">
            <div class="col-12 form-group pr-0 pr-md-1">
              <label for="nama-fakultas">Nama Fakultas</label>
              <input type="text" class="form-control" id="nama-fakultas" value="Fakultas Kedokteran Gigi">
            </div>
          </div>
          <button type="submit" class="btn-primary w-100 simpanData-btn">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection