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
              <h2 class="mb-0">Tambah Data Jam Kuliah</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form class="form-input">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="hari">Hari</label>
              <select class="form-control" id="hari">
                <option selected="true" disabled="disabled">Pilih Hari</option>
                <option>Senin</option>
                <option>Selasa</option>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label for="jumlah-jam-kuliah">Jumlah Jam Kuliah</label>
              <select class="form-control" id="jumlah-jam-kuliah">
                <option selected>0</option>
                <option>1</option>
                <option>2</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="jam-mulai-kuliah">Jam Dimulai</label>
              <input type="text" class="form-control" id="jam-mulai-kuliah" placeholder="00:00">
            </div>
            <div class="col-md-6 form-group">
              <label for="jam-akhir-kuliah">Jam Berakhir</label>
              <input type="text" class="form-control" id="jam-akhir-kuliah" placeholder="00:00">
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100 rounded-sm mt-4">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection