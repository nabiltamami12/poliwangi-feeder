@extends('layouts.mainMaba')

@section('content')
<style>
  .text-status{
    text-align:center;
    font-style:italic;
    color:red;
    font-weight:400;
  }
</style>
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="dashboard_maba">
  <div class="row">
    <div class="col-md-12">
      <div id="pengumuman" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner shadow">
          <div class="carousel-item active" data-interval="2000">
            <img src="{{ url('images') }}/banner_maba.png" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div id="card_prodi_pilihan" class="card shadow padding--medium card_presensi mt-0 mt-md-4">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Pilihan Jurusan</h3>
            </div>
          </div>
          <hr class="my-4">
        </div>
        <div id="card_presensi" class="card-body p-0">
          <div id="list_poliwangi">

          </div>
          <div id="list_poltek">

          </div>
        </div>
          <button type="button" id="btn_verifikasi" onclick="func_verifikasi()" class="btn btn-success w-100 mt-4 rounded-sm btn-no-jadwal">Verifikasi Data</button>
      </div>
      <div id="card_prodi_detail" hidden class="card shadow padding--medium card_presensi mt-0 mt-md-4">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Detail Prodi</h3>
            </div>
          </div>
          <hr class="my-4">
        </div>
        <div id="card_presensi" class="card-body p-0">
          <p id="text_poltek_luar" hidden class="">Silahkan lanjutkan untuk mendaftar ulang pada politeknik yang diterima</p>
          <p id="text_detail" class="text-status">Sedang Dalam Proses</p>
          <div id="detail_penerimaan">
            <h6 class="mb-0 mb-2">Prodi Pilihan</h6>
            <h5 class="mb-0 mb-3" id="prodi_detail"></h5>
            <h6 class="mb-0 mb-2">Biaya SPI</h6>
            <h5 class="mb-0 mb-3" id="spi_detail"></h5>
            <h6 class="mb-0 mb-2">Biaya UKT</h6>
            <h5 class="mb-0 mb-3" id="ukt_detail"></h5>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card shadow padding--medium card_presensi mt-0 mt-md-4">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Status Penerimaan</h3>
            </div>
          </div>
          <hr class="my-4">
        </div>
        <div id="card_presensi" class="card-body p-0">
          <p id="text_penerimaan" class="text-status">Sedang Dalam Proses</p>
          <div id="info_penerimaan" hidden>
            <h6 class="mb-0 mb-2">Diterima Di</h6>
            <h5 class="mb-0 mb-3" id="poltek_pilihan"></h5>
            <h6 class="mb-0 mb-2">Pada Program Studi</h6>
            <h5 class="mb-0 mb-3" id="prodi_pilihan"></h5>
            <h6 class="mb-0 mb-2">Status</h6>
            <h5 class="mb-0 mb-3" id="status_pilihan"></h5>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
<script>
var id_mahasiswa = 31570;
var status_mahasiswa = "Aktif";
var bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
var dt = new Date();
var jam_sekarang = ((dt.getHours().toString().length==1)?"0"+dt.getHours():dt.getHours()) +":"+dt.getMinutes();
var tanggal_sekarang = ((dt.getDate().toString().length==1)?"0"+dt.getDate():dt.getDate())+" "+bulan[dt.getMonth()]+" "+dt.getFullYear();
$('#tanggal_sekarang').html(tanggal_sekarang)
$('#status_mahasiswa').html(status_mahasiswa)
$('#btn_absen').css('display','none')

getDashboard()

function func_verifikasi() {
  window.location.href = "{{url('/mahasiswabaru/verifikasidata')}}"
}

function getDashboard() {
  $.ajax({
    url: url_api+"/pendaftar/dashboard",
    type: 'get',
    dataType: 'json',
    data: {},
    headers: {
      'token': localStorage.getItem('pmb')
    },
    success: function(res) {
      if (res.status=="success") {
        $.each(res.data.poliwangi,function (key,row) {
          var html = `          
              <h6 class="mb-0 mb-2">Pilihan Jurusan Ke-${key+1}</h6>
              <h5 class="mb-0 mb-3" id="prodi">${row}</h5>`
          $('#list_poliwangi').append(html);
        })

        if (res.data.poltek_lain != null) {
          var html = `  
              <h6 class="mb-0 mt-3">Pilihan Jurusan Poltek Lain</h6>
              <h5 class="mb-0 mt-2" id="prodi"><span style="font-weight:700;">${res.data.poltek_lain.politeknik}</span></h5>
              <h5 class="mb-0 mt-2" id="prodi">${res.data.poltek_lain.prodi}</h5>`
          $('#list_poltek').append(html);
        }
        if (res.data.info.status!=null) {
          var info = res.data.info;
          if (info.status=="T") {
            $('#info_penerimaan').attr('hidden',false);
            $('.text-status').attr('hidden',true);
            $('#poltek_pilihan').text('-')
            $('#prodi_pilihan').text('-')
            $('#status_pilihan').text('Tidak Lolos')
            $('#status_pilihan').addClass('text-danger')
            $('#btn_verifikasi').attr('disabled',true)
          }else if (info.status=="Y") {
            $('#card_prodi_pilihan').attr('hidden',true) 
            $('#card_prodi_detail').attr('hidden',false)

            if (info.ukt_kelompok==null) {
              if (info.program_studi_luar!=null) {
                $('#text_detail').attr('hidden',true);
                $('#text_poltek_luar').attr('hidden',false);
                $('#detail_penerimaan').attr('hidden',true)
              }
              if (info.program_studi!=null) {
                $('#text_detail').attr('hidden',false)
                $('#detail_penerimaan').attr('hidden',true)
              }
            }else{
              $('#prodi_detail').html(info.prodi)
              $('#spi_detail').html(formatAngka(info.spi))
              $('#ukt_detail').html(formatAngka(info.ukt))
              $('#text_detail').attr('hidden',true)
              $('#detail_penerimaan').attr('hidden',false)
            }
             
            $('#info_penerimaan').attr('hidden',false);
            $('#text_penerimaan').attr('hidden',true);
            $('#poltek_pilihan').text(info.politeknik)
            $('#prodi_pilihan').text(info.prodi)
            $('#status_pilihan').text('Lolos')
            $('#status_pilihan').addClass('text-success')

          }
        }
      }
    }
  });
}
</script>
@endsection