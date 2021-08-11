@extends('layouts.mainAkademik')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__akademik container-fluid" id="akademik_datamahasiswa">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0 m-0 border-0 rounded-0">

          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Data Mahasiswa</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <button type="button" onclick="add_btn()" class="btn--blue add-btn">
                <span class="iconify mr-2" data-icon="bx:bxs-plus-circle" data-inline="true"></span>
                Tambah
              </button>
            </div>
          </div>

          <hr class="mt">

          <form class="form-select rounded-0">
            <div class="form-row">
              <div class="col-md-12 form-group">
                <label for="jenjang-pendidikan">Jenjang Pendidikan</label>
                <select class="form-control" id="program_studi" name="program_studi">

                </select>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="kelas">Kelas</label>
                <select class="form-control" id="kelas" name="kelas">

                </select>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="status-mahasiswa">Status Mahasiswa</label>
                <select class="form-control" id="status" name="status">
                  
                </select>
              </div>
            </div>
          </form>
          <hr class="mt"></hr>
        </div>

        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="border-0 text-center p-2">No</th>
                <th scope="col" class="border-0">NIM</th>
                <th scope="col" class="border-0">Nama</th>
                <th scope="col" class="border-0 text-center">Tanggal Lahir</th>
                <th scope="col" class="border-0 text-center">No. Telp</th>
                <th scope="col" class="border-0 text-center">Email</th>
                <th scope="col" class="border-0 text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
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
    console.log(dataGlobal['kelas'])
    var kelas = $.grep(dataGlobal['kelas'], function(e){ return e.program_studi == program_studi; });
    console.log(program_studi)
    console.log(kelas)
    $('#kelas').html('')
    var optKelas = `<option value=""> - </option>`;
    $.each(kelas,function (key,row) {
      optKelas += `<option value="${row.nomor}">${row.kode}</option>`
    })
    $('#kelas').append(optKelas); 
  })
  $('select').on('change',function (e) {
    var url = `${url_api}/mahasiswa?program_studi=${$('#program_studi').val()}&status=${$('#status').val()}&kelas=${$('#kelas').val()}`;
    dt.ajax.url(url).load();
  })
} );
async function getData() {
  
    var optProgram,optJurusan,optKelas,optStatus;
    $.each(dataGlobal['prodi'],function (key,row) {
        optProgram += `<option value="${row.nomor}">${row.nama_program} ${row.program_studi}</option>`
    })
    $('#program_studi').append(optProgram)

    var kelas = $.grep(dataGlobal['kelas'], function(e){ return e.program_studi == $('#program_studi').val(); });
    $('#kelas').html('')
    var optKelas = `<option value=""> - </option>`;
    $.each(kelas,function (key,row) {
      optKelas += `<option value="${row.nomor}">${row.kode}</option>`
    })
    $('#kelas').append(optKelas); 

    $.each(dataGlobal['status'],function (key,row) {
        optStatus += `<option value="${row.kode}">${row.status}</option>`
    })
    $('#status').append(optStatus)
    setDatatable();
}
function setDatatable() {
  var nomor = 1;
  dt_url = `${url_api}/mahasiswa?program=${$('#program').val()}&jurusan=${$('#jurusan').val()}&status=${$('#status').val()}&kelas=${$('#kelas').val()}`;
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
            res = data['nrp'];
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
            res = data['tgllahir'];
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [4],
          "mData": null,
          "mRender": function(data, type, full) {
            res = data['notelp'];
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [5],
          "mData": null,
          "mRender": function(data, type, full) {
            res = data['email'];
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [6],
          "mData": null,
          "mRender": function(data, type, full) {
            var id = data['nomor'];
            var text_hapus = data['nama'];
            var btn_update = `<span class="iconify edit-icon" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" data-inline="true"></span>` 
            var btn_delete = `<span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true" onclick='delete_btn(${id},"mahasiswa","mahasiswa","${text_hapus}")'></span>`; 
            res = btn_update+" "+btn_delete;
            return res;
          }
        },
      ]}
}
</script>
@endsection