@extends('layouts.mainAkademik')

@section('content')

<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">

        <div class="card-header p-0 m-0 border-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Data Jam Kuliah</h2>
            </div>
            <div class="col text-right">
              <button type="button" onclick="add_btn()" class="btn btn-primary "><img src="/images/add-icon--white.png" alt=""> Tambah</button>
            </div>
          </div>
        </div>

        <hr class="mt my-4">

        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col">NO</th>
                <th scope="col">Program</th>
                <th scope="col">Hari</th>
                <th scope="col">Kode</th>
                <th scope="col">Jam</th>
                <th scope="col">Sore</th>
                <th scope="col">AKSI</th>
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
  var nomor = 1;
  dt_url = `${url_api}/jamkuliah`;
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
          res = data['nama_program'];
          return res;
        }
      },{
        "aTargets": [2],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['nama_hari'];
          return res;
        }
      },{
        "aTargets": [3],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['kode'];
          return res;
        }
      },{
        "aTargets": [4],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['jam'];
          return res;
        }
      },{
        "aTargets": [5],
        "mData": null,
        "mRender": function(data, type, full) {
            
          res = (data['sore']=="0")?"Tidak":"Iya";
          return res;
        }
      },{
        "aTargets": [6],
        "mData": null,
        "mRender": function(data, type, full) {
          var id = data['nomor'];
          var text_hapus = "";
          var btn_update = `<i class="iconify edit-icon" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" ></i>` 
          var btn_delete = `<i class="iconify delete-icon" data-icon="bx:bx-trash"  onclick='delete_btn(${id},"jamkuliah","jam kuliah","${text_hapus}")'></i>`; 
          res = btn_update+" "+btn_delete;
          return res;
        }
      },
    ],
}
} );
</script>
@endsection