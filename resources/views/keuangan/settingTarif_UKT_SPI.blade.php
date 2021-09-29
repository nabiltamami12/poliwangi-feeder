@extends('layouts.main')

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
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Setting Tarif SPI & UKT</h2>
            </div>
          </div>
        </div>
        <hr class="my-4">

        <form class="setting_tarif_UKTSPI">
          <div class="form-group">
            <label for="pembayaran">Pembayaran</label>
            <select class="form-control" id="pembayaran">
              <option selected>UKT</option>
              <option>SPI</option>
            </select>
          </div>
          <div class="form-group mt-3">
            <label for="prodi">Example select</label>
            <select class="form-control" id="prodi">
              <option selected>D3 Teknik Informatika</option>
              <option>D3 Teknik Mesin</option>
              <option>D3 Teknik Sipil</option>
            </select>
          </div>
          <div class="form-group form-group_nominal mt-3">
            <label for="kelompok1">Kelompok 1</label>
            <input type="text" class="form-control text-right input_field" id="kelompok1" placeholder="0">
            <span class="input_prefix">Rp.</span>
          </div>
          <div class="form-group form-group_nominal mt-3">
            <label for="kelompok1">Kelompok 2</label>
            <input type="text" class="form-control text-right input_field" id="kelompok2" placeholder="0">
            <span class="input_prefix">Rp.</span>
          </div>
          <div class="form-group form-group_nominal mt-3">
            <label for="kelompok3">Kelompok 3</label>
            <input type="text" class="form-control text-right input_field" id="kelompok3" placeholder="0">
            <span class="input_prefix">Rp.</span>
          </div>
          <div class="form-group form-group_nominal mt-3">
            <label for="kelompok4">Kelompok 4</label>
            <input type="text" class="form-control text-right input_field" id="kelompok4" placeholder="0">
            <span class="input_prefix">Rp.</span>
          </div>
          <div class="form-group form-group_nominal mt-3">
            <label for="kelompok5">Kelompok 5</label>
            <input type="text" class="form-control text-right input_field" id="kelompok5" placeholder="0">
            <span class="input_prefix">Rp.</span>
          </div>
          <div class="form-group form-group_nominal mt-3">
            <label for="kelompok6">Kelompok 6</label>
            <input type="text" class="form-control text-right input_field" id="kelompok6" placeholder="0">
            <span class="input_prefix">Rp.</span>
          </div>
          <div class="form-group form-group_nominal mt-3">
            <label for="kelompok7">Kelompok 7</label>
            <input type="text" class="form-control text-right input_field" id="kelompok7" placeholder="0">
            <span class="input_prefix">Rp.</span>
          </div>
          <div class="form-group form-group_nominal mt-3">
            <label for="kelompok8">Kelompok 8</label>
            <input type="text" class="form-control text-right input_field" id="kelompok8" placeholder="0">
            <span class="input_prefix">Rp.</span>
          </div>
          <button type="submit" class="btn btn-primary mt-3 w-100 rounded-sm">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script>
  const inputElements = document.querySelectorAll(".input_field");
  const prefixElements = document.querySelectorAll(".input_prefix");

  for(let i=0 ; i<prefixElements.length; i++){
    inputElements[i].addEventListener("input", updateSuffix);
    updateSuffix();

    function updateSuffix() {
      if(window.innerWidth > 768){
        const width = getTextWidth(inputElements[i].value, "14px Montserrat");
        prefixElements[i].style.right = (width+20)+ "px";
      }
      else{
        const width = getTextWidth(inputElements[i].value, "12px Montserrat");
        prefixElements[i].style.right = (width+20)+ "px";
      }
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