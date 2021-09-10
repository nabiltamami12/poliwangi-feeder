@extends('layouts.mainAkademik')

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
              <h2 class="mb-0 text-center text-md-left">Tarif SPI & UKT</h2>
            </div>
            <div class="col text-right">
              <button type="button" onclick="add_btn()" class="btn btn-primary "><img src="/images/add-icon--white.png" alt="">Tambah</button>
            </div>
          </div>
        </div>
        <hr class="mt-4">

       

        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless table-hover" id="datatable">
            <thead class="table-header">
              <tr>
                <th rowspan="2" scope="col" class="text-center px-2">No</th>
                <th rowspan="2" scope="col" class="text-center px-2">Prodi</th>
                <th rowspan="2" scope="col" class="text-center px-2">Sumbangan<br>pembangunan<br>institusi</th>
                <th colspan="8" scope="col" class="text-center px-2">Tarif UKT</th>
              </tr>
              <tr>
                <th colspan="1" scope="col" class="text-center px-2">Kelompok<br>1</th>
                <th colspan="1" scope="col" class="text-center px-2">Kelompok<br>2</th>
                <th colspan="1" scope="col" class="text-center px-2">Kelompok<br>3</th>
                <th colspan="1" scope="col" class="text-center px-2">Kelompok<br>4</th>
                <th colspan="1" scope="col" class="text-center px-2">Kelompok<br>5</th>
                <th colspan="1" scope="col" class="text-center px-2">Kelompok<br>6</th>
                <th colspan="1" scope="col" class="text-center px-2">Kelompok<br>7</th>
                <th colspan="1" scope="col" class="text-center px-2">Kelompok<br>8</th>
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
const toCurrency = (number) => 
      Intl.NumberFormat("id-ID", { style : 'currency', currency:'IDR', minimumFractionDigits: 0 }).format(number);
  
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
          res = toCurrency(data['spi']);
          return res;
        }
      },{
        "aTargets": [3],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = toCurrency(data['kelompok_1']);
          return res;
        }
      },{
        "aTargets": [4],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = toCurrency(data['kelompok_2']);
          return res;
        }
      },{
        "aTargets": [5],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = toCurrency(data['kelompok_3']);
          return res;
        }
      },{
        "aTargets": [6],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = toCurrency(data['kelompok_4']);
          return res;
        }
      },{
        "aTargets": [7],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = toCurrency(data['kelompok_5']);
          return res;
        }
      },{
        "aTargets": [8],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = toCurrency(data['kelompok_6']);
          return res;
        }
      },{
        "aTargets": [9],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = toCurrency(data['kelompok_7']);
          return res;
        }
      },{
        "aTargets": [10],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = toCurrency(data['kelompok_8']);
          return res;
        }
      }
    ]}
  } 
);



</script>
@endsection