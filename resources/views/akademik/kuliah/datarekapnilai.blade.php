@extends('layouts.mainAkademik')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="akademik_datamahasiswa">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Rekap Nilai</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
            </div>
          </div>
        </div>
        <hr class="my-4 mt">
        <form class="form-select rounded-0">
          <div class="form-row">
            <div class="col-md-12 form-group">
              <label for="jenjang-pendidikan">Mahasiswa</label>
              <input type="text" class="form-control" id="nim" >
              <!-- <select class="form-control" id="mahasiswa" name="mahasiswa">
                
              </select> -->
            </div>
            <div class="col-md-6 form-group">
              <label for="kelas">Tahun</label>
              <select class="form-control" id="kelas" name="kelas">
                <option value="2020">2020</option>
              </select>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="status-mahasiswa">Semester</label>
              <select class="form-control" id="status" name="status">
                <option> Semester Gasal </option>
                <option> Semester Genap </option>
              </select>
            </div>
          </div>
        </form>
        <hr class="mt">
        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center px-2">No</th>
                <th scope="col">Kode Matakuliah</th>
                <th scope="col">Matakuliah</th>
                <th scope="col" class="text-center">Nilai Angka</th>
                <th scope="col" class="text-center">SKS</th>
                <th scope="col" class="text-center">Nilai Huruf</th>
                <th scope="col" class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  var tahun = dataGlobal['periode']['tahun']
  var semester = dataGlobal['periode']['semester']
  $(document).ready(function() {
    $('#nim ').on('change',function (e) {
      var url = `${url_api}/nilai/rekap?nim=${$('#nim').val()}&tahun=${tahun}&semester=${semester}`;
      dt.ajax.url(url).load();
    })  
    $('select').on('change',function (e) {
      var url = `${url_api}/nilai/rekap?nim=${$('#nim').val()}&tahun=${tahun}&semester=${semester}`;
      dt.ajax.url(url).load();
    })  
    set_datatable($(this).val())
  });

function set_datatable(nim) {
  var nomor = 1;
  dt_url = `${url_api}/nilai/rekap?nim=${nim}&tahun=${tahun}&semester=${semester}`;
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
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [2],
          "mData": null,
          "mRender": function(data, type, full) {
            res = data['matakuliah'];
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [3],
          "mData": null,
          "mRender": function(data, type, full) {
            res = data['na'];
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [4],
          "mData": null,
          "mRender": function(data, type, full) {
            res = data['jumlah_sks'];
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [5],
          "mData": null,
          "mRender": function(data, type, full) {
            res = data['nh'];
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [6],
          "mData": null,
          "mRender": function(data, type, full) {
            var id = data['nomor'];
            var text_hapus = data['kode']+" - "+data['matakuliah'];
            // var btn_update = `<span class="iconify edit-icon text-primary" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" ></span>` 
            var btn_delete = `<span class="iconify delete-icon text-primary" data-icon="bx:bx-trash"  onclick='delete_btn(${id},"nilai","nilai matakuliah ","${text_hapus}")'></span>`; 
            res = (id==null)?'': btn_delete;
            return res;
          }
        },
      ]}
}
</script>
@endsection