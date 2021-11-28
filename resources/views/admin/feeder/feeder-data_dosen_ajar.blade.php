@extends('layouts.main')

{{-- @section('style')
  <link href="{{ asset('css/loading.css') }}" rel="stylesheet">
@endsection --}}

@section('content')

<!-- Header -->
<header class="header"></header>

<div id="loading"></div>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">

        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Feeder Data Dosen Ajar</h2>
            </div>
            <div class="col text-right">
              <form action="{{ url('admin/feeder/feeder-data_dosen_ajar') }}" method="post">
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-download'></i> Download Feeder</button>
              </form>
            </div>
          </div>
        </div>
        <hr class="mt">
        <div class="table-responsive">
          <table id="table" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header" style="text-align:center">
              <tr>
        <th style="text-align:center">No</th>
            <th style="text-align:center">Nama MK</th>
            <th style="text-align:center">SKS MK</th>
            <th style="text-align:center">Kelas</th>
            <th style="text-align:center">Jurusan</th>
            <th style="text-align:center">THN Ajar</th>
            <th style="text-align:center">Nama Dosen</th>
            <th style="text-align:center">SKS Dosen</th>
            <th style="text-align:center">Status</th>
                <!-- <th scope="col">AKSI</th> -->
              </tr>
            </thead>
            <tbody>
<tr>

    @forelse($data as $key => $value)

            <td  style="text-align:center">{{ $key + 1 }}</td>
            <td  style="text-align:center">{{ $value->nama_mk }}</td>
            <td  style="text-align:center">{{ $value->sks_mata_kuliah }}</td>
            <td  style="text-align:center">{{ $value->nama_kelas }}</td>
            <td  style="text-align:center">{{ $value->nama_jurusan }}</td>
            <td  style="text-align:center"> {{$value->nama_semester}} </td>
            <td  style="text-align:center">{{ $value->nama_dosen }}</td>
            <td  style="text-align:center">{{ $value->sks_ajar }}</td>      
            <td> SUDAH UPLOAD </td>



</tr>
            @empty
            <td> - </td>
            @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection

<!-- @section('js')
<script>
  var nomor = 1;
  dt_url = "{{ route('get-feeder-jurusan') }}";
  dt_opt = {
    processing: true,
    serverSide: true,
    autoWidth: false,
    // pageLength: 5,
    // scrollX: true,
    "order": [[ 0, "desc" ]],
    columns: [
        {data: null, name: 'no', sortable: false, render: function(data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
        {data: 'kode_jurusan', name: 'kode_jurusan'},
        {data: 'jurusan', name: 'jurusan'},
        {data: 'akreditasi', name: 'akreditasi'},
        {data: 'jenjang', name: 'jenjang'},
        {data: 'id_prodi_feeder', name: 'id_prodi_feeder'},
        {data: 'Aksi', name: 'Aksi',orderable:false,serachable:false,sClass:'text-center'},
    ]
     
     
  };
</script>

@endsection -->
