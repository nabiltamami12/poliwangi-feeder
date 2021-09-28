<!DOCTYPE html>
<html>

<head>
  @include('layouts/topHead')
</head>

<body>
  @include('partials.sidebarDosen')

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