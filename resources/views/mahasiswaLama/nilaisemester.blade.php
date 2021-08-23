@extends('layouts.mainMala')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header border-0 p-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nilai Semester Saat Ini</h3>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <div class="table-responsive">
          <table class="table align-items-center table-borderless table-flush table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="border-0 pl-3" style="width: 5%">no</th>
                <th scope="col" class="border-0" style="width: 35%">MataKuliah</th>
                <th scope="col" class="border-0 text-center" style="width: 25%">Kehadiran</th>
                <th scope="col" class="border-0 text-center" style="width: 25%">Indeks Prestasi</th>
                <th scope="col" class="border-0 text-center" style="width: 10%">Keterangan</th>
              </tr>
            </thead>

            <tbody class="table-body table-body-lg">
              <tr>
                <td class="pl-3">1</td>
                <td class="font-weight-bold">Rekayasa Perangkat Lunak</td>
                <td class="text-center font-weight-bold">20</td>
                <td class="text-center font-weight-bold">D</td>
                <td class="text-center">Keterangan</td>
              </tr>

              <tr>
                <td class="pl-3">2</td>
                <td class="font-weight-bold">Sistem Informasi</td>
                <td class="text-center font-weight-bold">22</td>
                <td class="text-center font-weight-bold">B</td>
                <td class="text-center">Keterangan</td>
              </tr>

              <tr>
                <td class="pl-3">3</td>
                <td class="font-weight-bold">Human Computer Interaction</td>
                <td class="text-center font-weight-bold">24</td>
                <td class="text-center font-weight-bold">A</td>
                <td class="text-center">Keterangan</td>
              </tr>

              <tr>
                <td class="pl-3">4</td>
                <td class="font-weight-bold">Struktur Data</td>
                <td class="text-center font-weight-bold">21</td>
                <td class="text-center font-weight-bold">B</td>
                <td class="text-center">Keterangan</td>
              </tr>

              <tr>
                <td class="pl-3">5</td>
                <td class="font-weight-bold">Jaringan Komputer</td>
                <td class="text-center font-weight-bold">24</td>
                <td class="text-center font-weight-bold">A</td>
                <td class="text-center">Keterangan</td>
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
  $(document).ready(function(){
    $("#txtDate").datepicker({
      format: "dd MM yyyy",
    });
  })
</script>
@endsection