@extends('layouts.mainAkademik')

@section('loader')
<div class="loaderScreen-wrapper">
  <div class="spinner-grow text-warning" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <div class="spinner-grow text-info" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <div class="spinner-grow text-light" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
@endsection

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__akademik container-fluid" id="akademik_dashboard">
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

  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="table-responsive">
          <table class="table align-items-center table-borderless table-flush table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="border-0 text-center px-2"></th>
                <th scope="col" class="border-0">Kode</th>
                <th scope="col" class="border-0">Mata Kuliah</th>
                <th scope="col" class="border-0 text-center px-0">Laki-laki</th>
                <th scope="col" class="border-0 text-center px-0">Perempuan</th>
                <th scope="col" class="border-0 text-center px-2">Total</th>
              </tr>
            </thead>
            <tbody class="table-body">
              <tr>
                <td class="text-center px-2">A</td>
                <td>P001</td>
                <td class="font--bold text-capitalize">Pengantar perkuliahan II</td>
                <td class="text-center px-0">3</td>
                <td class="text-center px-0">8</td>
                <td class="text-center px-2">11</td>
              </tr>

              <tr>
                <td class="text-center px-2">B</td>
                <td>MTK01</td>
                <td class="font--bold text-capitalize">Matematika Dasar</td>
                <td class="text-center px-0">1</td>
                <td class="text-center px-0">12</td>
                <td class="text-center px-2">13</td>
              </tr>

              <tr>
                <td class="text-center px-2">C</td>
                <td>P003</td>
                <td class="font--bold text-capitalize">Pengantar perkuliahan III</td>
                <td class="text-center px-0">4</td>
                <td class="text-center px-0">10</td>
                <td class="text-center px-2">14</td>
              </tr>

              <tr>
                <td class="text-center px-2">D</td>
                <td>P003</td>
                <td class="font--bold text-capitalize">Pengantar perkuliahan III</td>
                <td class="text-center px-0">4</td>
                <td class="text-center px-0">10</td>
                <td class="text-center px-2">14</td>
              </tr>

              <tr>
                <td class="text-center px-2">E</td>
                <td>P003</td>
                <td class="font--bold text-capitalize">Pengantar perkuliahan III</td>
                <td class="text-center px-0">4</td>
                <td class="text-center px-0">10</td>
                <td class="text-center px-2">14</td>
              </tr>

              <tr>
                <td class="text-center px-2">F</td>
                <td>P003</td>
                <td class="font--bold text-capitalize">Pengantar perkuliahan III</td>
                <td class="text-center px-0">4</td>
                <td class="text-center px-0">10</td>
                <td class="text-center px-2">14</td>
              </tr>

              <tr>
                <td class="text-center px-2">G</td>
                <td>P003</td>
                <td class="font--bold text-capitalize">Pengantar perkuliahan III</td>
                <td class="text-center px-0">4</td>
                <td class="text-center px-0">10</td>
                <td class="text-center px-2">14</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<!-- Chart JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js"></script>
<script src="{{ asset('js/chart.js') }}"></script>
<!-- Loader -->
<script src="{{ asset('js/loading.js') }}"></script>
@endsection