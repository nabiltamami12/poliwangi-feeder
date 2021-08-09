@extends('layouts.mainAkademik')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__akademik container-fluid" id="akademik_datamatakuliah">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0 m-0 border-0 rounded-0">

          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Data Matakuliah</h2>
            </div>
            <div class="col text-right">
              <button type="button" onclick="add_btn()" class="btn--blue add-btn">
                <span class="iconify mr-2" data-icon="bx:bxs-plus-circle" data-inline="true"></span>
                Tambah
              </button>
            </div>
          </div>

          <hr class="mt">
        </div>

        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">

            <thead class="table-header">
              <tr>
                <th scope="col" class="border-0 text-center p-2">No</th>
                <th scope="col" class="border-0">Kode</th>
                <th scope="col" class="border-0">Matakuliah</th>
                <th scope="col" class="border-0 text-center">Jenis</th>
                <th scope="col" class="border-0 text-center">Semester</th>
                <th scope="col" class="border-0 text-center">Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
$(document).ready(function() {
  var nomor = 1;
  dt_url = `${url_api}/matakuliah`;
dt_opt = {
  "columnDefs": [

      {
        "aTargets": [0],
        "mData": null,
        "mRender": function(data, type, full) {
          res = nomor++;
          return res;
        }
      },{
        "aTargets": [1],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['kode'];
          return res;
        }
      },{
        "aTargets": [2],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['matakuliah'];
          return res;
        }
      },{
        "aTargets": [3],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['nama_mk_jenis'];
          return res;
        }
      },{
        "aTargets": [4],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['semester'];
          return res;
        }
      },{
        "aTargets": [5],
        "mData": null,
        "mRender": function(data, type, full) {
          var id = data['nomor'];
          var text_hapus = data['kode'];
          var btn_update = `<span class="iconify edit-icon" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" data-inline="true"></span>` 
          var btn_delete = `<span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true" onclick='delete_btn(${id},"matakuliah","matakuliah","${text_hapus}")'></span>`; 
          res = btn_update+" "+btn_delete;
          return res;
        }
      },
    ],
}
} );
</script>
@endsection