@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid">
  <!-- Modal -->
  <div class="modal fade" id="deleteJamKuliahModal" tabindex="-1" aria-labelledby="deleteJamKuliahModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <div class="modal-header">
          <h5 class="modal-title text-warning text-center">Peringatan</h5>
        </div>
        <div class="modal-body">
          <p class="text-center">Apakah anda yakin mau menghapus data jam kuliah :</p>
          <h2 class="text-center">Hari Senin</h2>
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
          <div class=" row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Data Jam Kuliah</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <a class="btn btn-primary" href="/admin/masterdata/datajamkuliah/tambahdata" role="button">
                <i class="iconify-inline mr-1" data-icon="bx:bxs-plus-circle"></i>
                Tambah
              </a>
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
          <table class="table align-items-center table-flush table-borderless">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center px-2">No</th>
                <th scope="col" style="width: 40%">Hari</th>
                <th scope="col" class="text-center">Jam</th>
                <th scope="col" class="text-center">Waktu kuliah</th>
                <th scope="col" class="text-center">Waktu selesai</th>
                <th scope="col" class="text-center">aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td rowspan="3" class="text-center px-2">1</td>
                <td rowspan="3" class="font-weight-bold text-capitalize">Senin</td>
                <td class="text-center">1</td>
                <td class="text-center">07:00</td>
                <td class="text-center">09:00</td>
                <td rowspan="3" class="text-center">
                  <a href="/admin/masterdata/datajamkuliah/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteJamKuliahModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>
              <tr>
                <td class="text-center">2</td>
                <td class="text-center">09:00</td>
                <td class="text-center">11:00</td>
              </tr>
              <tr>
                <td class="text-center">3</td>
                <td class="text-center">11:00</td>
                <td class="text-center">13:00</td>
              </tr>

              <tr>
                <td rowspan="2" class="text-center px-2">2</td>
                <td rowspan="2" class="font-weight-bold text-capitalize">Selasa</td>
                <td class="text-center">1</td>
                <td class="text-center">07:00</td>
                <td class="text-center">09:00</td>
                <td rowspan="2" class="text-center">
                  <a href="/admin/masterdata/datajamkuliah/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteJamKuliahModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>
              <tr>
                <td class="text-center">2</td>
                <td class="text-center">09:00</td>
                <td class="text-center">11:00</td>
              </tr>

              <tr>
                <td rowspan="2" class="text-center px-2">3</td>
                <td rowspan="2" class="font-weight-bold text-capitalize">Rabu</td>
                <td class="text-center">1</td>
                <td class="text-center">07:00</td>
                <td class="text-center">09:00</td>
                <td rowspan="2" class="text-center">
                  <a href="/admin/masterdata/datajamkuliah/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteJamKuliahModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>
              <tr>
                <td class="text-center">2</td>
                <td class="text-center">09:00</td>
                <td class="text-center">11:00</td>
              </tr>

              <tr>
                <td rowspan="3" class="text-center px-2">4</td>
                <td rowspan="3" class="font-weight-bold text-capitalize">Kamis</td>
                <td class="text-center">1</td>
                <td class="text-center">07:00</td>
                <td class="text-center">09:00</td>
                <td rowspan="3" class="text-center">
                  <a href="/admin/masterdata/datajamkuliah/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteJamKuliahModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>
              <tr>
                <td class="text-center">2</td>
                <td class="text-center">09:00</td>
                <td class="text-center">11:00</td>
              </tr>
              <tr>
                <td class="text-center">3</td>
                <td class="text-center">11:00</td>
                <td class="text-center">13:00</td>
              </tr>


              <tr>
                <td rowspan="2" class="text-center px-2">5</td>
                <td rowspan="2" class="font-weight-bold text-capitalize">Jum'at</td>
                <td class="text-center">1</td>
                <td class="text-center">07:00</td>
                <td class="text-center">09:00</td>
                <td rowspan="2" class="text-center">
                  <a href="/admin/masterdata/datajamkuliah/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteJamKuliahModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>
              <tr>
                <td class="text-center">2</td>
                <td class="text-center">09:00</td>
                <td class="text-center">11:00</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="row justify-content-between align-items-center table-information">
          <h3>Menampilkan 1 sampai 5 dari 5 total data</h3>
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