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
  <!-- Bootstrap Datepicker -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
    type="text/css" />
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ url('argon') }}/assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- Custom CSS -->
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/core.css') }}">
  <!-- Datatable CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

  
  <script src="{{ url('argon') }}/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript">
    var url_api = "{{ url('/api/v1') }}";
    var dt, dt_url, dt_opt;
  </script>
</head>

<body>
  @include('partials.sidebarKeuangan')

  <!-- Main content -->
  <main class="main-content" id="panel">
    @include('partials.topNav')

    <!-- Header -->
    @yield('content')

    <!-- Footer -->
    @include('partials.footer')
  </main>

  <!-- Datatable JS -->
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
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
  <script type="text/javascript">
    var dt_init = $("#datatable");
    // set menu active
    var tagMenu = document.querySelector(
      `[href="{{ url(Request::segment(1) . '/' . Request::segment(2) . '/' . Request::segment(3)) }}"]`);
    if (tagMenu) {
      tagMenu.childNodes[1].classList.add('sub-aktif');
      tagMenu.parentNode.parentNode.parentNode.classList.add('showsubmenu');
    }
    $(document).ready(function() {
      // $('#txt_semester_topnav').html((dataGlobal['periode']['semester']==1)?"Semester Gasal":"Semester Genap");
      // $('#txt_tahun_topnav').html(dataGlobal['periode']['tahun']+"/"+(dataGlobal['periode']['tahun']+1));
      // $(".date-input").datepicker({
      //   format: "dd MM yyyy",
      //   autoclose: true
      // });
      // datatable
      if (dt_init) {
        console.log(dt_url)
        dt = $('#datatable').DataTable({
          "processing": true,
          "ajax": {
            url: dt_url,
            type: 'GET',
            data: {},
            headers: {
              "Authorization": window.localStorage.getItem('token')
            }
          },
          ...dt_opt,
          // "dom": 'lfrtip',
          "language": {
            "paginate": {
              "next": 'Next',
              "previous": 'Previous'
            },
            "processing": "Proses ...",
            "emptyTable": "Tidak ada data dalam tabel",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ total data",
            "infoEmpty": "Menampilkan 0 sampai 0 dari 0 total data",
            "infoFiltered": "(difilter dari _MAX_ total)",
            "lengthMenu": "_MENU_ Data per halaman",
            "search": "",
            "searchPlaceholder": "Pencarian ..."
          }
        });
      }

    });
  </script>
  <!-- Bootstrap Datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"
    type="text/javascript"></script>
  @yield('js')
</body>

</html>