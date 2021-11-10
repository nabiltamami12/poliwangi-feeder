@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header padding--big">
        <div class=" row align-items-center">
            <div class="col">
              <h2 class="mb-0">Rekapitulasi Presensi</h2>
            </div>
          </div>
          <!-- <div class="row align-items-center">

            <div class="col-md-9 form-group">
              <div class="d-flex align-items-center date_picker w-100 ">
                <input id="txtDate" type="text" class="form-control form-control-sm date-input  pl-2" placeholder="Pilih Tanggal" readonly />
                <label class="input-group-btn" for="txtDate">
                  <span class="date_button">
                    <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                  </span>
                </label>
              </div>
            </div>

            <div class="col-md-3 form-group">
              <button type="button" id="btn_reset" class="btn btn-danger ml-0 ml-md-3">
                Reset
              </button>
            </div>
          </div> -->
        </div>
        <hr>
        <div class="table-responsive padding--big">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" >Nomor</th>
                <th scope="col" style="width: 30%">Mata Kuliah</th>
                <th scope="col" class="text-center">Kelas</th>
                <th scope="col" class="text-center">JUMLAH KEHADIRAN</th>
                <th scope="col" class="text-center">TIDAK HADIR</th>
                <th scope="col" class="text-center">Persentase</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
          
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  // var id_mahasiswa = 31575;
  var tahun = dataGlobal['periode']['tahun'];
  var semester = dataGlobal['periode']['semester'];
  var nomor = 1;
  $(document).ready(function(){
    $("#txtDate").datepicker({
      format: "dd MM yyyy",
      autoclose: true
    }).on('change',function (e) {
      getByFilter();
    })

    $('#btn_reset').on('click',function () {
      resetFilter();
    })

    dt_url = `${url_api}/absensi/rekap-matkul?mahasiswa=${id_mahasiswa}&tahun=${tahun}&semester=${semester}`;
    console.log(dt_url)
    dt_opt = {
      "columnDefs": [
          {
            "aTargets": [0],
            "mData": null,
            "mRender": function(data, type, full) {
              res = nomor++;
              return res;
            }
          },{
            "aTargets": [1],
            "mData": null,
            "mRender": function(data, type, full) {
              res = data['kode'];
              return res;
            }
          },{
            "aTargets": [2],
            "mData": null,
            "mRender": function(data, type, full) {
              res = data['matakuliah'];
              return res;
            }
          },{
            "aTargets": [3],
            "mData": null,
            "className": "text-right",
            "mRender": function(data, type, full) {
              res = data['hadir'];
              return res;
            }
          },{
            "aTargets": [4],
            "mData": null,
            "className": "text-right",
            "mRender": function(data, type, full) {
              res = data['tidak_hadir'];
              return res;
            }
          },{
            "aTargets": [5],
            "mData": null,
            "className": "text-right",
            "mRender": function(data, type, full) {
              res = (data['hadir']/16)*100;
              return round(res)+"%";
            }
          }
        ]}
  })
  function resetFilter() {
    var url = `${url_api}/absensi/rekap-matkul?mahasiswa=${id_mahasiswa}&tahun=${tahun}&semester=${semester}`;
    dt.ajax.url(url).load();
  }
  function getByFilter() {
    var date = new Date($('#txtDate').val()),
    tahun = date.getFullYear(),
    bulan = date.getMonth() < 10 ? '0' + (date.getMonth()+1) : (date.getMonth()+1),
    tanggal = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),
    dateFormat = tahun + '-' + bulan + '-' + tanggal;

    var url = `${url_api}/absensi/rekap-matkul?mahasiswa=${id_mahasiswa}&tahun=${tahun}&semester=${semester}&tanggal=${dateFormat}`;
    dt.ajax.url(url).load();
  }
</script>
@endsection

@section('js')

@endsection