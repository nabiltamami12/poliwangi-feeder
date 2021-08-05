@extends('layouts.mainDosen')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="dosen_presensi">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <form class="form-select rounded-0">
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
              <select class="form-control" id="matakuliah">
                <option selected>Rekayasa Perangkat Lunak</option>
                <option>Human Computer Interaction</option>
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
        <hr class="my-4">

        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center">tanggal</th>
                <th scope="col">NIM</th>
                <th scope="col" style="width: 25%">Nama</th>
                <th scope="col" class="text-center">Kelas</th>
                <th scope="col" class="text-center">Jam absensi</th>
                <th scope="col" class="text-center">batas absensi</th>
                <th scope="col" class="text-center">Status</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center">02/07/2021</td>
                <td>345245345</td>
                <td class="font-weight-bold text-capitalize">Jessica Wijaya</td>
                <td class="text-center">MT001</td>
                <td class="text-center">12:00</td>
                <td class="text-center">12:15</td>
                <td class="text-center status_absensi">
                  <span class="badge badge-success">
                    <span class="iconify" data-icon="akar-icons:circle-check-fill"></span>
                    <span class="text-capitalize">Hadir</span>
                  </span>
                </td>
              </tr>

              <tr>
                <td class="text-center">02/07/2021</td>
                <td>345245345</td>
                <td class="font-weight-bold text-capitalize">Jessica Wijaya</td>
                <td class="text-center">MT001</td>
                <td class="text-center">12:00</td>
                <td class="text-center">12:15</td>
                <td class="text-center status_absensi">
                  <span class="badge badge-success">
                    <span class="iconify" data-icon="akar-icons:circle-check-fill"></span>
                    <span class="text-capitalize">Hadir</span>
                  </span>
                </td>
              </tr>

              <tr>
                <td class="text-center">02/07/2021</td>
                <td>345245345</td>
                <td class="font-weight-bold text-capitalize">Jessica Wijaya</td>
                <td class="text-center">MT001</td>
                <td class="text-center">12:00</td>
                <td class="text-center">12:15</td>
                <td class="text-center status_absensi">
                  <span class="badge badge-success">
                    <span class="iconify" data-icon="akar-icons:circle-check-fill"></span>
                    <span class="text-capitalize">Hadir</span>
                  </span>
                </td>
              </tr>

              <tr>
                <td class="text-center">02/07/2021</td>
                <td>345245345</td>
                <td class="font-weight-bold text-capitalize">Jessica Wijaya</td>
                <td class="text-center">MT001</td>
                <td class="text-center">12:00</td>
                <td class="text-center">12:15</td>
                <td class="text-center status_absensi">
                  <span class="badge badge-danger">
                    <span class="iconify" data-icon="bi:x-circle-fill"></span>
                    <span class="text-capitalize">Tidak Hadir</span>
                  </span>
                </td>
              </tr>

              <tr>
                <td class="text-center">02/07/2021</td>
                <td>345245345</td>
                <td class="font-weight-bold text-capitalize">Jessica Wijaya</td>
                <td class="text-center">MT001</td>
                <td class="text-center">12:00</td>
                <td class="text-center">12:15</td>
                <td class="text-center status_absensi">
                  <span class="badge badge-success">
                    <span class="iconify" data-icon="akar-icons:circle-check-fill"></span>
                    <span class="text-capitalize">Hadir</span>
                  </span>
                </td>
              </tr>

              <tr>
                <td class="text-center">02/07/2021</td>
                <td>345245345</td>
                <td class="font-weight-bold text-capitalize">Jessica Wijaya</td>
                <td class="text-center">MT001</td>
                <td class="text-center">12:00</td>
                <td class="text-center">12:15</td>
                <td class="text-center status_absensi">
                  <span class="badge badge-success">
                    <span class="iconify" data-icon="akar-icons:circle-check-fill"></span>
                    <span class="text-capitalize">Hadir</span>
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection