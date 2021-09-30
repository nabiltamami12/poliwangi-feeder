@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid">
  <div class="row">
    <div class="col-lg-8">
      <div class="card shadow padding--small">
        <div class="calendar calendar-first" id="calendar_first">
          <div class="calendar_header d-flex justify-content-between align-items-center">
            <button class="switch-month switch-left">
              <i class="iconify-inline" data-icon="bx:bx-chevron-left"></i>
            </button>
            <h2></h2>
            <button class="switch-month switch-right">
              <i class="iconify-inline" data-icon="bx:bx-chevron-right"></i>
            </button>
          </div>
          <hr class="my-4">
          <div class="calendar_weekdays"></div>
          <div class="calendar_content"></div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card shadow padding--small">
        <div class="card_header">
          <h2 class="aside_title mb-0">Upload Surat Keputusan Kalender Akademik</h2>
          <hr class="mt-3 mb-4">
        </div>
        <div class="card_content">
          <div class="uploadDokumen rounded p-3 d-flex justify-content-center align-items-center">
            <form class="align-items-center d-none">
              <i class="iconify mr-1" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
              <input type="file" id="file" hidden onchange="showFileName()" />
              <span id="custom-text" class="d-inline-block nama_dokumen">tidak ada file dipilih</span>
            </form>
            <button type="button" id="custom-btn">
              <i class="iconify text-primary" data-icon="bx:bx-cloud-upload" data-inline="false"></i>
            </button>
          </div>
          <button type="submit" class="btn btn-primary mt-4 w-100">
            <i class="iconify mr-1" data-icon="bx:bx-save"></i>
            Simpan</button>
        </div>
      </div>

      <div class="card shadow padding--small">
        <div class="card_header">
          <h2 class="aside_title mb-0">Detail Kalender</h2>
          <hr class="my-3">
        </div>
        <div class="card_content">
          <label for="keterangan">Keterangan</label>
          <textarea class="form-control textarea_notresize" id="keterangan" rows="8">Berisi Keterangan</textarea>
          <label for="status" class="mt-4">Status</label>
          <select class="customSelect" placeholder="Hari Aktif">
            <option value="hariAktif">Hari Aktif</option>
            <option value="hariLibur">Hari Libur</option>
            <option value="HariLiburNasional">Hari Libur Nasional</option>
          </select>
          <button type="submit" class="btn btn-primary w-100 mt-4">
            <i class="iconify mr-1" data-icon="bx:bx-save"></i>
            Simpan</button>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
<script src="{{ asset('js/customOption.js') }}"></script>
<script>
  const inputFile = document.getElementById("file");
  const customBtn = document.getElementById("custom-btn");
  const customText = document.getElementById("custom-text");
  const formUpload = document.querySelector(".uploadDokumen form");
  const formWrapper = document.querySelector('.uploadDokumen');

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

  function showFileName(){
    formUpload.classList.remove("d-none");
    formUpload.classList.add("d-flex");
    formWrapper.classList.remove("justify-content-center");
    formWrapper.classList.add("justify-content-between");
    let formWrapper_width = formWrapper.offsetWidth-100;
    document.querySelector('.nama_dokumen').style.maxWidth = formWrapper_width + "px"
  }
</script>
@endsection