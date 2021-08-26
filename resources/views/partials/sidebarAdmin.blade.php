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
            <a class="nav-link {{($title === "admin-dashboard") ? 'aktif' : ''}}" href="/admin/dashboard">
              <i class="iconify" data-icon="bx-bx-home-circle"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <div class="nav-link {{($title === "admin-masterData") ? 'aktif' : ''}}">
              <i class="iconify" data-icon="bx:bx-user-pin"></i>
              <span class="nav-link-text">Master Data</span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="/admin/masterdata/dataperiode">
                  <span class="nav-link-dropdown-text">Data Periode</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/masterdata/datasettingkuliah">
                  <span class="nav-link-dropdown-text">Setting Kuliah</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/masterdata/datamahasiswa">
                  <span class="nav-link-dropdown-text">Mahasiswa</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/masterdata/datamatakuliah">
                  <span class="nav-link-dropdown-text">Matakuliah</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/masterdata/datakelas">
                  <span class="nav-link-dropdown-text">Kelas</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/masterdata/datadosen">
                  <span class="nav-link-dropdown-text">Dosen</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/masterdata/datajurusan">
                  <span class="nav-link-dropdown-text">Jurusan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/masterdata/dataprodi">
                  <span class="nav-link-dropdown-text">Program Studi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/masterdata/dataruangan">
                  <span class="nav-link-dropdown-text">Ruangan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/masterdata/datajamkuliah">
                  <span class="nav-link-dropdown-text">Jam Kuliah</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/masterdata/datadosenpengampu">
                  <span class="nav-link-dropdown-text">Dosen Pengampu</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/masterdata/datarangenilai">
                  <span class="nav-link-dropdown-text">Range Nilai</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/masterdata/dataprogram">
                  <span class="nav-link-dropdown-text">Program</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <div class="nav-link {{($title === "admin-kuliah") ? 'aktif' : ''}}">
              <i class="iconify" data-icon="bx:bx-file-blank"></i>
              <span class="nav-link-text">Kuliah</span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="/admin/kuliah/absensi">
                  <span class="nav-link-dropdown-text">Absensi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/kuliah/pelanggaran">
                  <span class="nav-link-dropdown-text">Pelanggaran</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/kuliah/nilai">
                  <span class="nav-link-dropdown-text">Nilai</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <div class="nav-link {{($title === "admin-settingpmb") ? 'aktif' : ''}}">
              <i class="iconify-inline" data-icon="ant-design:setting-outlined"></i>
              <span class="nav-link-text">Setting PMB</span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="/admin/settingpmb/settingjalurpenerimaan">
                  <span class="nav-link-dropdown-text">Setting Jalur Penerimaan PMB</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/settingpmb/settingjurusanpilihan">
                  <span class="nav-link-dropdown-text">Setting Jurusan Pilihan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/settingpmb/settingjadwalseleksi">
                  <span class="nav-link-dropdown-text">Setting Jadwal Seleksi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/settingpmb/settingjurusanasal">
                  <span class="nav-link-dropdown-text">Setting Jurusan Asal Pendaftar</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/settingpmb/settingjurusanlinear">
                  <span class="nav-link-dropdown-text">Setting Jurusan Linear</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>