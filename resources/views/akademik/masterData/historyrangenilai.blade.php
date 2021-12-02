@extends('layouts.main')

@section('content')

<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">
        
        <div class="card-header p-0 m-0 border-0">
          <div class=" row align-items-center">
            <div class="col">
              <h2 class="mb-0">Data Range Nilai</h2>
            </div>
            <div class="col text-right">

              <button type="button" class="btn btn-secondary" onclick="back_btn()">
                Kembali
              </button>
              
              </div>
            </div>
            
          </div>
          <hr class="mt">
          
          <div class="table-responsive">
            <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
              <thead class="table-header">
                <tr>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Nilai huruf</th>
                  <th scope="col">Nilai Angka</th>
                  <th scope="col">Nilai angka atas</th>
                  <th scope="col">Akumulasi</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function() {
  var nomor = 1;
  dt_url = `${url_api}/rangenilai/history`;
dt_opt = {
  "columnDefs": [
    {
        "aTargets": [0],
        "mData": null,
        "mRender": function(data, type, full) {
          res = formatTanggal( data['created_at']);
          return res;
        }
      },{
        "aTargets": [1],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['nh'];
          return res;
        }
      },{
        "aTargets": [2],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['na'];
          return res;
        }
      },{
        "aTargets": [3],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['na_atas'];
          return res;
        }
      },{
        "aTargets": [4],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['akumulasi'];
          return res;
        }
      }
    ]}
} );

function back_btn() {
    window.history.go(-1);
}
</script>
@endsection