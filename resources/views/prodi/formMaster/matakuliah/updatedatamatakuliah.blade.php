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
              <h2 class="mb-0">Edit Data Mata Kuliah</h2>
            </div>
          </div>
        </div>

        <hr class="mt">

        <form class="form-input mt-0">
          <div class="form-row">
            <div class="col-12 form-group pr-0 pr-md-1">
              <label for="kode-matkul">Kode Mata Kuliah</label>
              <input type="text" class="form-control" id="kode-matkul" value="ENG001">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nama-matkul">Nama Mata Kuliah</label>
              <input type="text" class="form-control" id="nama-matkul" value="Bahasa Inggris">
            </div>
            <div class="col-md-6 form-group">
              <label for="kurikulum">Kurikulum</label>
              <input type="email" class="form-control" id="kurikulum" value="Kurikulum Percobaan">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="semester">Semester</label>
              <select class="form-control" id="semester">
                <option>Semester 1</option>
                <option selected>Semester 2</option>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label for="jumlah-skst">Jumlah SKS-T</label>
              <input type="text" class="form-control" id="jumlah-skst" value="4">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="jumlah-sksp">Jumlah SKS-P</label>
              <input type="text" class="form-control" id="jumlah-sksp" value="2">
            </div>
            <div class="col-md-6 form-group">
              <label for="jumlah-sksl">Jumlah SKS-L</label>
              <select class="form-control" id="jumlah-sksl">
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option selected>4</option>
              </select>
            </div>
          </div>
          <button type="submit" class="btn--blue w-100 simpanData-btn">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection