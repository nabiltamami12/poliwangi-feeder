@extends('layouts.mainProdi')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__prodi container-fluid" id="prodi_absensimahasiswa">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0 rounded-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Absensi Mahasiswa</h2>
            </div>
            <div class="col-12 col-md-3 offset-md-3 text-center text-md-right mt-3 mt-md-0">
              <label for="tanggal-absensi" class="sr-only">Tanggal Absensi</label>
              <input class="form-control" type="date" value="2021-07-13" id="tanggal-absensi">
            </div>
          </div>

          <hr class="mt">

          <form class="form-select rounded-0">
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="program-studi">Program Studi</label>
                <select class="form-control" id="program-studi">
                  <option>Ilmu Kedokteran Gigi Anak</option>
                  <option>Ilmu Kedokteran Gigi Anak</option>
                </select>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="tahun">Tahun</label>
                <select class="form-control" id="tahun">
                  <option>2020</option>
                  <option>2021</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="semester">Semester</label>
                <select class="form-control" id="semester">
                  <option>Semua</option>
                  <option>Semester 1</option>
                </select>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="jenjang">Jenjang</label>
                <select class="form-control" id="jenjang">
                  <option>Semua</option>
                  <option>Jenjang 1</option>
                </select>
              </div>
            </div>
          </form>

          <div class="row align-items-center padding--small py-0 filterSearch-data">
            <div class="col-sm-6 col-12">
              <div class="form-group row">
                <select class="form-control" id="dataperhalaman">
                  <option>10</option>
                  <option>20</option>
                  <option>30</option>
                </select>
                <label class="label-datashowperpage ml-3" for="dataperhalaman">Data per Halaman</label>
              </div>
            </div>

            <div class="col-md-4 col-12 offset-md-2 offset-0 mt-md-0 mt-2 p-0 text-right">
              <label class="sr-only" for="searchdata">Search</label>
              <div class="input-group">
                <input type="search" class="form-control" id="searchdata" placeholder="Pencarian ...">
                <div class="input-group-prepend">
                  <div class="input-group-text search-icon">
                    <span class="iconify" data-icon="fluent:search-32-regular" data-inline="true"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="border-0 text-center">tanggal</th>
                <th scope="col" class="border-0">NIM</th>
                <th scope="col" class="border-0" style="width: 25%">Nama</th>
                <th scope="col" class="border-0 text-center" style="width: 15%">Mata Kuliah</th>
                <th scope="col" class="border-0 text-center">Jam absensi</th>
                <th scope="col" class="border-0 text-center">batas absensi</th>
                <th scope="col" class="border-0 text-center">Aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center">13 Juli 2021</td>
                <td>4891203526</td>
                <td class="font--bold text-capitalize">Dwi Rahmawati</td>
                <td class="text-center">Ilmu gigi</td>
                <td class="text-center">12:14</td>
                <td class="text-center">13:00</td>
                <td class="text-center">
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center">13 Juli 2021</td>
                <td>4891203526</td>
                <td class="font--bold text-capitalize">Dwi Rahmawati</td>
                <td class="text-center">Ilmu gigi</td>
                <td class="text-center">12:14</td>
                <td class="text-center">13:00</td>
                <td class="text-center">
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center">13 Juli 2021</td>
                <td>4891203526</td>
                <td class="font--bold text-capitalize">indah pratiwi</td>
                <td class="text-center">Ilmu gigi</td>
                <td class="text-center">12:17</td>
                <td class="text-center">13:00</td>
                <td class="text-center">
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center">13 Juli 2021</td>
                <td>4891203526</td>
                <td class="font--bold text-capitalize">indah pratiwi</td>
                <td class="text-center">Ilmu gigi</td>
                <td class="text-center">12:17</td>
                <td class="text-center">13:00</td>
                <td class="text-center">
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center">13 Juli 2021</td>
                <td>4891203526</td>
                <td class="font--bold text-capitalize">indah pratiwi</td>
                <td class="text-center">Ilmu gigi</td>
                <td class="text-center">12:17</td>
                <td class="text-center">13:00</td>
                <td class="text-center">
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center">13 Juli 2021</td>
                <td>4891203526</td>
                <td class="font--bold text-capitalize">indah pratiwi</td>
                <td class="text-center">Ilmu gigi</td>
                <td class="text-center">12:17</td>
                <td class="text-center">13:00</td>
                <td class="text-center">
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center">13 Juli 2021</td>
                <td>4891203526</td>
                <td class="font--bold text-capitalize">indah pratiwi</td>
                <td class="text-center">Ilmu gigi</td>
                <td class="text-center">12:17</td>
                <td class="text-center">13:00</td>
                <td class="text-center">
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="row justify-content-between align-items-center table-information">
          <h3>Menampilkan 1 sampai 7 dari 7 total data</h3>
          <nav aria-label="pagination table">
            <ul class="pagination">
              <li class="page-item disabled" aria-label="Previous">
                <a class="page-link" href="#" tabindex="-1">
                  Previous
                </a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">1<span class="sr-only">(current)</span></a>
              </li>
              <li class="page-item disabled" aria-label="Next">
                <a class="page-link" href="#">
                  Next
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection