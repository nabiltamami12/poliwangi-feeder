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
            <a class="nav-link {{($title === "keuangan-dashboard") ? 'aktif' : ''}}"
              href="{{ url('/keuangan/dashboard') }} ">
              <span class="iconify" data-icon="bx-bx-home-circle" data-inline="true"></span>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{($title === "keuangan-dataSPI") ? 'aktif' : ''}}"
              href="{{ url('/keuangan/spimandiri') }} ">
              <span class="iconify" data-icon="bx:bx-user-pin" data-inline="true"></span>
              <span class="nav-link-text">Data SPI</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{($title === "keuangan-dataBeasiswa") ? 'aktif' : ''}}"
              href="{{ url('/keuangan/databeasiswa') }} ">
              <span class="iconify" data-icon="bx:bx-book-bookmark" data-inline="true"></span>
              <span class="nav-link-text">Data Beasiswa</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{($title === "keuangan-piutang") ? 'aktif' : ''}}"
              href="{{ url('/keuangan/piutangmahasiswa') }} ">
              <span class="iconify" data-icon="bx:bx-file-blank" data-inline="true"></span>
              <span class="nav-link-text">Piutang Mahasiswa</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>