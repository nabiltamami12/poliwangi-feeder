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
            <a class="nav-link {{($title === "maba-dashboard") ? 'aktif' : ''}}" href="/mahasiswabaru/dashboard">
              <span class="iconify" data-icon="bx-bx-home-circle"></span>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <div class="nav-link {{($title === "maba-mahasiswa") ? 'aktif' : ''}}">
              <span class="iconify" data-icon="bx:bx-user-pin"></span>
              <span class="nav-link-text">Mahasiswa Baru</span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="/mahasiswabaru/verifikasidata">
                  <span class="nav-link-dropdown-text">Verifikasi Data</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/mahasiswabaru/pembayaranva">
                  <span class="nav-link-dropdown-text">Generate VA Pembayaran</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/mahasiswabaru/daftarulang">
                  <span class="nav-link-dropdown-text">Daftar Ulang</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>