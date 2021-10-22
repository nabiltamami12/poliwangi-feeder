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
              <h2 class="mb-0 text-center text-sm-left">{{ ($id==null)?"TAMBAH":"UBAH" }} Jalur Penerimaan Mahasiswa Baru</h2>
            </div>
          </div>
        </div>
        <hr>

        <div class="card-body padding--medium">
          <form id="form_cu">
            <h1 class="mr-4">Jalur Penerimaan: </h1>
            <label class="sr-only" for="jalur_daftar">Jalur Penerimaan</label>
            <input type="text" class="form-control flex-grow-1" id="jalur_daftar" name="jalur_daftar">
            <hr class="mt-4 mb-3">

            <div class="row jalurPMB_pendaftaran">
              <div class="col-lg-6">
                <div class="row">
                  <div class="col-lg-6 mt-3 mb-3">
                    <h2 class="card_title mb-2 font-weight-500">Tanggal Buka</h2>
                    <div class="d-flex align-items-center date_picker">
                      <input id="tanggal_buka" type="text" class="form-control date-input" name="tanggal_buka" />
                      <label class="input-group-btn" for="txtDate1">
                        <span class="date_button">
                          <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                        </span>
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-6 mt-3 mb-3">
                    <h2 class="card_title mb-2 font-weight-500">Tanggal Tutup</h2>
                    <div class="d-flex align-items-center date_picker">
                      <input id="tanggal_tutup" type="text" class="form-control date-input" name="tanggal_tutup" />
                      <label class="input-group-btn" for="txtDate2">
                        <span class="date_button">
                          <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                        </span>
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-6 mt-3 mb-3">
                    <h2 class="card_title mb-2 font-weight-500">Jumlah Jurusan Pilihan</h2>
                    <input type="number" class="form-control" id="jml_seleksi" name="jml_seleksi">
                  </div>
                  <div class="col-lg-6 mt-3 mb-3">
                    <h2 class="card_title mb-2 font-weight-500">Kuota</h2>
                    <input type="number" class="form-control" id="kuota" name="kuota">
                  </div>
                </div>

              </div>

              <div class="col-lg-6 pl-3 mt-4 mt-lg-0">
                <h2 class="card_title font-weight-500">Syarat Pendaftaran</h2>
                <div id="list_syarat">

                </div>
<!--                 
                <div class="py-3 d-flex">
                  <i class="iconify text-success mr-3" data-icon="akar-icons:circle-check-fill"></i>
                  <p class="d-inline-block">Surat Keterangan Hasil Ujian</p>
                </div>
                <div class="py-3 d-flex">
                  <i class="iconify text-success mr-3" data-icon="akar-icons:circle-check-fill"></i>
                  <p class="d-inline-block">Bukti Pembayaran Pendaftaran</p>
                </div>
                <div class="py-3 d-flex">
                  <i class="iconify text-placeholder mr-3" data-icon="akar-icons:circle-check-fill"></i>
                  <p class="d-inline-block text-wrap">Bukti Telah Diterima di Politeknik Negeri Banyuwangi</p>
                </div>
                <div class="py-3 d-flex">
                  <i class="iconify text-placeholder mr-3" data-icon="akar-icons:circle-check-fill"></i>
                  <p class="d-inline-block">Surat Pernyataan Taat Peraturan</p>
                </div>
                <div class="py-3 d-flex">
                  <i class="iconify text-placeholder mr-3" data-icon="akar-icons:circle-check-fill"></i>
                  <p class="d-inline-block">Upload Foto dengan Almamater</p>
                </div>
                <div class="py-3 d-flex">
                  <i class="iconify text-success mr-3" data-icon="akar-icons:circle-check-fill"></i>
                  <p class="d-inline-block">Upload Dokumen Pengajuan Keringanan <span class="text-primary">(Optional)</span></p>
                </div> -->
              </div>
            </div>
            <div class="row">
              <div class="col">
                <button type="submit" class="btn btn-primary w-100 rounded-sm mt-3">{{ ($id==null)?"Tambah":"Ubah" }}Simpan</button>
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
  var arr_syarat = [];
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
      var data = $('#form_cu').serialize();
      var url = url_api + "/jalurpmb/" + id;
      var type = "put";
      var data = {
        'jalur_daftar' : $('#jalur_daftar').val(),
        'tanggal_buka' : $('#tanggal_buka').val(),
        'tanggal_tutup' : $('#tanggal_tutup').val(),
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
            window.location.href = "{{url('/admin/settingpmb/settingjalurpenerimaan')}}";
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
            html = `<div class="py-3 d-flex">
                  <i onclick="func_centang(this)" style="cursor:pointer" id="centang_${row.id}" data-id="${row.id}" class="iconify text-placeholder mr-3" data-icon="akar-icons:circle-check-fill"></i>
                  <p class="d-inline-block">${row.nama}</p>
                </div>`
            $('#list_syarat').append(html)
          })
        } else {
          // alert gagal
        }
        

      }
    });
  }

  function func_centang(e) {
    var id_syarat = $(e).data('id')
    var check = $(e).hasClass('text-placeholder');
    if(check){
      $(e).removeClass('text-placeholder')
      $(e).addClass('text-success')
      arr_syarat.push(id_syarat);
    }else{
      $(e).addClass('text-placeholder')
      $(e).removeClass('text-success')
      var index = arr_syarat.indexOf(id_syarat);
      if (index > -1) { //if found
        arr_syarat.splice(index, 1);
      }
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
          $('#tanggal_buka').val(formatTanggal(data.tanggal_buka));
          $('#tanggal_tutup').val(formatTanggal(data.tanggal_tutup));

          var syarat = res.data.syarat;
          $.each(syarat,function (key,row) {
            console.log(row)
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