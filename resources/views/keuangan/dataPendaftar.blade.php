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
              <h2 class="mb-0 text-center text-md-left">Data Pendaftar Mahasiswa Baru</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <button type="button" class="btn btn-primary">
                <i class="iconify-inline mr-2" data-icon="bx:bx-download"></i>
                Import
              </button>
              <button type="button" class="btn btn-warning ml-md-2">
                <i class="iconify-inline" data-icon="bx:bx-upload"></i>
                Eksport
              </button>
            </div>
          </div>
        </div>
        <hr class="mt-4">

        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless table-hover" id="datatable">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">No. VA</th>
                <th scope="col" style="width: 25%">Nama</th>
                <th scope="col" class="text-right" style="width: 25%">Nominal</th>
                <th scope="col" style="width: 25%">Status Bayar</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center">1</td>
                <td class="text-center">1281928746273601</td>
                <td class="font-weight-bold text-capitalize">Afkarina ferin verigia</td>
                <td class="text-right">Rp. 100.000</td>
                <td class="text-success text-uppercase font-weight-bold">lunas</td>
              </tr>

              <tr>
                <td class="text-center">2</td>
                <td class="text-center">1281928746273928</td>
                <td class="font-weight-bold text-capitalize">Budi</td>
                <td class="text-right">Rp. 100.000</td>
                <td class="text-success text-uppercase font-weight-bold">lunas</td>
              </tr>
            </tbody>
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

var nomor = 1;
dt_url = `${url_api}/pendaftar/keuangan`;
dt_opt = {
"columnDefs": [
    {
      "aTargets": [0],
      "mData": null,
      "className": 'text-center pr-0',
      "mRender": function(data, type, full) {
        return nomor++;
      }
    },{
      "aTargets": [1],
      "mData": null,
      "className": 'text-center',
      "mRender": function(data, type, full) {
        return data['trx_id'];
      }
    },{
      "aTargets": [2],
      "mData": null,
      "className": 'font-weight-bold text-capitalize',
      "mRender": function(data, type, full) {
        return data['nama'];
      }
    },{
      "aTargets": [3],
      "mData": null,
      "className": 'font-weight-bold text-right',
      "mRender": function(data, type, full) {
        return formatAngka(data['trx_amount']);
      }
    },{
      "aTargets": [4],
      "mData": null,
      "className": 'text-success text-uppercase font-weight-bold',
      "mRender": function(data, type, full) {
        if (data['is_lunas'] == 1) {
          return '<span style="color:green">Lunas</span>'
        }else{
          return '<span style="color:red">Belum Lunas</span>'
        }
      }
    }
  ]}


}
 
);
</script>
@endsection