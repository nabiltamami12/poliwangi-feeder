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
            <a class="nav-link {{($title === "admin-dashboard") ? 'aktif' : ''}}"
              href="{{ url('/admin/dashboard') }} ">
              <i class="iconify" data-icon="bx-bx-home-circle"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <div class="nav-link {{($title === "admin-master") ? 'aktif' : ''}}">
              <i class="iconify" data-icon="bx:bx-user-pin"></i>
              <span class="nav-link-text">Master Data</span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/master/datamatakuliah')}}">
                  <span class="mini_icon">DM</span>
                  <span class="nav-link-text">Data Matakuliah</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/master/datakurikulum')}}">
                  <span class="mini_icon">DK</span>
                  <span class="nav-link-text">Data Kurikulum</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/master/dataperiode')}}">
                  <span class="mini_icon">DP</span>
                  <span class="nav-link-text">Data Periode Kuliah</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/master/datahariaktif')}}">
                  <span class="mini_icon">DH</span>
                  <span class="nav-link-text">Data Hari Aktif</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/master/datajurusan')}}">
                  <span class="mini_icon">DJ</span>
                  <span class="nav-link-text">Data Jurusan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/master/dataprodi')}}">
                  <span class="mini_icon">DP</span>
                  <span class="nav-link-text">Data Program Studi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/master/datakelas')}}">
                  <span class="mini_icon">DK</span>
                  <span class="nav-link-text">Data Kelas</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/master/datajamkuliah')}}">
                  <span class="mini_icon">DJ</span>
                  <span class="nav-link-text">Data Jam Kuliah</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/admin/master/datarangenilai')}}">
                  <span class="mini_icon">DR</span>
                  <span class="nav-link-text">Data Range Nilai</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/master/datadosen')}}">
                  <span class="mini_icon">DD</span>
                  <span class="nav-link-text ml-0">Data Dosen</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/master/datamahasiswa')}}">
                  <span class="mini_icon">DM</span>
                  <span class="nav-link-text">Data Mahasiswa</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/master/dataruangan')}}">
                  <span class="mini_icon">DR</span>
                  <span class="nav-link-text">Data Ruangan</span>
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
                <a class="nav-link {{($title === "admin-perwalian") ? 'aktif' : ''}}" href="{{url('admin/kuliah/perwalian')}}">
                  <span class="mini_icon">PW</span>
                  <span class="nav-link-text ml-0">Perwalian</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{($title === "rekap-absensi-mahasiswa") ? 'aktif' : ''}}" href="{{url('admin/kuliah/absensi/rekap')}}">
                  <span class="mini_icon">RA</span>
                  <span class="nav-link-text ml-0">Rekap Presensi Mahasiswa</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{($title === "rekap-absensi-dosen") ? 'aktif' : ''}}" href="{{url('admin/kuliah/absensi/dosen')}}">
                  <span class="mini_icon">RD</span>
                  <span class="nav-link-text ml-0">Rekap Presensi Dosen</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{($title === "rekap-nilai") ? 'aktif' : ''}}" href="{{url('admin/kuliah/rekap-nilai')}}">
                  <span class="mini_icon">RN</span>
                  <span class="nav-link-text ml-0">Rekap Nilai Mahasiswa</span>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <div class="nav-link {{($title === "admin-keuangan") ? 'aktif' : ''}}">
            <span class=" iconify" data-icon="bx:bx-dollar-circle"></span>
              <span class="nav-link-text">Keuangan</span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/keuangan/datapendaftar')}}">
                  <span class="mini_icon">PM</span>
                  <span class="nav-link-text">Pendaftar Mahasiswa Baru</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{($title === "keuangan-tarif") ? 'aktif' : ''}}" href="{{ url('admin/keuangan/tarif') }} ">
                  <span class="mini_icon">TR</span>
                  <span class="nav-link-text">Tarif UKT & SPI</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{($title === "keuangan-rekapitulasi") ? 'aktif' : ''}}" href="{{ url('admin/keuangan/spi') }} ">
                  <span class="mini_icon">SP</span>
                  <span class="nav-link-text">SPI</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/keuangan/piutangmahasiswa')}}">
                  <span class="mini_icon">DP</span>
                  <span class="nav-link-text">Piutang Mahasiswa</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/keuangan/riwayatpembayaran')}}">
                  <span class="mini_icon">RP</span>
                  <span class="nav-link-text">Riwayat Pembayaran</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <div class="nav-link {{($title === "admin-pmb") ? 'aktif' : ''}}">
              <i class="iconify-inline" data-icon="ant-design:setting-outlined"></i>
              <span class="nav-link-text">PMB</span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/pmb/datapendaftar')}}">
                  <span class="mini_icon">DP</span>
                  <span class="nav-link-text">Daftar Pendaftar</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/pmb/settingjalurpenerimaan')}}">
                  <span class="mini_icon">JP</span>
                  <span class="nav-link-text">Setting Jalur Penerimaan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/pmb/settingjalursyarat')}}">
                  <span class="mini_icon">SS</span>
                  <span class="nav-link-text">Setting Syarat</span>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/pmb/settingjurusanpilihan')}}">
                  <span class="mini_icon">JP</span>
                  <span class="nav-link-text">Setting Jurusan Pilihan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/pmb/settingjadwalseleksi')}}">
                  <span class="mini_icon">JS</span>
                  <span class="nav-link-text">Setting Jadwal Seleksi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/pmb/settingjurusanasal')}}">
                  <span class="mini_icon">JA</span>
                  <span class="nav-link-text">Setting Jurusan Asal Pendaftar</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/pmb/settingjurusanlinear')}}">
                  <span class="mini_icon">JL</span>
                  <span class="nav-link-text">Setting Jurusan Linear</span>
                </a>
              </li>  -->
            </ul>
          </li>


          <li class="nav-item">
            <a class="nav-link {{($title === "admin-mahasiswa") ? 'aktif' : ''}}"
              href="{{ url('/admin/mahasiswa') }} ">
              <i class="iconify" data-icon="bx:bxs-user" data-inline="false"></i>
              <span class="nav-link-text">Mahasiswa</span>
            </a>
          </li>
          <!-- ===================== -->
          

          
          
          
        </ul>
      </div>
    </div>
  </div>
</nav>