@extends('layouts.mainAkademik')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content  container-fluid" id="akademik_dataprodi">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">
        <div class="card-header p-0 m-0 border-0 ">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Data Program Studi</h2>
            </div>
            <div class="col text-right">
              <button type="button" onclick="add_btn()" class="btn btn-primary "><img src="/images/add-icon--white.png"alt=""> Tambah</button>
            </div>
          </div>  
        </div>
        <hr class="mt my-4">
        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col">NO</th>
                <th scope="col">PROGRAM STUDI</th>
                <th scope="col">ALIAS</th>
                <th scope="col">KEPALA PRODI</th>
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
  dt_url = `${url_api}/prodi`;
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
          res = data['nama_program']+" "+data['program_studi'];
          return res;
        }
      },{
        "aTargets": [2],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['alias'];
          return res;
        }
      },{
        "aTargets": [3],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['kaprodi'];
          return res;
        }
      },{
        "aTargets": [4],
        "mData": null,
        "mRender": function(data, type, full) {
          var id = data['nomor'];
          var text_hapus = data['nama_program']+" "+data['program_studi'];
          var btn_update = `<span class="iconify edit-icon" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" data-inline="true"></span>` 
          var btn_delete = `<span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true" onclick='delete_btn(${id},"prodi","program studi","${text_hapus}")'></span>`; 
          res = btn_update+" "+btn_delete;
          return res;
        }
      },
    ]}
} );
</script>
@endsection