@extends('layouts.mainAkademik')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="akademik_detailnilai">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0 ">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Nilai</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <button type="button" class="btn btn-primary">
                <span class="iconify" data-icon="bx:bxs-plus-circle"></span>
                Tambah
              </button>
              <button type="button" class="btn btn-secondary ml-0 ml-md-3">
                <span class="iconify" data-icon="bx:bx-download"></span>
                Unduh Data
              </button>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form class="form-input">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" placeholder="Jessica Clara">
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="nim">NIM</label>
              <input type="text" class="form-control" id="nim" placeholder="2204719384">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="jurusan">Jurusan</label>
              <input type="text" class="form-control" id="jurusan" placeholder="Nama Jurusan">
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="program-studi">Program Studi</label>
              <input type="text" class="form-control" id="program-studi" placeholder="Ilmu Kedokteran Gigi Anak">
            </div>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table align-items-center table-borderless table-flush mt-4">
            <thead class="table-header">
              <tr>
                <th scope="col" class="border-0 text-center px-2">No</th>
                <th scope="col" class="border-0" style="width: 50%">Mata Kuliah</th>
                <th scope="col" class="border-0 text-center">Keterangan</th>
                <th scope="col" class="border-0 text-center">presentase</th>
                <th scope="col" class="border-0 text-center">Nilai</th>
                <th scope="col" class="border-0 text-center">Aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td rowspan="6" class="text-center px-2">1</td>
                <td rowspan="6" class="font-weight-bold text-capitalize">Ilmu Gigi</td>
                <td class="text-center">UTS</td>
                <td class="text-center">15%</td>
                <td class="text-center">90</td>
                <td rowspan="6" class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center">UAS</td>
                <td class="text-center">25%</td>
                <td class="text-center">87</td>
              </tr>

              <tr>
                <td class="text-center">Tugas</td>
                <td class="text-center">10%</td>
                <td class="text-center">76</td>
              </tr>

              <tr>
                <td class="text-center">Kuis</td>
                <td class="text-center">15%</td>
                <td class="text-center">90</td>
              </tr>

              <tr>
                <td class="text-center">Praktek</td>
                <td class="text-center">10%</td>
                <td class="text-center">99</td>
              </tr>

              <tr class="bordered">
                <td class="text-center">UP</td>
                <td class="text-center">25%</td>
                <td class="text-center">87</td>
              </tr>

              <tr>
                <td rowspan="6" class="text-center px-2">2</td>
                <td rowspan="6" class="font-weight-bold text-capitalize">Ilmu Gigi</td>
                <td class="text-center">UTS</td>
                <td class="text-center">15%</td>
                <td class="text-center">90</td>
                <td rowspan="6" class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center">UAS</td>
                <td class="text-center">25%</td>
                <td class="text-center">87</td>
              </tr>

              <tr>
                <td class="text-center">Tugas</td>
                <td class="text-center">10%</td>
                <td class="text-center">76</td>
              </tr>

              <tr>
                <td class="text-center">Kuis</td>
                <td class="text-center">15%</td>
                <td class="text-center">90</td>
              </tr>

              <tr>
                <td class="text-center">Praktek</td>
                <td class="text-center">10%</td>
                <td class="text-center">99</td>
              </tr>

              <tr>
                <td class="text-center">UP</td>
                <td class="text-center">25%</td>
                <td class="text-center">87</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection