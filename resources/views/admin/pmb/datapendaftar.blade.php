@extends('layouts.mainKeuangan')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Data Pendaftar</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <!-- <button type="button" class="btn btn-primary">
                <i class="iconify-inline mr-2" data-icon="bx:bx-download"></i>
                Import
              </button>
              <button type="button" class="btn btn-warning ml-md-2">
                <i class="iconify-inline" data-icon="bx:bx-upload"></i>
                Eksport
              </button> -->
              <div class="form-row">
                <div class="col-md-4 form-group">
                    <label for="jenjang-pendidikan">Program Studi</label>
                    <select class="form-control" id="program_studi" name="program_studi">
                        
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label for="kelas">Jalur Penerimaan</label>
                    <select class="form-control" id="kelas" name="kelas">
                        
                    </select>
                </div>
            </div>
            </div>
          </div>
        </div>
        <hr class="mt-4">

        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">No. VA</th>
                <th scope="col" style="width: 25%">Nama</th>
                <th scope="col" class="text-right" style="width: 25%">Nominal</th>
                <th scope="col" style="width: 25%">Status Bayar</th>
              </tr>
            </thead>

            <tbody class="table-body">
              
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
    var kelas = $.grep(dataGlobal['kelas'], function(e){ return e.program_studi == program_studi; });
    
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

    $.each(dataGlobal['status'],function (key,row) {
        optStatus += `<option value="${row.kode}">${row.status}</option>`
    })
    $('#status').append(optStatus)
    setDatatable();
}
function setDatatable() {
  var nomor = 1;
  dt_url = `${url_api}/admin/pendaftar?program_studi=${$('#program_studi').val()}&jalur=${$('#jalur_penerimaan').val()}}`;
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
            var btn_update = `<span class="iconify edit-icon" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" ></span>` 
            var btn_delete = `<span class="iconify delete-icon" data-icon="bx:bx-trash"  onclick='delete_btn(${id},"mahasiswa","mahasiswa","${text_hapus}")'></span>`; 
            res = btn_update+" "+btn_delete;
            return res;
          }
        },
      ]}
}
</script>
@endsection