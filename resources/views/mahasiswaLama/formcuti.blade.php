@extends('layouts.mainMala')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content container-fluid" id="form_cuti">
  <h1 class="page-content__title">Pengajuan Cuti Mahasiswa</h1>

  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0 m-0 border-0">
          <!-- HEAD -->
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Form Cuti</h3>
            </div>
          </div>
        </div>
        <hr class="mt">
        <form class="form-input">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" placeholder="Jessica Clara">
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="nim">NIM</label>
              <input type="text" class="form-control" id="nim" placeholder="2204719384">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="jurusan">Jurusan</label>
              <input type="text" class="form-control" id="jurusan" placeholder="Nama Jurusan">
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="program-studi">Program Studi</label>
              <input type="text" class="form-control" id="program-studi" placeholder="Ilmu Kedokteran Gigi Anak">
            </div>
          </div>
        </form>


        <form class="form-cuti">
          <h1>Waktu Cuti</h1>
          <div class="form-row">
            <div class="col-md-6 form-group padding-right">
              <label for="mulai">Mulai</label>
              <input class="form-control" type="date" value="2021-09-21" id="tanggal-lahir">
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="selesai">Hingga</label>
              <input class="form-control" type="date" value="2022-09-21" id="tanggal-lahir">
            </div>
          </div>
          <div class="form-row">
            <div class="col-12 form-group">
              <label for="keterangan">Alasan Mengambil Cuti</label>
              <input type="text" class="form-control" id="keterangan"
                placeholder="Ada pekerjaan yang harus dikerjakan fulltime">
            </div>
          </div>
        </form>

        <div class="row submit justify-content-end align-items-center">
          <button type="submit" class="btn btn--blue">Ajukan Cuti</button>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection