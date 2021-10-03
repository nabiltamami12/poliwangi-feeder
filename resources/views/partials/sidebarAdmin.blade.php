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
                <a class="nav-link" href="{{ url('/admin/masterdata/dataperiode')}}">
                  <span class="mini_icon">DP</span>
                  <span class="nav-link-text">Data Periode</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/masterdata/datasettingkuliah')}}">
                  <span class="mini_icon">SK</span>
                  <span class="nav-link-text">Setting Kuliah</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/masterdata/datamahasiswa')}}">
                  <span class="mini_icon">MA</span>
                  <span class="nav-link-text">Mahasiswa</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/masterdata/datamahasiswadetail')}}">
                  <span class="mini_icon">MD</span>
                  <span class="nav-link-text">Mahasiswa Detail</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/masterdata/datamatakuliah')}}">
                  <span class="mini_icon">MA</span>
                  <span class="nav-link-text">Matakuliah</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/masterdata/datakelas')}}">
                  <span class="mini_icon">KE</span>
                  <span class="nav-link-text">Kelas</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/masterdata/datadosen')}}">
                  <span class="mini_icon">DO</span>
                  <span class="nav-link-text">Dosen</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/masterdata/datajurusan')}}">
                  <span class="mini_icon">JU</span>
                  <span class="nav-link-text">Jurusan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/masterdata/dataprodi')}}">
                  <span class="mini_icon">PS</span>
                  <span class="nav-link-text">Program Studi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/masterdata/dataruangan')}}">
                  <span class="mini_icon">RU</span>
                  <span class="nav-link-text">Ruangan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/masterdata/datajamkuliah')}}">
                  <span class="mini_icon">JK</span>
                  <span class="nav-link-text">Jam Kuliah</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/masterdata/datadosenpengampu')}}">
                  <span class="mini_icon">DP</span>
                  <span class="nav-link-text">Dosen Pengampu</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/masterdata/datarangenilai')}}">
                  <span class="mini_icon">RN</span>
                  <span class="nav-link-text">Range Nilai</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/masterdata/dataprogram')}}">
                  <span class="mini_icon">PR</span>
                  <span class="nav-link-text">Program</span>
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
                <a class="nav-link" href="{{ url('/admin/kuliah/absensi')}}">
                  <span class="mini_icon">AB</span>
                  <span class="nav-link-text">Absensi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/kuliah/pelanggaran')}}">
                  <span class="mini_icon">PE</span>
                  <span class="nav-link-text">Pelanggaran</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/kuliah/nilai')}}">
                  <span class="mini_icon">NI</span>
                  <span class="nav-link-text">Nilai</span>
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
                <a class="nav-link" href="{{ url('/admin/settingpmb/settingjalurpenerimaan')}}">
                  <span class="mini_icon">JP</span>
                  <span class="nav-link-text">Setting Jalur Penerimaan PMB</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/settingpmb/settingjalursyarat')}}">
                  <span class="mini_icon">JP</span>
                  <span class="nav-link-text">Setting Jalur Syarat PMB</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/settingpmb/settingjurusanpilihan')}}">
                  <span class="mini_icon">JP</span>
                  <span class="nav-link-text">Setting Jurusan Pilihan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/settingpmb/settingjadwalseleksi')}}">
                  <span class="mini_icon">JS</span>
                  <span class="nav-link-text">Setting Jadwal Seleksi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/settingpmb/settingjurusanasal')}}">
                  <span class="mini_icon">JA</span>
                  <span class="nav-link-text">Setting Jurusan Asal Pendaftar</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/settingpmb/settingjurusanlinear')}}">
                  <span class="mini_icon">JL</span>
                  <span class="nav-link-text">Setting Jurusan Linear</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>