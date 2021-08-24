@extends('layouts.mainAdmin')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
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
        <h1 class="page-heading">Mahasiswa Per tahun</h1>
        <canvas id="mahasiswa-per-tahun"></canvas>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0-rc.1/chartjs-plugin-datalabels.min.js"
  integrity="sha512-+UYTD5L/bU1sgAfWA0ELK5RlQ811q8wZIocqI7+K0Lhh8yVdIoAMEs96wJAIbgFvzynPm36ZCXtkydxu1cs27w=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/chart.js') }}"></script>
@endsection