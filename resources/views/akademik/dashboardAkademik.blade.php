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

      <div class="mt-4-5">
        <h2 class="card_title mb-3">Mahasiswa Per Prodi</h2>
        <canvas id="mahasiswa-bar"></canvas>
      </div>


      <!-- <div class="card shadow">
        <div class="table-responsive table_dashboardAkademik">
          <table class="table align-items-center table-borderless table-flush table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center px-2"></th>
                <th scope="col">Kode</th>
                <th scope="col">Mata Kuliah</th>
                <th scope="col" class="text-center px-0">Laki-laki</th>
                <th scope="col" class="text-center px-0">Perempuan</th>
                <th scope="col" class="text-center px-2">Total</th>
              </tr>
            </thead>
            <tbody class="table-body">
              <tr>
                <td class="text-center px-2">A</td>
                <td>P001</td>
                <td class="font-weight-bold text-capitalize">Pengantar perkuliahan II</td>
                <td class="text-center px-0">3</td>
                <td class="text-center px-0">8</td>
                <td class="text-center px-2">11</td>
              </tr>

              <tr>
                <td class="text-center px-2">B</td>
                <td>MTK01</td>
                <td class="font-weight-bold text-capitalize">Matematika Dasar</td>
                <td class="text-center px-0">1</td>
                <td class="text-center px-0">12</td>
                <td class="text-center px-2">13</td>
              </tr>

              <tr>
                <td class="text-center px-2">C</td>
                <td>P003</td>
                <td class="font-weight-bold text-capitalize">Pengantar perkuliahan III</td>
                <td class="text-center px-0">4</td>
                <td class="text-center px-0">10</td>
                <td class="text-center px-2">14</td>
              </tr>

              <tr>
                <td class="text-center px-2">D</td>
                <td>P003</td>
                <td class="font-weight-bold text-capitalize">Pengantar perkuliahan III</td>
                <td class="text-center px-0">4</td>
                <td class="text-center px-0">10</td>
                <td class="text-center px-2">14</td>
              </tr>

              <tr>
                <td class="text-center px-2">E</td>
                <td>P003</td>
                <td class="font-weight-bold text-capitalize">Pengantar perkuliahan III</td>
                <td class="text-center px-0">4</td>
                <td class="text-center px-0">10</td>
                <td class="text-center px-2">14</td>
              </tr>

              <tr>
                <td class="text-center px-2">F</td>
                <td>P003</td>
                <td class="font-weight-bold text-capitalize">Pengantar perkuliahan III</td>
                <td class="text-center px-0">4</td>
                <td class="text-center px-0">10</td>
                <td class="text-center px-2">14</td>
              </tr>

              <tr>
                <td class="text-center px-2">G</td>
                <td>P003</td>
                <td class="font-weight-bold text-capitalize">Pengantar perkuliahan III</td>
                <td class="text-center px-0">4</td>
                <td class="text-center px-0">10</td>
                <td class="text-center px-2">14</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div> -->
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
<!-- <script src="{{ asset('js/piechart.js') }}"></script> -->
<script src="{{ asset('js/chart-dashboard.js') }}"></script>
<script src="{{ asset('js/loading.js') }}"></script>
<script>
  getDataChart('akademik');
</script>

@endsection