@extends('layouts.mainProdi')

@section('content')

<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content  container-fluid" id="akademik_dashboard">
  <div class="row">
    <div class="col">
      <div id="pengumuman" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner shadow">
          <div class="carousel-item active" data-interval="2000">
            <img class="card-img-top" src="{{ url('images') }}/banner.png" alt="">
          </div>
          <div class="carousel-item" data-interval="2000">
            <img class="card-img-top" src="{{ url('images') }}/banner.png" alt="">
          </div>
          <div class="carousel-item" data-interval="2000">
            <img class="card-img-top" src="{{ url('images') }}/banner.png" alt="">
          </div>
        </div>
        <a class="carousel-control-prev" href="#pengumuman" role="button" data-slide="prev">
          <span class="iconify" data-icon="bx:bx-chevron-left" data-inline="false"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#pengumuman" role="button" data-slide="next">
          <span class="iconify" data-icon="bx:bx-chevron-right" data-inline="false"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>

  <div id="piechart" class="shadow">
    <div class="data-piechart">
      <div class="data-item">
        <h1 class="page-heading">Mahasiswa</h1>
        <canvas id="piechart-mahasiswa"></canvas>
      </div>
      <div class="data-item">
        <h1 class="page-heading">Alumni</h1>
        <canvas id="piechart-alumni"></canvas>
      </div>
      <div class="data-item">
        <h1 class="page-heading">Dosen</h1>
        <canvas id="piechart-dosen"></canvas>
      </div>
      <div class="data-item">
        <h1 class="page-heading">Pegawai</h1>
        <canvas id="piechart-pegawai"></canvas>
      </div>
    </div>
  </div>

  <div id="barchart">
    <div class="row">
      <div class="col-12">
        <h1 class="page-heading">Mahasiswa Per Prodi</h1>
        <canvas id="mahasiswa-per-prodi"></canvas>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<!-- Chart JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js"></script>
<script src="{{ asset('js/chart.js') }}"></script>
@endsection