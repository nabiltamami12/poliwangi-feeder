@extends('layouts.main')

@section('content')

<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">

        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Daftar MK Kurikulum : {{ ucwords($kurikulum->kurikulum) }}</h2>
            </div>
            <div class="col text-right">
              <a href="{{ url('admin/master/datakurikulum') }}" class="btn btn-default">Kembali</a>
              <button type="button" onclick="add_btn()" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-plus-circle'></i> Tambah</button>
            </div>
          </div>
        </div>
        <hr class="mt">
        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode MK</th>
                <th scope="col">Nama Mata Kuliah</th>
                <th scope="col">Bobot MK</th>
                <th scope="col">Jenis MK</th>
                <th scope="col">Semester</th>
                <th scope="col">Status</th>
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
<div class="modal fade" id="konfirmModal" tabindex="-1" aria-labelledby="konfirmModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <input type="hidden" id="id_konfirm">

        <div class="modal-header">
            <p class="text-center">
                <h5 class="modal-title text-warning text-center">Peringatan</h5>
            </p>
        </div>
        <div class="modal-body">
          <p class="text-center font-weight-bold">Apakah anda yakin mau mengganti kurikulum aktif ?</p>
          <h2 class="text-center mb-4"><span id="text_hapus"></span></h2>
          <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-modal-cancel w-100" data-dismiss="modal">Batal</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary w-100" id="btn_modal_hapus" onclick="konfirm_func()">Yakin</button>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('js')
<script>
var nomor = 1;
var id = '{{ $id }}'
dt_url = `${url_api}/kurikulum/${id}/matakuliah`;
dt_opt = {
  // "serverSide": true,
  "columnDefs": [
    {
      "targets": [0],
      "data": null,
      "render": function(data, type, full) {
        res = nomor++;
        return res;
      }
    },{
      "targets": [1],
      "data": null,
      "render": function(data, type, full) {
        res = data['kode'];
        return res;
      }
    },{
      "targets": [2],
      "data": null,
      "render": function(data, type, full) {
        res = data['nama_matkul'];
        return res;
      }
    },{
      "targets": [3],
      "data": null,
      "render": function(data, type, full) {
        var res = `${data['sks']} SKS`
        return res;
      }
    },{
      "targets": [4],
      "data": null,
      "render": function(data, type, full) {
        var res = `Wajib Program Studi`
        return res;
      }
    },{
      "targets": [5],
      "data": null,
      "render": function(data, type, full) {
        var res = data['semester']
        return res;
      }
    },{
      "targets": [6],
      "data": null,
      "render": function(data, type, full) {
        var res = data['status'].toUpperCase()
        return res;
      }
    },{
      "targets": [7],
      "data": null,
      "render": function(data, type, full) {
        var res = `<span class="iconify delete-icon text-primary" data-icon="bx:bx-trash" data-inline="true" onclick='delete_btn(${data['id']},"kurikulum/matakuliah","matakuliah","${text_hapus}")'></span>`
        return res;
      }
    },
  ]
};

function change_status(id) {
    $('#konfirmModal').modal('show');
    $('#id_konfirm').val(id)
  }
  function konfirm_func() {
    var id = $("#id_konfirm").val();
    $.ajax({
      url: url_api+"/kurikulum/change_status/"+id,
      type: "put",
      dataType: 'json',
      data: {},
      success: function(res) {
        if (res.status=="success") {
              $('#konfirmModal').modal('hide');
              dt.ajax.reload();
            } else {
              // alert gagal
            }
            ;
        }
    });
}
</script>
@endsection
