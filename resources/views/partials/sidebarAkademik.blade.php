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
                <a class="nav-link" href="{{ url('/akademik/master/datamahasiswa')}}">
                  <span
                    class="nav-link-dropdown-text {{($halamanAktif === "datamahasiswa") ? 'text-primary' : ''}}">Data
                    Mahasiswa</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/master/datakelas')}}">
                  <span class="nav-link-dropdown-text {{($halamanAktif === "datakelas") ? 'text-primary' : ''}}">Data
                    Kelas</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/master/datakuliah')}}">
                  <span class="nav-link-dropdown-text {{($halamanAktif === "datakuliah") ? 'text-primary' : ''}}">Data
                    Kuliah</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <div class="nav-link {{($title === "akademik-khs") ? 'aktif' : ''}}"">
              <span class=" iconify" data-icon="bx:bx-book-bookmark" data-inline="false"></span>
              <span class=" nav-link-text">KHS</span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="/akademik/khs/khs">
                  <span class="nav-link-dropdown-text {{($halamanAktif === "khs") ? 'text-primary' : ''}}">KHS</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/akademik/khs/khsmahasiswa">
                  <span class="nav-link-dropdown-text {{($halamanAktif === "khsmahasiswa") ? 'text-primary' : ''}}">KHS
                    Mahasiswa</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <div class="nav-link {{($title === "akademik-kuliah") ? 'aktif' : ''}}">
              <i class="iconify" data-icon="bx:bx-calendar-star"></i>
              <span class="nav-link-text">Kuliah</span>
            </div>
            <ul class="nav-item-dropdown-content">
              <li class="nav-item">
                <a class="nav-link" href="/akademik/kuliah/skmahasiswaaktif">
                  <span
                    class="nav-link-dropdown-text {{($halamanAktif === "skmahasiswaaktif") ? 'text-primary' : ''}}">SK
                    Mahasiswa Aktif</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/akademik/kuliah/nilai">
                  <span
                    class="nav-link-dropdown-text {{($halamanAktif === "nilai") ? 'text-primary' : ''}}">Nilai</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/akademik/kuliah/nilaimahasiswa">
                  <span
                    class="nav-link-dropdown-text {{($halamanAktif === "nilaimahasiswa") ? 'text-primary' : ''}}">Nilai
                    Mahasiswa</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/akademik/kuliah/pelanggaran">
                  <span
                    class="nav-link-dropdown-text {{($halamanAktif === "pelanggaran") ? 'text-primary' : ''}}">Pelanggaran</span>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <div class="nav-link {{($title === "akademik-report") ? 'aktif' : ''}}">
              <i class="iconify" data-icon="bx:bx-file-blank"></i>
              <span class="nav-link-text">Report</span>
            </div>

            <div class="nav-item-dropdown-content">
              <ul>
                <li class="nav-item">
                  <div class="nav-link-submenu">
                    <span
                      class="nav-link-dropdown-text {{($halamanAktif === "reportcuti" || $halamanAktif === "reportdropout" || $halamanAktif === "reportmelebihisemester" || $halamanAktif === "reportlulus") ? 'text-primary' : ''}}">Mahasiswa</span>
                  </div>

                  <ul class="nav-item-dropdown-content">
                    <li class="nav-item">
                      <a class="nav-link" href="/akademik/report/cuti">
                        <span
                          class="nav-link-dropdown-text {{($halamanAktif === "reportcuti") ? 'text-primary' : ''}}">Cuti</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/akademik/report/dropout">
                        <span
                          class="nav-link-dropdown-text {{($halamanAktif === "reportdropout") ? 'text-primary' : ''}}">Drop
                          Out</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/akademik/report/melebihisemester">
                        <span
                          class="nav-link-dropdown-text {{($halamanAktif === "reportmelebihisemester") ? 'text-primary' : ''}}">Melebihi
                          Semester</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/akademik/report/lulus">
                        <span
                          class="nav-link-dropdown-text {{($halamanAktif === "reportlulus") ? 'text-primary' : ''}}">Lulus</span>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/akademik/report/judultugasakhir">
                    <span
                      class="nav-link-dropdown-text {{($halamanAktif === "reportjudulta") ? 'text-primary' : ''}}">Judul
                      Tugas
                      Akhir</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/akademik/report/wali">
                    <span
                      class="nav-link-dropdown-text {{($halamanAktif === "reportwali") ? 'text-primary' : ''}}">Wali</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>