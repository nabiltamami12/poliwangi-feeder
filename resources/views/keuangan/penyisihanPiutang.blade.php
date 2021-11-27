@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>
<style type="text/css">
  .page-content .table-responsive .table-body td {
    line-height: 0;
}
</style>
<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-4">
              <h2 class="mb-0 text-center text-md-left">Rekapitulasi Penyisihan Piutang</h2>
            </div>
            <div class="col-12 col-md-8 text-center text-md-right mt-3 mt-md-0">
              @if (false)
              <button type="button" class="btn btn-info_transparent text-primary mr-0 mr-md-2">
                <i class="iconify-inline mr-2" data-icon="bx:bx-download"></i>
                Import
              </button>
              @endif

              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="iconify" data-icon="bx:bx-printer"></i>
                  <span class="mr-1">Cetak Rekap Piutang</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Cetak</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4">

        <div class="filter_data">
          <form>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="program_studi">Program Studi</label>
                  <select class="form-control" id="program_studi">
                    <option selected>Teknik Informatika</option>
                    <option>Teknik Sipil</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3 mt-3 mt-md-0">
                <div class="form-group">
                  <label for="jenjang">Jenjang</label>
                  <select class="form-control" id="jenjang">
                    <option selected>D3</option>
                    <option>D4</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3 mt-3 mt-md-0">
                <div class="form-group">
                  <label for="jenis_piutang">Jenis Piutang</label>
                  <select class="form-control" id="jenis_piutang">
                    <option selected>Piutang Pendidikan</option>
                    <option>Piutang Lainnya</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3 mt-3 mt-md-0">
                <div class="form-group">
                  <label for="semester">Semester</label>
                  <select class="form-control" id="semester">
                    <option>Ganjil</option>
                    <option selected>Genap</option>
                  </select>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless" id="datatable">
            <thead class="table-header">
              <tr>
                <th scope="col" style="width: 25%">Nama</th>
                <th scope="col" class="text-center pl-1">kualitas piutang</th>
                <th scope="col" class="text-center pl-1">Penyisihan piutang</th>
                <th scope="col" class="text-center">Jumlah netto</th>
                <th scope="col" class="text-center">aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="font-weight-bold text-capitalize">Sindy Eka Putri Septiani</td>
                <td>
                  <table>
                    <tr>
                      <td class="bordered pl-1">Lancar</td>
                      <td class="text-right font-weight-bold bordered_sm">Rp. 2.000.000</td>
                    </tr>
                    <tr>
                      <td class="bordered pl-1">Kurang Lancar</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr>
                      <td class="bordered pl-1">Diragukan</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr>
                      <td class="bordered pl-1">Macet</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr class="bordered">
                      <td class="pl-1">Jumlah</td>
                      <td class="text-right font-weight-bold">Rp. 2.000.000</td>
                    </tr>
                  </table>
                </td>
                <td>
                  <table>
                    <tr>
                      <td class="bordered pl-1">0.5%</td>
                      <td class="text-right font-weight-bold bordered_sm">Rp. 10.000</td>
                      
                      
                    </tr>
                    <tr>
                      <td class="bordered pl-1">10%</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr>
                      <td class="bordered pl-1">50%</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr>
                      <td class="bordered pl-1">100%</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr class="bordered">
                      <td class="pl-1">Jumlah</td>
                      <td class="text-right font-weight-bold">Rp. 10.000</td>
                    </tr>
                  </table>
                </td>
                <td class="text-center font-weight-bold">Rp. 1.990.000</td>
                <td class="text-center">
                  <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  <i class="iconify delete-icon" data-icon="bx:bx-trash"></i>
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold text-capitalize">Sindy Eka Putri Septiani</td>
                <td>
                  <table>
                    <tr>
                      <td class="bordered pl-1">Lancar</td>
                      <td class="text-right font-weight-bold bordered_sm">Rp. 2.000.000</td>
                    </tr>
                    <tr>
                      <td class="bordered pl-1">Kurang Lancar</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr>
                      <td class="bordered pl-1">Diragukan</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr>
                      <td class="bordered pl-1">Macet</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr class="bordered">
                      <td class="pl-1">Jumlah</td>
                      <td class="text-right font-weight-bold">Rp. 2.000.000</td>
                    </tr>
                  </table>
                </td>
                <td>
                  <table>
                    <tr>
                      <td class="bordered pl-1">0.5%</td>
                      <td class="text-right font-weight-bold bordered_sm">Rp. 10.000</td>
                    </tr>
                    <tr>
                      <td class="bordered pl-1">10%</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr>
                      <td class="bordered pl-1">50%</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr>
                      <td class="bordered pl-1">100%</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr class="bordered">
                      <td class="pl-1">Jumlah</td>
                      <td class="text-right font-weight-bold">Rp. 10.000</td>
                    </tr>
                  </table>
                </td>
                <td class="text-center font-weight-bold">Rp. 1.990.000</td>
                <td class="text-center">
                  <i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  <i class="iconify delete-icon" data-icon="bx:bx-trash"></i>
                </td>
              </tr>
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
dt_url = `${url_api}/keuangan/rekapitulasi/penyisihanpiutang`;
dt_opt = {
"columnDefs": [
    {
      "aTargets": [0],
      "mData": null,
      "className": 'text-center pr-0',
      "mRender": function(data, type, full) {
        return data['nama'];
      }
    },{
      "aTargets": [1],
      "mData": null,
      "bSortable": false,
      "bSearchable": false,
      "className": '',
      "mRender": function(data, type, full) {
        return `<table>
                    <tr>
                      <td class="bordered pl-1">Lancar</td>
                      <td class="text-right font-weight-bold bordered_sm">Rp. 2.000.000</td>
                    </tr>
                    <tr>
                      <td class="bordered pl-1">Kurang Lancar</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr>
                      <td class="bordered pl-1">Diragukan</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr>
                      <td class="bordered pl-1">Macet</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr class="bordered">
                      <td class="pl-1">Jumlah</td>
                      <td class="text-right font-weight-bold">Rp. 2.000.000</td>
                    </tr>
                  </table>`;
      }
    },{
      "aTargets": [2],
      "mData": null,
      "bSortable": false,
      "bSearchable": false,
      "className": '',
      "mRender": function(data, type, full) {
        return `<table>
                    <tr>
                      <td class="bordered pl-1">0.5%</td>
                      <td class="text-right font-weight-bold bordered_sm">Rp. 10.000</td>
                      
                      
                    </tr>
                    <tr>
                      <td class="bordered pl-1">10%</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr>
                      <td class="bordered pl-1">50%</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr>
                      <td class="bordered pl-1">100%</td>
                      <td class="text-right font-weight-bold bordered_sm">-</td>
                    </tr>
                    <tr class="bordered">
                      <td class="pl-1">Jumlah</td>
                      <td class="text-right font-weight-bold">Rp. 10.000</td>
                    </tr>
                  </table>`;
      }
    },{
      "aTargets": [3],
      "mData": null,
      "className": 'text-center font-weight-bold',
      "mRender": function(data, type, full) {
        return formatAngka(data['total']);
      }
    },{
      "aTargets": [4],
      "mData": null,
      "bSortable": false,
      "bSearchable": false,
      "className": 'text-center',
      "mRender": function(data, type, full) {
        return `<i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
                  <i class="iconify delete-icon" data-icon="bx:bx-trash"></i>`;
      }
    }
  ]}

}
 
);
</script>
@endsection