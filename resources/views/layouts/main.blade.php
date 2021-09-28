<!DOCTYPE html>
<html>

<head>
  @include('layouts/topHead')
</head>

<body>

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
</body>

</html>