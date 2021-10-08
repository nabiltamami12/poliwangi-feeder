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
              <h2 class="mb-0">Data Periode Kuliah</h2>
            </div>
            <div class="col text-right">
              <button type="button" onclick="add_btn()" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-plus-circle'></i> Tambah</button>
            </div>
          </div>
        </div>
        <hr class="mt">
        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col">NO</th>
                <th scope="col">Kurikulum</th>
                <th scope="col">Jumlah Matakuliah</th>
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
dt_url = `${url_api}/kurikulum`;
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
        res = data['kurikulum'];
        return res;
      }
    },{
      "targets": [2],
      "data": null,
      "render": function(data, type, full) {
        res = data['jumlah_matkul'];
        return res;
      }
    },{
      "targets": [3],
      "data": null,
      "render": function(data, type, full) {
        var aktif = "<span class='text-success' style='font-size:12px;font-weight:600;'>aktif <i class='iconify-inline mr-1' style='font-size:12px;' data-icon='akar-icons:circle-check-fill'></i></span>"
        var non_aktif = `<button class="btn btn-warning btn-sm" onclick="change_status(${data['id']})"><i class="iconify-inline mr-1" style="font-size:12px;" data-icon="akar-icons:circle-check-fill"></i>aktifkan</button>`
        res = (data['status']=="1")?aktif:non_aktif;
        return res;
      }
    },{
      "targets": [4],
      "data": null,
      "render": function(data, type, full) {
        var id = data['id'];
        var text_hapus = data['kurikulum'];
        var btn_update = `<span class="iconify edit-icon text-primary" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" data-inline="true"></span>` 
        var btn_delete = `<span class="iconify delete-icon text-primary" data-icon="bx:bx-trash" data-inline="true" onclick='delete_btn(${id},"kurikulum","kurikulum","${text_hapus}")'></span>`; 
        res = btn_update+" "+btn_delete;
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
