@extends('layouts.mainMala')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="mala_presensi">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header border-0 padding--big">
          <div class="row align-items-center">

            <div class="col-12 col-md-6 form-group">
              <div class="d-flex align-items-center date_picker">
                <input id="txtDate" type="text" class="form-control date-input cursor_default" value="23 Jul 2021"
                  readonly />
                <label class="input-group-btn" for="txtDate">
                  <span class="date_button">
                    <span class="iconify" data-icon="bx:bx-calendar" data-inline="false"></span>
                  </span>
                </label>
              </div>
            </div>

            <div class="col-12 col-md-6 form-group">
              <div class="custom_select mt-4 mt-md-0">
                <select id="semester">
                  <option selected>Semester Ganjil</option>
                  <option>Semester Genap</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="table-responsive padding--big">
          <table class="table align-items-center table-borderless table-flush table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="border-0" style="width: 25%">Tanggal</th>
                <th scope="col" class="border-0" style="width: 30%">Mata Kuliah</th>
                <th scope="col" class="border-0 text-center">Kelas</th>
                <th scope="col" class="border-0 text-center">JUMLAH KEHADIRAN</th>
                <th scope="col" class="border-0 text-center">TIDAK HADIR</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td>02/07/2021</td>
                <td class="font-weight-bold">Matematika Dasar</td>
                <td class="text-center">MT001</td>
                <td class="text-center">24</td>
                <td class="text-center">0</td>
              </tr>

              <tr>
                <td>02/07/2021</td>
                <td class="font-weight-bold">Pengantar perkuliahan II</td>
                <td class="text-center">KGA12</td>
                <td class="text-center">24</td>
                <td class="text-center">0</td>
              </tr>

              <tr>
                <td>02/07/2021</td>
                <td class="font-weight-bold">Matematika Dasar</td>
                <td class="text-center">MT001</td>
                <td class="text-center">24</td>
                <td class="text-center">0</td>
              </tr>

              <tr>
                <td>02/07/2021</td>
                <td class="font-weight-bold">Pengantar perkuliahan II</td>
                <td class="text-center">KGA12</td>
                <td class="text-center">24</td>
                <td class="text-center">0</td>
              </tr>

              <tr>
                <td>02/07/2021</td>
                <td class="font-weight-bold">Matematika Dasar</td>
                <td class="text-center">MT001</td>
                <td class="text-center">24</td>
                <td class="text-center">0</td>
              </tr>

              <tr>
                <td>02/07/2021</td>
                <td class="font-weight-bold">Pengantar perkuliahan II</td>
                <td class="text-center">KGA12</td>
                <td class="text-center">24</td>
                <td class="text-center">0</td>
              </tr>

              <tr>
                <td>02/07/2021</td>
                <td class="font-weight-bold">Matematika Dasar</td>
                <td class="text-center">MT001</td>
                <td class="text-center">24</td>
                <td class="text-center">0</td>
              </tr>

              <tr>
                <td>02/07/2021</td>
                <td class="font-weight-bold">Pengantar perkuliahan II</td>
                <td class="text-center">KGA12</td>
                <td class="text-center">24</td>
                <td class="text-center">0</td>
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