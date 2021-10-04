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
            <div class="nav-link {{($title === "akademik-master") ? 'aktif' : ''}}">
              <i class="iconify" data-icon="bx:bx-user-pin"></i>
              <span class="nav-link-text">Master Data</span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/master/dataperiode')}}">
                  <span class="mini_icon">DP</span>
                  <span class="nav-link-text">Data Periode</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/master/datahariaktif')}}">
                  <span class="mini_icon">DH</span>
                  <span class="nav-link-text">Data Hari Aktif</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/master/datamahasiswa')}}">
                  <span class="mini_icon">DM</span>
                  <span class="nav-link-text">Data Mahasiswa</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/master/datamatakuliah')}}">
                  <span class="mini_icon">DM</span>
                  <span class="nav-link-text">Data Matakuliah</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/master/datakelas')}}">
                  <span class="mini_icon">DK</span>
                  <span class="nav-link-text">Data Kelas</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/master/datadosen')}}">
                  <span class="mini_icon">DD</span>
                  <span class="nav-link-text ml-0">Data Dosen</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/akademik/master/datajurusan')}}">
                  <span class="mini_icon">DJ</span>
                  <span class="nav-link-text">Data Jurusan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/akademik/master/dataprodi')}}">
                  <span class="mini_icon">DP</span>
                  <span class="nav-link-text">Data Program Studi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/master/dataruangan')}}">
                  <span class="mini_icon">DR</span>
                  <span class="nav-link-text">Data Ruangan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/master/datajamkuliah')}}">
                  <span class="mini_icon">DJ</span>
                  <span class="nav-link-text">Data Jam Kuliah</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/akademik/master/datarangenilai')}}">
                  <span class="mini_icon">DR</span>
                  <span class="nav-link-text">Data Range Nilai</span>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="{{url('/akademik/master/settingkuliah')}}">
                  <span class="mini_icon">SK</span>
                  <span class="nav-link-text">Setting Kuliah (FE)</span>
                </a>
              </li> -->

            </ul>
          </li>
          <li class="nav-item">
            <div class="nav-link {{($title === "akademik-kuliah") ? 'aktif' : ''}}">
              <span class=" iconify" data-icon="bx:bx-book-bookmark"></span>
              <span class="nav-link-text">Kuliah<img src="{{ url('images') }}/sidebar-right.png" class="arrow"
                  alt=""></span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link {{($title === "dosen-penilaian") ? 'aktif' : ''}}" href="{{url('akademik/kuliah/penilaian')}}">
                  <span class="nav-link-text ml-0">Penilaian</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{($title === "rekap-nilai") ? 'aktif' : ''}}" href="{{url('akademik/kuliah/rekap-nilai')}}">
                  <span class="nav-link-text ml-0">Rekap Nilai</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{($title === "absensi-mahasiswa") ? 'aktif' : ''}}" href="{{url('akademik/kuliah/absensi/dashboard-mahasiswa')}}">
                  <span class="nav-link-text ml-0">Abasensi Mahasiswa (Dashboard)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{($title === "rekap-absensi-mahasiswa") ? 'aktif' : ''}}" href="{{url('akademik/kuliah/absensi/mahasiswa/rekap')}}">
                  <span class="nav-link-text ml-0">Rekap Abasensi Mahasiswa</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{($title === "absensi-mahasiswa") ? 'aktif' : ''}}" href="{{url('akademik/kuliah/absensi/dashboard-dosen')}}">
                  <span class="nav-link-text ml-0">Abasensi Mahasiswa (Dashboard Dosen)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{($title === "absensi-dosen") ? 'aktif' : ''}}" href="{{url('akademik/kuliah/absensi/kelas-dosen')}}">
                  <span class="nav-link-text ml-0">Absensi Dosen</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{($title === "rekap-absensi-mahasiswa") ? 'aktif' : ''}}" href="{{url('akademik/kuliah/absensi/rekap')}}">
                  <span class="nav-link-text ml-0">Rekap Abasensi Mahasiswa(Admin)</span>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <div class="nav-link {{($title === "akademik-keuangan") ? 'aktif' : ''}}">
            <span class=" iconify" data-icon="bx:bx-dollar-circle"></span>
              <span class="nav-link-text">Keuangan<img src="{{ url('images') }}/sidebar-right.png" class="arrow"
                  alt=""></span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link {{($title === "keuangan-tarif") ? 'aktif' : ''}}" href="{{ url('akademik/keuangan/tarif') }} ">
                  <span class="mini_icon">TR</span>
                  <span class="nav-link-text">Tarif UKT & SPI</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{($title === "keuangan-rekapitulasi") ? 'aktif' : ''}}" href="{{ url('akademik/keuangan/spi') }} ">
                  <span class="mini_icon">SP</span>
                  <span class="nav-link-text">SPI</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('akademik/pmb/piutangmahasiswa')}}">
                  <span class="mini_icon">DP</span>
                  <span class="nav-link-text">Piutang Mahasiswa (Admin)</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <div class="nav-link {{($title === "maba-mahasiswa") ? 'aktif' : ''}}">
              <i class="iconify" data-icon="bx:bx-user-pin"></i>
              <span class="nav-link-text">PMB</span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('akademik/pmb/datapendaftar')}}">
                  <span class="mini_icon">DP</span>
                  <span class="nav-link-text">Data Pendaftar</span>
                </a>
              </li>
              
              <!-- <li class="nav-item">
                <a class="nav-link" href="{{ url('akademik/pmb/pengajuan/cicilan')}}">
                  <span class="mini_icon">DP</span>
                  <span class="nav-link-text">Pengajuan Cicilan</span>
                </a>
              </li> -->

              
              
            </ul>
          </li>

          {{--
          <li class="nav-item">
            <div class="nav-link {{($title === "akademik-khs") ? 'aktif' : ''}}"">
          <span class=" iconify" data-icon="bx:bx-book-bookmark" data-inline="true"></span>
          <span class=" nav-link-text">KHS<img src="{{ url('images') }}/sidebar-right.png" class="arrow" alt=""></span>
      </div>
      <ul class="nav-item-dropdown-content">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/akademik/khs/khs')}}">
            <span class="nav-link-text">KHS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/akademik/khs/khsmahasiswa')}}">
            <span class="nav-link-text">KHS Mahasiswa</span>
          </a>
        </li>
      </ul>
      </li> --}}

      {{--  <li class="nav-item">
            <div class="nav-link {{($title === "akademik-kuliah") ? 'aktif' : ''}}">
      <i class="iconify" data-icon="bx:bx-calendar-star"></i>
      <span class="nav-link-text">Kuliah</span>
    </div>
    <ul class="nav-item-dropdown-content">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/akademik/kuliah/skmahasiswaaktif')}}">
          <span class="nav-link-text">SK Mahasiswa Aktif</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/akademik/kuliah/nilai')}}">
          <span class="nav-link-text">Nilai</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/akademik/kuliah/nilaimahasiswa')}}">
          <span class="nav-link-text">Nilai Mahasiswa</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/akademik/kuliah/pelanggaran')}}">
          <span class="nav-link-text">Pelanggaran</span>
        </a>
      </li>
    </ul>
    </li> --}}

    {{-- <li class="nav-item">
            <div class="nav-link {{($title === "akademik-report") ? 'aktif' : ''}}">
    <i class="iconify" data-icon="bx:bx-file-blank"></i>
    <span class="nav-link-text">Report</span>
  </div>

  <div class="nav-item-dropdown-content">
    <ul>
      <li class="nav-item">
        <div class="nav-link-submenu">
          <span class="nav-link-text">Mahasiswa</span>
        </div>

        <ul class="nav-item-dropdown-content">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/akademik/report/cuti">
                        <span class="nav-link-text">Cuti</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/akademik/report/dropout">
                        <span class="nav-link-text">DropOut</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/akademik/report/melebihisemester">
                        <span class="nav-link-text">Melebihi Semester</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/akademik/report/lulus">
                        <span class="nav-link-text">Lulus</span>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/akademik/report/judultugasakhir">
                    <span class="nav-link-text">Judul Tugas Akhir</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/akademik/report/wali">
                    <span class="nav-link-text">Wali</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          --}}
        </ul>
      </div>
    </div>
  </div>
</nav>