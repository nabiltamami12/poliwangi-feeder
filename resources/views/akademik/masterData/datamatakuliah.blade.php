@extends('layouts.mainAkademik')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="akademik_datamatakuliah">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Data Matakuliah</h2>
            </div>
            <div class="col text-right">
              <button type="button" onclick="add_btn()" class="btn btn-primary">
                <i class="iconify mr-1" data-icon="bx:bxs-plus-circle"></i>
                Tambah
              </button>
            </div>
          </div>
        </div>
        <hr class="mt my-4">
        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">

            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center p-2">No</th>
                <th scope="col">Kode</th>
                <th scope="col">Matakuliah</th>
                <th scope="col" class="text-center">Jenis</th>
                <th scope="col" class="text-center">Semester</th>
                <th scope="col" class="text-center">Aksi</th>
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
          res = (data['semester']==1)?"ganjil":"genap";
          return res;
        }
      },{
        "aTargets": [5],
        "mData": null,
        "mRender": function(data, type, full) {
          var id = data['nomor'];
          var text_hapus = data['kode'];
          var btn_update = `<i class="iconify edit-icon" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" ></span>` 
          var btn_delete = `<i class="iconify delete-icon" data-icon="bx:bx-trash"  onclick='delete_btn(${id},"matakuliah","matakuliah","${text_hapus}")'></span>`; 
          res = btn_update+" "+btn_delete;
          return res;
        }
      },
    ],
}
} );
</script>
@endsection