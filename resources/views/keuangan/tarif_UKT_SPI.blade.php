@extends('layouts.mainAkademik')

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
              <h2 class="mb-0 text-center text-md-left">Tarif SPI & UKT</h2>
            </div>
            <div class="col text-right">
              <button type="button" onclick="add_btn()" class="btn btn-primary "><img src="/images/add-icon--white.png" alt="">Tambah</button>
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
                <th rowspan="2" scope="col" class="text-center px-2">No</th>
                <th rowspan="2" scope="col" class="text-center px-2">Prodi</th>
                <th rowspan="2" scope="col" class="text-center px-2">Sumbangan<br>pembangunan<br>institusi</th>
                <th colspan="8" scope="col" class="text-center px-2">Tarif UKT</th>
              </tr>
              <tr>
                <th colspan="1" scope="col" class="text-center px-2">Kelompok<br>1</th>
                <th colspan="1" scope="col" class="text-center px-2">Kelompok<br>2</th>
                <th colspan="1" scope="col" class="text-center px-2">Kelompok<br>3</th>
                <th colspan="1" scope="col" class="text-center px-2">Kelompok<br>4</th>
                <th colspan="1" scope="col" class="text-center px-2">Kelompok<br>5</th>
                <th colspan="1" scope="col" class="text-center px-2">Kelompok<br>6</th>
                <th colspan="1" scope="col" class="text-center px-2">Kelompok<br>7</th>
                <th colspan="1" scope="col" class="text-center px-2">Kelompok<br>8</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center px-2">1</td>
                <td class="font-weight-bold text-capitalize px-2">D3 Teknik informatika</td>
                <td class="text-center px-2">Rp. 5.000.000</td>
                <td class="text-center px-2">Rp. 500.000</td>
                <td class="text-center px-2">Rp. 1.000.000</td>
                <td class="text-center px-2">Rp. 2.400.000</td>
                <td class="text-center px-2">Rp. 3.000.000</td>
                <td class="text-center px-2">Rp. 3.500.000</td>
                <td class="text-center px-2">Rp. 4.000.000</td>
                <td class="text-center px-2">Rp. 4.500.000</td>
                <td class="text-center px-2">Rp. 5.000.000</td>
              </tr>

              <tr>
                <td class="text-center px-2">2</td>
                <td class="font-weight-bold text-capitalize px-2">D3 Teknik mesin</td>
                <td class="text-center px-2">Rp. 5.000.000</td>
                <td class="text-center px-2">Rp. 500.000</td>
                <td class="text-center px-2">Rp. 1.000.000</td>
                <td class="text-center px-2">Rp. 2.400.000</td>
                <td class="text-center px-2">Rp. 3.000.000</td>
                <td class="text-center px-2">Rp. 3.500.000</td>
                <td class="text-center px-2">Rp. 4.000.000</td>
                <td class="text-center px-2">Rp. 4.500.000</td>
                <td class="text-center px-2">Rp. 5.000.000</td>
              </tr>

              <tr>
                <td class="text-center px-2">3</td>
                <td class="font-weight-bold text-capitalize px-2">D3 Teknik sipil</td>
                <td class="text-center px-2">Rp. 5.000.000</td>
                <td class="text-center px-2">Rp. 500.000</td>
                <td class="text-center px-2">Rp. 1.000.000</td>
                <td class="text-center px-2">Rp. 2.400.000</td>
                <td class="text-center px-2">Rp. 3.000.000</td>
                <td class="text-center px-2">Rp. 3.500.000</td>
                <td class="text-center px-2">Rp. 4.000.000</td>
                <td class="text-center px-2">Rp. 4.500.000</td>
                <td class="text-center px-2">Rp. 5.000.000</td>
              </tr>

              <tr>
                <td class="text-center px-2">4</td>
                <td class="font-weight-bold text-capitalize px-2">d4 agribisnis</td>
                <td class="text-center px-2">Rp. 5.000.000</td>
                <td class="text-center px-2">Rp. 500.000</td>
                <td class="text-center px-2">Rp. 1.000.000</td>
                <td class="text-center px-2">Rp. 2.400.000</td>
                <td class="text-center px-2">Rp. 3.000.000</td>
                <td class="text-center px-2">Rp. 3.500.000</td>
                <td class="text-center px-2">Rp. 4.000.000</td>
                <td class="text-center px-2">Rp. 4.500.000</td>
                <td class="text-center px-2">Rp. 5.000.000</td>
              </tr>

              <tr>
                <td class="text-center px-2">5</td>
                <td class="font-weight-bold text-capitalize px-2">d4 manajemen bisnis pariwisata</td>
                <td class="text-center px-2">Rp. 5.000.000</td>
                <td class="text-center px-2">Rp. 500.000</td>
                <td class="text-center px-2">Rp. 1.000.000</td>
                <td class="text-center px-2">Rp. 2.400.000</td>
                <td class="text-center px-2">Rp. 3.000.000</td>
                <td class="text-center px-2">Rp. 3.500.000</td>
                <td class="text-center px-2">Rp. 4.000.000</td>
                <td class="text-center px-2">Rp. 4.500.000</td>
                <td class="text-center px-2">Rp. 5.000.000</td>
              </tr>

              <tr>
                <td class="text-center px-2">6</td>
                <td class="font-weight-bold text-capitalize px-2">d4 teknologi pengolahan hasil ternak</td>
                <td class="text-center px-2">Rp. 5.000.000</td>
                <td class="text-center px-2">Rp. 500.000</td>
                <td class="text-center px-2">Rp. 1.000.000</td>
                <td class="text-center px-2">Rp. 2.400.000</td>
                <td class="text-center px-2">Rp. 3.000.000</td>
                <td class="text-center px-2">Rp. 3.500.000</td>
                <td class="text-center px-2">Rp. 4.000.000</td>
                <td class="text-center px-2">Rp. 4.500.000</td>
                <td class="text-center px-2">Rp. 5.000.000</td>
              </tr>

              <tr>
                <td class="text-center px-2">7</td>
                <td class="font-weight-bold text-capitalize px-2">d4 teknik manufaktur kapal</td>
                <td class="text-center px-2">Rp. 5.000.000</td>
                <td class="text-center px-2">Rp. 500.000</td>
                <td class="text-center px-2">Rp. 1.000.000</td>
                <td class="text-center px-2">Rp. 2.400.000</td>
                <td class="text-center px-2">Rp. 3.000.000</td>
                <td class="text-center px-2">Rp. 3.500.000</td>
                <td class="text-center px-2">Rp. 4.000.000</td>
                <td class="text-center px-2">Rp. 4.500.000</td>
                <td class="text-center px-2">Rp. 5.000.000</td>
              </tr>

            </tbody>
          </table>
        </div>

        <div class="row justify-content-between align-items-center table-information">
          <h3>Menampilkan 1 sampai 7 dari 7 total data</h3>
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