@extends('layouts.mainAkademik')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="akademik_dashboard">
  <div id="piechart" class="shadow mt-4">
    <div class="data-piechart">
      <div class="data-item">
        <h1 class="page-heading mb-0">Mahasiswa</h1>
        <canvas id="piechart-mahasiswa" class="mt-0 mt-md-2"></canvas>
      </div>
      <div class="data-item">
        <h1 class="page-heading mb-0">Alumni</h1>
        <canvas id="piechart-alumni" class="mt-0 mt-md-2"></canvas>
      </div>
      <div class="data-item">
        <h1 class="page-heading mb-0">Dosen</h1>
        <canvas id="piechart-dosen" class="mt-0 mt-md-2"></canvas>
      </div>
      <div class="data-item">
        <h1 class="page-heading mb-0">Pegawai</h1>
        <canvas id="piechart-pegawai" class="mt-0 mt-md-2"></canvas>
      </div>
    </div>
  </div>

  <div id="barchart" class="mt-4">
    <div class="row">
      <div class="col-xl-12">
        <h1 class="page-heading mb-3">Mahasiswa Per Prodi</h1>
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