@extends('layouts.main')

@section('content')
<style>
  .no-jadwal{
    text-align:center;
    font-style:italic;
    color:red;
    font-weight:400;
  }
  .no-kelas{
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

              <tbody id="tb_body_jadwal" class="table-body table-body-lg">
                
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
        <div id="card_presensi" class="card-body p-0">
          <h6 class="mb-0">Mata Kuliah Saat Ini</h6>
          <select class="form-control" id="matkul_open"></select>
          <!-- <h5 class="mb-0 mt-2" id="matkul_saat_ini"></h5> -->
          <h6 class="mb-0 mt-4">Pertemuan Ke- :</h6>
          <h5 class="mb-0 mt-2" id="pertemuan_saat_ini"></h5>
          <p class="mb-0 mt-2 text-danger text-sm" >*pastikan pertemuan sesuai</p>
          <h6 class="mb-0 mt-4">Jumlah Mahasiswa :</h6>
          <h5 class="mb-0 mt-2" id="mahasiswa_saat_ini"></h5>
          <h6 class="mb-0 mt-4">Status Presensi</h6>
          <h5 class="mb-0 mt-2" id="status_saat_ini"></h5>
        </div>
          <button type="button" id="btn_presensi" disabled class="btn btn-primary w-100 mt-4 rounded-sm btn-no-jadwal">Presensi Tidak Tersedia</button>
      </div>
    </div>
    <div class="col-md-12">
      
    <div class="card shadow padding--medium card_presensi mt-0 mt-md-4">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Kelas dibatalkan</h3>
            </div>
          </div>
          <hr class="my-4">
        </div>
        <div class="card-body p-0" >
          <div class="table-responsive">
            <p class="no-kelas">Tidak ada kelas dibatalkan</p>
            <table id="tabel_kelas" hidden class="table align-items-center table-borderless table-flush table-hover">
              <thead class="table-header">
                <tr>
                  <th scope="col" style="width: 55%;">Mata Kuliah</th>
                  <th scope="col" class="text-center">Kelas</th>
                  <th scope="col" class="text-center">Pertemuan</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>

              <tbody id="tb_body_kelas" class="table-body table-body-lg">
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
var id_dosen = dataGlobal['user']['nomor'];
var nama = dataGlobal['user']['nama'];
var semester = dataGlobal['periode']['semester'];
var tahun = dataGlobal['periode']['tahun'];

var status_mahasiswa = "Aktif";
var bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
var dt = new Date();
var jam_sekarang = ((dt.getHours().toString().length==1)?"0"+dt.getHours():dt.getHours()) +":"+dt.getMinutes();
var tanggal_sekarang = ((dt.getDate().toString().length==1)?"0"+dt.getDate():dt.getDate())+" "+bulan[dt.getMonth()]+" "+dt.getFullYear();
var data_kelas_open = [];
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
    success: function(res) {
      if (res.status=="success") {
          $('#tb_body_jadwal').html('');
          $('#tb_body_kelas').html('');
          if (res.data.kelas.length>0) {
            var check_batal = false;
            $.each(res.data.kelas,function (key,row_kelas) {
              if (row_kelas.status=="batal") {
                var html = `<tr>
                      <td class="font-weight-bold wordwrap">${row_kelas.matakuliah}</td>
                      <td class="text-center">${row_kelas.kode}</td>
                      <td class="text-center">${row_kelas.pertemuan}</td>
                      <td class="text-center"><button onclick="buka_kelas(${row_kelas.kuliah},${row_kelas.pertemuan},'reload')" class="btn btn-sm btn-success btn-buka">Buka kelas</button></td>
                    </tr>`;
                $('#tb_body_kelas').append(html)
                check_batal = true;
              }else{
                $('#tabel_kelas').attr('hidden',true);
                $('.no-kelas').attr('hidden',false);
              }
              if (row_kelas.status_kelas=="open") {
                data_kelas_open.push(row_kelas);
              }
            })
            if (check_batal) {
              console.log("batal loooo")
              $('#tabel_kelas').attr('hidden',false);
              $('.no-kelas').attr('hidden',true);
            }
          }else{
            console.log("batal loooo")

            $('#tabel_kelas').attr('hidden',true);
            $('.no-kelas').attr('hidden',false);
          }
          if (res.data.data.length>0) {
            $.each(res.data.data,function (key,row) {
              var html = `<tr>
                    <td class="font-weight-bold wordwrap">${row.matakuliah}</td>
                    <td class="text-center">${row.kelas}</td>
                    <td class="text-center">${row.jam}</td>
                  </tr>`;
              $('#tb_body_jadwal').append(html)
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

            })

            $('#tabel_jadwal').attr('hidden',false);
            $('.no-jadwal').attr('hidden',true);
            
          }else{
            $('#tabel_jadwal').attr('hidden',true);
            $('.no-jadwal').attr('hidden',false);
          }
          var opt = '';
          $.each(data_kelas_open,function (key,row_kelas_open) {
            var kelas = $.grep(res.data.data, function(e){ return e.kuliah == row_kelas_open.kuliah; });
            opt += `<option data-status="${row_kelas_open.status}" data-pertemuan="${row_kelas_open.pertemuan}" data-jml="${kelas[0].jml_mhs}" value="${row_kelas_open.kuliah}">${row_kelas_open.matakuliah}</option>`;
            
            $('#mahasiswa_saat_ini').html(kelas[0].jml_mhs)
            $('#pertemuan_saat_ini').html(row_kelas_open.pertemuan)
            $('#status_saat_ini').html(row_kelas_open.status)
            
            $('#status_saat_ini').addClass('text-success');
            $('#btn_presensi').removeClass('btn-no-jadwal');
            $('#btn_presensi').css('display','block')
            $('#btn_presensi').attr('disabled',false)
            $('#btn_presensi').text('Cek Presensi')

          })
          $('#matkul_open').append(opt);

          $('#matkul_open').on('change',function (e) {
            if ($(this).val()=="") {
              $('#mahasiswa_saat_ini').html('-')
              $('#pertemuan_saat_ini').html('-')
              $('#status_saat_ini').html('-')
              $('#btn_presensi').addClass('btn-no-jadwal');
              $('#btn_presensi').css('display','block')
              $('#btn_presensi').attr('disabled',true)
              $('#btn_presensi').text('Presensi Tidak Tersedia') 
            }else{
              var jml_kelas = $('#matkul_open :selected').data('jml');
              var pertemuan = $('#matkul_open :selected').data('pertemuan');
              var status = $('#matkul_open :selected').data('status');
              
              status = "Belum Presensi";
              $('#mahasiswa_saat_ini').html(jml_kelas)
              $('#pertemuan_saat_ini').html(pertemuan)
              $('#status_saat_ini').html(status)
              
              $('#status_saat_ini').removeClass('text-success');
              $('#status_saat_ini').addClass('text-danger');
              $('#btn_presensi').removeClass('btn-no-jadwal');
              $('#btn_presensi').css('display','block')
              $('#btn_presensi').attr('disabled',false)
              $('#btn_presensi').text('Cek Presensi')
              
            }
          })
          $('#btn_presensi').on('click',function (e) {
            var kuliah = $('#matkul_open').val();
            var pertemuan = $('#matkul_open :selected').data('pertemuan');

            window.location = "{{ url('/akademik/kuliah/absensi/kelas-dosen/') }}"+"/"+kuliah+"/"+pertemuan;
          })
      } else {
          // alert gagal
      }
      
    }
  });
}
function buka_kelas(kuliah,pertemuan,status) {
  var data_kls = {
    'tahun':tahun,
    'dosen':id_dosen,
    'kuliah':kuliah,
    'pertemuan':pertemuan,
    'status':'mengajar',
    'status_kelas':'open',
  }
  $.ajax({
    url: url_api+"/kelas-mengajar",
    type: 'post',
    dataType: 'json',
    data: data_kls,
    success: function(res) {
      console.log(res)
        if (res.status=="success") {
          location.reload()                 
        } else {
            // alert gagal
        }
        

    }
  });
}
</script>
@endsection