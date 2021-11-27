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
              <h2 class="mb-0">Feeder Data Dosen</h2>
            </div>
            <div class="col text-right">
              <form action="{{ url('admin/feeder/feeder-data_dosen') }}" method="post">
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
            <th style="text-align:center">NIP</th>
            <th style="text-align:center">NIDN</th>
            <th style="text-align:center">Nama Dosen</th>
            <th style="text-align:center">Telp</th>
            <th style="text-align:center">Status</th>
            <th style="text-align:center">Status</th>
                <!-- <th scope="col">AKSI</th> -->
              </tr>
            </thead>
            <tbody>
<tr>

    @forelse($data as $key => $value)

      
            <td >{{ $key + 1 }}</td>
            <td  style="text-align:center">{{ $value->nip }}</td>
            <td  style="text-align:center">{{ $value->nidn }}</td>
            <td  style="text-align:center">{{ $value->nama_dosen }}</td>
            <td  style="text-align:center"> {{ $value->telp }} </td>
            @if($value->id_status_dosen == 0)
            <td  style="text-align:center"> Aktif </td>
            @else
            <td  style="text-align:center"> Tidak Aktif </td>
            @endif
        
            @if($value->id_dosen_feeder != null)

            <td  style="text-align:center">SUDAH ADA</td>

            @else

            <td  style="text-align:center">BELUM ADA</td>

            @endif



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
