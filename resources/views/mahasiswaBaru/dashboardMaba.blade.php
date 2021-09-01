@extends('layouts.mainMaba')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="dashboard_maba">
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