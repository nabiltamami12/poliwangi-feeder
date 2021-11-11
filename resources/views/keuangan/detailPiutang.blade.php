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
            <div class="col-sm-6 col-6">
              <div class="form-group row mb-0">
                <label>File Pengajuan: <b id="file_pengajuan"></b></label>
              </div>
            </div>
            <div class="col-sm-6 col-6">
              <div class="form-group row mb-0">
                <label>File Perjanjian: <b id="file_perjanjian"></b></label>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="jumlah_cicilan">Jumlah Cicilan</label>
                <select class="form-control" id="jumlah_cicilan">
                  <option value="0">Pilih Jumlah Cicilan</option>
                  <?php
                  for ($i=2; $i <= 6; $i++) {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="status_piutang">Status Piutang</label>
                <select class="form-control" id="status_piutang" name="status_piutang" required>
                  <option>Lancar</option>
                  <option>Kurang Lancar</option>
                  <option>Tidak Lancar</option>
                  <option>Macet</option>
                  <option>Pending</option>
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
                  <th>Nominal</th><th>Tanggal Jatuh Tempo</th><th>Status</th><th>Aksi</th>
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
        if ($('#status_piutang').val() == null) {
          $('#status_piutang').val('Pending')
        }
        if (res.data.path_pengajuan) {
          $('#file_pengajuan').html('<a href="'+url_api+'/download/dokumen-piutang/{{$id}}/pengajuan'+'">Download File Pengajuan</a>')
        }else{
          $('#file_pengajuan').text('File belum diupload')
        }
        if (res.data.path_perjanjian) {
          $('#file_perjanjian').html('<a href="'+url_api+'/download/dokumen-piutang/{{$id}}/perjanjian'+'">Download File Perjanjian</a>')
        }else{
          $('#file_perjanjian').text('File belum diupload')
        }
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
            var tgl_bl = list_riwayat_cicilan[j].tanggal
            if (list_riwayat_cicilan[j].status != '1') {
              aksi_bl = '<button type="button" class="btn btn-secondary btn-sm" style="height: 22px" onclick="simpanBl('+list_riwayat_cicilan[j].id+', \''+j+'\')">Simpan</button>'
              var newDate2 = new Date(list_riwayat_cicilan[j].tanggal);
              var mm2 = newDate2.getMonth();
              var dd2 = newDate2.getDate();
              var aa2 = newDate2.getFullYear() +"-" + (mm2 < 10? "0":"") +mm2 +"-" + (dd2 < 10? "0":"") + dd2;
              tgl_bl = '<input class="tgl_bl'+j+'" type="date" value="'+aa2+'">'
              cicilan_belum_lunas+=parseInt(list_riwayat_cicilan[j].nominal)
            }
            $(".riwayat_cicilan table tbody").append(`<tr><td>`+formatAngka(list_riwayat_cicilan[j].nominal)+`</td><td>`+formatTanggal(tgl_bl)+`</td><td>`+(list_riwayat_cicilan[j].status == 1 ? 'Lunas' : 'Belum Lunas')+`</td><td>`+aksi_bl+`</td></tr>`)
          }
        }
        // ukt += cicilan_belum_lunas
        if (cicilan_belum_lunas > 0) {
          $(".riwayat_cicilan h3").text("Riwayat Cicilan (Belum Lunas: "+formatAngka(cicilan_belum_lunas)+")")
        }
        $('.number-format').number( true);
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
    $('.number-format').number( true);
  })

  $("form").submit(function(e) {
    e.preventDefault();
    if ($('#status_piutang').val().toLowerCase() == 'pending') {
      alert('Status Piutang harus selain Pending')
      return false
    }
    $('.number-format').number( true, 0, '', '');
    var total_cicilan = 0
    $.each($('[name*="cicilan"]'), function( index, value ) {
      total_cicilan+=parseInt($(value).val())
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

  function simpanBl(id, k) {
    var tgl = $('.tgl_bl'+k).val()
    var form_data = new FormData();
    form_data.append('id', id)
    form_data.append('tgl', tgl)
    $.ajax({
      url: url_api+"/keuangan/update-jatuh-tempo",
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,                         
      type: 'post',
      beforeSend: function(text) {
        // loading('show')
      },
      success: function(res){
        // location.reload()
        // loading('hide')
      }
    });
  }
</script>
@endsection