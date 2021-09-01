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
                  <span class="nav-link-text ml-0">Data Periode</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/master/datahariaktif')}}">
                  <span class="nav-link-text ml-0">Data Hari Aktif</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/master/datamahasiswa')}}">
                  <span class="nav-link-text ml-0">Data Mahasiswa</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/master/datamatakuliah')}}">
                  <span class="nav-link-text ml-0">Data Matakuliah</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/master/datakelas')}}">
                  <span class="nav-link-text ml-0">Data Kelas</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/akademik/master/datajurusan')}}">
                  <span class="nav-link-text ml-0">Data Jurusan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/akademik/master/dataprodi')}}">
                  <span class="nav-link-text ml-0">Data Program Studi</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/master/dataruangan')}}">
                  <span class="nav-link-text ml-0">Data Ruangan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/master/datajamkuliah')}}">
                  <span class="nav-link-text ml-0">Data Jam Kuliah</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/akademik/master/datarangenilai')}}">
                  <span class="nav-link-text ml-0">Data Range Nilai</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/akademik/master/settingkuliah')}}">
                  <span class="nav-link-text ml-0">Setting Kuliah (FE)</span>
                </a>
              </li>

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
            <span class="nav-link-text ml-0">KHS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/akademik/khs/khsmahasiswa')}}">
            <span class="nav-link-text ml-0">KHS Mahasiswa</span>
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
                  <span class="nav-link-dropdown-text">SK Mahasiswa Aktif</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/kuliah/nilai')}}">
                  <span class="nav-link-dropdown-text">Nilai</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/kuliah/nilaimahasiswa')}}">
                  <span class="nav-link-dropdown-text">Nilai Mahasiswa</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/akademik/kuliah/pelanggaran')}}">
                  <span class="nav-link-dropdown-text">Pelanggaran</span>
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
                    <span class="nav-link-dropdown-text">Mahasiswa</span>
                  </div>

                  <ul class="nav-item-dropdown-content">
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/akademik/report/cuti">
                        <span class="nav-link-dropdown-text">Cuti</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/akademik/report/dropout">
                        <span class="nav-link-dropdown-text">DropOut</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/akademik/report/melebihisemester">
                        <span class="nav-link-dropdown-text">Melebihi Semester</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/akademik/report/lulus">
                        <span class="nav-link-dropdown-text">Lulus</span>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/akademik/report/judultugasakhir">
                    <span class="nav-link-dropdown-text">Judul Tugas Akhir</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/akademik/report/wali">
                    <span class="nav-link-dropdown-text">Wali</span>
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