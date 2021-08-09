@extends('layouts.mainProdi')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__prodi container-fluid" id="prodi_masterdatajamkuliah">
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
            <h2 class="mb-0 text-center text-md-left">Data Jam Kuliah</h2>
          </div>
          <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
            <a class="btn btn-primary" href="/prodi/masterdata/datajamkuliah/tambahdata" role="button">
              <span class="iconify mr-2" data-icon="bx:bxs-plus-circle"></span>
              Tambah
            </a>
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
        <table class="table align-items-center table-flush table-borderless">
          <thead class="table-header">
            <tr>
              <th scope="col" class="border-0 text-center px-2">No</th>
              <th scope="col" class="border-0" style="width: 40%">Hari</th>
              <th scope="col" class="border-0 text-center">Jam</th>
              <th scope="col" class="border-0 text-center">Waktu kuliah</th>
              <th scope="col" class="border-0 text-center">Waktu selesai</th>
              <th scope="col" class="border-0 text-center">aksi</th>
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
                <a href="/prodi/masterdata/datajamkuliah/updatedata"><span class="iconify edit-icon"
                    data-icon="bx:bx-edit-alt"></span></a>
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
                <a href="/prodi/masterdata/datajamkuliah/updatedata"><span class="iconify edit-icon"
                    data-icon="bx:bx-edit-alt"></span></a>
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
                <a href="/prodi/masterdata/datajamkuliah/updatedata"><span class="iconify edit-icon"
                    data-icon="bx:bx-edit-alt"></span></a>
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
                <a href="/prodi/masterdata/datajamkuliah/updatedata"><span class="iconify edit-icon"
                    data-icon="bx:bx-edit-alt"></span></a>
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
                <a href="/prodi/masterdata/datajamkuliah/updatedata"><span class="iconify edit-icon"
                    data-icon="bx:bx-edit-alt"></span></a>
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