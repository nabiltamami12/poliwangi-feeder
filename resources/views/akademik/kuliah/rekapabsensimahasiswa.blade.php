@extends('layouts.mainAkademik')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="akademik_datamahasiswa">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Data Mahasiswa</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <button type="button" onclick="cetak()" class="btn btn-warning">
                <span class="iconify mr-2" data-icon="bx:bx-printer"></span>
                Cetak 
              </button>
            </div>
          </div>
        </div>
        <hr class="my-4 mt">
        <form class="form-select rounded-0">
          <div class="form-row">
            <div class="col-md-4 form-group">
              <label for="jenjang-pendidikan">Jenjang Pendidikan</label>
              <select class="form-control" id="program_studi" name="program_studi">
                
              </select>
            </div>
            <div class="col-md-4 form-group">
              <label for="kelas">Kelas</label>
              <select class="form-control" id="kelas" name="kelas">
                
              </select>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <label for="matakuliah">Matakuliah</label>
              <select class="form-control" id="matakuliah" name="matakuliah">
                
              </select>
            </div>
          </div>
        </form>
        <hr class="mt">
        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center px-2">No</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col" class="text-center">Kehadiran</th>
                <th scope="col" class="text-center">Tidak Hadir</th>
                <th scope="col" class="text-center">Ketentuan Kehadiran</th>
                <th scope="col" class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function() {
  getData();

  $('#searchdata').on('keyup', function() {
    dt.search(this.value).draw();
  });
  $('#program_studi').on('change',function (e) {
    var program_studi = $(this).val()
    var kelas = $.grep(dataGlobal['kelas'], function(e){ return e.program_studi == program_studi; });
    $('#kelas').html('')
    var optKelas = `<option value=""> - </option>`;
    $.each(kelas,function (key,row) {
      optKelas += `<option value="${row.nomor}">${row.kode}</option>`
    })
    $('#kelas').append(optKelas); 
  })
  $('#kelas').on('change',function (e) {
    var kelas = $(this).val()
    var matakuliah = $.grep(dataGlobal['matakuliah'], function(e){ return e.tahun == dataGlobal['periode']['tahun']; });
    matakuliah = $.grep(matakuliah, function(e){ return e.semester == dataGlobal['periode']['semester']; });
    matakuliah = $.grep(matakuliah, function(e){ return e.kelas == kelas; });

    $('#matakuliah').html('')
    var optMatakuliah = `<option value=""> - </option>`;
    $.each(matakuliah,function (key,row) {
      optMatakuliah += `<option value="${row.nomor}">${row.matakuliah}</option>`
    })
    $('#matakuliah').append(optMatakuliah); 
  })
  $('#matakuliah').on('change',function (e) {
    var url = `${url_api}/absensi/rekap-kelas?kelas=${$('#kelas').val()}&tahun=${dataGlobal['periode']['tahun']}&semester=${dataGlobal['periode']['semester']}&matakuliah=${$('#matakuliah').val()}`;
    dt.ajax.url(url).load();
  })
} );
async function getData() {
    var optProgram,optJurusan,optKelas,optMatakuliah;
    var optProgram = `<option value=""> - </option>`;

    $.each(dataGlobal['prodi'],function (key,row) {
        optProgram += `<option value="${row.nomor}">${row.nama_program} ${row.program_studi}</option>`
    })
    $('#program_studi').append(optProgram)

    
    setDatatable();
}
function setDatatable() {
  var nomor = 1;
  dt_url = `${url_api}/absensi/rekap-kelas?kelas=${$('#kelas').val()}&tahun=${dataGlobal['periode']['tahun']}&semester=${dataGlobal['periode']['semester']}&matakuliah=${$('#matakuliah').val()}`;
dt_opt = {
  "columnDefs": [
        {
          "aTargets": [0],
          "mData": null,
          "mRender": function(data, type, full) {
            res = nomor++;
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [1],
          "mData": null,
          "mRender": function(data, type, full) {
            res = data['nim'];
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [2],
          "mData": null,
          "mRender": function(data, type, full) {
            res = data['nama'];
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [3],
          "mData": null,
          "mRender": function(data, type, full) {
            res = data['hadir'];
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [4],
          "mData": null,
          "mRender": function(data, type, full) {
            res = data['tidak_hadir'];
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [5],
          "mData": null,
          "mRender": function(data, type, full) {
            res = 16;
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [6],
          "mData": null,
          "mRender": function(data, type, full) {
            var btn_detail = `<span class="iconify" onclick='detail_btn(${data['mahasiswa']})' data-icon="bx:bx-group" ></span>` 
            res = btn_detail;
            return res;
          }
        },
      ]}
}
function detail_btn(id) {
    window.location.href = window.location.href+"/detail/"+id+"/"+$('#kelas').val()+"/"+$('#matakuliah').val();
}
function cetak() {
    console.log($('#kelas').val())
    console.log($('#matakuliah').val())
    if (($('#kelas').val()==null || $('#kelas').val()=="") || ($('#matakuliah').val()==null || $('#matakuliah').val()=="") ) {
        alert('Pilih kelas terlebih dahulu!')
    } else {
      var id_kelas = $('#kelas').val()
      var matakuliah = $('#matakuliah').val()
      
      var arr = {
        'tahun' : dataGlobal['periode']['tahun'],
        'semester' : dataGlobal['periode']['semester'],
        'prodi' : $('#program_studi :selected').text(),
        'kelas' : $('#kelas :selected').text(),
        'id_kelas' : id_kelas,
        'matakuliah' : $('#matakuliah :selected').text(),
        'id_matakuliah' : matakuliah,
        'dosen' : '',
      }
      console.log(arr)
      localStorage.setItem('cetak-absen', JSON.stringify(arr));
      
        window.open("{{url('akademik/kuliah/cetak-absensi-kelas/')}}",'_blank');
    }
}
</script>
@endsection