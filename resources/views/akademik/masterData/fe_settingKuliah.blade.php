@extends('layouts.mainAkademik')

@section('style')
<style>
  .date{
    cursor: pointer;
  }
  .calendar {
    margin: auto;
  }

  .calendar_header {
    width: 100%;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .calendar_header h2 {
    font-weight: 600;
    font-size: 1.3125rem;
    line-height: 1.22em;
    color: #041f2f;
  }

  .calendar_header .switch-month {
    border: 0;
    background-color: transparent;
  }

  .calendar_header .switch-month .iconify {
    font-size: 2rem;
  }

  .calendar_header .switch-month:focus {
    outline: 0;
  }

  .calendar_content {
    background: #fff;
    border: 1px solid #999999;
  }

  .calendar_content div {
    border: 1px solid #999999;
    float: left;
    position: relative;
    z-index: 0;
  }

  .calendar_content div.blank {
    border: 1px solid #999999;
    width: calc(100% / 7);
    height: 5rem;
    position: relative;
  }

  .calendar_content div.today {
    color: #fff;
  }

  .calendar_content div.today:after {
    position: absolute;
    top: 0.3rem;
    left: 0.3rem;
    content: "";
    width: 1.75rem;
    height: 1.75rem;
    border-radius: 50%;
    background: #28a3eb;
    z-index: -1;
  }

  .calendar_content div.libur {
    color: #F46A6A;
  }

  .calendar_weekdays div {
    display: inline-block;
  }

  .calendar_content,
  .calendar_weekdays,
  .calendar_header {
    position: relative;
    overflow: hidden;
  }

  .calendar_weekdays div,
  .calendar_content div {
    width: calc(100% / 7);
    overflow: hidden;
    padding: 0.5rem;
    background-color: transparent;
    font-weight: 500;
    font-size: 1.125rem;
    line-height: 1.22em;
    color: #041f2f;
  }

  .calendar_content div {
    height: 5rem;
  }

  h2.aside_title {
    font-weight: 600;
    font-size: 1.125rem;
    line-height: 1.5em;
    color: #041f2f;
  }

  ::placeholder {
    font-weight: 400;
    font-size: 0.875rem;
    line-height: 1.21em;
    color: #041f2f;
  }

  .customSelect {
    position: relative;
    display: inline-block;
    width: 100%;
  }

  .customSelect-trigger {
    font-size: 14px;
    font-weight: 500;
    line-height: 17px;
    color: #000;
    padding: 0.5rem 0.75rem;
    background-color: #fff;
    position: relative;
    display: block;
    border-radius: 0.25rem;
    cursor: pointer;
    border: 1px solid #999;
  }

  .customSelect-trigger:after {
    content: "";
    background-image: url("https://api.iconify.design/bx/bx-chevron-down.svg?color=%23000");
    background-repeat: no-repeat;
    background-position: center;
    position: absolute;
    display: block;
    pointer-events: none;
    width: 10px;
    height: 10px;
    top: 50%;
    right: 0.75rem;
    transform: translateY(-50%);
  }

  .custom-options {
    position: absolute;
    display: block;
    top: 100%;
    left: 0;
    right: 0;
    border: 1px solid rgba(153, 153, 153, 0.2);
    box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.15);
    box-sizing: border-box;
    background: #fff;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    border-radius: 0.25rem 0.25rem 0.5rem 0.5rem;
  }

  .customSelect.opened .custom-options {
    position: relative;
    opacity: 1;
    visibility: visible;
    pointer-events: all;
  }

  .custom-option {
    position: relative;
    display: block;
    padding: 0.5rem;
    font-size: 14px;
    font-weight: 400;
    line-height: 17px;
    color: #000;
    cursor: pointer;
  }

  .custom-option:hover {
    background: rgba(40, 163, 235, 0.5);
  }

  .custom-option.selection {
    background: rgba(40, 163, 235, 0.5);
  }

  .selecton {
    border-color: #28a3eb;
  }

  .textarea_notresize {
    resize: none;
  }

  .textarea_notresize:focus {
    border-color: #28a3eb;
  }

  .uploadSuratKeputusan {
    border: 1px solid #C4C4C4;
  }

  .uploadSuratKeputusan .iconify {
    font-size: 1.5rem;
    color: #000;
  }

  #custom-btn {
    background-color: transparent;
    border: none;
    outline: none;
  }

  .rounded-top-left {
    border-radius: 0.5rem 0 0 0;
  }

  .nama_dokumen {
    font-size: 1.125rem;
    line-height: 1.22em;
    color: #041f2f;
  }
</style>
@endsection
@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-lg-8">
      <div class="card shadow padding--small">
        <div class="calendar calendar-first" id="calendar_first">
          <div class="calendar_header">
            <button class="switch-month switch-left">
              <i class="iconify" data-icon="bx:bx-chevron-left"></i>
            </button>
            <h2></h2>
            <button class="switch-month switch-right">
              <i class="iconify" data-icon="bx:bx-chevron-right"></i>
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
          <div class="uploadSuratKeputusan rounded p-3 d-flex justify-content-center align-items-center">
            <form class="align-items-center d-none">
              <i class="iconify mr-1" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
              <input type="file" id="file" hidden onchange="example()" />
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

      <div class="card shadow padding--small detailKalender">
        <div class="card_header">
          <h2 class="aside_title mb-0">Detail Kalender</h2>
          <hr class="my-3">
        </div>
        <div class="card_content">
          <label for="keterangan">Keterangan</label>
          <textarea class="form-control textarea_notresize" id="keterangan" rows="8"></textarea>
          <label for="status" class="mt-4">Status</label>
          <select name="status" id="status" class="customSelect sources" placeholder="Hari Aktif">
            <option value="0">Hari Aktif</option>
            <option value="1">Hari Libur</option>
            <option value="3">Hari Libur Nasional</option>
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
<script src="{{ asset('js/calendar.js') }}"></script>
<script src="{{ asset('js/customOption.js') }}"></script>
<script>
  const inputFile = document.getElementById("file");
  const customBtn = document.getElementById("custom-btn");
  const customText = document.getElementById("custom-text");
  const formUpload = document.querySelector(".uploadSuratKeputusan form");
  const formWrapper = document.querySelector('.uploadSuratKeputusan');
  var month = {
            "Januari":1,
            "Februari":2,
            "Maret":3,
            "April":4,
            "Mei":5,
            "Juni":6,
            "Juli":7,
            "Agustus":8,
            "September":9,
            "Oktober":10,
            "November":11,
            "Desember":12,
  };

  $(document).ready(function () {
    // getData()
    $('.date').on('click',function (e) {
      var bulan_tahun = $("#calendar_first").find(".calendar_header").find('h2').text()
      bulan_tahun = bulan_tahun.split(" ");
      var libur = $(this).hasClass('libur');
      var tanggal = ($(this).text().toString().length==1)?"0"+$(this).text():$(this).text();
      var bulan = (month[bulan_tahun[0]].toString().length==1)?"0"+month[bulan_tahun[0]]:month[bulan_tahun[0]];
      var tahun = bulan_tahun[1];
      var date =  `${tahun}-${bulan}-${tanggal}`;
    })
  })

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

  function example(){
    formUpload.classList.remove("d-none");
    formUpload.classList.add("d-flex");
    formWrapper.classList.remove("justify-content-center");
    formWrapper.classList.add("justify-content-between");
    let formWrapper_width = formWrapper.offsetWidth-100;
    document.querySelector('.nama_dokumen').style.maxWidth = formWrapper_width + "px"
  }
  
</script>
@endsection