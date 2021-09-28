@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid">
  <!-- Modal -->
  <div class="modal fade" id="deleteMahasiswaModal" tabindex="-1" aria-labelledby="deleteMahasiswaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <div class="modal-header">
          <h5 class="modal-title text-warning text-center">Peringatan</h5>
        </div>
        <div class="modal-body">
          <p class="text-center">Apakah anda yakin mau menghapus data mahasiswa :</p>
          <h2 class="text-center">Dwi Rahmawati - 4927319320</h2>
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
              <h2 class="mb-0 text-center text-md-left">Data Mahasiswa</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <a class="btn btn-primary" href="/admin/masterdata/datamahasiswa/tambahdata" role="button">
                <i class="iconify-inline mr-1" data-icon="bx:bxs-plus-circle"></i>
                Tambah
              </a>
              <button type="button" class="btn btn-warning ml-md-2">
                <i class="iconify-inline mr-1" data-icon="bx:bx-upload"></i>
                Eksport
              </button>
            </div>
          </div>
        </div>
        <hr class="my-4">

        <form>
          <div class="row">
            <div class="col-md-4 form-group">
              <label for="kelas">Kelas</label>
              <select class="form-control" id="kelas">
                <option selected>Semua Kelas</option>
                <option>Kelas 1</option>
              </select>
            </div>
            <div class="col-md-4 form-group">
              <label for="tahun">Tahun</label>
              <select class="form-control" id="tahun">
                <option selected>2020</option>
                <option>2021</option>
              </select>
            </div>
            <div class="col-md-4 form-group">
              <label for="semester">Semester</label>
              <select class="form-control" id="semester">
                <option>GANJIL</option>
                <option selected>GENAP</option>
              </select>
            </div>
          </div>
        </form>

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
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Dosen Wali</th>
                <th scope="col" class="text-center">Tanggal Lahir</th>
                <th scope="col" class="text-center">No. Telp</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center px-2">1</td>
                <td>4891203526</td>
                <td class="font-weight-bold text-capitalize">Dwi Rahmawati</td>
                <td class="font-weight-bold text-capitalize">Eka Mistiko Rini</td>
                <td class="text-center">04/06/2001</td>
                <td class="text-center">081469785240</td>
                <td class="text-center">Dwi.rahma@gmail.com</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datamahasiswa/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteMahasiswaModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">2</td>
                <td>4892062262</td>
                <td class="font-weight-bold text-capitalize">Januar Pratama</td>
                <td class="font-weight-bold text-capitalize">Eka Mistiko Rini</td>
                <td class="text-center">24/12/2002</td>
                <td class="text-center">087562986265</td>
                <td class="text-center">januar2412@gmail.com</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datamahasiswa/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteMahasiswaModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">3</td>
                <td>4892058323</td>
                <td class="font-weight-bold text-capitalize">indah pratiwi</td>
                <td class="font-weight-bold text-capitalize">Eka Mistiko Rini</td>
                <td class="text-center">13/01/2002</td>
                <td class="text-center">081247925428</td>
                <td class="text-center">indah.prtw@gmail.com</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datamahasiswa/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteMahasiswaModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">4</td>
                <td>4892058323</td>
                <td class="font-weight-bold text-capitalize">indah pratiwi</td>
                <td class="font-weight-bold text-capitalize">Lutfi Hakim</td>
                <td class="text-center">13/01/2002</td>
                <td class="text-center">081247925428</td>
                <td class="text-center">indah.prtw@gmail.com</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datamahasiswa/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteMahasiswaModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">5</td>
                <td>4892058323</td>
                <td class="font-weight-bold text-capitalize">indah pratiwi</td>
                <td class="font-weight-bold text-capitalize">Lutfi Hakim</td>
                <td class="text-center">13/01/2002</td>
                <td class="text-center">081247925428</td>
                <td class="text-center">indah.prtw@gmail.com</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datamahasiswa/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteMahasiswaModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">6</td>
                <td>4892058323</td>
                <td class="font-weight-bold text-capitalize">indah pratiwi</td>
                <td class="font-weight-bold text-capitalize">Lutfi Hakim</td>
                <td class="text-center">13/01/2002</td>
                <td class="text-center">081247925428</td>
                <td class="text-center">indah.prtw@gmail.com</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datamahasiswa/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteMahasiswaModal" class="iconify delete-icon"
                    data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">7</td>
                <td>4892058323</td>
                <td class="font-weight-bold text-capitalize">indah pratiwi</td>
                <td class="font-weight-bold text-capitalize">Lutfi Hakim</td>
                <td class="text-center">13/01/2002</td>
                <td class="text-center">081247925428</td>
                <td class="text-center">indah.prtw@gmail.com</td>
                <td class="text-center">
                  <a href="/admin/masterdata/datamahasiswa/updatedata"><i class="iconify edit-icon mr-2"
                      data-icon="bx:bx-edit-alt"></i></a>
                  <span data-toggle="modal" data-target="#deleteMahasiswaModal" class="iconify delete-icon"
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
  </div>
</section>
@endsection