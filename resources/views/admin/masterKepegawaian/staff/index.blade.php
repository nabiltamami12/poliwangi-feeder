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
                            <h2 class="mb-0">Data Staff</h2>
                        </div>
                        <div class="col text-right">
                            <a href="{{route('dataStaff.create')}}" class="btn btn-primary"><i
                                    class="iconify-inline mr-1" data-icon='bx:bx-plus-circle'></i> Tambah</a>
                        </div>
                    </div>

                </div>
                <hr class="mt">
                <div class="table-responsive">
                    <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
                        <thead class="table-header">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Staff</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stf as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->staf}}</td>
                                <td>
                                    <a href="{{ route('dataStaff.edit', $item->id)}} "
                                        class="btn btn-success btn-sm">Edit</a>

                                    <a href="{{route('dataStaff.destroy',$item->id)}}"
                                        class="btn btn-danger text-white btn-sm" onclick="event.preventDefault();
                                document.getElementById('delete').submit();">
                                        Hapus
                                    </a>
                                    <form id="delete" action="{{route('dataStaff.destroy',$item->id)}}" method="post"
                                        style="display: inline;">
                                        @csrf
                                        @method('delete')
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
      var nomor = 1;
  dt_url = '{{ route('dataStaff.index') }}';
  dt_opt = {
    processing: true,
    serverSide: true,
    autoWidth: false,
    "order": [[ 0, "desc" ]],
    columns: [
        {data: null, name: 'no', sortable: false, render: function(data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
        {data: 'staf', name: 'staf'},
        {data: 'Aksi', name: 'Aksi',orderable:false,serachable:false,sClass:'text-center'},
    ]
  };
</script>
@endsection
