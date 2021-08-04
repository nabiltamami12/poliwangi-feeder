@extends('layouts.mainMaba')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="dashboard_maba">
  <div class="row">
    <div class="col">
      <div class="d-md-flex justify-content-between informasi_mahasiswa mt-4">
        <p class="mb-0">Masa: <strong class="font-weight-bold">29 Januari 2021 - 29 Mei 2021</strong></p>
        <p class="mb-0 mt-2 mt-md-0">Status Mahasiswa: <span class="text-warning">Cuti</span></p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div id="pengumuman" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner shadow">
          <div class="carousel-item active" data-interval="2000">
            <img src="{{ url('images') }}/banner_maba.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
@endsection