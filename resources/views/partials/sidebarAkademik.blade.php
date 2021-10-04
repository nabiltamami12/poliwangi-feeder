<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Sidebar Header -->
    <div class="sidenav-header d-flex align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <img src="{{ url('images') }}/navbar-brand.svg" class="navbar-brand-img" alt="">
      </a>

      <!-- Sidenav toggler -->
      <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
        <div class="sidenav-toggler-inner">
          <i class="sidenav-toggler-line"></i>
          <i class="sidenav-toggler-line"></i>
          <i class="sidenav-toggler-line"></i>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <div class="navbar-inner sidenav-menu">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">

        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{($title === "akademik-dashboard") ? 'aktif' : ''}}"
              href="{{ url('/akademik/dashboard') }} ">
              <i class="iconify" data-icon="bx-bx-home-circle"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>

          
          <li class="nav-item">
            <div class="nav-link {{($title === "akademik-kuliah") ? 'aktif' : ''}}">
              <span class=" iconify" data-icon="bx:bx-book-bookmark"></span>
              <span class="nav-link-text">Kuliah<img src="{{ url('images') }}/sidebar-right.png" class="arrow"
                  alt=""></span>
            </div>
            <ul class="nav-item-dropdown-content">
              
              <li class="nav-item">
                <a class="nav-link {{($title === "rekap-nilai") ? 'aktif' : ''}}" href="{{url('akademik/kuliah/rekap-nilai')}}">
                  <span class="nav-link-text ml-0">Rekap Nilai Mahasiswa</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{($title === "rekap-absensi-mahasiswa") ? 'aktif' : ''}}" href="{{url('akademik/kuliah/absensi/rekap')}}">
                  <span class="nav-link-text ml-0">Rekap Abasensi Mahasiswa</span>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </div>
  </div>
</nav>