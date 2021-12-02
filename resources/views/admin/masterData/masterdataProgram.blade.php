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
              <h2 class="mb-0 text-center text-md-left">Data Program</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <a class="btn btn-primary" href="/admin/masterdata/datadosen/tambahdata" role="button">
                <i class="iconify-inline mr-1" data-icon="bx:bxs-plus-circle"></i>
                Tambah
              </a>
              <button type="button" class="btn btn-warning ml-md-2">
                <i class="iconify-inline mr-1" data-icon="bx:bx-upload"></i>
                <span>Eksport</span>
              </button>
            </div>
          </div>
          <hr class="mt-4">
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
          <table class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center px-2">Program</th>
                <th scope="col" class="text-center">Keterangan</th>
                <th scope="col" class="text-center px-0">Lama Studi</th>
                <th scope="col" class="text-center">Gelar</th>
                <th scope="col" class="text-center">Gelar dalam inggris</th>
                <th scope="col" class="text-center">aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center px-2 font-weight-500">D1</td>
                <td class="text-capitalize">pendidikan diploma satu</td>
                <td class="text-center">1</td>
                <td class="text-capitalize">ahli pratama (A.P.)</td>
                <td>-</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datadosen/updatedata">
                    <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  </a>
                  <span data-toggle="modal" data-target="#deleteDosenModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2 font-weight-500">D2</td>
                <td class=text-capitalize">pendidikan diploma dua</td>
                <td class="text-center">2</td>
                <td class="text-capitalize">ahli muda (A.Ma.)</td>
                <td>-</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datadosen/updatedata">
                    <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  </a>
                  <span data-toggle="modal" data-target="#deleteDosenModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2 font-weight-500">D3</td>
                <td class="text-capitalize">akademik program diploma</td>
                <td class="text-center">3</td>
                <td class="text-capitalize">ahli madya (A.Md.)</td>
                <td>assistant engineer (A.Md.)</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datadosen/updatedata">
                    <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  </a>
                  <span data-toggle="modal" data-target="#deleteDosenModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2 font-weight-500">D4</td>
                <td class="text-capitalize">akademik program diploma</td>
                <td class="text-center">4</td>
                <td class="text-capitalize">Sarjana terapan (S.Tr.)</td>
                <td>-</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datadosen/updatedata">
                    <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  </a>
                  <span data-toggle="modal" data-target="#deleteDosenModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2 font-weight-500">D4LJ</td>
                <td class="text-capitalize">akademik sarjana terapan</td>
                <td class="text-center">4</td>
                <td class="text-capitalize">Sarjana terapan (S.Tr.)</td>
                <td>-</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datadosen/updatedata">
                    <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  </a>
                  <span data-toggle="modal" data-target="#deleteDosenModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2 font-weight-500">S2</td>
                <td class="text-capitalize">program pasca sarjana</td>
                <td class="text-center">2</td>
                <td class="text-capitalize">magister sains terapan</td>
                <td>-</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datadosen/updatedata">
                    <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  </a>
                  <span data-toggle="modal" data-target="#deleteDosenModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2 font-weight-500">D3LJ</td>
                <td class="text-capitalize">pendidikan diploma tiga</td>
                <td class="text-center">2</td>
                <td class="text-capitalize">ahli madya (A.Md.)</td>
                <td>assistant engineer (A.Md.)</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datadosen/updatedata">
                    <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  </a>
                  <span data-toggle="modal" data-target="#deleteDosenModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2 font-weight-500">S3</td>
                <td class="text-capitalize">S3</td>
                <td class="text-center">2</td>
                <td class="text-capitalize">-</td>
                <td>-</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datadosen/updatedata">
                    <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  </a>
                  <span data-toggle="modal" data-target="#deleteDosenModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="row justify-content-between align-items-center table-information">
          <h3>Menampilkan 1 sampai 9 dari 9 total data</h3>
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