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
              <h2 class="mb-0">Feeder Data Mata Kuliah</h2>
            </div>
            <div class="col text-right">
       <form action="{{ url('admin/feeder/feeder-data_mata_kuliah') }}" method="post">
                {!! csrf_field() !!}
                <button  type="submit" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-download'></i> Download Feeder</button>
              </form>
            </div>
             <div class="col" style="margin-right: -20em">
              <form action="{{ url('admin/feeder/upload_feeder-data_mata_kuliah') }}" method="post">
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
                <th style="text-align:center">Kode</th>
            <th style="text-align:center">Nama Mata Kuliah</th>
            <th style="text-align:center">Bobot MK</th>                        
            <th style="text-align:center">Jenis MK</th>                        
            <th style="text-align:center">Prodi MK</th>                        
            <th style="text-align:center">Status</th>
              </tr>
            </thead>
            <tbody>
<tr>

    @forelse($data as $key => $value)

          <td >{{ $key + 1 }}</td>
            <td  style="text-align:center">{{ $value->kode_mk }}</td>
            <td  style="text-align:center">{{ $value->nama_mk }}</td>
            <td  style="text-align:center">{{ $value->bobot_mk }}</td>


            @if($value->jenis_mata_kuliah == "A")
            <td  style="text-align:center">WAJIB PROGRAM STUDI</td>

            @elseif($value->jenis_mata_kuliah == "B")

            <td  style="text-align:center">PILIHAN</td>

            @elseif($value->jenis_mata_kuliah == "C")

            <td  style="text-align:center">PEMINATAN</td>

            @elseif($value->jenis_mata_kuliah == "S")

            <td  style="text-align:center">TUGAS AKHIR/SKRIPSI/TESIS/DISERTASI</td>

            @else

            <td  style="text-align:center">WAJIB NASIONAL</td>

            @endif

            <td  style="text-align:center">{{ $value->prodi_mk }}</td>
        
            @if($value->id_mk != null)

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
  dt_url = "{{ route('get-feeder-data_mata_kuliah') }}";
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
        {data: 'jenis_mata_kuliah', name: 'jenis_mata_kuliah'},
        {data: 'id_mk', name: 'id_mk'},
        {data: 'Aksi', name: 'Aksi',orderable:false,serachable:false,sClass:'text-center'},
    ]
     
     
  };
</script>

@endsection
