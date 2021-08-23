@extends('layouts.mainAdmin')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid" id="tambah_data">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">

        <form class="row padding--medium pb-0">
          <div class="col-12">
            <div class="form-group">
              <label for="nama_dosen">Nama Dosen</label>
              <select class="form-control" id="nama_dosen">
                <option selected disabled">Nama Dosen</option>
                <option>2</option>
                <option>3</option>
              </select>
            </div>
          </div>
        </form>
        <hr class="my-4">
        <form class="padding--medium pt-0">
          <div class="form-row">
            <div class="col-12 col-md-5 pr-md-2">
              <label>Prodi</label>
              <select class="form-control">
                <option selected">D3 Teknik Informatika</option>
                <option>D3 Teknik Informatika</option>
              </select>
            </div>
            <div class="col-12 col-md-5 px-md-2 mt-3 mt-md-0">
              <label>Mata Kuliah</label>
              <select class="form-control">
                <option selected disabled">Pilih Mata Kuliah</option>
                <option>TIK</option>
              </select>
            </div>
            <div class="col-12 col-md-2 pl-md-2">
              <label class="invisible">Hapus</label>
              <button class="btn btn-icon btn-danger d-block w-100" type="button">
                <span class="btn-inner--icon">
                  <i class="iconify-inline" data-icon="bx:bx-trash"></i>
                </span>
                <span class="btn-inner--text">Hapus</span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection