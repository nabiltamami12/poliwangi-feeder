@extends('layouts.mainAkademik')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content  container-fluid" id="akademik_reportjudulta">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0 ">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Judul Tugas Akhir Mahasiswa</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <button type="button" class="btn btn-primary">
                <i class="iconify-inline mr-1" data-icon="bx:bxs-plus-circle"></i>
                Tambah
              </button>
              <button type="button" class="btn btn-warning ml-0 ml-md-2">
                <i class="iconify-inline mr-1" data-icon="bx:bx-cloud-download"></i>
                Eksport
              </button>
            </div>
          </div>
        </div>
        <hr class="my-4">

        <form class="form-select">
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

        <div class="row align-items-center px-3 my-4">
          <div class="col-12 col-md-6">
            <form class="form-inline">
              <div class="form-group row">
                <select class="form-control form-control-sm" id="dataperhalaman">
                  <option>10</option>
                  <option>20</option>
                  <option>30</option>
                </select>
                <label for="dataperhalaman" class="ml-3 mt-2 mt-sm-0">Data per Halaman</label>
              </div>
            </form>
          </div>
          <div class="col-12 col-md-4 offset-md-2 offset-0 text-right p-0 mt-3 mt-md-0">
            <form class="search_form" action="">
              <input class="form-control form-control-sm" type="search" placeholder="Pencarian...">
              <button type="submit">
                <i class="iconify-inline" data-icon="bx:bx-search"></i>
              </button>
            </form>
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
                  <i class="iconify-inline mr-2 text-success" data-icon="akar-icons:circle-check-fill"></i>
                  <span>Diterima</span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-1">2</td>
                <td class="pr-0">4891203526</td>
                <td class="font-weight-bold text-capitalize">Dwi Rahmawati</td>
                <td class="text-capitalize">berisikan judul tugas akhir mahasiswa</td>
                <td>
                  <i class="iconify-inline mr-2 text-success" data-icon="akar-icons:circle-check-fill"></i>
                  <span>Diterima</span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-1">2</td>
                <td class="pr-0">4891203526</td>
                <td class="font-weight-bold text-capitalize">Dwi Rahmawati</td>
                <td class="text-capitalize">berisikan judul tugas akhir mahasiswa</td>
                <td>
                  <i class="iconify-inline mr-2 text-danger" data-icon="bi:x-circle-fill"></i>
                  <span>Ditolak</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="row justify-content-center justify-content-md-between align-items-center table-information">
          <h3>Menampilkan 1 sampai 3 dari 3 total data</h3>
          <nav aria-label="Page navigation example">
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