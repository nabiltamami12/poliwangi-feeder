@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-4">
              <h2 class="mb-0 text-center text-md-left">Rekapitulasi Penyisihan Piutang</h2>
            </div>
            <div class="col-12 col-md-8 text-center text-md-right mt-3 mt-md-0">
              @if (false)
              <button type="button" class="btn btn-info_transparent text-primary mr-0 mr-md-2">
                <i class="iconify-inline mr-2" data-icon="bx:bx-download"></i>
                Import
              </button>
              @endif

              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="iconify" data-icon="bx:bx-printer"></i>
                  <span class="mr-1">Cetak Rekap Piutang</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Cetak</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4">

        <div class="filter_data">
          <form>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="program_studi">Program Studi</label>
                  <select class="form-control" id="program_studi">
                    <option selected>Teknik Informatika</option>
                    <option>Teknik Sipil</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3 mt-3 mt-md-0">
                <div class="form-group">
                  <label for="jenjang">Jenjang</label>
                  <select class="form-control" id="jenjang">
                    <option selected>D3</option>
                    <option>D4</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3 mt-3 mt-md-0">
                <div class="form-group">
                  <label for="jenis_piutang">Jenis Piutang</label>
                  <select class="form-control" id="jenis_piutang">
                    <option selected>Piutang Pendidikan</option>
                    <option>Piutang Lainnya</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3 mt-3 mt-md-0">
                <div class="form-group">
                  <label for="semester">Semester</label>
                  <select class="form-control" id="semester">
                    <option>Ganjil</option>
                    <option selected>Genap</option>
                  </select>
                </div>
              </div>
            </div>
          </form>
        </div>

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
          <table class="table align-items-center table-flush table-borderless">
            <thead class="table-header">
              <tr>
                <th scope="col" style="width: 25%">Nama</th>
                <th colspan="2" scope="col" class="text-center pl-1">kualitas piutang</th>
                <th colspan="2" scope="col" class="text-center pl-1">Penyisihan piutang</th>
                <th scope="col" class="text-center">Jumlah netto</th>
                <th scope="col" class="text-center">aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td rowspan="5" class="font-weight-bold text-capitalize">Sindy Eka Putri Septiani</td>
                <td class="bordered pl-1">Lancar</td>
                <td class="text-right font-weight-bold bordered_sm">Rp. 2.000.000</td>
                <td class="bordered pl-1">0.5%</td>
                <td class="text-right font-weight-bold bordered_sm">Rp. 10.000</td>
                <td rowspan="5" class="text-center font-weight-bold">Rp. 1.990.000</td>
                <td rowspan="5" class="text-center">
                  <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  <i class="iconify delete-icon" data-icon="bx:bx-trash"></i>
                </td>
              </tr>
              <tr>
                <td class="bordered pl-1">Kurang Lancar</td>
                <td class="text-right font-weight-bold bordered_sm">-</td>
                <td class="bordered pl-1">10%</td>
                <td class="text-right font-weight-bold bordered_sm">-</td>
              </tr>
              <tr>
                <td class="bordered pl-1">Diragukan</td>
                <td class="text-right font-weight-bold bordered_sm">-</td>
                <td class="bordered pl-1">50%</td>
                <td class="text-right font-weight-bold bordered_sm">-</td>
              </tr>
              <tr>
                <td class="bordered pl-1">Macet</td>
                <td class="text-right font-weight-bold bordered_sm">-</td>
                <td class="bordered pl-1">100%</td>
                <td class="text-right font-weight-bold bordered_sm">-</td>
              </tr>
              <tr class="bordered">
                <td class="pl-1">Jumlah</td>
                <td class="text-right font-weight-bold">Rp. 2.000.000</td>
                <td class="pl-1">Jumlah</td>
                <td class="text-right font-weight-bold">Rp. 10.000</td>
              </tr>

              <tr>
                <td rowspan="5" class="font-weight-bold text-capitalize">Sindy Eka Putri Septiani</td>
                <td class="bordered pl-1">Lancar</td>
                <td class="text-right font-weight-bold bordered_sm">Rp. 2.000.000</td>
                <td class="bordered pl-1">0.5%</td>
                <td class="text-right font-weight-bold bordered_sm">Rp. 10.000</td>
                <td rowspan="5" class="text-center font-weight-bold">Rp. 1.990.000</td>
                <td rowspan="5" class="text-center">
                  <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  <i class="iconify delete-icon" data-icon="bx:bx-trash"></i>
                </td>
              </tr>
              <tr>
                <td class="bordered pl-1">Kurang Lancar</td>
                <td class="text-right font-weight-bold bordered_sm">-</td>
                <td class="bordered pl-1">10%</td>
                <td class="text-right font-weight-bold bordered_sm">-</td>
              </tr>
              <tr>
                <td class="bordered pl-1">Diragukan</td>
                <td class="text-right font-weight-bold bordered_sm">-</td>
                <td class="bordered pl-1">50%</td>
                <td class="text-right font-weight-bold bordered_sm">-</td>
              </tr>
              <tr>
                <td class="bordered pl-1">Macet</td>
                <td class="text-right font-weight-bold bordered_sm">-</td>
                <td class="bordered pl-1">100%</td>
                <td class="text-right font-weight-bold bordered_sm">-</td>
              </tr>
              <tr>
                <td class="pl-1">Jumlah</td>
                <td class="text-right font-weight-bold">Rp. 2.000.000</td>
                <td class="pl-1">Jumlah</td>
                <td class="text-right font-weight-bold">Rp. 10.000</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="row justify-content-between align-items-center table-information">
          <h3>Menampilkan 1 sampai 2 dari 2 total data</h3>
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