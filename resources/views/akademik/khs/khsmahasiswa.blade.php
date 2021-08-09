@extends('layouts.mainAkademik')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="akademik_khsmahasiswa">
  <h1 class="page-content__title">Kartu Hasil Studi</h1>

  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">KHS yang Tersedia</h3>
            </div>
          </div>
        </div>

        <hr class="my-4">

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

        <div class="table-responsive mt-4">
          <table class="table align-items-center table-borderless table-flush table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center px-3">No</th>
                <th scope="col" style="width: 75%">Keterangan</th>
                <th scope="col" class="text-center">File</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center">1</td>
                <td>
                  <h2>KHS Semester satu</h2>
                </td>
                <td class="text-center">
                  <span class="iconify download-icon text-primary" data-icon="bx:bx-download"></span>
                  <span class="font-weight-bold text-primary">Unduh File PDF</span>
                </td>
              </tr>

              <tr>
                <td class="text-center">2</td>
                <td>
                  <h2>KHS Semester Dua</h2>
                </td>
                <td class="text-center">
                  <span class="iconify download-icon text-primary" data-icon="bx:bx-download"></span>
                  <span class="font-weight-bold text-primary">Unduh File PDF</span>
                </td>
              </tr>

              <tr>
                <td class="text-center">3</td>
                <td>
                  <h2>KHS Semester Tiga</h2>
                </td>
                <td class="text-center">
                  <span class="iconify download-icon text-primary" data-icon="bx:bx-download"></span>
                  <span class="font-weight-bold text-primary">Unduh File PDF</span>
                </td>
              </tr>
              <tr>
                <td class="text-center">4</td>
                <td>
                  <h2>KHS Semester Empat</h2>
                  </th>
                <td class="text-center">
                  <span class="iconify download-icon text-primary" data-icon="bx:bx-download"></span>
                  <span class="font-weight-bold text-primary">Unduh File PDF</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection