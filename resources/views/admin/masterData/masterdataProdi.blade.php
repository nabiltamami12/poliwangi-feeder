@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid">
  <!-- Modal -->
  <div class="modal fade" id="deleteProdiModal" tabindex="-1" aria-labelledby="deleteProdiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <div class="modal-header">
          <h5 class="modal-title text-warning text-center">Peringatan</h5>
        </div>
        <div class="modal-body">
          <p class="text-center">Apakah anda yakin mau menghapus data program studi :</p>
          <h2 class="text-center">Ilmu Kedokteran Gigi Anak</h2>
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
              <h2 class="mb-0 text-center text-md-left">Data Program Studi</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <a class="btn btn-primary" href="/admin/masterdata/dataprodi/tambahdata" role="button">
                <i class="iconify-inline mr-1" data-icon="bx:bxs-plus-circle"></i>
                Tambah
              </a>
              <button type="button" class="btn btn-warning ml-md-2">
                <i class="iconify-inline mr-1" data-icon="bx:bx-upload"></i>
                <span>Eksport</span>
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
                <th scope="col" style="width: 80%">nama Program Studi</th>
                <th scope="col" class="text-center">aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center px-2">1</td>
                <td class="font-weight-bold text-capitalize">D3 Teknik Sipil</td>
                <td class="text-center">
                  <a href="/admin/masterdata/dataprodi/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteProdiModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">2</td>
                <td class="font-weight-bold text-capitalize">D3 Teknik Mesin</td>
                <td class="text-center">
                  <a href="/admin/masterdata/dataprodi/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteProdiModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">3</td>
                <td class="font-weight-bold text-capitalize">D3 Teknik Informatika</td>
                <td class="text-center">
                  <a href="/admin/masterdata/dataprodi/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteProdiModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">4</td>
                <td class="font-weight-bold text-capitalize">D4 Agribisnis</td>
                <td class="text-center">
                  <a href="/admin/masterdata/dataprodi/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteProdiModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">5</td>
                <td class="font-weight-bold text-capitalize">D4 Manajemen Bisnis Pariwisata</td>
                <td class="text-center">
                  <a href="/admin/masterdata/dataprodi/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteProdiModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">6</td>
                <td class="font-weight-bold text-capitalize">D4 Teknik Pengolahan Hasil Ternak</td>
                <td class="text-center">
                  <a href="/admin/masterdata/dataprodi/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteProdiModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">7</td>
                <td class="font-weight-bold text-capitalize">D4 Teknik Manufaktur Perkapalan.</td>
                <td class="text-center">
                  <a href="/admin/masterdata/dataprodi/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteProdiModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
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
</section>
@endsection