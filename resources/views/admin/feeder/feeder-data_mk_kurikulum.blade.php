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
              <h2 class="mb-0">Feeder Data MK Kurikulum</h2>
            </div>
            <div class="col text-right">
              <form action="{{ url('admin/feeder/feeder-data_mk_kurikulum') }}" method="post">
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-download'></i> Download Feeder</button>
              </form>
            </div>
                      <div  class="col" style="margin-right: -20em">
              <form action="{{ url('admin/feeder/upload_feeder-data_mk_kurikulum') }}" method="post">
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-download'></i> Upload Feeder</button>
              </form>
              
            </div>
          </div>
        </div>
        <hr class="mt">
        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header" style="text-align:center">
              <tr>
                  <th style="text-align:center">No</th>
            <th style="text-align:center">Kode MK</th>
            <th style="text-align:center">Nama MK</th>                        
            <th style="text-align:center">Bobot</th>                        
            <th style="text-align:center">Jenis </th>                        
            <th style="text-align:center">Nama Kurikulum</th>
            <th style="text-align:center">Program Studi</th>
            <th style="text-align:center">Semester</th>
            <th style="text-align:center">Status</th>
                <!-- <th scope="col">AKSI</th> -->
              </tr>
            </thead>
            <tbody>
<tr>

    @forelse($data as $key => $value)

            <td >{{ $key + 1 }}</td>
            <td  style="text-align:center">{{ $value->kode_mk }}</td>
            <td  style="text-align:center">{{ $value->nama_mk }}</td>     
            <td  style="text-align:center">{{ $value->bobot_mk }}</td>
            @if($value->status_mk == 1)
            <td  style="text-align:center">WAJIB</td>
            @elseif($value->status_mk == 0)
            <td  style="text-align:center">TIDAK WAJIB</td>
            @else
            <td  style="text-align:center"> - </td>
            @endif
            <td  style="text-align:center">{{ $value->nama_kurikulum }}</td>
            <td  style="text-align:center">{{ $value->nama_program_studi }}</td>     
            <td  style="text-align:center">{{ $value->semester }}</td>
            <td  style="text-align:center">{{ $value->keterangan_upload_mk_kurikulum }}</td>



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
</section>
@endsection

@section('js')
<script>
  var nomor = 1;
  dt_url = "{{ url('getFeederDataMKKurikulum') }}";
  dt_opt = {
    processing: true,
    serverSide: true,
    autoWidth: false,
    // pageLength: 5,
    // scrollX: true,
    "order": [[ 0, "desc" ]],
    columns: [
        {data: null, name: 'no', sortable: false, render: function(data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},

        {data: 'kode_mk', name: 'kode_mk'},
        {data: 'nama_mk', name: 'nama_mk'},
        {data: 'bobot_mk', name: 'bobot_mk'},
        {data: 'status_mk', name: 'status_mk'},
        {data: 'nama_kurikulum', name: 'nama_kurikulum'},
        {data: 'program_studi', name: 'program_studi'},
        {data: 'nama_program_studi', name: 'nama_program_studi'},
        {data: 'semester', name: 'semester'},
        {data: 'keterangan_upload_mk_kurikulum', name: 'keterangan_upload_mk_kurikulum'},
        {data: 'Aksi', name: 'Aksi',orderable:false,serachable:false,sClass:'text-center'},
    ]
     
     
  };
</script>

@endsection
