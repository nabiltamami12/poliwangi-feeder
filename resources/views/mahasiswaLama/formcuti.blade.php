@extends('layouts.mainMala')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content container-fluid" id="form_cuti">
  <h1 class="page-content__title">Pengajuan Cuti Mahasiswa</h1>

  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0 m-0 border-0">
          <!-- HEAD -->
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Form Cuti</h3>
            </div>
          </div>
        </div>
        <hr class="my-4">

        <form class="form-cuti">
          <div class="form-row position-relative px-3">
            <div class="col-12 col-md-6 form-group pr-0 pr-md-4">
              <label>Mulai</label>
              <div class="d-flex align-items-center date_picker">
                <input id="txtDate" type="text" class="txtDateMulai form-control date-input cursor_default"
                  value="21 Sept 2021" readonly />
                <label class="input-group-btn" for="txtDate">
                  <span class="date_button">
                    <span class="iconify" data-icon="bx:bx-calendar" data-inline="false"></span>
                  </span>
                </label>
              </div>
            </div>

            <div class="col-12 col-md-6 form-group pl-0 pl-md-4 mt-3 mt-md-0">
              <label>Hingga</label>
              <div class="d-flex align-items-center date_picker">
                <input id="txtDate" type="text" class="txtDateSelesai form-control date-input cursor_default"
                  value="21 Sept 2022" readonly />
                <label class="input-group-btn" for="txtDate">
                  <span class="date_button">
                    <span class="iconify" data-icon="bx:bx-calendar" data-inline="false"></span>
                  </span>
                </label>
              </div>
            </div>
          </div>

          <div class="form-row px-3">
            <div class="col-12 form-group mt-3">
              <label for="keterangan">Alasan Mengambil Cuti</label>
              <input type="text" class="form-control" id="keterangan"
                placeholder="Ada pekerjaan yang harus dikerjakan fulltime">
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100 mt-4-5">Ajukan Cuti</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script>
  $(function () {
    $(".txtDateMulai").datepicker({
        format: "dd MM yyyy",
    });
    $(".txtDateSelesai").datepicker({
        format: "dd MM yyyy",
    });
  });
</script>
@endsection