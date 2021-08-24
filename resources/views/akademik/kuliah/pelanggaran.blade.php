@extends('layouts.mainAkademik')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0 m-0 border-0 ">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Pelanggaran</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <button type="button" class="btn btn-primary">
                <i class="iconify-inline mr-1" data-icon="bx:bxs-plus-circle"></i>
                Tambah
              </button>
              <button type="button" class="btn btn-secondary ml-0 ml-md-2">
                <i class="iconify-inline mr-1" data-icon="bx:bx-cloud-download"></i>
                Unduh Data
              </button>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form class="form-select ">
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
                <th scope="col" class="border-0 text-center px-1">Tanggal</th>
                <th scope="col" class="border-0">Nim</th>
                <th scope="col" class="border-0" style="width: 27%">Nama</th>
                <th scope="col" class="border-0" style="width: 34%">Keterangan</th>
                <th scope="col" class="border-0 text-center">Poin</th>
                <th scope="col" class="border-0 text-center">Aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center text-capitalize px-1">13 juli 2021</td>
                <td class="text-capitalize">4891203526</td>
                <td class="font-weight-bold text-capitalize">dwi rahmawati</td>
                <td class="text-capitalize">berisi penjelasan pelanggaran</td>
                <td class="text-center">2</td>
                <td class="text-center">
                  <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  <i class="iconify delete-icon" data-icon="bx:bx-trash"></i>
                </td>
              </tr>

              <tr>
                <td class="text-center text-capitalize px-1">13 juli 2021</td>
                <td class="text-capitalize">4891203526</td>
                <td class="font-weight-bold text-capitalize">dwi rahmawati</td>
                <td class="text-capitalize">berisi penjelasan pelanggaran</td>
                <td class="text-center">2</td>
                <td class="text-center">
                  <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  <i class="iconify delete-icon" data-icon="bx:bx-trash"></i>
                </td>
              </tr>

              <tr>
                <td class="text-center text-capitalize px-1">13 juli 2021</td>
                <td class="text-capitalize">4891203526</td>
                <td class="font-weight-bold text-capitalize">dwi rahmawati</td>
                <td class="text-capitalize">berisi penjelasan pelanggaran</td>
                <td class="text-center">2</td>
                <td class="text-center">
                  <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  <i class="iconify delete-icon" data-icon="bx:bx-trash"></i>
                </td>
              </tr>

              <tr>
                <td class="text-center text-capitalize px-1">13 juli 2021</td>
                <td class="text-capitalize">4891203526</td>
                <td class="font-weight-bold text-capitalize">dwi rahmawati</td>
                <td class="text-capitalize">berisi penjelasan pelanggaran</td>
                <td class="text-center">2</td>
                <td class="text-center">
                  <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  <i class="iconify delete-icon" data-icon="bx:bx-trash"></i>
                </td>
              </tr>

              <tr>
                <td class="text-center text-capitalize px-1">13 juli 2021</td>
                <td class="text-capitalize">4891203526</td>
                <td class="font-weight-bold text-capitalize">dwi rahmawati</td>
                <td class="text-capitalize">berisi penjelasan pelanggaran</td>
                <td class="text-center">2</td>
                <td class="text-center">
                  <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  <i class="iconify delete-icon" data-icon="bx:bx-trash"></i>
                </td>
              </tr>

              <tr>
                <td class="text-center text-capitalize px-1">13 juli 2021</td>
                <td class="text-capitalize">4891203526</td>
                <td class="font-weight-bold text-capitalize">dwi rahmawati</td>
                <td class="text-capitalize">berisi penjelasan pelanggaran</td>
                <td class="text-center">2</td>
                <td class="text-center">
                  <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  <i class="iconify delete-icon" data-icon="bx:bx-trash"></i>
                </td>
              </tr>

              <tr>
                <td class="text-center text-capitalize px-1">13 juli 2021</td>
                <td class="text-capitalize">4891203526</td>
                <td class="font-weight-bold text-capitalize">dwi rahmawati</td>
                <td class="text-capitalize">berisi penjelasan pelanggaran</td>
                <td class="text-center">2</td>
                <td class="text-center">
                  <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  <i class="iconify delete-icon" data-icon="bx:bx-trash"></i>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="row justify-content-between align-items-center table-information">
          <h3>Menampilkan 1 sampai 7 dari 7 total data</h3>
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