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
              <h2 class="mb-0">Tambah Data Program Studi</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form class="form-input">
          <div class="form-row">
            <div class="col-12 form-group pr-0 pr-md-1">
              <label for="nama-program-studi">Nama Program Studi</label>
              <input type="text" class="form-control" id="nama-program-studi" value="Ilmu Kedokteran Gigi Anak">
            </div>
          </div>
          <div class="form-row">
            <div class="col-12 form-group pr-0 pr-md-1">
              <label for="fakultas">Fakultas</label>
              <select class="form-control" id="fakultas">
                <option disabled="disabled">Pilih Fakultas</option>
                <option selected>Fakultas Kedokteran Gigi</option>
                <option>Teknologi Informasi</option>
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100 rounded-sm mt-4">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection