@extends('layouts.mainAdmin')

@section('content')

<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="admin_dashboard">
  <div id="piechart" class="shadow mt-4">
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
    <div class="row mt-4-5 mb-4">
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