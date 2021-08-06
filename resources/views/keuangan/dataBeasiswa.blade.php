@extends('layouts.mainKeuangan')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid" id="keuangan_dataBeasiswa">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0 ">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Data Beasiswa</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <button type="button" class="btn btn-primary">
                <span class="iconify mr-2" data-icon="bx:bx-download"></span>
                <span>Import</span>
              </button>
              <button type="button" class="btn btn-primary ml-3">
                <span class="iconify mr-2" data-icon="bx:bx-upload"></span>
                <span>Eksport</span>
              </button>
            </div>
          </div>

          <hr class="my-4">

          <div class="row align-items-center padding--small py-0 ">
            <div class="col-sm-6 col-12">
              <div class="form-group row">
                <select class="form-control" id="dataperhalaman">
                  <option>10</option>
                  <option>20</option>
                  <option>30</option>
                </select>
                <label class="label-datashowperpage ml-3" for="dataperhalaman">Data per Halaman</label>
              </div>
            </div>

            <div class="col-md-4 col-12 offset-md-2 offset-0 mt-md-0 mt-2 p-0 text-right">
              <label class="sr-only" for="searchdata">Search</label>
              <div class="input-group">
                <input type="search" class="form-control" id="searchdata" placeholder="Pencarian ...">
                <div class="input-group-prepend">
                  <div class="input-group-text search-icon">
                    <span class="iconify" data-icon="fluent:search-32-regular"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="border-0 text-center px-2">No</th>
                <th scope="col" class="border-0" style="width: 20%">Nama</th>
                <th scope="col" class="border-0 text-center">Nim</th>
                <th scope="col" class="border-0 text-center">Durasi</th>
                <th scope="col" class="border-0 text-center">Jenis Beasiswa</th>
                <th scope="col" class="border-0">Keterangan</th>
                <th scope="col" class="border-0 text-center">Aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center px-2">1</td>
                <td class="font-weight-bold text-capitalize">Jessica Charisa</td>
                <td class="text-center">4891203526</td>
                <td class="text-center">1 Semester</td>
                <td class="text-center">Beasiswa Kampus</td>
                <td class="text-capitalize">didapatkan pada 12/04/21</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">2</td>
                <td class="font-weight-bold text-capitalize">John Martin</td>
                <td class="text-center">4891203526</td>
                <td class="text-center">1 Semester</td>
                <td class="text-center">Beasiswa Kampus</td>
                <td class="text-capitalize">didapatkan pada 12/04/21</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">3</td>
                <td class="font-weight-bold text-capitalize">Farhan Pratama</td>
                <td class="text-center">4891203526</td>
                <td class="text-center">1 Semester</td>
                <td class="text-center">Beasiswa Kampus</td>
                <td class="text-capitalize">didapatkan pada 12/04/21</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">4</td>
                <td class="font-weight-bold text-capitalize">Widya Astuti</td>
                <td class="text-center">4891203526</td>
                <td class="text-center">1 Semester</td>
                <td class="text-center">Beasiswa Kampus</td>
                <td class="text-capitalize">didapatkan pada 12/04/21</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">5</td>
                <td class="font-weight-bold text-capitalize">Jessica Charisa</td>
                <td class="text-center">4891203526</td>
                <td class="text-center">1 Semester</td>
                <td class="text-center">Beasiswa Kampus</td>
                <td class="text-capitalize">didapatkan pada 12/04/21</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">6</td>
                <td class="font-weight-bold text-capitalize">Jessica Charisa</td>
                <td class="text-center">4891203526</td>
                <td class="text-center">1 Semester</td>
                <td class="text-center">Beasiswa Kampus</td>
                <td class="text-capitalize">didapatkan pada 12/04/21</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">7</td>
                <td class="font-weight-bold text-capitalize">Jessica Charisa</td>
                <td class="text-center">4891203526</td>
                <td class="text-center">1 Semester</td>
                <td class="text-center">Beasiswa Kampus</td>
                <td class="text-capitalize">didapatkan pada 12/04/21</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">8</td>
                <td class="font-weight-bold text-capitalize">Jessica Charisa</td>
                <td class="text-center">4891203526</td>
                <td class="text-center">1 Semester</td>
                <td class="text-center">Beasiswa Kampus</td>
                <td class="text-capitalize">didapatkan pada 12/04/21</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">9</td>
                <td class="font-weight-bold text-capitalize">Jessica Charisa</td>
                <td class="text-center">4891203526</td>
                <td class="text-center">1 Semester</td>
                <td class="text-center">Beasiswa Kampus</td>
                <td class="text-capitalize">didapatkan pada 12/04/21</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="row justify-content-between align-items-center table-information">
          <h3>Menampilkan 1 sampai 9 dari 9 total data</h3>
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