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
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
  <!-- Page plugins -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ url('argon') }}/assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- Custom CSS -->
  <link href="{{ asset('css/customComponent.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/akademik.css') }}" rel="stylesheet">
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
  <!-- Datatable CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
  <!-- Bootstrap CSS -->
  <!-- <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'> -->

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/fd5eab281a.js" crossorigin="anonymous"></script>
  <!-- Iconify -->
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
  <!-- JQUERY JS -->
  <script src="{{ url('argon') }}/assets/vendor/jquery/dist/jquery.min.js"></script>
  <!-- Datatable JS -->
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
  <!-- Bootstrap JS -->
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"> </script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"> </script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
    integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
  </script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
    integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
  </script>

  <script>
    var url_api = "http://127.0.0.1:8000/api/v1";
    var url = "{{ base_path(); }}";
    var dataGlobal;
  </script>
  <style type="text/css">
    .form-group {
      padding-left: 1.5rem !important;
      padding-right: 1.3rem !important;
      margin-top: 16px !important;
    }
    form button {
      height: 49px;
    }

    /*datatable*/
    .table-responsive{
      padding-top: 1em;
    }
    .table.dataTable{
      border-collapse: unset;
    }
    .table.dataTable thead th, table.dataTable thead td{
      border-bottom: unset;
    }
    .table.dataTable.no-footer{
      border-bottom: unset;
    }
    .dataTables_wrapper .page-item.active .page-link {
      border-color: #28A3EB;
      background-color: #28A3EB;
    }
    .dataTables_wrapper .custom-select {
      font-weight: 400;
      font-size: 0.875rem;
      line-height: 1.21em;
      color: #041f2f;
      min-width: 70px;
      max-width: 70px;
      height: 30px;
      border: 1px solid #999999;
      border-radius: 0.5rem;
      padding: 0 10px;
      background-image: url("https://api.iconify.design/bx/bx-chevron-down.svg?color=#041F2F");
      background-repeat: no-repeat;
      background-size: 17px;
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      box-shadow: none;
    }
    .dataTables_wrapper div.dataTables_filter input{
      border: 1px solid #28a3eb;
      padding: 0 0.75rem;
      max-height: 35px;
    }
    .dataTables_wrapper .dataTables_length select.form-control{
      margin: 0px;
    }

    /*sidebar*/
    .sub-aktif{
      color: #28a3eb !important;
    }
  </style>
</head>


<body>
  @yield('loader')
  @include('partials.sidebarAkademik')

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
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
  </script>
  <!-- Argon JS -->
  <script src="{{ url('argon') }}/assets/js/argon.js?v=1.2.0"></script>
  <script src="{{ url('js/util.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <script type="text/javascript">
    // set menu active
    var tagMenu = document.querySelector(`[href="{{ url(Request::segment(1).'/'.Request::segment(2).'/'.Request::segment(3)) }}"]`);
    if (tagMenu) {
      tagMenu.childNodes[1].classList.add('sub-aktif');
      tagMenu.parentNode.parentNode.parentNode.classList.add('showsubmenu');
    }

    var dt, dt_url, dt_opt;
    var dt_init = document.getElementById("datatable");
    $(document).ready(function() {
      // datatable
      if (dt_init) {
        dt = $('#datatable').DataTable({
          "processing": true,
          "ajax": {
            url: dt_url,
            type: 'GET',
            data: {},
            headers: {
              "Authorization": window.localStorage.getItem('token')
            },
          },
          ...dt_opt,
          // "dom": 'lfrtip',
          "language": {
            "paginate": {
              "next": 'Lanjut',
              "previous": 'Kembali'
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
  @yield('js')
</body>

</html>