@extends('layouts.mainAkademik')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content page-content__akademik container-fluid" id="akademik_reportlulus">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0 rounded-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Mahasiswa Lulus</h2>
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
                <th scope="col" class="border-0">NIM</th>
                <th scope="col" class="border-0">Nama</th>
                <th scope="col" class="border-0 text-center">Tanggal sk yudisium</th>
                <th scope="col" class="border-0">no sk yudisium</th>
                <th scope="col" class="border-0">no ijazah</th>
                <th scope="col" class="border-0 text-center">Aksi</th>
              </tr>
            </thead>
            <tbody class="table-body">
              <tr>
                <td class="text-center px-1">1</td>
                <td>4891203526</td>
                <td class="font--bold text-capitalize">Dwi Rahmawati</td>
                <td class="text-center">12/04/2021</td>
                <td>091015//04.2021/102</td>
                <td>091015//04.2021/102</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-1">2</td>
                <td>4891203526</td>
                <td class="font--bold text-capitalize">Dwi Rahmawati</td>
                <td class="text-center">12/04/2021</td>
                <td>091015//04.2021/102</td>
                <td>091015//04.2021/102</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-1">3</td>
                <td>4891203526</td>
                <td class="font--bold text-capitalize">Dwi Rahmawati</td>
                <td class="text-center">12/04/2021</td>
                <td>091015//04.2021/102</td>
                <td>091015//04.2021/102</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
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