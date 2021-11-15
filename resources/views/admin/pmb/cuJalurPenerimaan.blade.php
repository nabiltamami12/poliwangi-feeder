@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow ">
        <div class="card-header padding--medium">
          <div class="row align-items-center">
            <div class="col-12">
              <h2 class="mb-0 ml-3 text-center text-sm-left">{{ ($id==null)?"Tambah":"Ubah" }} Jalur Penerimaan Mahasiswa Baru</h2>
            </div>
          </div>
        </div>
        <hr>

        <div class="card-body padding--medium">
          <form id="form_cu">
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label"><h1 class="mr-4">Jalur Penerimaan: </h1></label>
              <div class="col-sm-8">
                <input type="text" class="form-control flex-grow-1" id="jalur_daftar" name="jalur_daftar">
              </div>
            </div>
            <hr class="m-4">
            <div class="row jalurPMB_pendaftaran">
              <div class="col-lg-12 mb-2">
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-12 col-form-label"><h2 class="card_title mb-2 font-weight-500">Tanggal Pendaftaran</h2></label>
                  <div class="col-md-3 d-flex align-items-center date_picker">
                    <input id="tanggal_buka" type="text" class="form-control date-input" name="tanggal_buka" />
                    <label class="input-group-btn" for="txtDate1">
                      <span class="date_button" style="right: 16px;">
                        <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                      </span>
                    </label>      
                  </div>
                  <div class="col-md-2 d-flex align-items-center date_picker">
                    <input type="text" id="jam_buka" name="jam_buka" class="form-control timepicker w-100">
                    <label class="input-group-btn" for="txtDate1">
                      <span class="date_button" style="right: 16px;">
                        <i class="iconify" data-icon="bx:bx-time" data-inline="false"></i>
                      </span>
                    </label>      
                  </div>
                  <div class="col-md-2 d-flex align-items-center justify-content-center">Sampai</div>
                  <div class="col-md-3 d-flex align-items-center date_picker">
                    <input id="tanggal_tutup" type="text" class="form-control date-input" name="tanggal_tutup" />
                    <label class="input-group-btn" for="txtDate2">
                      <span class="date_button" style="right: 16px;">
                        <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                      </span>
                    </label>
                  </div>
                  <div class="col-md-2 d-flex align-items-center date_picker">
                    <input type="text" id="jam_tutup" name="jam_tutup" class="form-control timepicker w-100">
                    <label class="input-group-btn" for="txtDate1">
                      <span class="date_button" style="right: 16px;">
                        <i class="iconify" data-icon="bx:bx-time" data-inline="false"></i>
                      </span>
                    </label>      
                  </div>

                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <h2 class="card_title col-md-12 mb-2 font-weight-500">Jumlah Jurusan Pilihan</h2>
                  <div class="col-md-12">
                    <input type="number" class="form-control" id="jml_seleksi" name="jml_seleksi">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <h2 class="card_title col-md-12 mb-2 font-weight-500">Kuota Mahasiswa Diterima</h2>
                  <div class="col-md-12">
                    <input type="number" class="form-control" id="kuota" name="kuota">
                  </div>
                </div>
              </div>
            </div>
            <hr class="m-4">
            <div class="form-group row">
              <div class="col-md-6 pl-3 mt-lg-0">
                <h2 class="card_title font-weight-500">Syarat Pendaftaran</h2>
                <div id="list_syarat"></div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <button type="submit" class="btn btn-primary w-100 rounded-sm mt-3">Simpan</button>
              </div>
            </div>
        </div>
      </div>
    </div>
    </form>
  </div>
</section>
@endsection

@section('js')
<script>
  $(function() {
    $(".date-input").datepicker({
      format: "D M Y",
    });
  });

  $(document).ready(function() {

    var id = "{{$id}}";
    getSyarat();
    if (id != "") {
      getData(id);
    }
    // form tambah data
    $("#form_cu").submit(function(e) {
      e.preventDefault();
      let arr_syarat = [];
      $('.option-syarat.text-success').each(function(i, obj) {
        arr_syarat.push(obj.dataset.id)
      });
      var data = $('#form_cu').serialize();
      var url = url_api + "/jalurpmb/" + id;
      var type = "put";
      var data = {
        'jalur_daftar' : $('#jalur_daftar').val(),
        'tanggal_buka' : $('#tanggal_buka').val(),
        'jam_buka' : $('#jam_buka').val(),
        'tanggal_tutup' : $('#tanggal_tutup').val(),
        'jam_tutup' : $('#jam_tutup').val(),
        'kuota' : $('#kuota').val(),
        'jml_seleksi' : $('#jml_seleksi').val(),
      }
      
      $.ajax({
        url: url,
        type: type,
        dataType: 'json',
        data:{'data':data,'syarat':arr_syarat},
        success: function(res) {
          if (res.status == "success") {
            // window.location.href = "{{url('/admin/settingpmb/settingjalurpenerimaan')}}";
          } else {
            // alert gagal
          }
          

        }
      });
    });
  });

  function getSyarat() {
    $.ajax({
      url: url_api + "/syarat",
      type: 'get',
      dataType: 'json',
      data: {},
      success: function(res) {
        if (res.status == "success") {
          var data = res.data;
          var html = '';
          $.each(data,function (key,row) {
            html = `<div class="py-3 d-flex align-items-center">
                  <i onclick="func_centang('${row.id}')" style="cursor:pointer" id="centang_${row.id}" data-id="${row.id}" class="iconify text-placeholder mr-3 option-syarat" data-icon="akar-icons:circle-check-fill"></i>
                  <span onclick="func_centang('${row.id}')" style="cursor:pointer" class="d-inline-block">${row.nama}</span>
                </div>`
            $('#list_syarat').append(html)
          })
        } else {
          // alert gagal
        }
        

      }
    });
  }

  function func_centang(val) {
    const e = '#centang_'+val;
    var id_syarat = $(e).data('id')
    var check = $(e).hasClass('text-placeholder');
    if(check){
      $(e).removeClass('text-placeholder')
      $(e).addClass('text-success')
    }else{
      $(e).addClass('text-placeholder')
      $(e).removeClass('text-success')
    }
  }

  function getData(id) {
    $.ajax({
      url: url_api + "/jalurpmb/" + id,
      type: 'get',
      dataType: 'json',
      data: {},
      success: function(res) {
        if (res.status == "success") {
          var data = res.data.data;
          $.each(data, function(key, row) {
            $('#' + key).val(row);
          })
          $('#tanggal_buka').datepicker('setDate', new Date(data.tanggal_buka));
          $('#tanggal_tutup').datepicker('setDate', new Date(data.tanggal_tutup));

          var syarat = res.data.syarat;
          $.each(syarat,function (key,row) {
            $('#centang_'+row.id_syarat).removeClass("text-placeholder")
            $('#centang_'+row.id_syarat).addClass("text-success")
          })
        } else {
          // alert gagal
        }
      }
    });
  }
</script>
@endsection