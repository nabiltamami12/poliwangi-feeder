@extends('layouts.mainDosen')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-12 col-md-8">
      <!-- CARD -->
      <div class="card shadow padding--medium">
        <div class="card-header p-0 border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Jadwal Mengajar Hari Ini</h3>
            </div>
            <div class="col text-right">
              <h3 class="mb-0">12 Juli 2021</h3>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <div class="table-responsive">
          <!-- TABLE -->
          <table class="table align-items-center table-borderless table-flush table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" style="width: 55%;">Mata Kuliah</th>
                <th scope="col" class="text-center">Kelas</th>
                <th scope="col" class="text-center">Jam Kuliah</th>
              </tr>
            </thead>

            <tbody class="table-body table-body-lg">
              <tr>
                <td class="font-weight-bold">Pengantar perkuliahan II</td>
                <td class="text-center">KGA12</td>
                <td class="text-center">08:00</td>
              </tr>

              <tr>
                <td class="font-weight-bold">Matematika Dasar</td>
                <td class="text-center">MT001</td>
                <td class="text-center">12:00</td>
              </tr>

              <tr>
                <td class="font-weight-bold">Bahasa Inggris</td>
                <td class="text-center">Lang02</td>
                <td class="text-center">14:00</td>
              </tr>

              <tr>
                <td class="font-weight-bold">Pengantar perkuliahan II</td>
                <td class="text-center">KGA12</td>
                <td class="text-center">16:00</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-4">
      <div class="card shadow padding--medium card_presensi mt-0 mt-md-4">
        <div class="card-header p-0 border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Mata Kuliah Saat Ini</h3>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <div class="card-body p-0">
          <h6 class="mb-0">Mata Kuliah Saat Ini</h6>
          <h5 class="mb-0 mt-2">Matematika Dasar</h5>
          <h6 class="mb-0 mt-4">Jumlah Mahasiswa :</h6>
          <h5 class="mb-0 mt-2">45</h5>
          <h6 class="mb-0 mt-4">Status Presensi</h6>
          <h5 class="mb-0 mt-2 text-danger">Belum Di Cek</h5>
          <button type="button" class="btn btn-primary w-100 mt-4 rounded-sm">Cek Presensi</button>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection