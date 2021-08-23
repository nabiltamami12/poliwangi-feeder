@extends('layouts.mainAdmin')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid" id="admin_masterdatakelas">
  <!-- Modal -->
  <div class="modal fade" id="deleteKelasModal" tabindex="-1" aria-labelledby="deleteKelasModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <div class="modal-header">
          <h5 class="modal-title text-warning text-center">Peringatan</h5>
        </div>
        <div class="modal-body">
          <p class="text-center">Apakah anda yakin mau menghapus data kelas :</p>
          <h2 class="text-center">Ilmu Gigi Anak</h2>
          <h2 class="text-center">Kode : KGA001</h2>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-modal-cancel" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary btn-modal-ok">Hapus data</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0">
          <div class=" row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Data Kelas</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <a class="btn btn-primary" href="/admin/masterdata/datakelas/tambahdata" role="button">
                <i class="iconify-inline mr-1" data-icon="bx:bxs-plus-circle"></i>
                Tambah
              </a>
              <button type="button" class="btn btn-info_transparent text-primary ml-0 ml-md-2">
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
                <th scope="col" style="width: 60%">Kelas</th>
                <th scope="col" class="text-center">Kode</th>
                <th scope="col" class="text-center">kapasitas</th>
                <th scope="col" class="text-center">aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center px-2">1</td>
                <td class="font-weight-bold text-capitalize">Ilmu gigi I</td>
                <td class="text-center">G001</td>
                <td class="text-center">24</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datakelas/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteKelasModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">2</td>
                <td class="font-weight-bold text-capitalize">Ilmu gigi I</td>
                <td class="text-center">G002</td>
                <td class="text-center">40</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datakelas/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteKelasModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">3</td>
                <td class="font-weight-bold text-capitalize">Ilmu gigi I</td>
                <td class="text-center">G003</td>
                <td class="text-center">24</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datakelas/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteKelasModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">4</td>
                <td class="font-weight-bold text-capitalize">Ilmu gigi I</td>
                <td class="text-center">G004</td>
                <td class="text-center">45</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datakelas/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteKelasModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">5</td>
                <td class="font-weight-bold text-capitalize">Ilmu gigi I</td>
                <td class="text-center">G005</td>
                <td class="text-center">35</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datakelas/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteKelasModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">6</td>
                <td class="font-weight-bold text-capitalize">Ilmu gigi I</td>
                <td class="text-center">G006</td>
                <td class="text-center">40</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datakelas/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteKelasModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">7</td>
                <td class="font-weight-bold text-capitalize">Ilmu gigi I</td>
                <td class="text-center">G007</td>
                <td class="text-center">50</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datakelas/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteKelasModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">8</td>
                <td class="font-weight-bold text-capitalize">Ilmu gigi I</td>
                <td class="text-center">G008</td>
                <td class="text-center">50</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datakelas/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteKelasModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">9</td>
                <td class="font-weight-bold text-capitalize">Ilmu gigi I</td>
                <td class="text-center">G009</td>
                <td class="text-center">50</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datakelas/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteKelasModal" class="iconify delete-icon"
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