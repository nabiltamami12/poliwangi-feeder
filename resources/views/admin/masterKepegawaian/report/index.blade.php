@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">

        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Data Report</h2>
            </div>
            <div class="col text-right">
              <a href="{{route('reportPegawai.create')}}" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-plus-circle'></i> Tambah</a>
            </div>
          </div>
        </div>
        <hr class="mt">
        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pegawai</th>
                <th scope="col">Keterangan</th>
                <th scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($item as $row)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $row->id_pegawai}}</td>
                <td>{!! $row->keterangan !!}</td>
                <td>                      
                  <a href="{{ route('reportPegawai.edit', $row->id)}} " class="btn btn-success">Edit</a>

                  {{-- <a href="{{route('reportPegawai.destroy',$row->id)}}" class="btn btn-danger text-white btn-sm"
                    onclick="event.preventDefault();
                document.getElementById('delete').submit();">
                    Hapus
                  </a>
                  <form id="delete" action="{{route('reportPegawai.destroy',$row->id)}}" method="post" style="display: inline;">
                    @csrf
                    @method('delete')
                  </form> --}}

                  <form action="{{route('reportPegawai.destroy',$row->id)}}" method="post" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">
                        Delete
                    </button>
                </form>
                </td>
              </tr>
              @endforeach
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
  $(document).ready(function() {
      $('.js-example-basic-single').select2();
  });

  var nomor = 1;
  dt_url = '{{ route('reportPegawai.index') }}';
  dt_opt = {
    processing: true,
    serverSide: true,
    autoWidth: false,
    "order": [[ 0, "desc" ]],
    columns: [
        {data: null, name: 'no', sortable: false, render: function(data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
        {data: 'id_pegawai', name: 'id_pegawai'},
        {data: 'keterangan', name: 'keterangan'},
        {data: 'Aksi', name: 'Aksi',orderable:false,serachable:false,sClass:'text-center'},
    ]
  };
  
</script>
@endsection