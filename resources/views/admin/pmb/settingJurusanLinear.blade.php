@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid" id="admin_settingJalursyarat">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Jurusan Linear </h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <button type="button" onclick="add_btn()" class="btn btn-primary "> <i class="iconify-inline mr-1" data-icon="bx:bxs-plus-circle"></i>
                Tambah</button>
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
                <th scope="col" sclass="text-center">Jenjang</th>
                <th scope="col" sclass="text-center">Jurusan</th>
                <th scope="col" sclass="text-center">Jumlah Program Studi</th>
                <th scope="col" sclass="text-center">Jurusan Linear</th>
                <th scope="col" class="text-center" style="width: 40px;">Aksi</th>
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
    dt_url = `${url_api}/jurusan-asal`;
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
          res = data['jenjang'];
          return res;
        }
      }, {
        "aTargets": [2],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['jurusan'];
          return res;
        }
      }, {
        "aTargets": [3],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['jml_prodi'];
          return res;
        }
      }, {
        "targets": [4],
        "data": null,
        "render": function(data, type, full) {
          var id = data['id']
          var res = `<a href="{{ url('admin/pmb/settingjurusanlinear/${id}') }}" class="btn btn-success btn-sm"><i class="iconify-inline mr-1" style="font-size:12px;" data-icon="akar-icons:search"></i>Program Studi</a>`
          return res;
        }
      }, {
        "aTargets": [5],
        "mData": null,
        "mRender": function(data, type, full) {
          var id = data['id'];
          var text_hapus = data['jenjang']+" - "+data['jurusan'];
          var btn_update = `<i class="iconify edit-icon" onclick='linear_btn(${id})' data-icon="bx:bx-edit-alt" ></i>`
          var btn_update = `<i class="iconify edit-icon" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" ></i>`
          var btn_delete = `<i class="iconify delete-icon" data-icon="bx:bx-trash"  onclick='delete_btn(${id},"jurusan-asal","jurusan-asal","${text_hapus}")'></i>`;
          res = btn_update + " " + btn_delete;
          return res;
        }
      }, ]
    }
  });
</script>
@endsection