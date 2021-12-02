@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid">
  <!-- Modal -->
  <div class="modal fade" id="deleteMatkulModal" tabindex="-1" aria-labelledby="deleteMatkulModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <div class="modal-header">
          <h5 class="modal-title text-warning text-center">Peringatan</h5>
        </div>
        <div class="modal-body">
          <p class="text-center">Apakah anda yakin mau menghapus data mata kuliah :</p>
          <h2 class="text-center">Bahasa Inggris</h2>
          <h2 class="text-center">Kode : ENG001</h2>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary">Hapus data</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Data Mata Kuliah</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <a class="btn btn-primary" href="/admin/masterdata/datamatakuliah/tambahdata" role="button">
                <i class="iconify-inline mr-1" data-icon="bx:bxs-plus-circle"></i>
                Tambah
              </a>
              <button type="button" class="btn btn-info_transparent text-primary ml-md-2">
                <i class="iconify-inline mr-1" data-icon="bx:bx-download"></i>
                Import
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
                <th scope="col" class="text-center px-2">No</th>
                <th scope="col" class="text-center">Kode</th>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Kurikulum</th>
                <th scope="col" class="text-center">smstr</th>
                <th scope="col" class="text-center">sks-t</th>
                <th scope="col" class="text-center">sks-p</th>
                <th scope="col" class="text-center">sks-l</th>
                <th scope="col" class="text-center">aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center px-2">1</td>
                <td class="text-center">1111</td>
                <td class="font-weight-bold text-capitalize">Bahasa Inggris</td>
                <td class="text-capitalize">kur. percobaan</td>
                <td class="text-center">1</td>
                <td class="text-center">2</td>
                <td class="text-center">2</td>
                <td class="text-center">1</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datamatakuliah/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteMatkulModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">2</td>
                <td class="text-center">1112</td>
                <td class="font-weight-bold text-capitalize">Bahasa Indonesia</td>
                <td class="text-capitalize">kur. percobaan</td>
                <td class="text-center">1</td>
                <td class="text-center">2</td>
                <td class="text-center">2</td>
                <td class="text-center">1</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datamatakuliah/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteMatkulModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">3</td>
                <td class="text-center">P001</td>
                <td class="font-weight-bold text-capitalize">Pengantar perkuliahan I</td>
                <td class="text-capitalize">kur. percobaan</td>
                <td class="text-center">1</td>
                <td class="text-center">2</td>
                <td class="text-center">2</td>
                <td class="text-center">1</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datamatakuliah/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteMatkulModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">4</td>
                <td class="text-center">P002</td>
                <td class="font-weight-bold text-capitalize">Pengantar perkuliahan II</td>
                <td class="text-capitalize">kur. percobaan</td>
                <td class="text-center">1</td>
                <td class="text-center">2</td>
                <td class="text-center">2</td>
                <td class="text-center">1</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datamatakuliah/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteMatkulModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">5</td>
                <td class="text-center">M001</td>
                <td class="font-weight-bold text-capitalize">matematika dasar</td>
                <td class="text-capitalize">kur. percobaan</td>
                <td class="text-center">1</td>
                <td class="text-center">2</td>
                <td class="text-center">2</td>
                <td class="text-center">1</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datamatakuliah/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteMatkulModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">6</td>
                <td class="text-center">M002</td>
                <td class="font-weight-bold text-capitalize">matematika lanjutan</td>
                <td class="text-capitalize">kur. percobaan</td>
                <td class="text-center">1</td>
                <td class="text-center">2</td>
                <td class="text-center">2</td>
                <td class="text-center">1</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datamatakuliah/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteMatkulModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">7</td>
                <td class="text-center">G001</td>
                <td class="font-weight-bold text-capitalize">ilmu gigi I</td>
                <td class="text-capitalize">kur. percobaan</td>
                <td class="text-center">1</td>
                <td class="text-center">2</td>
                <td class="text-center">2</td>
                <td class="text-center">1</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datamatakuliah/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteMatkulModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">8</td>
                <td class="text-center">G002</td>
                <td class="font-weight-bold text-capitalize">ilmu gigi II</td>
                <td class="text-capitalize">kur. percobaan</td>
                <td class="text-center">1</td>
                <td class="text-center">2</td>
                <td class="text-center">2</td>
                <td class="text-center">1</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datamatakuliah/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteMatkulModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">9</td>
                <td class="text-center">G003</td>
                <td class="font-weight-bold text-capitalize">ilmu gigi III</td>
                <td class="text-capitalize">kur. percobaan</td>
                <td class="text-center">1</td>
                <td class="text-center">2</td>
                <td class="text-center">2</td>
                <td class="text-center">1</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datamatakuliah/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteMatkulModal" class="iconify delete-icon"
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