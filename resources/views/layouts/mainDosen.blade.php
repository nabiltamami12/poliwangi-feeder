<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>{{ $title }}</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ url('argon') }}/assets/img/brand/favicon.png" type="image/png">
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
  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
  <!-- Custom CSS -->
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <!-- JQUERY JS -->
    <script src="{{ url('argon') }}/assets/vendor/jquery/dist/jquery.min.js"></script>
  <!-- Datatable JS -->
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
  <!-- Bootstrap JS -->
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

  <script>
    var url_api = "{{ url('/api/v1') }}";
    var url = "{{ base_path(); }}";
    var dataGlobal = JSON.parse(localStorage.getItem('globalData')) 
    var dataJurusan,dataDosen,dataProgram;
  </script>
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

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ url('argon') }}/assets/vendor/jquery/dist/jquery.min.js"></script>
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
  <!-- SELECT2 -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  @yield('js')
</body>

</html>