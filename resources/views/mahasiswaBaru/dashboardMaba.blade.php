@extends('layouts.mainMaba')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="dashboard_maba">
  <div class="row">
    <div class="col-md-8">
      <div id="pengumuman" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner shadow">
          <div class="carousel-item active" data-interval="2000">
            <img src="{{ url('images') }}/banner_maba.png" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow padding--medium card_presensi mt-0 mt-md-4">
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
          <button type="button" onclick="func_verifikasi()" class="btn btn-success w-100 mt-4 rounded-sm btn-no-jadwal">Verifikasi Data</button>
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
      }
    }
  });
}
</script>
@endsection