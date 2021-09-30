@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">
        <form class="row padding--medium pb-0">
          <div class="col-12">
            <div class="form-group">
              <label for="kelas">Kelas</label>
              <input type="text" class="form-control" id="kelas" placeholder="RPL1">
            </div>
          </div>
        </form>
        <hr class="my-4">
        <form class="padding--medium pt-0">
          <div class="form-row">
            <div class="col-md-10">
              <div class="form-row">
                <div class="form-group col-sm-4 pr-sm-2">
                  <label>Prodi</label>
                  <select class="form-control">
                    <option selected">D3 Teknik Informatika</option>
                    <option>D3 Teknik Informatika</option>
                  </select>
                </div>
                <div class="form-group col-sm-4 px-sm-2 mt-3 mt-sm-0">
                  <label>Nama Dosen</label>
                  <select class="form-control">
                    <option selected">D3 Teknik Informatika</option>
                    <option>D3 Teknik Informatika</option>
                  </select>
                </div>
                <div class="form-group col-sm-4 px-sm-2 mt-3 mt-sm-0">
                  <label>Mata Kuliah</label>
                  <select class="form-control">
                    <option selected disabled">Pilih Mata Kuliah</option>
                    <option>TIK</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-2 pl-md-2">
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