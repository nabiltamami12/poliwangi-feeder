@extends('layouts.mainKeuangan')

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
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Data Pendaftar</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <button type="button" class="btn btn-primary">
                <i class="iconify-inline mr-2" data-icon="bx:bx-download"></i>
                Import
              </button>
              <button type="button" class="btn btn-warning ml-md-2">
                <i class="iconify-inline" data-icon="bx:bx-upload"></i>
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
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">No. VA</th>
                <th scope="col" style="width: 25%">Nama</th>
                <th scope="col" class="text-right" style="width: 25%">Nominal</th>
                <th scope="col" style="width: 25%">Status Bayar</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center">1</td>
                <td class="text-center">1281928746273601</td>
                <td class="font-weight-bold text-capitalize">Afkarina ferin verigia</td>
                <td class="text-right">Rp. 100.000</td>
                <td class="text-success text-uppercase font-weight-bold">lunas</td>
              </tr>

              <tr>
                <td class="text-center">2</td>
                <td class="text-center">1281928746273928</td>
                <td class="font-weight-bold text-capitalize">Budi</td>
                <td class="text-right">Rp. 100.000</td>
                <td class="text-success text-uppercase font-weight-bold">lunas</td>
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