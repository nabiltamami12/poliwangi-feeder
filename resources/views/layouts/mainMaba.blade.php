<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>{{ $title }} | {{ config('app.name') }}</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ url('favicon.png') }}" type="image/png">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ url('argon') }}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="{{ url('argon') }}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
    type="text/css">
  <!-- Iconify -->
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ url('argon') }}/assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- Bootstrap Datepicker -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
    type="text/css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('assets/core.css') }}">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <script src="{{ url('argon') }}/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript">
    var url_api = "{{ url('/api/v1') }}";
    $.ajax({
      url: url_api+"/pendaftar/check",
      type: 'post',
      dataType: 'json',
      data: {},
      headers: {
        'token': localStorage.getItem('pmb')
      },
      beforeSend: function(text) {
      },
      success: function(res) {
        if (res.status=="success") {
          if (res.data.is_lunas == 0) {
            window.location.href = "{{url('/pmbgenerateva')}}"
          }
        } else {
          window.location.href = "{{url('/')}}"
        }
      }
    });
  </script>
</head>


<body>
  <div class="loaderScreen-wrapper" style="display: none;">
    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
  </div>
  @include('partials.sidebarMaba')

  <!-- Main content -->
  <main class="main-content" id="panel">
    @include('partials.topNav')

    <!-- Header -->
    @yield('content')

    <!-- Footer -->
    @include('partials.footer')
  </main>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ url('argon') }}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('argon') }}/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="{{ url('argon') }}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="{{ url('argon') }}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="{{ url('argon') }}/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="{{ url('argon') }}/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="{{ url('argon') }}/assets/js/argon.js?v=1.2.0"></script>
  <script src="{{ url('js/util.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <!-- Bootstrap Datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"
    type="text/javascript"></script>
  @yield('js')
</body>

</html>