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
              <h2 class="mb-0">Feeder Data Kurkulum</h2>
            </div>
            <div class="col text-right" >
              <form action="{{ url('admin/feeder/feeder-data_kurikulum') }}" method="post">
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-download'></i> Download Feeder</button>
              </form>
            </div>
                     <div   class="col" style="margin-right: -20em">
              <form action="{{ url('admin/feeder/upload_feeder-data_kurikulum') }}" method="post">
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
                <th scope="col">NO</th>
                <!-- <th  scope="col">No</th> -->
            <th  scope="col">Nama Mata Kuliah</th>
            <th  scope="col">Prodi Studi</th>                        
            <th  scope="col">Mulai Berlaku</th>                        
            <th  scope="col">Jumlah SKS</th>                        
            <th  scope="col">Status</th>
                <!-- <th scope="col">AKSI</th> -->
              </tr>
            </thead>
            <tbody>
<tr>

    @forelse($data as $key => $value)

            <td >{{ $key + 1 }}</td>
            <td  style="text-align:center">{{ $value->nama_kurikulum }}</td>
            <td  style="text-align:center">{{ $value->kode_jurusan }}</td>
            <td  style="text-align:center">{{ $value->kode_thn_ajaran }}</td>
            <td  style="text-align:center">{{ $value->jum_sks }}</td>

            @if($value->id_kurikulum != null)
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
</section>
@endsection

@section('js')
<script>
  var nomor = 1;
  dt_url = "{{ url('getFeederDataKurikulum') }}";
  dt_opt = {
    processing: true,
    serverSide: true,
    autoWidth: false,
    // pageLength: 5,
    // scrollX: true,
    "order": [[ 0, "desc" ]],
    columns: [
        {data: null, name: 'no', sortable: false, render: function(data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
        {data: 'nama_kurikulum', name: 'nama_kurikulum'},
        {data: 'kode_jurusan', name: 'kode_jurusan'},
        {data: 'kode_thn_ajaran', name: 'kode_thn_ajaran'},
        {data: 'jum_sks', name: 'jum_sks'},
        {data: 'id_kurikulum', name: 'id_kurikulum'},
        {data: 'Aksi', name: 'Aksi',orderable:false,serachable:false,sClass:'text-center'},
    ]
     
     
  };
</script>

@endsection
