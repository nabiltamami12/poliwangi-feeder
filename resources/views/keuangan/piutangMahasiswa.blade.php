@extends('layouts.mainKeuangan')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid">
  <!-- Modal -->
  <div class="modal fade" id="dokumenPiutangModal" tabindex="-1" aria-labelledby="dokumenPiutangModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content padding--medium">
        <div class="dokumen_pengajuan">
          <h1 class="modal-title text-center my-2">Dokumen Pengajuan Piutang</h1>
          <div class="detail_dokumen d-flex align-items-center justify-content-between mt-5 mb-2">
            <span>
              <i class="iconify mr-2" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
              <span class="nama_dokumen">Dokumen_Bryan_Wijaya.pdf</span>
            </span>
            <i class="iconify text-primary" data-icon="bx:bx-cloud-download" data-inline="false"></i>
          </div>
        </div>
        <div class="dokumen_perjanjian">
          <h1 class="modal-title text-center mt-5 mb-2">Dokumen Perjanjian Piutang</h1>
          <div class="detail_dokumen d-flex align-items-center justify-content-between mt-5">
            <span>
              <i class="iconify mr-2" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
              <span class="nama_dokumen">Dokumen_Bryan_Wijaya.pdf</span>
            </span>
            <i class="iconify text-primary" data-icon="bx:bx-cloud-download" data-inline="false"></i>
          </div>
        </div>
        <div class="modal_button mt-4-5 d-flex justify-content-between">
          <button type="button" class="btn btn-outline-placeholder rounded-sm font-weight-bold w-100 mr-2 mr-md-3"
            data-dismiss="modal">Kembali</button>
          <button type="button" class="btn btn-success rounded-sm font-weight-bold w-100 ml-2 ml-md-3">Setujui</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="uploadPerjanjianModal" tabindex="-1" aria-labelledby="uploadPerjanjianModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content padding--medium">
        <div class="perjanjian_pembayaran">
          <h1 class="modal-title text-center mt-2">Upload Perjanjian Pembayaran</h1>
          <div class="detail_dokumen d-flex align-items-center justify-content-between mt-4-5">
            <form>
              <i class="iconify mr-2" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
              <input type="file" id="file" hidden />
              <span id="custom-text" class="nama_dokumen">tidak ada file dipilih</span>
            </form>
            <button type="button" id="custom-btn">
              <i class="iconify text-primary" data-icon="bx:bx-cloud-upload" data-inline="false"></i>
            </button>
          </div>
        </div>
        <hr class="my-4-5">
        <div class="detail_cicilan">
          <h1 class="modal-title text-center my-2">Detail Cicilan Pembayaran</h1>
          <form class="mt-4-5">
            <div class="form-row">
              <label for="jumlah_cicilan">Jumlah Cicilan</label>
              <select class="form-control" id="jumlah_cicilan">
                <option>1</option>
                <option>2</option>
                <option selected>3</option>
              </select>
            </div>
            <div class="form-row mt-4-5">
              <div class="col-md-6 pr-0 pr-md-2">
                <label for="bulan_pertama">Bulan Cicilan Ke-1</label>
                <select class="form-control" id="bulan_pertama">
                  <option selected>Januari</option>
                  <option>Februari</option>
                  <option>Maret</option>
                  <option>April</option>
                  <option>Mei</option>
                </select>
              </div>
              <div class="col-md-6 pl-0 pl-md-2">
                <label for="nominal_pertama">Nominal Cicilan Ke-1</label>
                <input type="text" class="form-control text-right" value="Rp. 1.500.000">
              </div>
            </div>
            <div class="form-row mt-4-5">
              <div class="col-md-6 pr-0 pr-md-2">
                <label for="bulan_kedua">Bulan Cicilan Ke-2</label>
                <select class="form-control" id="bulan_kedua">
                  <option selected>Januari</option>
                  <option>Februari</option>
                  <option>Maret</option>
                  <option>April</option>
                  <option>Mei</option>
                </select>
              </div>
              <div class="col-md-6 pl-0 pl-md-2">
                <label for="nominal_kedua">Nominal Cicilan Ke-2</label>
                <input type="text" class="form-control text-right" value="Rp. 1.500.000">
              </div>
            </div>
            <div class="form-row mt-4-5">
              <div class="col-md-6 pr-0 pr-md-2">
                <label for="bulan_ketiga">Bulan Cicilan Ke-3</label>
                <select class="form-control" id="bulan_ketiga">
                  <option selected>Januari</option>
                  <option>Februari</option>
                  <option>Maret</option>
                  <option>April</option>
                  <option>Mei</option>
                </select>
              </div>
              <div class="col-md-6 pl-0 pl-md-2">
                <label for="nominal_ketiga">Nominal Cicilan Ke-3</label>
                <input type="text" class="form-control text-right" value="Rp. 1.500.000">
              </div>
            </div>
          </form>
        </div>
        <div class="modal_button mt-4-5 d-flex justify-content-between">
          <button type="button" class="btn btn-outline-danger rounded-sm font-weight-bold w-100 mr-2 mr-md-3"
            data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-success rounded-sm font-weight-bold w-100 ml-2 ml-md-3">Submit</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6 col-lg-4">
      <div class="card card-stats mb-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Total Piutang</h5>
              <span class="h2 font-weight-bold mb-0">Rp. 30.000.000</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-blue text-white rounded-circle shadow">
                <i class="iconify-inline" data-icon="bx:bx-receipt"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm d-flex justify-content-between">
            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
            <span class="text-nowrap text-muted">dari 1 Bulan Terakhir</span>
          </p>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-lg-4">
      <div class="card card-stats mb-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">PIUTANG BELUM TERBAYAR</h5>
              <span class="h2 font-weight-bold mb-0">Rp. 10.000.000</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                <i class="iconify-inline" data-icon="bx:bx-receipt"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm d-flex justify-content-between">
            <span class="text-danger mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
            <span class="text-nowrap text-muted">dari 1 Bulan Terakhir</span>
          </p>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-lg-4">
      <div class="card card-stats mb-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">TOTAL MAHASISWA BELUM MEMBAYAR</h5>
              <span class="h2 font-weight-bold mb-0">250 Orang</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                <i class="iconify-inline" data-icon="bx:bx-receipt"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm d-flex justify-content-between">
            <span class="text-danger mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
            <span class="text-nowrap text-muted">dari 1 Bulan Terakhir</span>
          </p>
        </div>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-3">
              <h2 class="mb-0 text-center text-md-left">Piutang Mahasiswa</h2>
            </div>
            <div class="col-12 col-md-9 text-center text-md-right">
              <button type="button" class="btn btn-success mt-3 mt-md-0">
                <i class="iconify-inline mr-1" data-icon="bx:bxs-plus-circle"></i>
                Tambah
              </button>

              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle mt-3 mt-md-0 ml-0 ml-md-1" type="button"
                  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="iconify-inline mr-1" data-icon="bx:bx-cloud-upload"></i>
                  Upload
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>

              <button type="button" class="btn btn-secondary mt-3 mt-md-0 ml-0 ml-md-1">
                <i class="iconify-inline mr-1" data-icon="bx:bx-cloud-download"></i>
                Download Rekap
              </button>
            </div>
          </div>
        </div>
        <hr class="mt-4">

        <div class="row align-items-center px-3 my-4">
          <div class="col-12 col-md-8 d-flex justify-content-between">
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

            <div class="btn-group">
              <button type="button" class="btn btn-info_transparent dropdown-toggle text-primary" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Mahasiswa Baru
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-4 text-right p-0 mt-3 mt-md-0">
            <form class="search_form" action="">
              <input class="form-control" type="search" placeholder="Pencarian...">
              <button type="submit" class="button-lg">
                <i class="iconify-inline" data-icon="bx:bx-search"></i>
              </button>
            </form>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center pl-2">No</th>
                <th scope="col" class="pl-2">nim</th>
                <th scope="col" class="pl-2">Nama Debitur</th>
                <th scope="col" class="text-right pl-2">UKT</th>
                <th scope="col" class="text-right pl-2">SPI</th>
                <th scope="col" class="text-right pl-2">Jumlah</th>
                <th scope="col" class="text-center pl-2">Status<br>Piutang</th>
                <th scope="col" class="text-center pl-2">Aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center pl-2">1</td>
                <td class="pl-2">362155401074</td>
                <td class="font-weight-bold text-capitalize pl-2">Sindy Eka Putri Septiani</td>
                <td class="text-center pl-2">Rp. 2,000,000</td>
                <td class="text-center pl-2">-</td>
                <td class="text-center pl-2">Rp. 2,000,000</td>
                <td class="text-center text-success pl-2">Lancar</td>
                <td class="text-center pl-2">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dokumenPiutangModal">
                    <i class="iconify mr-1 text-black" data-icon="bx:bx-spreadsheet"></i>
                    <span>Cek Dokumen</span>
                  </button>
                  <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#uploadPerjanjianModal">
                    <i class="iconify mr-1" data-icon="bx:bx-cloud-upload"></i>
                    <span class="text-white">Upload Perjanjian</span>
                  </button>
                </td>
              </tr>

              <tr>
                <td class="text-center pl-2">2</td>
                <td class="pl-2">362155401084</td>
                <td class="font-weight-bold text-capitalize pl-2">Afkarina Ferin Vergia Putri</td>
                <td class="text-center pl-2">Rp. 1,000,000</td>
                <td class="text-center pl-2">Rp. 1,000,000</td>
                <td class="text-center pl-2">Rp. 3,000,000</td>
                <td class="text-center text-success pl-2">Lancar</td>
                <td class="text-center pl-2">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dokumenPiutangModal">
                    <i class="iconify mr-1 text-black" data-icon="bx:bx-spreadsheet"></i>
                    <span>Cek Dokumen</span>
                  </button>
                  <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#uploadPerjanjianModal">
                    <i class="iconify mr-1" data-icon="bx:bx-cloud-upload"></i>
                    <span class="text-white">Upload Perjanjian</span>
                  </button>
                </td>
              </tr>

              <tr>
                <td class="text-center pl-2">3</td>
                <td class="pl-2">362155401085</td>
                <td class="font-weight-bold text-capitalize pl-2">Eko Prasetyo</td>
                <td class="text-center pl-2">Rp. 1,500,000</td>
                <td class="text-center pl-2">-</td>
                <td class="text-center pl-2">Rp. 1,500,000</td>
                <td class="text-center text-success pl-2">Lancar</td>
                <td class="text-center pl-2">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dokumenPiutangModal">
                    <i class="iconify mr-1 text-black" data-icon="bx:bx-spreadsheet"></i>
                    <span>Cek Dokumen</span>
                  </button>
                  <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#uploadPerjanjianModal">
                    <i class="iconify mr-1" data-icon="bx:bx-cloud-upload"></i>
                    <span class="text-white">Upload Perjanjian</span>
                  </button>
                </td>
              </tr>

              <tr>
                <td class="text-center pl-2">4</td>
                <td class="pl-2">362155401094</td>
                <td class="font-weight-bold text-capitalize pl-2">Budi</td>
                <td class="text-center pl-2">-</td>
                <td class="text-center pl-2">Rp. 1,500,000</td>
                <td class="text-center pl-2">Rp. 1,500,000</td>
                <td class="text-center text-success pl-2">Lancar</td>
                <td class="text-center pl-2">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dokumenPiutangModal">
                    <i class="iconify mr-1 text-black" data-icon="bx:bx-spreadsheet"></i>
                    <span>Cek Dokumen</span>
                  </button>
                  <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#uploadPerjanjianModal">
                    <i class="iconify mr-1" data-icon="bx:bx-cloud-upload"></i>
                    <span class="text-white">Upload Perjanjian</span>
                  </button>
                </td>
              </tr>

              <tr>
                <td class="text-center pl-2">5</td>
                <td class="pl-2">362055401074</td>
                <td class="font-weight-bold text-capitalize pl-2">Alika</td>
                <td class="text-center pl-2">Rp. 2,000,000</td>
                <td class="text-center pl-2">-</td>
                <td class="text-center pl-2">Rp. 2,000,000</td>
                <td class="text-center text-success pl-2">Lancar</td>
                <td class="text-center pl-2">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dokumenPiutangModal">
                    <i class="iconify mr-1 text-black" data-icon="bx:bx-spreadsheet"></i>
                    <span>Cek Dokumen</span>
                  </button>
                  <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#uploadPerjanjianModal">
                    <i class="iconify mr-1" data-icon="bx:bx-cloud-upload"></i>
                    <span class="text-white">Upload Perjanjian</span>
                  </button>
                </td>
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

@section('js')
<script>
  const inputFile = document.getElementById("file");
  const customBtn = document.getElementById("custom-btn");
  const customText = document.getElementById("custom-text");

  customBtn.addEventListener("click", function () {
    inputFile.click();
  });

  inputFile.addEventListener("change", function () {
    if (inputFile.value) {
      let fileName = inputFile.value.match(/[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/)[0];
      customText.innerHTML = fileName;
    } else {
      customText.innerHTML = "tidak ada file dipilih";
    }
  });
</script>
@endsection