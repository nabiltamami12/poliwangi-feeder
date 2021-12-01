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
              <h2 class="mb-0">Feeder Data Jurusan</h2>
            </div>
            <div class="col text-right" >
              <form action="{{ url('admin/feeder/feeder-jurusan') }}" method="post">
                {!! csrf_field() !!}
                <button  type="submit" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-download'></i> Download Feeder</button>
              </form>
              
            </div>
                <div class="col" style="margin-right: -20em">
              <form action="{{ url('admin/feeder/feeder-jurusan-upload') }}" method="post">
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-upload'></i> Upload Feeder</button>
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
                <th scope="col">KODE</th>
                <th scope="col">NAMA JURUSAN</th>
                <th scope="col">STATUS</th>
                <th scope="col">PROGRAM</th>
                <th scope="col">ID JURUSAN FEEDER</th>
                <!-- <th scope="col">AKSI</th> -->
              </tr>
            </thead>
            <tbody>
<tr>


    @forelse($data as $key => $value)
            <td  style="text-align:center">{{ $key + 1 }}</td>
            <td  style="text-align:center">{{ $value->kode_jurusan }}</td>
            <td  style="text-align:center">{{ $value->jurusan }}</td>
            <td  style="text-align:center">{{ $value->akreditasi }}</td>
            <td  style="text-align:center">{{ $value->jenjang }}</td>
            <td  style="text-align:center">{{ $value->id_prodi_feeder }}</td>

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

@endsection
