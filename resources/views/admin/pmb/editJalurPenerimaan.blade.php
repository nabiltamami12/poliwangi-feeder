@extends('layouts.mainAdmin')

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
              <h2 class="mb-0 text-center text-sm-left">Jalur Penerimaan PMB</h2>
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-right mt-3 mt-md-0">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
        <hr>

        <form class="form-input padding--medium ">
          <div class="keterangan_jalur">
            <h1 class="d-inline mr-4">Nama: </h1>
            <span class="badge badge-primary">Jalur Mandiri</span>
          </div>
          <hr class="mt-4 mb-3">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="biaya-pendaftaran">Biaya Pendaftaran</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp.</div>
                </div>
                <input type="text" class="form-control text-right pr-4" id="biaya-pendaftaran" placeholder="Rp."
                  value="250.000">
              </div>
            </div>
            <div class="col-md-6 form-group">
              <label for="kuota">Kuota</label>
              <input type="text" class="form-control text-center" id="kuota" value="200">
            </div>
          </div>

          <div class="keterangan_jalur mt-4">
            <h1 class="d-inline mr-4">Nama: </h1>
            <span class="badge badge-primary">Jalur Prestasi</span>
          </div>
          <hr class="mt-4 mb-3">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="biaya-pendaftaran">Biaya Pendaftaran</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp.</div>
                </div>
                <input type="text" class="form-control text-right pr-4" id="biaya-pendaftaran" placeholder="Rp."
                  value="150.000">
              </div>
            </div>
            <div class="col-md-6 form-group">
              <label for="kuota">Kuota</label>
              <input type="text" class="form-control text-center" id="kuota" value="100">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection