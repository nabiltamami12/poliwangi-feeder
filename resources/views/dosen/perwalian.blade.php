@extends('layouts.main')

@section('style')
  <link href="{{ asset('css/loading.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
@php
    use App\Models\Periode;
    $semester = Periode::where('status', 1)->first();
@endphp
<section class="page-content container-fluid" id="dosen_perwalian">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0 m-0 border-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Daftar Perwalian Periode {{ $semester->tahun }}/{{$semester->tahun + 1}} Semester {{ $semester->semester == 1 ? "Gasal" : "Genap  " }}</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
            </div>
          </div>
        </div>
        <hr class="mt">
        <div class="table-responsive">
            <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
                <thead class="table-header">
                  <tr>
                    <th scope="col" class="text-center px-2">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Angkatan</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Kelas</th>
                    {{-- <th scope="col">Matakuliah</th> --}}
                    <th scope="col">ACC</th>
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
          <p class="text-center font-weight-bold">Apakah anda yakin mau approve perwalian mahasiswa ini ?</p>
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
  dt_url = `${url_api}/dosen/perwalian`;
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
          res = data['nim'];
          return res;
        }
      },{
        "aTargets": [2],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['nama'];
          return res;
        }
      },{
        "aTargets": [3],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['angkatan'];
          return res;
        }
      },
      {
        "aTargets": [4],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['nama_program'];
          return res;
        }
      },{
        "aTargets": [5],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['kode'];
          return res;
        }
      },
      {
        "aTargets": [6],
        "mData": null,
        "mRender": function(data, type, full) {
          var aktif = "<span class='text-success' style='font-size:12px;font-weight:600;'>Sudah ACC <i class='iconify-inline mr-1' style='font-size:12px;' data-icon='akar-icons:circle-check-fill'></i></span>"
          var non_aktif = `<button class="btn btn-warning btn-sm" onclick="change_status(${data['id']})"><i class="iconify-inline mr-1" style="font-size:12px;" data-icon="akar-icons:circle-check-fill"></i>ACC</button>`
          res = (data['status']=="1")?aktif:non_aktif;
          return res;
        }
      },
    ],
}
function change_status(id) {
    $('#konfirmModal').modal('show');
    $('#id_konfirm').val(id)
  }
  function konfirm_func() {
    var id = $("#id_konfirm").val();
    $.ajax({
      url: url_api+"/dosen/perwalian/change_status/"+id,
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
