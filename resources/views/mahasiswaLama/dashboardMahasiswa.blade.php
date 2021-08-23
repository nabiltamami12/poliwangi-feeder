@extends('layouts.mainMala')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col">
      <div class="d-md-flex justify-content-between informasi_mahasiswa mt-4">
        <p class="mb-0 mt-2 mt-md-0">Status Mahasiswa: <span class="text-success">Aktif</span></p>
        <p class="mb-0">Masa: <strong class="font-weight-bold">29 Januari 2021 - 29 Mei 2021</strong></p>
      </div>
    </div>
  </div>

  <div class="row equal-cols">
    <div class="col-lg-8">
      <div class="card shadow padding--medium">
        <div class="card-header p-0 border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Jadwal Kuliah Hari Ini</h3>
            </div>
            <div class="col text-right">
              <h3 class="mb-0">12 Juli 2021</h3>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <div class="table-responsive">
          <table class="table align-items-center table-borderless table-flush table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Dosen</th>
                <th scope="col" class="text-center">Kelas</th>
                <th scope="col" class="text-center">Jam Kuliah</th>
              </tr>
            </thead>

            <tbody class="table-body table-body-md">
              <tr>
                <td class="font-weight-bold wordwrap">Pengantar perkuliahan II</td>
                <td class="wordwrap">Prof.Seno Prasetya,drg.,SU.,Ph.D., Sp.KGA(K)</td>
                <td class="text-center">KGA12</td>
                <td class="text-center">08:00</td>
              </tr>
              <tr>
                <td class="font-weight-bold wordwrap">Matematika Dasar</td>
                <td class="wordwrap">Dr. Amin Suyitno, M.Pd</td>
                <td class="text-center">MT001</td>
                <td class="text-center">12:00</td>
              </tr>
              <tr>
                <td class="font-weight-bold wordwrap">Bahasa Inggris</td>
                <td class="wordwrap">Dr. Pradana Putra, M.Pd</td>
                <td class="text-center">Lang02</td>
                <td class="text-center">14:00</td>
              </tr>
              <tr>
                <td class="font-weight-bold wordwrap">Pengantar perkuliahan II</td>
                <td class="wordwrap">Prawati Nuraini,drg.M.Kes.,SpKGA(K)</td>
                <td class="text-center">KGA12</td>
                <td class="text-center">16:00</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card shadow padding--medium card_presensi mt-0 mt-lg-4">
        <div class="card-header p-0 border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Presensi sekarang Yuk!</h3>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <div class="card-body p-0">
          <h6 class="mb-0">Mata Kuliah Saat Ini</h6>
          <h5 class="mb-0 mt-2">Matematika Dasar</h5>
          <h6 class="mb-0 mt-4">Dosen Pengampu:</h6>
          <h5 class="mb-0 mt-2">Dr. Amin Suyitno, M.Pd</h5>
          <h6 class="mb-0 mt-4">Status Anda</h6>
          <h5 class="mb-0 mt-2 text-danger">Belum Presensi</h5>
          <button type="button" class="btn btn-primary w-100 mt-4 rounded-sm">Presensi Sekarang</button>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection