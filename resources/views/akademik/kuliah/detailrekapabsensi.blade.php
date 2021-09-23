@extends('layouts.mainAkademik')

@section('content')
<style>
.badge{
  cursor:pointer;
}
</style>
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <form class="form-select form_presensiDosen">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="program-studi">NIM</label>
              <input type="text" class="form-control" id="nim" readonly>
            </div>
            <div class="col-md-6 form-group">
              <label for="program-studi">Nama</label>
              <input type="text" class="form-control" id="nama" readonly>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <label for="jenjang">Program Studi</label>
              <input type="text" class="form-control" id="program_studi" readonly>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <label for="jenjang">Kelas</label>
              <input type="text" class="form-control" id="kelas" readonly>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <label for="jenjang">Matakuliah</label>
              <input type="text" class="form-control" id="matakuliah" readonly>
            </div>
          </div>
        </form>
        <hr class="my-4">
        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              
            </thead>

            <tbody class="table-body">
<!--               

              <tr>
                <td class="text-center">02/07/2021</td>
                <td>345245345</td>
                <td class="font-weight-bold text-capitalize">Jessica Wijaya</td>
                <td class="text-center">MT001</td>
                <td class="text-center">12:00</td>
                <td class="text-center">12:15</td>
                <td class="text-center status_absensi">
                  <span class="badge badge-success">
                    <i class="iconify-inline mr-1" data-icon="akar-icons:circle-check-fill"></i>
                    <span class="text-capitalize">Hadir</span>
                  </span>
                </td>
              </tr>

              <tr>
                <td class="text-center">02/07/2021</td>
                <td>345245345</td>
                <td class="font-weight-bold text-capitalize">Jessica Wijaya</td>
                <td class="text-center">MT001</td>
                <td class="text-center">12:00</td>
                <td class="text-center">12:15</td>
                <td class="text-center status_absensi">
                  <span class="badge badge-success">
                    <i class="iconify-inline mr-1" data-icon="akar-icons:circle-check-fill"></i>
                    <span class="text-capitalize">Hadir</span>
                  </span>
                </td>
              </tr>

              <tr>
                <td class="text-center">02/07/2021</td>
                <td>345245345</td>
                <td class="font-weight-bold text-capitalize">Jessica Wijaya</td>
                <td class="text-center">MT001</td>
                <td class="text-center">12:00</td>
                <td class="text-center">12:15</td>
                <td class="text-center status_absensi">
                  
                </td>
              </tr>

              <tr>
                <td class="text-center">02/07/2021</td>
                <td>345245345</td>
                <td class="font-weight-bold text-capitalize">Jessica Wijaya</td>
                <td class="text-center">MT001</td>
                <td class="text-center">12:00</td>
                <td class="text-center">12:15</td>
                <td class="text-center status_absensi">
                  <span class="badge badge-success">
                    <i class="iconify-inline mr-1" data-icon="akar-icons:circle-check-fill"></i>
                    <span class="text-capitalize">Hadir</span>
                  </span>
                </td>
              </tr>

              <tr>
                <td class="text-center">02/07/2021</td>
                <td>345245345</td>
                <td class="font-weight-bold text-capitalize">Jessica Wijaya</td>
                <td class="text-center">MT001</td>
                <td class="text-center">12:00</td>
                <td class="text-center">12:15</td>
                <td class="text-center status_absensi">
                  <span class="badge badge-success">
                    <i class="iconify-inline mr-1" data-icon="akar-icons:circle-check-fill"></i>
                    <span class="text-capitalize">Hadir</span>
                  </span>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>

        <div class="row mt-4">
          <div class="col text-right">
            <button type="submit" id="btn_simpan" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
var url = $(location).attr('href')
parts = url.split("/")
var matkul = "{{$matkul}}";
var kelas = "{{$kelas}}";
var mahasiswa = "{{$id}}";
var dataFilter
var countData
var arr_mhs = []

var id = dataGlobal['user']['nomor'];
var nama = dataGlobal['user']['nama'];
var semester = dataGlobal['periode']['semester'];
var tahun = dataGlobal['periode']['tahun'];

$(document).ready(function() {
  getFilter();

  $('#btn_simpan').on('click',function (e) {
    console.log(arr_mhs)
    $.ajax({
      url: url_api+"/absensi/admin",
      type: 'put',
      dataType: 'json',
      data: {data:arr_mhs},
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
} );

function setSiswa(data) {
  var html = '';
  $('.table-header').html('')
  $('.table-body').html('')
  $('.table-header').append(`<tr>
                <th scope="col" class="text-center">tanggal</th>
                <th scope="col">Pertemuan ke-</th>
                <th scope="col" class="text-center">Jam absensi</th>
                <th scope="col" class="text-center">batas absensi</th>
                <th scope="col" class="text-center">Status</th>
              </tr>`)
  var i = 0;
  $.each(data,function (key,row) {
    console.log(row)
    $('#nim').val(row.nim)
    $('#nama').val(row.nama)
    $('#program_studi').val(row.prodi)
    $('#kelas').val(row.kelas)
    $('#matakuliah').val(row.matakuliah)

    arr_mhs.push({'nomor':row.absensi,'mahasiswa':row.id_mahasiswa,'kuliah':row.kuliah,'status':row.status,'dosen':id})
    console.log(arr_mhs)
    var status_alpa = `<span data-id="${row.absensi}" class="btn-absensi badge badge-danger">
                    <i class="iconify-inline mr-1" data-icon="bi:x-circle-fill"></i>
                    <span class="text-capitalize">Tidak Hadir</span>
                  </span>`
    var status_hadir = `<span data-id="${row.absensi}" class="btn-absensi badge badge-success">
                    <i class="iconify-inline mr-1" data-icon="akar-icons:circle-check-fill"></i>
                    <span class="text-capitalize">Hadir</span>
                  </span>`
    html = `<tr>
                <td class="text-center">02/07/2021</td>
                <td>${row.minggu}</td>
                <td class="text-center">${row.jam}</td>
                <td class="text-center">${row.batas}</td>
                <td class="text-center status_absensi">
                `+((row.status==null || row.status=="A")?status_alpa:status_hadir)+`
                </td>
              </tr>`
    $('.table-body').append(html)
    
    i++;

  })
  $('.btn-absensi').on('click',function (e) {
        var id_absensi = $(this).data('id');
        console.log(id_absensi)
      var mahasiswa = $.grep(arr_mhs, function(e){ return e.nomor == id_absensi; });
      console.log(mahasiswa)
      if ($(this).hasClass('badge-danger')) {
          console.log("hadir")
        $(this).html('');
        $(this).removeClass('badge-danger')
        $(this).addClass('badge-success')
        $(this).append(`<i class="iconify-inline mr-1" data-icon="akar-icons:circle-check-fill"></i>
                    <span class="text-capitalize">Hadir</span>`);
        mahasiswa[0]['status'] = 'H';
      }else{
          console.log("tidak hadir")
        $(this).html('');
        $(this).removeClass('badge-success')
        $(this).addClass('badge-danger')
        $(this).append(`<i class="iconify-inline mr-1" data-icon="bi:x-circle-fill"></i>
                    <span class="text-capitalize">Tidak Hadir</span>`);
        mahasiswa[0]['status'] = 'A';
      }
    })
  countData = i;
}

async function getFilter() {
  $.ajax({
    url: `${url_api}/absensi/rekap/detail?mahasiswa=${mahasiswa}&kelas=${kelas}&tahun=${tahun}&semester=${semester}&matakuliah=${matkul}`,
    type: 'get',
    dataType: 'json',
    data: {},
    beforeSend: function(text) {
            // loading func
            console.log("loading")
            loading('show')
    },
    success: function(res) {
        if (res.status=="success") {
            setSiswa(res.data)
        } else {
            // alert gagal
        }
        loading('hide')
    }
  });
}
</script>
@endsection