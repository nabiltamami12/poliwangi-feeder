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
            <a class="nav-link {{($title === "prodi-dashboard") ? 'aktif' : ''}}" href="/prodi/dashboard">
              <span class="iconify" data-icon="bx-bx-home-circle"></span>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <div class="nav-link {{($title === "prodi-masterData") ? 'aktif' : ''}}">
              <span class="iconify" data-icon="bx:bx-user-pin"></span>
              <span class="nav-link-text">Master Data<img src="{{ url('images') }}/sidebar-right.png" class="arrow"
                  alt=""></span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="/prodi/masterdata/datamahasiswa">
                  <span class="nav-link-text ml-0">Mahasiswa</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/prodi/masterdata/datamatakuliah">
                  <span class="nav-link-text ml-0">Matakuliah</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/prodi/masterdata/datakelas">
                  <span class="nav-link-text ml-0">Kelas</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/prodi/masterdata/datadosen">
                  <span class="nav-link-text ml-0">Dosen</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/prodi/masterdata/dataruangan">
                  <span class="nav-link-text ml-0">Ruangan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/prodi/masterdata/datajamkuliah">
                  <span class="nav-link-text ml-0">Jam Kuliah</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/prodi/masterdata/datajurusan">
                  <span class="nav-link-text ml-0">Jurusan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/prodi/masterdata/datafakultas">
                  <span class="nav-link-text ml-0">Fakultas</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/prodi/masterdata/dataprodi">
                  <span class="nav-link-text ml-0">Prodi</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <div class="nav-link {{($title === "prodi-kuliah") ? 'aktif' : ''}}">
              <span class="iconify" data-icon="bx:bx-file-blank"></span>
              <span class="nav-link-text">Kuliah<img src="{{ url('images') }}/sidebar-right.png" class="arrow"
                  alt=""></span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="/prodi/kuliah/absensi">
                  <span class="nav-link-text ml-0">Absensi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/prodi/kuliah/pelanggaran">
                  <span class="nav-link-text ml-0">Pelanggaran</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/prodi/kuliah/nilai">
                  <span class="nav-link-text ml-0">Nilai</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>