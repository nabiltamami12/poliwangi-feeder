@extends('layouts.mainKeuangan')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0 text-center text-md-left">Input Data Pembayaran</h2>
            </div>
          </div>
        </div>
        <hr class="my-4">

        <form class="form_inputDataPembayaran">
          <div class="form-row">
            <div class="form-group col-md-6 pr-md-2">
              <label>Tanggal Pembayaran</label>
              <div class="d-flex align-items-center date_picker">
                <input id="txtDate" type="text" class="form-control date-input " value="13 Jul 2021" readonly />
                <label class="input-group-btn" for="txtDate">
                  <span class="date_button">
                    <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                  </span>
                </label>
              </div>
            </div>
            <div class="form-group col-md-6 mt-3 mt-md-0 pl-md-2">
              <label>NIM</label>
              <input type="text" class="form-control" placeholder="NIM Mahasiswa">
            </div>
          </div>

          <div class="form-group mt-3">
            <label>Nama Mahasiswa</label>
            <input type="text" class="form-control" placeholder="Nama Mahasiswa">
          </div>

          <div class="form-group mt-3">
            <label>Pembayaran</label>
            <select class="form-control">
              <option selected>UKT</option>
              <option>SPI</option>
            </select>
          </div>

          <div class="form-group mt-3">
            <label>Pembayaran Ke-</label>
            <select class="form-control">
              <option>1</option>
              <option>2</option>
              <option selected>3</option>
            </select>
          </div>

          <div class="form-group form-group_nominal mt-3">
            <label>Nominal</label>
            <input type="text" class="form-control text-right input_field" placeholder="0">
            <span class="input_prefix">Rp.</span>
          </div>
          <button type="submit" class="btn btn-primary w-100 mt-4 rounded-sm">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection


@section('js')
<script>
  $(function () {
    $("#txtDate").datepicker({
        format: "dd MM yyyy",
    });
  });
  
  const inputElements = document.querySelectorAll(".input_field");
  const prefixElements = document.querySelectorAll(".input_prefix");

  for(let i=0 ; i<prefixElements.length; i++){
    inputElements[i].addEventListener("input", updateSuffix);

    updateSuffix();

    function updateSuffix() {
      const width = getTextWidth(inputElements[i].value, "14px Montserrat");
      prefixElements[i].style.right = width + "px";
    }

    function getTextWidth(text, font) {
      var canvas = getTextWidth.canvas || (getTextWidth.canvas = document.createElement("canvas"));
      var context = canvas.getContext("2d");
      context.font = font;
      var metrics = context.measureText(text);
      return metrics.width;
    }
  }
</script>
@endsection