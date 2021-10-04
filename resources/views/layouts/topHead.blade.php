  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  @php
  $judul = 'SIM Poliwangi | '.ucwords(preg_replace('/-/m', ' ', $title));
  @endphp
  <title>{{ $judul }}</title>
  {{--
  <!-- Icons -->
  <link rel="stylesheet" href="{{ url('argon') }}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="{{ url('argon') }}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
    type="text/css">
  --}}
  <!-- Favicon -->
  <link rel="icon" href="{{ url('favicon.png') }}" type="image/png">
  <!-- Iconify -->
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ url('argon') }}/assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- JQUERY JS -->
  <script src="{{ url('argon') }}/assets/vendor/jquery/dist/jquery.min.js"></script>

  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  
  <!-- Datatable -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
  
  <!-- Bootstrap JS -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
    type="text/css" />
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{url('js/moment-with-locales.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
  <link rel="stylesheet" href="{{ asset('assets/core.css') }}">

  <!-- Custom CSS -->
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">

  @yield('style')
  <script>
    var url_api = "{{ url('/api/v1') }}";
    var url = "{{ base_path() }}";
    var dataGlobal = JSON.parse(localStorage.getItem('globalData'))
    var dataJurusan, dataDosen, dataProgram;
    var dt, dt_url, dt_opt;
  </script>