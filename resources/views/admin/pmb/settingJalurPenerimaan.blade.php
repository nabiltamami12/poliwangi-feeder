@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid" id="admin_settingJalurpenerimaan">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Jalur Seleksi</h2>
            </div>
          </div>
        </div>

        <hr class="mt-4">
        <div class="row align-items-center px-3 my-4">
        </div>

        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center px-2">No</th>
                <th scope="col" style="width: 35%">Nama</th>
                <th scope="col" class="text-center">Tanggal</th>
                <th scope="col" class="text-center">Kuota</th>
                <th scope="col" class="text-center">Aksi</th>
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
    var nomor = 1;
    dt_url = `${url_api}/jalurpmb`;
    dt_opt = {
      "columnDefs": [{
        "aTargets": [0],
        "mData": null,
        "mRender": function(data, type, full) {
          res = nomor++;
          return res;
        }
      }, {
        "aTargets": [1],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['jalur_daftar'];
          return res;
        }
      }, {
        "aTargets": [2],
        "mData": null,
        "mRender": function(data, type, full) {
          if (data['tanggal_buka'] == null || data['tanggal_tutup'] == null) {
            res = " - ";
          }else{
            res = formatTanggal(data['tanggal_buka'])+" - "+formatTanggal(data['tanggal_tutup']);
          }
          return res;
        }
      }, {
        "aTargets": [3],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['kuota'];
          return res;
        }
      }, {
        "aTargets": [4],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['kuota'];
          return res;
        }
      }, 
      {
        "aTargets": [5],
        "mData": null,
        "mRender": function(data, type, full) {
          var id = data['id'];
          var btn_update = `<i class="iconify edit-icon text-primary" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" ></i>`
          return btn_update;
        }
      }, ]
    }
  });
</script>
@endsection