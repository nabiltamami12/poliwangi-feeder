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
    <div class="col-md-8">
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
          <button type="button" id="btn_poltek_lain" class="btn w-100 mt-4 rounded-sm btn-info_transparent text-primary">*Segera lakukan verifikasi data pada Politeknik bersangkutan</button>
          <button type="button" id="btn_verifikasi" onclick="func_verifikasi()" hidden class="btn btn-success w-100 mt-4 rounded-sm btn-no-jadwal">Verifikasi Data</button>
          <button type="button" id="btn_berkas" onclick="func_berkas()" hidden class="btn btn-success w-100 mt-4 rounded-sm btn-no-jadwal">Upload Berkas</button>
          <p id="text_poltek_luar" hidden class="">Silahkan lanjutkan untuk mendaftar ulang pada politeknik yang diterima</p>
      </div>
    </div>
    <div class="col-md-4">
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
          <div id="info_penerimaan">
            <h6 class="mb-0 mb-2">Diterima Di</h6>
            <h5 class="mb-0 mb-3" id="poltek_pilihan">-</h5>
            <h6 class="mb-0 mb-2">Pada Program Studi</h6>
            <h5 class="mb-0 mb-3" id="prodi_pilihan">-</h5>
            <h6 class="mb-0 mb-2">Biaya SPI</h6>
            <h5 class="mb-0 mb-3" id="spi_pilihan">-</h5>
            <h6 class="mb-0 mb-2">Biaya UKT</h6>
            <h5 class="mb-0 mb-3" id="ukt_pilihan">-</h5>
            <h6 class="mb-0 mb-2">Status</h6>
            <h5 class="mb-0 mb-3" id="status_pilihan"><span>Belum ada pengumuman</span></h5>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
<script>
// var id_mahasiswa = 31575;
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
function func_verifikasi() {
  window.location.href = "{{url('/mahasiswabaru/daftarulang')}}"
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
          $('#btn_poltek_lain').attr('hidden',true);
          $('#btn_verifikasi').attr('hidden',true);
          $('#btn_berkas').attr('hidden',false);
          var info = res.data.info;
          if (info.status=="T") {
            $('#info_penerimaan').attr('hidden',false);
            $('.text-status').attr('hidden',true);
            $('#poltek_pilihan').text('-')
            $('#prodi_pilihan').text('-')
            $('#status_pilihan').text('Tidak Lolos')
            $('#status_pilihan').addClass('text-danger')

            $('#btn_poltek_lain').attr('hidden',true);
            $('#btn_verifikasi').attr('hidden',true);
            $('#btn_berkas').attr('hidden',true);
  
          }else if (info.status=="Y") {

            if (info.ukt_kelompok!=null) {
              $('#prodi_pilihan').html(info.prodi)
              $('#spi_pilihan').html(formatAngka(info.spi))
              $('#ukt_pilihan').html(formatAngka(info.ukt)) 
            }
            if (info.program_studi_luar!=null) {
              $('#btn_verifikasi').attr('hidden',true);
              $('#btn_berkas').attr('hidden',true);
              $('#btn_poltek_lain').attr('hidden',false);
            }
             
            $('#poltek_pilihan').text(info.politeknik)
            $('#prodi_pilihan').text(info.prodi)
            $('#status_pilihan').text('Lolos')
            $('#status_pilihan').addClass('text-success')
          }
        }else{
          $('#btn_verifikasi').attr('hidden',false);
          $('#btn_berkas').attr('hidden',true);
          $('#btn_poltek_lain').attr('hidden',true);
        }
      }
    }
  });
}
</script>
@endsection