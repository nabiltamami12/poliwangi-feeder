@extends('layouts.mainMala')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="khs">
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
        <hr class="mt">
        <div class="table-responsive">
          <table class="table align-items-center table-borderless table-flush table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="border-0 text-center px-2">No</th>
                <th scope="col" class="border-0">Keterangan</th>
                <th scope="col" class="border-0 text-center px-0 mx-0">File</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center px-2">1</td>
                <td>
                  <h2>KHS Semester satu</h2>
                </td>
                <td class="text-center px-0 mx-0">
                  <span class="iconify download-icon text--blue" data-icon="bx:bx-download" data-inline="true"></span>
                  <span class="font--bold text--blue">Unduh File PDF</span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">2</td>
                <td>
                  <h2>KHS Semester Dua</h2>
                </td>
                <td class="text-center px-0 mx-0">
                  <span class="iconify download-icon text--blue" data-icon="bx:bx-download" data-inline="true"></span>
                  <span class="font--bold text--blue">Unduh File PDF</span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">3</td>
                <td>
                  <h2>KHS Semester Tiga</h2>
                </td>
                <td class="text-center px-0 mx-0">
                  <span class="iconify download-icon text--blue" data-icon="bx:bx-download" data-inline="true"></span>
                  <span class="font--bold text--blue">Unduh File PDF</span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">4</td>
                <td>
                  <h2>KHS Semester Empat</h2>
                </td>
                <td class="text-center px-0 mx-0">
                  <span class="iconify download-icon text--blue" data-icon="bx:bx-download" data-inline="true"></span>
                  <span class="font--bold text--blue">Unduh File PDF</span>
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