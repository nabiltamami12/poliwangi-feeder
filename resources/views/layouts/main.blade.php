<!DOCTYPE html>
<html>

<head>
  @include('layouts/topHead')
</head>

<body>
  <div class="loaderScreen-wrapper" style="display: none;">
    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
  </div>

  {{-- For Select Menu Sidebar --}}
  @php
    $akses_untuk = explode('.', Request::get('akses_untuk'));
    $sidebar = '';
    if (in_array('admin', $akses_untuk))
      $sidebar = 'partials.sidebarAdmin';

    elseif(in_array('akademik', $akses_untuk))
      $sidebar = 'partials.sidebarAkademik';

    elseif(in_array('dosen', $akses_untuk))
      $sidebar = 'partials.sidebarDosen';

    elseif(in_array('maba', $akses_untuk))
      $sidebar = 'partials.sidebarMaba';

    elseif(in_array('mahasiswa', $akses_untuk))
      $sidebar = 'partials.sidebarMala';

    elseif(in_array('mala', $akses_untuk))
      $sidebar = 'partials.sidebarMala';

    elseif(in_array('keuangan', $akses_untuk))
      $sidebar = 'partials.sidebarKeuangan';
  @endphp

  @if ($sidebar)  
    @include($sidebar)
  @endif

  <!-- Main content -->
  <main class="main-content" id="panel">
    @include('partials.topNav')

    <!-- Header -->
    @yield('content')

    <!-- Footer -->
    @include('partials.footer')
  </main>

  @include('layouts.bottomBody')
  <script type="text/javascript">
    // set menu active
    var tagMenu = document.querySelector(`[href="{{ url(Request::segment(1) . '/' . Request::segment(2) . '/' . Request::segment(3)) }}"]`);

    // document.querySelectorAll("div.navbar-inner.sidenav-menu ul.navbar-nav li.nav-item a.nav-link").forEach( (item) => {
    //   console.log(item+' >>>')
    // });

    if (tagMenu) {
      tagMenu.classList.add('sub-aktif');
      let div_aktif = document.querySelector('div.aktif');
      if (div_aktif) div_aktif.classList.add('open')
      tagMenu.parentNode.parentNode.style.display = 'block';
    }
  </script>
</body>

</html>