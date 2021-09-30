@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Jadwal Seleksi</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <a class="btn btn-primary" href="" role="button">
                <i class="iconify-inline mr-1" data-icon="bx:bxs-plus-circle"></i>
                Tambah
              </a>
              <a class="btn btn-info_transparent2 ml-md-2 text-primary" href="/admin/settingpmb/editjadwalseleksi"
                role="button">
                <i class="iconify-inline mr-1" data-icon="bx:bx-edit-alt"></i>
                Edit Data
              </a>
            </div>
          </div>
        </div>

        <hr class="mt-4">
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
          <table class="table align-items-center table-borderless table-flush">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center px-2">No</th>
                <th scope="col">Hari</th>
                <th scope="col" class="text-center">jam</th>
                <th scope="col" class="text-center">waktu mulai</th>
                <th scope="col" class="text-center">waktu selesai</th>
                <th scope="col" class="text-center">kuota</th>
                <th scope="col" class="text-center">Aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td rowspan="3" class="text-center px-2">1</td>
                <td rowspan="3" class="font-weight-bold">Senin</td>
                <td class="text-center">1</td>
                <td class="text-center">07.00</td>
                <td class="text-center">09.00</td>
                <td class="text-center">100</td>
                <td rowspan="3" class="text-center">
                  <i class="iconify-inline delete-icon text-primary" data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center">2</td>
                <td class="text-center">09.00</td>
                <td class="text-center">11.00</td>
                <td class="text-center">100</td>
              </tr>

              <tr>
                <td class="text-center">3</td>
                <td class="text-center">11.00</td>
                <td class="text-center">12.00</td>
                <td class="text-center">100</td>
              </tr>

              <tr>
                <td rowspan="2" class="text-center px-2">2</td>
                <td rowspan="2" class="font-weight-bold">Selasa</td>
                <td class="text-center">1</td>
                <td class="text-center">07.00</td>
                <td class="text-center">09.00</td>
                <td class="text-center">100</td>
                <td rowspan="2" class="text-center">
                  <i class="iconify-inline delete-icon text-primary" data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center">2</td>
                <td class="text-center">09.00</td>
                <td class="text-center">11.00</td>
                <td class="text-center">100</td>
              </tr>

              <tr>
                <td rowspan="2" class="text-center px-2">3</td>
                <td rowspan="2" class="font-weight-bold">Rabu</td>
                <td class="text-center">1</td>
                <td class="text-center">07.00</td>
                <td class="text-center">09.00</td>
                <td class="text-center">100</td>
                <td rowspan="2" class="text-center">
                  <i class="iconify-inline delete-icon text-primary" data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center">2</td>
                <td class="text-center">09.00</td>
                <td class="text-center">11.00</td>
                <td class="text-center">100</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="row justify-content-between align-items-center table-information">
          <h3>Menampilkan 1 sampai 3 dari 3 total data</h3>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item disabled" aria-label="Previous">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">1<span class="sr-only">(current)</span></a>
              </li>
              <li class="page-item disabled" aria-label="Next">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection