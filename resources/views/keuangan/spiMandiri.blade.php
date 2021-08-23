@extends('layouts.mainKeuangan')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0 m-0 border-0 ">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Data Sumbangan Pengembangan Institusi</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <button type="button" class="btn btn-primary">
                <i class="iconify-inline mr-1" data-icon="bx:bx-download"></i>
                Import
              </button>
              <button type="button" class="btn btn-warning ml-0 ml-md-2">
                <i class="iconify-inline mr-1" data-icon="bx:bx-upload"></i>
                Eksport
              </button>
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
          <table class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center pr-0">No</th>
                <th scope="col" class="text-center">NIM</th>
                <th scope="col" style="width: 30%">Nama</th>
                <th scope="col" class="text-center">Tanggal</th>
                <th scope="col" class="text-right">Tarif spi</th>
                <th scope="col" class="text-right">Pembayaran spi</th>
                <th scope="col" class="text-right">Piutang</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center pr-0">1</td>
                <td class="text-center">362155401054</td>
                <td class="font-weight-bold text-capitalize">Afkarina ferin verigia</td>
                <td class="text-center text-capitalize">23 april 2021</td>
                <td class="font-weight-bold text-right">Rp. 5.000.000</td>
                <td class="font-weight-bold text-right">Rp. 3.000.000</td>
                <td class="font-weight-bold text-right">Rp. 2.000.000</td>
              </tr>

              <tr>
                <td class="text-center pr-0">2</td>
                <td class="text-center">3621554001094</td>
                <td class="font-weight-bold text-capitalize">Budi</td>
                <td class="text-center text-capitalize">23 mei 2021</td>
                <td class="font-weight-bold text-right">Rp. 5.000.000</td>
                <td class="font-weight-bold text-right">Rp. 3.500.000</td>
                <td class="font-weight-bold text-right">Rp. 1.500.000</td>
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