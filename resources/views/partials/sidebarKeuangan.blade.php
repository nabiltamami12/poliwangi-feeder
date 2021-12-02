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
              <i class="iconify" data-icon="bx-bx-home-circle"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{($title === "keuangan-tarif") ? 'aktif' : ''}}" href="{{ url('/keuangan/tarif') }} ">
              <i class="iconify" data-icon="bx:bx-cog"></i>
              <span class="nav-link-text">Tarif Keuangan</span>
            </a>
          </li>

          <li class="nav-item">
            <div class="nav-link {{($title === "keuangan-rekapitulasi") ? 'aktif' : ''}}">
              <i class="iconify" data-icon="bx:bx-user-pin"></i>
              <span class="nav-link-text">Rekapitulasi</span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/keuangan/rekapitulasi/datapendaftar')}}">
                  <span class="mini_icon">PM</span>
                  <span class="nav-link-text">Pendaftar Mahasiswa Baru</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/keuangan/rekapitulasi/datamahasiswa')}}">
                  <span class="mini_icon">MS</span>
                  <span class="nav-link-text">Mahasiswa</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/keuangan/rekapitulasi/spi')}}">
                  <span class="mini_icon">SP</span>
                  <span class="nav-link-text">SPI</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/keuangan/rekapitulasi/piutangmahasiswa')}}">
                  <span class="mini_icon">PM</span>
                  <span class="nav-link-text">Piutang Mahasiswa</span>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="{{ url('/keuangan/rekapitulasi/penyisihanpiutang')}}">
                  <span class="mini_icon">PP</span>
                  <span class="nav-link-text">Penyisihan Piutang</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/keuangan/rekapitulasi/inputdatapembayaran')}}">
                  <span class="mini_icon">ID</span>
                  <span class="nav-link-text">Input Data Pembayaran</span>
                </a>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/keuangan/rekapitulasi/riwayatpembayaran')}}">
                  <span class="mini_icon">RP</span>
                  <span class="nav-link-text">Riwayat Pembayaran</span>
                </a>
              </li>
            </ul>
          </li>


          <!-- <li class="nav-item">
            <div class="nav-link {{($title === "keuangan-buktipembayaran") ? 'aktif' : ''}}">
              <i class="iconify" data-icon="bx:bx-dollar-circle"></i>
              <span class="nav-link-text">Bukti Pembayaran</span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/keuangan/buktipembayaran/email')}}">
                  <span class="mini_icon">EM</span>
                  <span class="nav-link-text">Email</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/keuangan/buktipembayaran/kwitansi')}}">
                  <span class="mini_icon">KW</span>
                  <span class="nav-link-text">Kwitansi</span>
                </a>
              </li>
            </ul>
          </li> -->
        </ul>
      </div>
    </div>
  </div>
</nav>