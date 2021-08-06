@extends('layouts.mainAkademik')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content page-content__akademik container-fluid" id="akademik_datajurusan">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">

        <div class="card-header p-0 m-0 border-0 rounded-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Data Jurusan</h2>
            </div>
            <div class="col text-right">
              <button type="button" onclick="add_btn()" class="btn--blue add-btn"><img src="/images/add-icon--white.png" alt="">
                Tambah</button>
            </div>
          </div>

          <hr class="mt">
        </div>

        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col">NO</th>
                <th scope="col">JURUSAN</th>
                <th scope="col">AKSI</th>
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
  var nomor = 1;
  dt_url = `${url_api}/jurusan`;
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
          res = data['jurusan'];
          return res;
        }
      },{
        "aTargets": [2],
        "mData": null,
        "mRender": function(data, type, full) {
          var id = data['nomor'];
          var text_hapus = data['jurusan'];
          var btn_update = `<span class="iconify edit-icon" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" data-inline="true"></span>` 
          var btn_delete = `<span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true" onclick='delete_btn(${id},"jurusan","jurusan","${text_hapus}")'></span>`; 
          res = btn_update+" "+btn_delete;
          return res;
        }
      },
    ]}
} );
</script>
@endsection