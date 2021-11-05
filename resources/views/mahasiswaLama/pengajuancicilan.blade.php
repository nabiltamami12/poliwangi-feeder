@extends('layouts.main')

@section('style')
<style>
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

  .uploadSuratPengajuan {
	cursor: pointer;
    border: 1px solid #C4C4C4;
  }

  .uploadSuratPengajuan .iconify {
    font-size: 1.5rem;
    color: #000;
  }

  .uploadSuratPerjanjian {
  cursor: pointer;
    border: 1px solid #C4C4C4;
  }

  .uploadSuratPerjanjian .iconify {
    font-size: 1.5rem;
    color: #000;
  }

  .custom-btn {
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
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-6">
      <div class="card shadow padding--small">
        <div class="card_header">
          <h2 class="aside_title mb-0 pengajuan">Upload Surat Pengajuan Cicilan</h2>
          <hr class="mt-3 mb-4">
        </div>
        <div class="card_content">
          <div class="uploadSuratPengajuan rounded p-3 d-flex justify-content-center align-items-center">
            <form class="align-items-center d-none">
              <i class="iconify mr-1" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
              <input type="file" name="file" hidden onchange="changeSuratPengajuan()" />
              <span class="d-inline-block nama_dokumen">tidak ada file dipilih</span>
            </form>
            <button type="button" class="custom-btn">
              <i class="iconify text-primary" data-icon="bx:bx-cloud-upload" data-inline="false"></i>
            </button>
          </div>
          <button type="button" class="btn btn-primary mt-4 w-100 submitSuratPengajuan"> <i class="iconify mr-1" data-icon="bx:bx-save"></i> Simpan</button>
          <!-- <p>Lihat surat pengajuan</p> -->
        </div>
      </div>
      <div class="card shadow padding--small">
        <div class="card_header">
          <h2 class="aside_title mb-0 perjanjian">Upload Surat Perjanjian</h2>
          <hr class="mt-3 mb-4">
        </div>
        <div class="card_content">
          <div class="uploadSuratPerjanjian rounded p-3 d-flex justify-content-center align-items-center">
            <form class="align-items-center d-none">
              <i class="iconify mr-1" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
              <input type="file" name="file" hidden onchange="changeSuratPerjanjian()" />
              <span class="d-inline-block nama_dokumen">tidak ada file dipilih</span>
            </form>
            <button type="button" class="custom-btn">
              <i class="iconify text-primary" data-icon="bx:bx-cloud-upload" data-inline="false"></i>
            </button>
          </div>
          <button type="button" class="btn btn-primary mt-4 w-100 submitSuratPerjanjian"> <i class="iconify mr-1" data-icon="bx:bx-save"></i> Simpan</button>
          <!-- <p>Lihat surat perjanjian</p> -->
        </div>
      </div>
    </div>
    <div class="col-xl-6">
      <div class="card shadow padding--small">
        <div class="card_header">
          <h2 class="aside_title mb-0">PERJANJIAN</h2>
          <hr class="mt-3 mb-4">
        </div>
        <div class="card_content">
          <div class="row">
            <!-- <div class="col-xl-12">
              <div class="uploadSuratPengajuan rounded p-3 d-flex justify-content-center align-items-center">
              <i class="iconify" data-icon="bx:bx-file-blank"></i><span class="mt-1 ml-2">Preview File Perjanjian </span>
              </div>
            </div> -->
            <div class="col-xl-12">
              <div class="form-group">
                <div class="row list-cicilan">
                  <div class="col-xl-12">
                    <p id="cicilan_total"></p>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- <button type="button" class="btn btn-primary mt-4 w-100" id="upload"> <i class="iconify mr-1" data-icon="bx:bx-save"></i> Simpan</button> -->
        </div>
      </div>
    </div>            
  </div>      
</section>
@endsection

@section('js')
<script>

  $('.uploadSuratPengajuan .custom-btn').on('click', function () {
    $('.uploadSuratPengajuan [name="file"]').click()
  })
  $('.uploadSuratPengajuan [name="file"]').on('change', function () {
    let fileName = this.value.match(/[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/)[0];
    $('.uploadSuratPengajuan .nama_dokumen').text(fileName)
  })

  $('.submitSuratPengajuan').on('click', function () {
    var file_data = $('.uploadSuratPengajuan [name="file"]').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    form_data.append('tipe', 'pengajuan');
    form_data.append('id_mahasiswa', id_mahasiswa);

    $.ajax({
      url: url_api+"/keuangan/dokumen-piutang",
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function(res){
        location.reload()
      }
    });

  })

  function changeSuratPengajuan(){
    const formUpload = document.querySelector(".uploadSuratPengajuan form");
    const formWrapper = document.querySelector('.uploadSuratPengajuan');
    formUpload.classList.remove("d-none");
    formUpload.classList.add("d-flex");
    formWrapper.classList.remove("justify-content-center");
    formWrapper.classList.add("justify-content-between");
    let formWrapper_width = formWrapper.offsetWidth-100;
    document.querySelector('.uploadSuratPengajuan .nama_dokumen').style.maxWidth = formWrapper_width + "px"
  }

  $('.uploadSuratPerjanjian .custom-btn').on('click', function () {
    $('.uploadSuratPerjanjian [name="file"]').click()
  })
  $('.uploadSuratPerjanjian [name="file"]').on('change', function () {
    let fileName = this.value.match(/[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/)[0];
    $('.uploadSuratPerjanjian .nama_dokumen').text(fileName)
  })

  $('.submitSuratPerjanjian').on('click', function () {
    var file_data = $('.uploadSuratPerjanjian [name="file"]').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    form_data.append('tipe', 'perjanjian');
    form_data.append('id_mahasiswa', id_mahasiswa);

    $.ajax({
      url: url_api+"/keuangan/dokumen-piutang",
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function(res){
        location.reload()
      }
    });

  })

  function changeSuratPerjanjian(){
    const formUpload = document.querySelector(".uploadSuratPerjanjian form");
    const formWrapper = document.querySelector('.uploadSuratPerjanjian');
    formUpload.classList.remove("d-none");
    formUpload.classList.add("d-flex");
    formWrapper.classList.remove("justify-content-center");
    formWrapper.classList.add("justify-content-between");
    let formWrapper_width = formWrapper.offsetWidth-100;
    document.querySelector('.uploadSuratPerjanjian .nama_dokumen').style.maxWidth = formWrapper_width + "px"
  }

$(document).ready(function () {
    loading("hide")
});

$(function(){
    $.ajax({
      url: url_api+"/keuangan/dokumen-piutang/"+id_mahasiswa,
      dataType: 'json',
      cache: false,
      type: 'get',
      beforeSend: function(text) {
      },
      success: function(res){
        if (res.data == null) {
          window.location.href = "{{url('/mahasiswa/dashboard')}}";
        }
        if (res.data.path_pengajuan) {
          $('.pengajuan').append(' <span style="color:green">(Telah diupload)</span>')
        }
        if (res.data.path_perjanjian) {
          $('.perjanjian').append(' <span style="color:green">(Telah diupload)</span>')
        }
        $('#cicilan_total').text('Cicilan '+res.data.cicilan.length+' kali')
        for (var i = 0; i < res.data.cicilan.length; i++) {
          $('.list-cicilan').append(`
                  <div class="col-xl-4">
                    <p>`+formatAngka(res.data.cicilan[i].nominal)+`</p>
                  </div>
                  <div class="col-xl-8">
                    <p>Jatuh Tempo `+formatTanggal(res.data.cicilan[i].tanggal)+`</p>
                  </div>`)
        }
      }
    });
  })
</script>

@endsection