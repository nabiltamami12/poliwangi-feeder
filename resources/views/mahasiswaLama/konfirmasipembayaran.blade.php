@extends('layouts.mainMala')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="konfirmasi_pembayaran">
  <h1 class="page-content__title">Konfirmasi Pembayaran</h1>

  <div class="row">
    <div class="col-xl-12">
      <form class="form-input padding--big">
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <input type="text" class="form-control" id="keterangan"
            placeholder="Bukti pembayaran krs mata kuliah matematika (MTK01) ">
        </div>
        <div class="form-row">
          <div class="col-md-6 form-group">
            <label for="keterangan">File Bukti Pembayaran</label>
            <input type="text" class="form-control" id="butibayar" placeholder="Belum ada file terpilih">
          </div>
          <div class="col-md-6 upload mt-3 mt-md-0">
            <button type="submit" class="btn btn--blue">Upload Bukti Pembayaran</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header m-0 p-0 border-0">
          <div class="row align-items-center mt-0 filterSearch-data">
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

            <div class="col-md-4 col-12 offset-md-2 offset-0 mt-md-0 mt-2 text-right">
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
                <th scope="col" class="border-0 text-center px-2">No</th>
                <th scope="col" class="border-0 text-center">Tanggal Upload</th>
                <th scope="col" class="border-0">File</th>
                <th scope="col" class="border-0">Keterangan</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center px-2">1</td>
                <td class="text-center">27/05/2021</td>
                <td>
                  <span class="iconify text--blue" data-icon="bx:bx-download" data-inline="true"></span>
                  <span class="font--bold text--blue">Unduh File</span>
                </td>
                <td>Pembayaran</td>
              </tr>

              <tr>
                <td class="text-center px-2">2</td>
                <td class="text-center">15/04/2021</td>
                <td>
                  <span class="iconify text--blue" data-icon="bx:bx-download" data-inline="true"></span>
                  <span class="font--bold text--blue">Unduh File</span>
                </td>
                <td>Pembayaran pengantar perkuliahan I</td>
              </tr>

              <tr>
                <td class="text-center p-2">3</td>
                <td class="text-center">13/03/2021</td>
                <td>
                  <span class="iconify text--blue" data-icon="bx:bx-download" data-inline="true"></span>
                  <span class="font--bold text--blue">Unduh File</span>
                </td>
                <td>Pembayaran krs sem. 1</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="row justify-content-between align-items-center table-information">
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