@extends('layouts.mainAkademik')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content page-content__akademik container-fluid" id="akademik_datadosen">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">

        <div class="card-header p-0 m-0 border-0 rounded-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Data Dosen Pengampu</h2>
            </div>
          </div>

          <hr class="mt">

          
        </div>

        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col">NO</th>
                <th scope="col">Dosen</th>
                <th scope="col">Jumlah Matakuliah</th>
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
  dt_url = `${url_api}/dosenpengampu`;
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
          res = data['nama'];
          return res;
        }
      },{
        "aTargets": [2],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['jumlah_matkul'];
          return res;
        }
      },{
        "aTargets": [3],
        "mData": null,
        "mRender": function(data, type, full) {
          var id = data['nomor'];
          var text_hapus = data['jurusan'];
          var btn_update = `<span class="iconify edit-icon" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" data-inline="true"></span>` 
          res = btn_update;
          return res;
        }
      },
    ]}
} );
</script>
@endsection