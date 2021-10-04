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
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{($title === "mala-dashboard") ? 'aktif' : ''}}"
              href="{{url('mahasiswa/dashboard')}}">
              <i class="iconify" data-icon="bx-bx-home-circle"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{($title === "mala-pembayaran") ? 'aktif' : ''}}"
              href="{{ url('/mahasiswa/pembayaran')}}">
              <i class="iconify" data-icon="bx:bx-dollar-circle"></i>
              <span class="nav-link-text">Pembayaran</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{($title === "mala-presensi") ? 'aktif' : ''}}"
              href="{{ url('/mahasiswa/presensi')}}">
              <i class="iconify" data-icon="bx:bx-badge-check"></i>
              <span class="nav-link-text">Presensi</span>
            </a>
          </li>

          <!-- <li class="nav-item">
            <div class="nav-link {{($title === "mala-penilaian") ? 'aktif' : ''}}">
              <span class="iconify" data-icon="bx:bx-book-bookmark"></span>
              <span class="nav-link-text">Penilaian</span>
            </div>

            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/mahasiswa/rekap-nilai')}}">
                  <span class="mini_icon">NS</span>
                  <span class="nav-link-text">Nilai Semester</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/mahasiswalama/penilaian/khs')}}">
                  <span class="mini_icon">KH</span>
                  <span class="nav-link-text">KHS</span>
                </a>
              </li>
            </ul>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link {{($title === "mala-formcuti") ? 'aktif' : ''}}"
              href="{{ url('/mahasiswalama/formcuti')}}">
              <i class="iconify" data-icon="bx:bx-calendar-star"></i>
              <span class="nav-link-text">Form Cuti</span>
            </a>
          </li> -->
        </ul>
      </div>
    </div>
  </div>
</nav>