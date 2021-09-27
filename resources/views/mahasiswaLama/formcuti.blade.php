@extends('layouts.mainMala')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content container-fluid">
  <h1 class="page-content__title">Pengajuan Cuti Mahasiswa</h1>

  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <!-- HEAD -->
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Form Cuti</h3>
            </div>
          </div>
        </div>
        <hr class="my-4">

        <form>
          <div class="form-row px-3">
            <div class="col-12 col-md-6 form-group pr-0 pr-md-4">
              <label>Mulai</label>
              <div class="d-flex align-items-center date_picker w-100 ">
                <input id="txtDate1" type="text" class="form-control date-input" value="21 Sept 2021" readonly />
                <label class="input-group-btn" for="txtDate1">
                  <span class="date_button">
                    <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                  </span>
                </label>
              </div>
            </div>

            <div class="col-12 col-md-6 form-group pl-0 pl-md-4 mt-3 mt-md-0">
              <label>Hingga</label>
              <div class="d-flex align-items-center date_picker w-100 ">
                <input id="txtDate2" type="text" class="form-control date-input" value="21 Sept 2022" readonly />
                <label class="input-group-btn" for="txtDate2">
                  <span class="date_button">
                    <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                  </span>
                </label>
              </div>
            </div>
          </div>
          <hr class="calendar_separator d-none d-md-block">

          <div class="form-row px-3 mt-3">
            <div class="col-12 form-group">
              <label for="keterangan">Alasan Mengambil Cuti</label>
              <input type="text" class="form-control" id="keterangan"
                value="Ada pekerjaan yang harus dikerjakan fulltime">
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
    $(".date-input").datepicker({
        format: "dd MM yyyy",
    });
  });
</script>
@endsection