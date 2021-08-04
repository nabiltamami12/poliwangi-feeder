@extends('layouts.mainKeuangan')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid" id="keuangan_piutangMahasiswa">
  <!-- Modal -->
  <div class="modal fade" id="dokumenPiutangModal" tabindex="-1" aria-labelledby="dokumenPiutangModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <div class="modal-header d-flex justify-content-center">
          <h5 class="modal-title">Dokumen Pengajuan Piutang</h5>
        </div>
        <div class="modal-body d-flex align-items-center justify-content-center">
          <div class="detail_dokumen d-flex align-items-center justify-content-between">
            <span>
              <span class="iconify mr-2" data-icon="bx:bxs-file-pdf" data-inline="false"></span>
              <span class="nama_dokumen">Dokumen_Bryan_Wijaya.jpg</span>
            </span>
            <span class="iconify" data-icon="bx:bx-cloud-download" data-inline="false"></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-modal-kembali" data-dismiss="modal">Kembali</button>
          <button type="button" class="btn btn-modal-setujui">Setujui</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0 rounded-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Piutang Mahasiswa</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <button type="button" class="btn--blue">
                <span>Upload</span>
                <span class="iconify ml-2" data-icon="bx:bx-caret-down" data-inline="true"></span>
              </button>
              <button type="button" class="btn--blue ml-3">
                <span class="iconify mr-2" data-icon="bx:bx-cloud-download" data-inline="true"></span>
                <span>Download Rekap</span>
              </button>
            </div>
          </div>

          <hr class="mt">

          <div class="row align-items-center padding--small py-0 filterSearch-data">
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
                    <span class="iconify" data-icon="fluent:search-32-regular" data-inline="true"></span>
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
                <th scope="col" class="border-0 pr-0">Tanggal</th>
                <th scope="col" class="border-0" style="width: 20%">Nama</th>
                <th scope="col" class="border-0">Nim</th>
                <th scope="col" class="border-0 text-center pr-0">Nominal</th>
                <th scope="col" class="border-0 text-center px-0">Aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center px-2">1</td>
                <td class="pr-0">23/08/2021</td>
                <td class="font-weight-bold text-capitalize">Jessica Charisa</td>
                <td>4891203526</td>
                <td class="text-center pr-0">4.500.000</td>
                <td class="text-center px-0">
                  <button type="button" class="btn_aksi btn--info mr-2" data-toggle="modal"
                    data-target="#dokumenPiutangModal">
                    <span class="iconify mr-2" data-icon="bx:bx-spreadsheet" data-inline="true"></span>
                    <span>Lihat Dokumen</span>
                  </button>
                  <button type="button" class="btn_aksi btn--blue">
                    <span class="iconify mr-2" data-icon="bx:bx-upload" data-inline="true"></span>
                    <span>Upload Perjanjian</span>
                  </button>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">2</td>
                <td class="pr-0">23/08/2021</td>
                <td class="font-weight-bold text-capitalize">Jessica Charisa</td>
                <td>4891203526</td>
                <td class="text-center pr-0">4.500.000</td>
                <td class="text-center px-0">
                  <button type="button" class="btn_aksi btn--info mr-2">
                    <span class="iconify mr-2" data-icon="bx:bx-spreadsheet" data-inline="true"></span>
                    <span>Lihat Dokumen</span>
                  </button>
                  <button type="button" class="btn_aksi btn--blue">
                    <span class="iconify mr-2" data-icon="bx:bx-upload" data-inline="true"></span>
                    <span>Upload Perjanjian</span>
                  </button>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">3</td>
                <td class="pr-0">23/08/2021</td>
                <td class="font-weight-bold text-capitalize">Jessica Charisa</td>
                <td>4891203526</td>
                <td class="text-center pr-0">4.500.000</td>
                <td class="text-center px-0">
                  <button type="button" class="btn_aksi btn--info mr-2">
                    <span class="iconify mr-2" data-icon="bx:bx-spreadsheet" data-inline="true"></span>
                    <span>Lihat Dokumen</span>
                  </button>
                  <button type="button" class="btn_aksi btn--blue">
                    <span class="iconify mr-2" data-icon="bx:bx-upload" data-inline="true"></span>
                    <span>Upload Perjanjian</span>
                  </button>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">4</td>
                <td class="pr-0">23/08/2021</td>
                <td class="font-weight-bold text-capitalize">Jessica Charisa</td>
                <td>4891203526</td>
                <td class="text-center pr-0">4.500.000</td>
                <td class="text-center px-0">
                  <button type="button" class="btn_aksi btn--info mr-2">
                    <span class="iconify mr-2" data-icon="bx:bx-spreadsheet" data-inline="true"></span>
                    <span>Lihat Dokumen</span>
                  </button>
                  <button type="button" class="btn_aksi btn--blue">
                    <span class="iconify mr-2" data-icon="bx:bx-upload" data-inline="true"></span>
                    <span>Upload Perjanjian</span>
                  </button>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">5</td>
                <td class="pr-0">23/08/2021</td>
                <td class="font-weight-bold text-capitalize">Jessica Charisa</td>
                <td>4891203526</td>
                <td class="text-center pr-0">4.500.000</td>
                <td class="text-center px-0">
                  <button type="button" class="btn_aksi btn--info mr-2">
                    <span class="iconify mr-2" data-icon="bx:bx-spreadsheet" data-inline="true"></span>
                    <span>Lihat Dokumen</span>
                  </button>
                  <button type="button" class="btn_aksi btn--blue">
                    <span class="iconify mr-2" data-icon="bx:bx-upload" data-inline="true"></span>
                    <span>Upload Perjanjian</span>
                  </button>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">6</td>
                <td class="pr-0">23/08/2021</td>
                <td class="font-weight-bold text-capitalize">Jessica Charisa</td>
                <td>4891203526</td>
                <td class="text-center pr-0">4.500.000</td>
                <td class="text-center px-0">
                  <button type="button" class="btn_aksi btn--info mr-2">
                    <span class="iconify mr-2" data-icon="bx:bx-spreadsheet" data-inline="true"></span>
                    <span>Lihat Dokumen</span>
                  </button>
                  <button type="button" class="btn_aksi btn--blue">
                    <span class="iconify mr-2" data-icon="bx:bx-upload" data-inline="true"></span>
                    <span>Upload Perjanjian</span>
                  </button>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">7</td>
                <td class="pr-0">23/08/2021</td>
                <td class="font-weight-bold text-capitalize">Jessica Charisa</td>
                <td>4891203526</td>
                <td class="text-center pr-0">4.500.000</td>
                <td class="text-center px-0">
                  <button type="button" class="btn_aksi btn--info mr-2">
                    <span class="iconify mr-2" data-icon="bx:bx-spreadsheet" data-inline="true"></span>
                    <span>Lihat Dokumen</span>
                  </button>
                  <button type="button" class="btn_aksi btn--blue">
                    <span class="iconify mr-2" data-icon="bx:bx-upload" data-inline="true"></span>
                    <span>Upload Perjanjian</span>
                  </button>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">8</td>
                <td class="pr-0">23/08/2021</td>
                <td class="font-weight-bold text-capitalize">Jessica Charisa</td>
                <td>4891203526</td>
                <td class="text-center pr-0">4.500.000</td>
                <td class="text-center px-0">
                  <button type="button" class="btn_aksi btn--info mr-2">
                    <span class="iconify mr-2" data-icon="bx:bx-spreadsheet" data-inline="true"></span>
                    <span>Lihat Dokumen</span>
                  </button>
                  <button type="button" class="btn_aksi btn--blue">
                    <span class="iconify mr-2" data-icon="bx:bx-upload" data-inline="true"></span>
                    <span>Upload Perjanjian</span>
                  </button>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">9</td>
                <td class="pr-0">23/08/2021</td>
                <td class="font-weight-bold text-capitalize">Jessica Charisa</td>
                <td>4891203526</td>
                <td class="text-center pr-0">4.500.000</td>
                <td class="text-center px-0">
                  <button type="button" class="btn_aksi btn--info mr-2">
                    <span class="iconify mr-2" data-icon="bx:bx-spreadsheet" data-inline="true"></span>
                    <span>Lihat Dokumen</span>
                  </button>
                  <button type="button" class="btn_aksi btn--blue">
                    <span class="iconify mr-2" data-icon="bx:bx-upload" data-inline="true"></span>
                    <span>Upload Perjanjian</span>
                  </button>
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