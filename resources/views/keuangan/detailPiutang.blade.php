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

        <form id="form_cicilan" class="form-input">
          <input type="hidden" id="id" name="id" value="{{$id}}">
          <div class="form-row">
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>NIM: <b id="nim"></b></label>

              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Nama: <b id="nama"></b></label>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>UKT: <b id="ukt"></b></label>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="jumlah_cicilan">Jumlah Cicilan</label>
                <select class="form-control" id="jumlah_cicilan">
                  <option value="0">Pilih Jumlah Cicilan</option>
                  <?php
                  for ($i=1; $i <= 6; $i++) {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label for="status_piutang">Status Piutang</label>
                <select class="form-control" id="status_piutang" name="status_piutang">
                  <option>Lancar</option>
                  <option>Kurang Lancar</option>
                  <option>Tidak Lancar</option>
                  <option>Macet</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-row daftar_cicilan"></div>
          <hr class="my-4">
          <button type="submit" class="btn btn-primary w-100 simpanData-btn ">Simpan</button>
        </form>

      </div>
    </div>
  </div>
</section>
<script>
  var ukt = 0
  var id_mahasiswa = ''
  var id_piutang = '{{$id}}'
  $(document).ready(function() {
    $.ajax({
      url: url_api+"/keuangan/detail-piutang/{{$id}}",
      dataType: 'json',
      cache: false,
      type: 'get',
      beforeSend: function(text) {
        loading('show')
      },
      success: function(res){
        $('#nim').text(res.data[0].nim)
        $('#nama').text(res.data[0].nama)
        $('#ukt').text(formatAngka(res.data[0].ukt))
        ukt = parseInt(res.data[0].ukt)
        id_mahasiswa = res.data[0].id_mahasiswa
        list_cicilan = res.data[0].cicilan
        $('.daftar_cicilan').html('')
        for (var i = 1; i <= list_cicilan.length; i++) {
          $('.daftar_cicilan').append(get_list_cicilan(i, true))
        }
        for (var i = 0; i < list_cicilan.length; i++) {
          var newDate1 = new Date(list_cicilan[i].tanggal);
          var mm = newDate1.getMonth();
          var dd = newDate1.getDate();
          var aa = newDate1.getFullYear() +"-" + (mm < 10? "0":"") +mm +"-" + (dd < 10? "0":"") + dd;
          $($("[name='cicilan[]']")[i]).val(list_cicilan[i].nominal)
          $($("[name='jatuh_tempo[]']")[i]).val(aa)
        }
        loading('hide')
      }
    });
  })

  function get_list_cicilan(urutan, api = false) {
    col = 6
    status = ``
    if (api) {
      col = 4
      status = `
      <div class="col-sm-`+col+` col-12">
        <div class="form-group row mb-0">
          <label>Status Bayar</label>
          <p></p>
        </div>
      </div>`
    }
    return `
      <div class="col-sm-`+col+` col-12">
        <div class="form-group form-group_nominal row mb-0">
          <label>Nominal Cicilan ke-`+urutan+`</label>
          <input type="number" class="form-control text-right input_field" name="cicilan[]" placeholder="0" required>
        </div>
      </div>
      <div class="col-sm-`+col+` col-12">
        <div class="form-group row mb-0">
          <label>Taggal Jatuh Tempo</label>
          <input type="date" class="form-control" name="jatuh_tempo[]" required>
        </div>
      </div>`+status
  }
  $('#jumlah_cicilan').on('change', function () {
    jumlah_cicilan = this.value
    $('.daftar_cicilan').html('')
    for (var i = 1; i <= jumlah_cicilan; i++) {
      $('.daftar_cicilan').append(get_list_cicilan(i))
    }
  })

  $("form").submit(function(e) {
    e.preventDefault();
    var total_cicilan = 0
    $.each($('[name*="cicilan"]'), function( index, value ) {
      total_cicilan+=parseInt(value.value)
    });
    if (total_cicilan != ukt) {
      alert('Total cicilan tidak sama dengan UKT')
      return false
    }
    var form_data = new FormData(this);
    form_data.append('id_mahasiswa', id_mahasiswa)
    form_data.append('id_piutang', id_piutang)
    $.ajax({
      url: url_api+"/keuangan/cicilan-piutang",
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,                         
      type: 'post',
      beforeSend: function(text) {
        loading('show')
      },
      success: function(res){
        // console.log(res)
        loading('hide')
      }
    });
  });

//   $(document).ready(function() {
//     var id = "{{$id}}";
//     var optDosen = `<option value=""> - </option>`;
//     $.each(dataGlobal['prodi'],function (key,row) {
//         optDosen += `<option value="${row.nomor}">${row.program_studi}</option>`
//     })
//     $('#program_studi').append(optDosen)

//     if (id!="") {
//         getData(id);        
//     }

//     // form tambah data
//     $("#form_cu").submit(function(e) {
//         e.preventDefault();
//         var data = $('#form_cu').serialize();
//         if (id!="") {
//             var url = url_api+"/keuangan/rekap_ukt/"+id;
//             var type = "put";
//         } else {
//             var url = url_api+"/keuangan/rekap_ukt";
//             var type = "post";
//         }
//         $.ajax({
//             url: url,
//             type: type,
//             dataType: 'json',
//             data: data,
//             success: function(res) {
//                 if (res.status=="success") {
//                     window.location.href = "{{url('/akademik/keuangan/tarif')}}";                    
//                 } else {
//                     console.log("Gagal");
//                 }
                
//             }
//         });
//     });

//     set_rp();
// } );

// function getData(id) {
    
//     $.ajax({
//         url: url_api+"/keuangan/rekap_ukt/"+id,
//         type: 'get',
//         dataType: 'json',
//         data: {},
//         success: function(res) {
//             if (res.status=="success") {
//                 var data = res['data'][0];
//                 $.each(data,function (key,row) {
//                     $('#'+key).val(row);
//                 })
//                 set_rp();         
//             } else {
//                 // alert gagal
//             }
            

//         }
//     });
// }

// const inputElements = document.querySelectorAll(".input_field");
// const prefixElements = document.querySelectorAll(".input_prefix");

// function set_rp() {
//   for(let i=0 ; i<prefixElements.length; i++){
//     inputElements[i].addEventListener("input", updateSuffix);
//     updateSuffix();

//     function updateSuffix() {
//       if(window.innerWidth > 768){
//         const width = getTextWidth(inputElements[i].value, "14px Montserrat");
//         prefixElements[i].style.right = (width+20)+ "px";
//       }
//       else{
//         const width = getTextWidth(inputElements[i].value, "12px Montserrat");
//         prefixElements[i].style.right = (width+7)+ "px";
//       }
//     }

//     function getTextWidth(text, font) {
//       var canvas = getTextWidth.canvas || (getTextWidth.canvas = document.createElement("canvas"));
//       var context = canvas.getContext("2d");
//       context.font = font;
//       var metrics = context.measureText(text);
//       return metrics.width;
//     }
//   }
// }
</script>
@endsection