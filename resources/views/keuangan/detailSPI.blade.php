@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--big">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col-12">
              <h2 class="mb-0 text-center text-md-left">Detail Sumbangan Pengembangan Institusi Jalur Mandiri</h2>
            </div>
          </div>
          <hr class="my-4">
        </div>

        <div class="card-body p-0">
          <form class="form-inline form_detailSPI">
            <div class="form-group col-md-6 p-0">
              <label for="nim" class="mr-3">NIM</label>
              <input type="text" class="form-control flex-grow-1 mr-md-3" id="nim" value="{{$id}}" disabled>
            </div>
            <div class="form-group col-md-6 p-0 mt-3 mt-md-0">
              <label for="nama" class="mr-3">Nama</label>
              <input type="text" class="form-control flex-grow-1" id="nama" value="{{$nama}}" disabled>
            </div>
          </form>

          <div class="row mt-4-5">
            <div class="col-12">
              <h2 class="card_title">Rincian Pembayaran</h2>
            </div>
          </div>
          <hr class="my-4">

          <div class="table-responsive table_detailSPI">
            <table class="table align-items-center table-flush table-borderless table-hover" id="datatable">
              <thead class="table-header">
                <tr>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Nominal</th>
                  <th scope="col">Keterangan</th>
                </tr>
              </thead>

              <tbody class="table-body">
              <tr>
                  <td>13 Juli 2021</td>
                  <td class="col_cicilan text-right">2.000.000</td>
                  <td class="text-capitalize">Cicilan Bulan Juli 2021</td>
                </tr>
                <tr>
                  <td>13 Agustus 2021</td>
                  <td class="col_cicilan text-right">500.000</td>
                  <td class="text-capitalize">Cicilan Bulan Agustus 2021</td>
                </tr>
                <tr>
                  <td>13 September 2021</td>
                  <td class="col_cicilan text-right">500.000</td>
                  <td class="text-capitalize">Cicilan Bulan September 2021</td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
$(document).ready(function() {

var id = "{{$id}}";
console.log(id);
dt_url = `${url_api}/keuangan/spi/`+id;
console.log(dt_url);
dt_opt = {
"columnDefs": [
    {
      "aTargets": [0],
      "mData": null,
      "className": 'text-center pr-0',
      "mRender": function(data, type, full) {
        var date = new Date(data['tanggal_pembayaran']).toLocaleDateString();
        res = date;
        return res;
      }
    },{
      "aTargets": [1],
      "mData": null,
      "className": 'text-right',
      "mRender": function(data, type, full) {
        res = formatAngka(data['pembayaran']);
        return res;
      }
    },{
      "aTargets": [2],
      "mData": null,
      "className": 'text-capitalize',
      "mRender": function(data, type, full) {
        res = data['keterangan'];
        return res;
      }
    },
  ], 
  paging: false,
  ordering: false,
  searching: false,
  info: false
}
} 
);
</script>
</section>
@endsection