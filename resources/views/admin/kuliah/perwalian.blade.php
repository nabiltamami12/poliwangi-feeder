@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
@php
    use App\Models\Periode;
    $semester = Periode::where('status', 1)->first();
@endphp
<section class="page-content container-fluid" id="admin_perwalian">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0 m-0 border-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Daftar Perwalian Periode {{ $semester->tahun }}/{{$semester->tahun + 1}} Semester {{ $semester->semester == 1 ? "Gasal" : "Genap  " }}</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <a href="{{ url('admin/kuliah/perwalian/cetak') }}" target="_blank" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-printer'></i> Cetak Perwalian</a>
            </div>
          </div>
        </div>
        <hr class="mt">
        <div class="table-responsive">
            <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
                <thead class="table-header">
                  <tr>
                    <th scope="col" class="text-center px-2">No</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama Dosen</th>
                    <th scope="col">Jumlah Mahasiswa</th>
                    <th scope="col">Sudah Perwalian</th>
                    <th scope="col">Belum ACC</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('js')
<script>
  // $(function(){
    var nomor = 1;
    dt_url = `${url_api}/admin/perwalian`;
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
            res = data['nip'];
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
            var el = `<button type="button" class="btn btn-primary btn-sm"><i class="iconify-inline mr-1" style="font-size:12px;" data-icon="akar-icons:lifesaver"></i>${data['jml_mahasiswa']} Mahasiswa</a>`
            res = el;
            return res;
          }
        },{
          "aTargets": [4],
          "mData": null,
          "mRender": function(data, type, full) {
            var el = `<button type="button"  class="btn btn-success btn-sm"><i class="iconify-inline mr-1" style="font-size:12px;" data-icon="akar-icons:circle-check-fill"></i>${data['sudah_acc']} Mahasiswa</a>`
            res = el;
            return res;
          }
        },{
          "aTargets": [5],
          "mData": null,
          "mRender": function(data, type, full) {
            var el = `<button type="button" class="btn btn-warning btn-sm"><i class="iconify-inline mr-1" style="font-size:12px;" data-icon="akar-icons:triangle-alert-fill"></i>${data['belum_acc']} Mahasiswa</>`
            res = el;
            return res;
          }
        },
      ],
  }
  // })
</script>
@endsection