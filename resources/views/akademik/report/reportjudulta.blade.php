@extends('layouts.mainAkademik')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content page-content__akademik container-fluid" id="akademik_reportjudulta">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0 rounded-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Judul Tugas Akhir Mahasiswa</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <button type="button" class="btn--blue add-btn">
                <span class="iconify mr-2" data-icon="bx:bxs-plus-circle" data-inline="true"></span>
                Tambah
              </button>
              <button type="button" class="btn--blue downloaddata-btn ml-3">
                <span class="iconify mr-2" data-icon="bx:bx-download" data-inline="true"></span>
                Unduh Data
              </button>
            </div>
          </div>

          <hr class="mt">

          <form class="form-select rounded-0">
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="jurusan">Jurusan</label>
                <select class="form-control" id="jurusan">
                  <option>Ilmu Kedokteran Gigi Anak</option>
                  <option>Ilmu Kedokteran Gigi Anak</option>
                </select>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="angkatan">Angkatan</label>
                <select class="form-control" id="angkatan">
                  <option>2020</option>
                  <option>2021</option>
                </select>
              </div>
            </div>
          </form>

          <div class="row align-items-center padding--small py-0 filterSearch-data">
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <select class="form-control" id="dataperhalaman">
                  <option>10</option>
                  <option>20</option>
                  <option>30</option>
                </select>
                <label class="label-datashowperpage mb-0 ml-3" for="dataperhalaman">Data per Halaman</label>
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
          <table class="table align-items-center table-borderless table-flush table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="border-0 text-center px-1">No</th>
                <th scope="col" class="border-0 pr-0">NIM</th>
                <th scope="col" class="border-0">Nama</th>
                <th scope="col" class="border-0">Judul Ta</th>
                <th scope="col" class="border-0">keterangan</th>
              </tr>
            </thead>
            <tbody class="table-body">
              <tr>
                <td class="text-center px-1">1</td>
                <td class="pr-0">4891203526</td>
                <td class="font-weight-bold text-capitalize">Dwi Rahmawati</td>
                <td class="text-capitalize">berisikan judul tugas akhir mahasiswa</td>
                <td>
                  <span class="iconify color--success" data-icon="akar-icons:circle-check-fill"
                    data-inline="true"></span>
                  <span>Diterima</span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-1">2</td>
                <td class="pr-0">4891203526</td>
                <td class="font-weight-bold text-capitalize">Dwi Rahmawati</td>
                <td class="text-capitalize">berisikan judul tugas akhir mahasiswa</td>
                <td>
                  <span class="iconify color--success" data-icon="akar-icons:circle-check-fill"
                    data-inline="true"></span>
                  <span>Diterima</span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-1">2</td>
                <td class="pr-0">4891203526</td>
                <td class="font-weight-bold text-capitalize">Dwi Rahmawati</td>
                <td class="text-capitalize">berisikan judul tugas akhir mahasiswa</td>
                <td>
                  <span class="iconify color--danger" data-icon="bi:x-circle-fill" data-inline="true"></span>
                  <span>Ditolak</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="row justify-content-center justify-content-md-between align-items-center table-information">
          <h3>Menampilkan 1 sampai 3 dari 3 total data</h3>
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