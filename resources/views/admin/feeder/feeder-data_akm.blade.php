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
              <h2 class="mb-0">Feeder Data AKM</h2>
            </div>
            <div class="col text-right">
              <form action="{{ url('admin/feeder/feeder-data_akm') }}" method="post">
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-download'></i> Download Feeder</button>
              </form>
            </div>
     <!--        <div class="col" style="margin-right: -16em">
              <form action="{{ url('admin/feeder/upload_feeder-data_akm') }}" method="post">
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-download'></i> Upload Feeder</button>
              </form>              
            </div> -->
          </div>
        </div>
        <hr class="mt">
        <div class="table-responsive">
             <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header" style="text-align:center">
              <tr>
              <th scope="col">No</th>
            <th scope="col">NIM</th>
            <th scope="col">NAMA MAHASISWA</th>
            <th scope="col">JURUSAN</th>
            <th scope="col">SEMESTER</th>
            <th scope="col">STS AKM</th>
            <th scope="col">STS</th>
            <th scope="col">IPS</th>
            <th scope="col">IPK</th>
            <th scope="col">STATUS</th>
            <th scope="col">KETERANGAN</th>
                <!-- <th scope="col">AKSI</th> -->
              </tr>
            </thead>
            <tbody>
<tr>

    @forelse($data as $key => $value)
  @php
          if($value->status_error == 2) 
            {
            $stsfeeder = "SUKSES";
            }
            else if($value->status_error == 1) 
            {
          $stsfeeder = "GAGAL KIRIM";
            }
            else
            {
          $stsfeeder = "BELUM ADA";
            }
            
            //STS
            if($value->status_kuliah == "C")
            {
              $sts = "CUTI";
            }
            else if($value->status_kuliah == "N")
            {
              $sts = "NON-AKTIF";
            }
            else if($value->status_kuliah == "G")
            {
              $sts = "SEDANG DOUBLE DEGREE";
            }
            else
            {
              $sts = "AKTIF";
            }
            @endphp

            <td >{{ $key + 1 }}</td>
            <td  style="text-align:center">{{ $value->nim }}</td>
            <td  style="text-align:center">{{ $value->nama }}</td>
            <td  style="text-align:center"> {{ $value->jurusan }} </td>
            <td  style="text-align:center">{{ $value->semester }}</td>
            <td  style="text-align:center"> {{ $value->status_kuliah }} </td>
            <td  style="text-align:center"> {{ $sts }} </td>
            <td  style="text-align:center"> {{ $value->ips }} </td>
            <td  style="text-align:center"> {{ $value->ipk }} </td>
            <td  style="text-align:center"> {{ $stsfeeder }} </td>
            <td  style="text-align:center"> SUKSES </td>
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
  dt_url = "{{ route('get-feeder-data_akm') }}";
  dt_opt = {
    processing: true,
    serverSide: true,
    autoWidth: false,
    // pageLength: 5,
    // scrollX: true,
    "order": [[ 0, "desc" ]],
    columns: [
        {data: null, name: 'no', sortable: false, render: function(data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
        {data: 'nim', name: 'nim'},
        {data: 'nama', name: 'nama'},
        {data: 'semester', name: 'semester'},
        {data: 'ips', name: 'ips'},
        {data: 'ipk', name: 'ipk'},
        {data: 'sks_smt', name: 'sks_smt'},
        {data: 'sks_total', name: 'sks_total'},
        {data: 'jurusan', name: 'jurusan'},
        {data: 'status_kuliah', name: 'status_kuliah'},
        {data: 'id_registrasi_mahasiswa', name: 'id_registrasi_mahasiswa'},
        {data: 'Aksi', name: 'Aksi',orderable:false,serachable:false,sClass:'text-center'},
    ]
     
     
  };
</script>

@endsection
