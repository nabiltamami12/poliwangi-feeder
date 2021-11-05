@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--big mt-4">
        <div class="row">
          <div class="col-6 col-sm-3">
            <h2 class="card_title text-center mb-4">Mahasiswa</h2>
            <canvas id="piechart-mahasiswa"></canvas>
          </div>

          <div class="col-6 col-sm-3">
            <h2 class="card_title text-center mb-4">Alumni</h2>
            <canvas id="piechart-alumni"></canvas>
          </div>

          <div class="col-6 col-sm-3 mt-5 mt-sm-0">
            <h2 class="card_title text-center mb-4">Dosen</h2>
            <canvas id="piechart-dosen"></canvas>
          </div>

          <div class="col-6 col-sm-3 mt-5 mt-sm-0">
            <h2 class="card_title text-center mb-4">Pegawai</h2>
            <canvas id="piechart-pegawai"></canvas>
          </div>
        </div>
      </div>

      <div class="my-4-5">
        <h2 class="card_title mb-3">Mahasiswa Per Tahun</h2>
        <canvas id="mahasiswa-bar"></canvas>
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
<script src="{{ asset('js/chart-dashboard.js') }}"></script>
<script>
  getDataChart('admin');
</script>
@endsection