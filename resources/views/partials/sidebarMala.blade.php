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
            <a class="nav-link {{($title === "mala-dashboard") ? 'aktif' : ''}}" href="/mahasiswalama/dashboard">
              <span class="iconify" data-icon="bx-bx-home-circle"></span>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{($title === "mala-pembayaran") ? 'aktif' : ''}}" href="/mahasiswalama/pembayaran">
              <span class="iconify" data-icon="bx:bx-dollar-circle"></span>
              <span class="nav-link-text">Pembayaran</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{($title === "mala-presensi") ? 'aktif' : ''}}" href="/mahasiswalama/presensi">
              <span class="iconify" data-icon="bx:bx-badge-check"></span>
              <span class="nav-link-text">Presensi</span>
            </a>
          </li>

          <li class="nav-item">
            <div class="nav-link {{($title === "mala-penilaian") ? 'aktif' : ''}}">
              <span class=" iconify" data-icon="bx:bx-book-bookmark"></span>
              <span class="nav-link-text">Penilaian<img src="{{ url('images') }}/sidebar-right.png" class="arrow"
                  alt=""></span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="/mahasiswalama/penilaian/nilaisemester">
                  <span class="nav-link-text ml-0">NIlai Semester</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/mahasiswalama/penilaian/khs">
                  <span class="nav-link-text ml-0">KHS</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link {{($title === "mala-formcuti") ? 'aktif' : ''}}" href="/mahasiswalama/formcuti">
              <span class="iconify" data-icon="bx:bx-calendar-star"></span>
              <span class="nav-link-text">Form Cuti</span>
            </a>
          </li>


        </ul>
      </div>
    </div>
  </div>
</nav>