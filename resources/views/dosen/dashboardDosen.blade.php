@extends('layouts.mainAkademik')

@section('content')
<style>
  .no-jadwal{
    text-align:center;
    font-style:italic;
    color:red;
    font-weight:400;
  }
  .btn-no-jadwal{
    border-color:#E9ECEF!important;
    background-color:#E9ECEF!important;
    color:#8898AA!important;
  }
</style>
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row equal-cols">
    <div class="col-md-8">
      <div class="card shadow padding--medium">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Jadwal Mengajar Hari Ini</h3>
            </div>
            <div class="col text-right">
              <h3 class="mb-0">12 Juli 2021</h3>
            </div>
          </div>
          <hr class="my-4">
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <p class="no-jadwal">Jadwal Belum Tersedia</p>
            <table id="tabel_jadwal" hidden class="table align-items-center table-borderless table-flush table-hover">
              <thead class="table-header">
                <tr>
                  <th scope="col" style="width: 55%;">Mata Kuliah</th>
                  <th scope="col" class="text-center">Kelas</th>
                  <th scope="col" class="text-center">Jam Kuliah</th>
                </tr>
              </thead>

              <tbody class="table-body table-body-lg">
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow padding--medium card_presensi mt-0 mt-md-4">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Mata Kuliah Saat Ini</h3>
            </div>
          </div>
          <hr class="my-4">
        </div>
        <div id="card_presensi" class="card-body p-0" hidden>
          <input type="hidden" id="kuliah_saat_ini">
          <h6 class="mb-0">Mata Kuliah Saat Ini</h6>
          <h5 class="mb-0 mt-2" id="matkul_saat_ini"></h5>
          <h6 class="mb-0 mt-4">Jumlah Mahasiswa :</h6>
          <h5 class="mb-0 mt-2" id="mahasiswa_saat_ini">45</h5>
          <h6 class="mb-0 mt-4">Status Presensi</h6>
          <h5 class="mb-0 mt-2 text-danger">Belum Di Cek</h5>
        </div>
          <button type="button" id="btn_presensi" disabled class="btn btn-primary w-100 mt-4 rounded-sm btn-no-jadwal">Presensi Tidak Tersedia</button>
      </div>
    </div>
    </div>
  </div>
</section>
<script>
var id_dosen = 1;
var status_mahasiswa = "Aktif";
var bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
var dt = new Date();
var jam_sekarang = ((dt.getHours().toString().length==1)?"0"+dt.getHours():dt.getHours()) +":"+dt.getMinutes();
var tanggal_sekarang = ((dt.getDate().toString().length==1)?"0"+dt.getDate():dt.getDate())+" "+bulan[dt.getMonth()]+" "+dt.getFullYear();
$('#tanggal_sekarang').html(tanggal_sekarang)
$('#status_mahasiswa').html(status_mahasiswa)
$('#btn_absen').css('display','none')

getJadwal()



function getJadwal() {
  $.ajax({
    url: url_api+"/absensi/dosen/"+id_dosen,
    type: 'get',
    dataType: 'json',
    data: {},
    beforeSend: function(text) {
            // loading func
            console.log("loading")
            // loading('show')
    },
    success: function(res) {
      if (res.status=="success") {
          $('.table-body').html('');
          if (res.data!=[]) {
            $.each(res.data,function (key,row) {
              var html = `<tr>
                    <td class="font-weight-bold wordwrap">${row.matakuliah}</td>
                    <td class="text-center">${row.kelas}</td>
                    <td class="text-center">${row.jam}</td>
                  </tr>`;
              $('.table-body').append(html)
              var jam_kelas = new Date();
              var arr_jam_kelas = row.jam.split(':');
              jam_kelas.setHours(arr_jam_kelas[0], arr_jam_kelas[1], 00, 000);
              jam_kelas.setMinutes(jam_kelas.getMinutes() + 120);
              var jam_awal = row.jam;
              var txt_jam = (jam_kelas.getHours().toString().length==1)?"0"+jam_kelas.getHours():jam_kelas.getHours();
              var txt_menit = (jam_kelas.getMinutes().toString().length==1)?"0"+jam_kelas.getMinutes():jam_kelas.getMinutes();
              var jam_akhir = txt_jam+":"+txt_menit;
              if (jam_sekarang>=jam_awal && jam_sekarang<=jam_akhir) {
                var status = true;
              }else{
                var status = false;
              }
              console.log(`jam awal : ${jam_awal}`)
              console.log(`jam akhir : ${jam_akhir}`)
              console.log(`jam now : ${jam_sekarang}`)
              console.log(`masih kuliah : ${status}`)
              console.log("==============================")

              if (status==true) {
                console.log(status)
                $('#kuliah_saat_ini').val(row.kuliah);
                $('#matkul_saat_ini').html(row.matakuliah);
                $('#mahasiswa_saat_ini').html(row.jml_mhs);
                $('#status_saat_ini').html(row.status_text);
                $('#btn_presensi').attr('disabled',false);
                if (row.status==null) {
                  $('#status_saat_ini').removeClass('text-success');
                  $('#status_saat_ini').addClass('text-danger');
                  $('#btn_presensi').css('display','block')
                }else{
                  $('#status_saat_ini').removeClass('text-danger');
                  $('#status_saat_ini').addClass('text-success');
                  $('#btn_presensi').css('display','none')
                }
                $('#card_presensi').attr('hidden',false)
                $('#btn_presensi').html('Cek Presensi');
                $('#btn_presensi').removeClass('btn-no-jadwal');
              }else{
                $('#card_presensi').attr('hidden',true)
                $('#btn_presensi').attr('disabled',true)
                $('#btn_presensi').html('Presensi Tidak Tersedia');
                $('#btn_presensi').addClass('btn-no-jadwal');
              }
            })
            $('#tabel_jadwal').attr('hidden',false);
            $('.no-jadwal').attr('hidden',true);
          }else{
            $('#tabel_jadwal').attr('hidden',true);
            $('.no-jadwal').attr('hidden',false);
          }
          $('#btn_presensi').on('click',function (e) {
            $.ajax({
              url: url_api+"/absensi/",
              type: 'post',
              dataType: 'json',
              data: {'kuliah':$('#kuliah_saat_ini').val(),'mahasiswa':id_dosen,},
              beforeSend: function(text) {
                  // loading func
                  console.log("loading")
                  // loading('show')
              },
              success: function(res) {
                console.log(res)
                  if (res.status=="success") {
                    location.reload()                 
                  } else {
                      // alert gagal
                  }
                  // loading('hide')

              }
            });
          })
      } else {
          // alert gagal
      }
      // loading('hide')
    }
  });
}
</script>
@endsection