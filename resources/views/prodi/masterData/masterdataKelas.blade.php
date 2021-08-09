@extends('layouts.mainProdi')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__prodi container-fluid" id="prodi_masterdatakelas">
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

        <div class="card-header p-0 m-0 border-0 
          <div class=" row align-items-center">
          <div class="col-12 col-md-6">
            <h2 class="mb-0 text-center text-md-left">Data Kelas</h2>
          </div>
          <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
            <a class="btn btn-primary" href="/prodi/masterdata/datakelas/tambahdata" role="button">
              <span class="iconify mr-2" data-icon="bx:bxs-plus-circle"></span>
              Tambah
            </a>
            <button type="button" class="btn-primary ml-3">
              <span class="iconify" data-icon="bx:bx-download"></span>
              Import
            </button>
          </div>
        </div>

        <hr class="my-4">

        <div class="row align-items-center padding--small py-0 ">
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
              <th scope="col" class="border-0" style="width: 60%">Kelas</th>
              <th scope="col" class="border-0 text-center">Kode</th>
              <th scope="col" class="border-0 text-center">kapasitas</th>
              <th scope="col" class="border-0 text-center">aksi</th>
            </tr>
          </thead>

          <tbody class="table-body">
            <tr>
              <td class="text-center px-2">1</td>
              <td class="font-weight-bold text-capitalize">Ilmu gigi I</td>
              <td class="text-center">G001</td>
              <td class="text-center">24</td>
              <td class="text-center">
                <a href="/prodi/masterdata/datakelas/updatedata"><span class="iconify edit-icon"
                    data-icon="bx:bx-edit-alt"></span></a>
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
                <a href="/prodi/masterdata/datakelas/updatedata"><span class="iconify edit-icon"
                    data-icon="bx:bx-edit-alt"></span></a>
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
                <a href="/prodi/masterdata/datakelas/updatedata"><span class="iconify edit-icon"
                    data-icon="bx:bx-edit-alt"></span></a>
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
                <a href="/prodi/masterdata/datakelas/updatedata"><span class="iconify edit-icon"
                    data-icon="bx:bx-edit-alt"></span></a>
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
                <a href="/prodi/masterdata/datakelas/updatedata"><span class="iconify edit-icon"
                    data-icon="bx:bx-edit-alt"></span></a>
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
                <a href="/prodi/masterdata/datakelas/updatedata"><span class="iconify edit-icon"
                    data-icon="bx:bx-edit-alt"></span></a>
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
                <a href="/prodi/masterdata/datakelas/updatedata"><span class="iconify edit-icon"
                    data-icon="bx:bx-edit-alt"></span></a>
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
                <a href="/prodi/masterdata/datakelas/updatedata"><span class="iconify edit-icon"
                    data-icon="bx:bx-edit-alt"></span></a>
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
                <a href="/prodi/masterdata/datakelas/updatedata"><span class="iconify edit-icon"
                    data-icon="bx:bx-edit-alt"></span></a>
                <span data-toggle="modal" data-target="#deleteKelasModal" class="iconify delete-icon"
                  data-icon="bx:bx-trash"></span>
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