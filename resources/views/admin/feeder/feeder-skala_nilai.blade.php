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
              <h2 class="mb-0">Feeder Skala Nilai</h2>
            </div>
            <div class="col text-right">
              <form action="{{ url('admin/feeder/feeder-skala_nilai') }}" method="post">
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-download'></i> Download Feeder</button>
              </form>
            </div>
              <div class="col" style="margin-right: -20em">
              <form action="{{ url('admin/feeder/upload_feeder-skala_nilai') }}" method="post">
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
              <th style="text-align:center">Program Studi</th>
              <th style="text-align:center">Nilai Huruf</th>
              <th style="text-align:center">Nilai Huruf</th>                 
              <th style="text-align:center">Bobot Minimum</th>                        
              <th style="text-align:center">Bobot Maximum</th>                        
              <th style="text-align:center">Tgl Mulai</th>
              <th style="text-align:center">Tgl Akhir</th>
              <th style="text-align:center">Status</th>
              </tr>
            </thead>
            <tbody>

          @forelse($data as $key => $value)
<tr>
          
              <td style="text-align:center">{{ $key + 1 }}</td>
              <td >{{ $value->nama_program_studi }}</td>
              <td  style="text-align:center">{{ $value->nilai_huruf }}</td>
              <td  style="text-align:center">{{ $value->nilai_indeks }}</td>
              <td  style="text-align:center">{{ $value->bobot_nilai_min }}</td>
              <td  style="text-align:center">{{ $value->bobot_nilai_maks }}</td>
              <td  style="text-align:center">{{ $value->tgl_mulai_efektif }}</td>
              <td  style="text-align:center">{{ $value->tgl_akhir_efektif }}</td>
              @php
              $exp = date('today');
          @endphp
              @if($value->tgl_mulai_efektif <= $exp)
              <td  style="text-align:center">Sudah Ada</td>
            @else
              <td  style="text-align:center">Belum Ada</td>
          @endif



            @empty
            <td> - </td>
</tr>

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
  dt_url = "{{ route('get-feeder-skala_nilai') }}";
  dt_opt = {
    processing: true,
    serverSide: true,
    autoWidth: false,
    // pageLength: 5,
    // scrollX: true,
    "order": [[ 0, "desc" ]],
    columns: [
        {data: null, name: 'no', sortable: false, render: function(data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
        {data: 'nilai_huruf', name: 'nilai_huruf'},
        {data: 'nilai_indeks', name: 'nilai_indeks'},
        {data: 'bobot_nilai_min', name: 'bobot_nilai_min'},
        {data: 'bobot_nilai_maks', name: 'bobot_nilai_maks'},
        {data: 'tgl_mulai_efektif', name: 'tgl_mulai_efektif'},
        {data: 'tgl_akhir_efektif', name: 'tgl_akhir_efektif'},
        {data: 'Aksi', name: 'Aksi',orderable:false,serachable:false,sClass:'text-center'},
    ]
     
  };
</script>

@endsection
