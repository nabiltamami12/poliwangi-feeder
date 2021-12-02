@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>
<style type="text/css">
  .table td, .table th {
    padding: 5px 15px;
  }
</style>
<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Data Pendaftar Mahasiswa Baru</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <!-- <button type="button" class="btn btn-primary">
                <i class="iconify-inline mr-2" data-icon="bx:bx-download"></i>
                Import
              </button>
              <button type="button" class="btn btn-warning ml-md-2">
                <i class="iconify-inline" data-icon="bx:bx-upload"></i>
                Eksport
              </button> -->
            </div>
          </div>
        </div>
        <hr class="mt-4">

        <div class="table-responsive">
          <table class="table align-items-center table-flush table-hover" id="datatable-pending">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">No. VA</th>
                <th scope="col">Nama</th>
                <th scope="col" class="text-right">Nominal</th>
                <th scope="col">Status Bayar</th>
              </tr>
            </thead>
          </table>
        </div>

      </div>
    </div>
  </div>
</section>

<script>
function importFile() {
  $("#file").click()
}

function clickButton() {
  $("#submit").click();
}
$(document).ready(function() {
  dt_pageLength = 100;
  dt_type = 'post'
  dt_url = `${url_api}/pendaftar/keuangan`;
  dt_opt = {
    serverSide: true,
    order: [[0, 'desc']],
    columnDefs: [
    {
      "aTargets": [3],
      "className": 'font-weight-bold text-right',
      "mRender": function (data, type, row) {
        return formatAngka(data);
      }
    },{
      "aTargets": [4],
      "className": 'text-success text-uppercase font-weight-bold',
      "mRender": function(data, type, full) {
        if (data == 1) {
          return '<span style="color:green">Lunas</span>'
        }else{
          return '<span style="color:red">Belum Lunas</span>'
        }
      }
    }
    ]
  };
  load_datatable();
});
</script>
@endsection