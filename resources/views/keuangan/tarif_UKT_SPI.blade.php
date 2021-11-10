@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Tarif Keuangan</h2>
            </div>
            <div class="col text-right">
              <button type="button" onclick="setting_pendaftaran()" class="btn btn-primary ">Biaya Pendaftaran</button>
              <button type="button" onclick="setting_biaya()" class="btn btn-primary ">Biaya Admin</button>
            </div>
          </div>
        </div>
        <hr class="mt-4">
        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless table-hover" id="datatable" style="width:100%">
            <thead class="table-header">
              <tr>
                <th rowspan="2" scope="col" class="text-center px-2">No</th>
                <th rowspan="2" scope="col" class="text-center px-2">Prodi</th>
                <th rowspan="2" scope="col" class="text-center px-2">SPI</th>
                <th colspan="8" scope="col" class="text-center px-2">Kelompok Tarif UKT</th>
                <th rowspan="2" scope="col" class="text-center px-2">Aksi</th>
              </tr>
              <tr>
                <th colspan="1" scope="col" class="text-center px-2">1</th>
                <th colspan="1" scope="col" class="text-center px-2">2</th>
                <th colspan="1" scope="col" class="text-center px-2">3</th>
                <th colspan="1" scope="col" class="text-center px-2">4</th>
                <th colspan="1" scope="col" class="text-center px-2">5</th>
                <th colspan="1" scope="col" class="text-center px-2">6</th>
                <th colspan="1" scope="col" class="text-center px-2">7</th>
                <th colspan="1" scope="col" class="text-center px-2">8</th>
              </tr>
            </thead>
            <tbody class="table-body">
            </tbody>
          </table>
        </div> 
      </div>
    </div>
  </div>
  <div class="modal fade" id="biayaModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <input type="hidden" id="id_delete">
        <input type="hidden" id="endpoint">

        <div class="modal-header">
          <h5 class="modal-title text-center">Setting Biaya Admin</h5>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control number-format" id="biaya_admin" placeholder="Biaya Admin" name="biaya_admin">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-modal-cancel" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn--blue btn-success" onclick="simpan_func()">Simpan</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="biayaPendaftaranModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <input type="hidden" id="id_delete">
        <input type="hidden" id="endpoint">

        <div class="modal-header">
          <h5 class="modal-title text-center">Setting Biaya Pendaftaran Mahasiswa Baru</h5>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control number-format" id="biaya_pendaftaran" placeholder="Biaya Pendaftaran" name="biaya_pendaftaran">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-modal-cancel" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn--blue btn-success" onclick="simpan_pendaftaran()">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  
$(document).ready(function() {  
  var nomor = 1;
  dt_url = `${url_api}/keuangan/rekap_ukt`;
  dt_opt = {
  "columnDefs": [
      {
        "aTargets": [0],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = nomor++;
          return res;
        }
      },{
        "aTargets": [1],
        "mData": null,
        "className": 'font-weight-bold text-capitalize px-2',
        "mRender": function(data, type, full) {
          res = data['prodi'];
          return res;
        }
      },{
        "aTargets": [2],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = formatAngkaSimple(data['spi']);
          return res;
        }
      },{
        "aTargets": [3],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = formatAngkaSimple(data['kelompok_1']);
          return res;
        }
      },{
        "aTargets": [4],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = formatAngkaSimple(data['kelompok_2']);
          return res;
        }
      },{
        "aTargets": [5],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = formatAngkaSimple(data['kelompok_3']);
          return res;
        }
      },{
        "aTargets": [6],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = formatAngkaSimple(data['kelompok_4']);
          return res;
        }
      },{
        "aTargets": [7],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = formatAngkaSimple(data['kelompok_5']);
          return res;
        }
      },{
        "aTargets": [8],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = formatAngkaSimple(data['kelompok_6']);
          return res;
        }
      },{
        "aTargets": [9],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = formatAngkaSimple(data['kelompok_7']);
          return res;
        }
      },{
        "aTargets": [10],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = formatAngkaSimple(data['kelompok_8']);
          return res;
        }
      },{
        "aTargets": [11],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {          
          var id = data['id'];
          var btn_update = `<i class="iconify edit-icon text-primary" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" ></i>` 
          return res = btn_update;
        }
      }
    ]}
  } 
);

function setting_biaya() {
  $('#biayaModal').modal('show')
  $.ajax({
      url: url_api+"/setting_biaya",
      type: 'get',
      dataType: 'json',
      data: {},
      success: function(res) {
          if (res.status=="success") {
            $('#biaya_admin').val(res.data);
            $('.number-format').number( true);
          } else {
              // alert gagal
          }
          

      }
  });
}
function simpan_func() {
  $('.number-format').number( true, 0, '', '');
    $.ajax({
        url: url_api+"/setting_biaya",
        type: 'post',
        dataType: 'json',
        data: {'nilai':$('#biaya_admin').val()},
        success: function(res) {
            if (res.status=="success") {
                $('#biayaModal').modal('hide')              
            } else {
                // alert gagal
            }
            

        }
    });
}

function setting_pendaftaran() {
  $('#biayaPendaftaranModal').modal('show')
  $.ajax({
    url: url_api+"/setting_biaya?pendaftaran=1",
    type: 'get',
    dataType: 'json',
    data: {},
    success: function(res) {
      if (res.status=="success") {
        $('#biaya_pendaftaran').val(res.data);
        $('.number-format').number( true);
      } else {
      }
    }
  });
}
function simpan_pendaftaran() {
  $('.number-format').number( true, 0, '', '');
  $.ajax({
    url: url_api+"/setting_biaya?pendaftaran=1",
    type: 'post',
    dataType: 'json',
    data: {'nilai':$('#biaya_pendaftaran').val()},
    success: function(res) {
      if (res.status=="success") {
        $('#biayaPendaftaranModal').modal('hide')              
      } else {
      }
    }
  });
}
</script>
@endsection