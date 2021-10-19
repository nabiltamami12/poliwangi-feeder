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
            <div class="col">
              <h2 class="mb-0">Detail Piutang Mahasiswa</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form id="form_cu" class="form-input setting_tarif_UKTSPI">
          <input type="hidden" id="id" name="id">
          <div class="form-row">
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="kajur">Program Studi</label>
                <select class="form-control" id="program_studi" name="program_studi" >
                </select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group form-group_nominal row mb-0">
                <label for="sekjur">Sumbangan Pembangunan Institusi</label>
                <input type="text" class="form-control text-right input_field" id="spi" name="spi" placeholder="0">
                <span class="input_prefix">Rp.</span>
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group form-group_nominal row mb-0">
                <label for="sekjur">Kelompok 1</label>
                <input type="text" class="form-control text-right input_field" id="kelompok_1" name="kelompok_1" placeholder="0">
                <span class="input_prefix">Rp.</span>
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group form-group_nominal row mb-0">
                <label for="sekjur">Kelompok 2</label>
                <input type="text" class="form-control text-right input_field" id="kelompok_2" name="kelompok_2" placeholder="0">
                <span class="input_prefix">Rp.</span>
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group form-group_nominal row mb-0">
                <label for="sekjur">Kelompok 3</label>
                <input type="text" class="form-control text-right input_field" id="kelompok_3" name="kelompok_3" placeholder="0">
                <span class="input_prefix">Rp.</span>
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group form-group_nominal row mb-0">
                <label for="sekjur">Kelompok 4</label>
                <input type="text" class="form-control text-right input_field" id="kelompok_4" name="kelompok_4" placeholder="0">
                <span class="input_prefix">Rp.</span>
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group form-group_nominal row mb-0">
                <label for="sekjur">Kelompok 5</label>
                <input type="text" class="form-control text-right input_field" id="kelompok_5" name="kelompok_5" placeholder="0">
                <span class="input_prefix">Rp.</span>
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group form-group_nominal row mb-0">
                <label for="sekjur">Kelompok 6</label>
                <input type="text" class="form-control text-right input_field" id="kelompok_6" name="kelompok_6" placeholder="0">
                <span class="input_prefix">Rp.</span>
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group form-group_nominal row mb-0">
                <label for="sekjur">Kelompok 7</label>
                <input type="text" class="form-control text-right input_field" id="kelompok_7" name="kelompok_7" placeholder="0">
                <span class="input_prefix">Rp.</span>
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group form-group_nominal row mb-0">
                <label for="sekjur">Kelompok 8</label>
                <input type="text" class="form-control text-right input_field" id="kelompok_8" name="kelompok_8" placeholder="0">
                <span class="input_prefix">Rp.</span>
              </div>
            </div>
          </div>
          <hr class="my-4">
          <button type="submit" class="btn btn-primary w-100 simpanData-btn ">Simpan</button>
        </form>

      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function() {
    var id = "{{$id}}";
    var optDosen = `<option value=""> - </option>`;
    $.each(dataGlobal['prodi'],function (key,row) {
        optDosen += `<option value="${row.nomor}">${row.program_studi}</option>`
    })
    $('#program_studi').append(optDosen)

    if (id!="") {
        getData(id);        
    }

    // form tambah data
    $("#form_cu").submit(function(e) {
        e.preventDefault();
        var data = $('#form_cu').serialize();
        if (id!="") {
            var url = url_api+"/keuangan/rekap_ukt/"+id;
            var type = "put";
        } else {
            var url = url_api+"/keuangan/rekap_ukt";
            var type = "post";
        }
        $.ajax({
            url: url,
            type: type,
            dataType: 'json',
            data: data,
            success: function(res) {
                if (res.status=="success") {
                    window.location.href = "{{url('/akademik/keuangan/tarif')}}";                    
                } else {
                    console.log("Gagal");
                }
                
            }
        });
    });

    set_rp();
} );

function getData(id) {
    
    $.ajax({
        url: url_api+"/keuangan/rekap_ukt/"+id,
        type: 'get',
        dataType: 'json',
        data: {},
        success: function(res) {
            if (res.status=="success") {
                var data = res['data'][0];
                $.each(data,function (key,row) {
                    $('#'+key).val(row);
                })
                set_rp();         
            } else {
                // alert gagal
            }
            

        }
    });
}

const inputElements = document.querySelectorAll(".input_field");
const prefixElements = document.querySelectorAll(".input_prefix");

function set_rp() {
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
        prefixElements[i].style.right = (width+7)+ "px";
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
}
</script>
@endsection