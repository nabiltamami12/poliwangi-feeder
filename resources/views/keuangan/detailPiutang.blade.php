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
          <div class="form-row mt-0">
            <div class="col-sm-4 col-12">
              <div class="form-group row mb-0">
                <label>NIM: <b id="nim"></b></label>

              </div>
            </div>
            <div class="col-sm-4 col-12">
              <div class="form-group row mb-0">
                <label>Nama: <b id="nama"></b></label>
              </div>
            </div>
            <div class="col-sm-4 col-12">
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
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="status_piutang">Status Piutang</label>
                <select class="form-control" id="status_piutang" name="status_piutang">
                  <option>Pending</option>
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
          <div class="form-row mt-3 riwayat_cicilan">
            <h3>Riwayat Cicilan</h3>
            <table class="table">
              <thead>
                <tr>
                  <th>Nominal</th><th>Tanggal</th><th>Status</th><th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </form>

      </div>
    </div>
  </div>
</section>
<script>
  var ukt = 0
  var cicilan_belum_lunas = 0
  var id_mahasiswa = ''
  var id_piutang = '{{$id}}'
  var isset_cicilan = false
  $(function(){
    $.ajax({
      url: url_api+"/keuangan/detail-piutang/{{$id}}",
      dataType: 'json',
      cache: false,
      type: 'get',
      beforeSend: function(text) {
        loading('show')
      },
      success: function(res){
        $('#nim').text(res.data.nim)
        $('#nama').text(res.data.nama)
        $('#ukt').text(formatAngka(res.data.ukt))
        $('#status_piutang').val(res.data.status_piutang)
        ukt = parseInt(res.data.ukt)
        id_mahasiswa = res.data.id_mahasiswa
        list_cicilan = res.data.cicilan
        $('.daftar_cicilan').html('')
        for (var i = 1; i <= list_cicilan.length; i++) {
          isset_cicilan = true
          $("#jumlah_cicilan").prop('disabled', true)
          $('.daftar_cicilan').append(get_list_cicilan(i, true))
        }
        for (var i = 0; i < list_cicilan.length; i++) {
          var newDate1 = new Date(list_cicilan[i].tanggal);
          var mm = newDate1.getMonth();
          var dd = newDate1.getDate();
          var aa = newDate1.getFullYear() +"-" + (mm < 10? "0":"") +mm +"-" + (dd < 10? "0":"") + dd;
          $($("[name='cicilan[]']")[i]).val(list_cicilan[i].nominal)
          $($("[name='jatuh_tempo[]']")[i]).val(aa)
          $($("[name='idkp[]']")[i]).val(list_cicilan[i].id)
          $($("[name='cicilan[]']")[i]).prop('disabled', true)
          if (list_cicilan[i].status == 1) {
            $($("[name='jatuh_tempo[]']")[i]).prop('disabled', true)
            $($("[name='idkp[]']")[i]).prop('disabled', true)
            $(".status_bayar"+i).text('Lunas')
          }
        }
        for (var i = 0; i < res.data.riwayat.length; i++) {
          res.data.riwayat[i]
          list_riwayat_cicilan = res.data.riwayat[i].cicilan
          for (var j = 0; j < list_riwayat_cicilan.length; j++) {
            var aksi_bl = ''
            if (list_riwayat_cicilan[j].status != '1') {
              aksi_bl = '<button type="button" class="btn btn-secondary btn-sm" style="height: 22px" onclick="simpanBl('+list_riwayat_cicilan[j].id+', \''+list_riwayat_cicilan[j].tanggal+'\')">Simpan</button>'
              cicilan_belum_lunas+=parseInt(list_riwayat_cicilan[j].nominal)
            }
            $(".riwayat_cicilan table tbody").append(`<tr><td>`+formatAngka(list_riwayat_cicilan[j].nominal)+`</td><td>`+list_riwayat_cicilan[j].tanggal+`</td><td>`+(list_riwayat_cicilan[j].status == 1 ? 'Lunas' : 'Belum Lunas')+`</td><td>`+aksi_bl+`</td></tr>`)
          }
        }
        // ukt += cicilan_belum_lunas
        if (cicilan_belum_lunas > 0) {
          $(".riwayat_cicilan h3").text("Riwayat Cicilan (Belum Lunas: "+formatAngka(cicilan_belum_lunas)+")")
        }
        // $('.number-format').number( true);
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
          <span class="status_bayar`+(urutan-1)+` mt-5">Belum Lunas</span>
        </div>
      </div>`
    }
    return `
    <input type="hidden" name="idkp[]">
      <div class="col-sm-`+col+` col-12">
        <div class="form-group form-group_nominal row mb-0">
          <label>Nominal Cicilan ke-`+urutan+`</label>
          <input type="text" class="form-control text-right input_field number-format" name="cicilan[]" placeholder="0" required>
        </div>
      </div>
      <div class="col-sm-`+col+` col-12">
        <div class="form-group row mb-0">
          <label>Tanggal Jatuh Tempo</label>
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
    // $('.number-format').number( true);
  })

  $("form").submit(function(e) {
    e.preventDefault();
    var total_cicilan = 0
    $.each($('[name*="cicilan"]'), function( index, value ) {
      total_cicilan+=parseInt(value.value)
    });
    if (cicilan_belum_lunas > 0) {
      alert('Cicilan lama harus dilunasi terlebih dahulu')
      return false
    }
    if (total_cicilan != ukt && !isset_cicilan) {
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
        location.reload()
        loading('hide')
      }
    });
  });

  function simpanBl(id, tanggal) {
    console.log(id, tanggal)
  }

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