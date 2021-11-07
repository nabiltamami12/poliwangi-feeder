@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="dosen_perwalian">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0 m-0 border-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Daftar Perwalian</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
            </div>
          </div>
        </div>
        <hr class="mt">
        <div class="table-responsive">
            <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
                <thead class="table-header">
                  <tr>
                    <th scope="col" class="text-center px-2">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col" class="text-center">Angkatan</th>
                    <th scope="col" class="text-center">Jurusan</th>
                    <th scope="col" class="text-center">Kelas</th>
                    <th scope="col" class="text-center">Status Akademik</th>
                    <th scope="col" class="text-center">Matakuliah</th>
                    <th scope="col" class="text-center">ACC</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection