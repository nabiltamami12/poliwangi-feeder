@extends('layouts.mainDosen')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0 m-0">
          <div class="row align-items-center">
            <div class="col-lg-5">
              <h3 class="mb-0 text-center text-lg-left font-weight-bold">Nilai Mahasiswa</h3>
            </div>
            <div class="col-lg-7 text-center text-lg-right">
              <div class="dropdown">
                <button class="btn btn-icon btn-warning mt-3 mt-lg-0 dropdown-toggle" type="button"
                  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="iconify-inline mr-1" data-icon="bx:bx-printer"></i>
                  Cetak Data
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>

              <button type="button" class="btn btn-icon btn-secondary mt-3 mt-lg-0 ml-0 ml-lg-3">
                <span class="btn-inner--icon"><i class="iconify-inline" data-icon="bx:bx-share-alt"></i></span>
                <span class="btn-inner--text">Publish Nilai</span>
              </button>
              <button type="button" class="btn btn-icon btn-primary mt-3 mt-lg-0 ml-0 ml-lg-3">
                <span class="btn-inner--icon">
                  <i class="iconify-inline" data-icon="bx:bx-save"></i>
                </span>
                <span class="btn-inner--text">Simpan</span>
              </button>
              </button>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <form class="form-select ">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="program-studi">Program Studi</label>
              <select class="form-control" id="program-studi">
                <option selected>D3 Teknik Informatika</option>
                <option>Ilmu Kedokteran Gigi Anak</option>
              </select>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="jenjang">Jenjang</label>
              <select class="form-control" id="jenjang">
                <option>Semester 1</option>
                <option selected>Semester 2</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="matakuliah">Mata Kuliah</label>
              <select id="matakuliah">
                <option value="RPL">Rekayasa Perangkat Lunak</option>
                <option value="HCI">Human Computer Interaction</option>
                <option value="B001">Bahasa Indonesia</option>
                <option value="B002">Bahasa Inggris</option>
                <option value="P001">Pengantar perkuliahan I</option>
                <option value="P002">Pengantar perkuliahan II</option>
                <option value="MTK01">Matematika Dasar</option>
                <option value="MTK02">Matematika Lanjutan</option>
                <option value="G004" selected="selected">Ilmu Kedokteran Gigi Anak</option>
                <option value="G001">ilmu gigi I</option>
                <option value="G002">ilmu gigi II</option>
                <option value="G003">ilmu gigi III</option>
              </select>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="kelas">Kelas</label>
              <select class="form-control" id="kelas">
                <option selected>MT001</option>
                <option>MT002</option>
              </select>
            </div>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless table-hover mt-4">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center pl-2 pr-0">No</th>
                <th scope="col" class="text-center px-3">NIM</th>
                <th scope="col" class="pl-1" style="width: 15%">Nama</th>
                <th scope="col" class="text-center px-1">UTS</th>
                <th scope="col" class="text-center px-1">UAS</th>
                <th scope="col" class="text-center px-1">Tugas</th>
                <th scope="col" class="text-center px-1">Kuis</th>
                <th scope="col" class="text-center px-1">Praktek</th>
                <th scope="col" class="text-center px-1">Up</th>
                <th scope="col" class="text-center px-1">Kehadiran</th>
                <th scope="col" class="text-center px-1">Akumulasi</th>
                <th scope="col" class="text-center px-2">Keterangan</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center pl-2 pr-0">1</td>
                <td class="text-center px-3">345245345</td>
                <td class="font-weight-bold text-capitalize pl-1">Jessica Wijaya</td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uts1" value="75">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uas1">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="tugas1">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kuis1">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="praktek1">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="up1">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kehadiran1">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="akumulasi1">
                  </div>
                </td>
                <td class="text-center px-2">Keterangan</td>
              </tr>

              <tr>
                <td class="text-center pl-2 pr-0">2</td>
                <td class="text-center px-3">345245345</td>
                <td class="font-weight-bold text-capitalize pl-1">Jessica Wijaya</td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uts2" value="75">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uas2">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="tugas2">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kuis2">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="praktek2">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="up2">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kehadiran2">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="akumulasi2">
                  </div>
                </td>
                <td class="text-center px-2">Keterangan</td>
              </tr>

              <tr>
                <td class="text-center pl-2 pr-0">3</td>
                <td class="text-center px-3">345245345</td>
                <td class="font-weight-bold text-capitalize pl-1">Jessica Wijaya</td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uts3" value="75">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uas3">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="tugas3">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kuis3">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="praktek3">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="up3">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kehadiran3">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="akumulasi3">
                  </div>
                </td>
                <td class="text-center px-2">Keterangan</td>
              </tr>

              <tr>
                <td class="text-center pl-2 pr-0">4</td>
                <td class="text-center px-3">345245345</td>
                <td class="font-weight-bold text-capitalize pl-1">Jessica Wijaya</td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uts4" value="75">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uas4">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="tugas4">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kuis4">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="praktek4">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="up4">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kehadiran4">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="akumulasi4">
                  </div>
                </td>
                <td class="text-center px-2">Keterangan</td>
              </tr>

              <tr>
                <td class="text-center pl-2 pr-0">5</td>
                <td class="text-center px-3">345245345</td>
                <td class="font-weight-bold text-capitalize pl-1">Jessica Wijaya</td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uts5" value="75">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uas5">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="tugas5">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kuis5">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="praktek5">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="up5">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kehadiran5">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="akumulasi5">
                  </div>
                </td>
                <td class="text-center px-2">Keterangan</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script>
  $(document).ready(function () {
    $("#matakuliah").select2();
  });
</script>
@endsection