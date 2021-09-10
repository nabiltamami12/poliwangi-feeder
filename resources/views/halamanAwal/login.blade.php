<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Login | {{ config('app.name') }}</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ url('argon') }}/assets/img/brand/favicon.png" type="image/png">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ url('argon') }}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="{{ url('argon') }}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
    type="text/css">
  <!-- Iconify -->
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ url('argon') }}/assets/css/argon.css?v=1.2.0" type="text/css">
  <script src="{{ url('js/util.js') }}"></script>
  <!-- Custom CSS -->
  <link href="{{ asset('css/halamanAwal.css') }}" rel="stylesheet">
</head>

<body class="bg-default">
  <!-- Main content -->
  <div class="main-content halaman_awal login_page">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7">
      <div class="container">
        <div class="header-body text-center mb-5">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-2">
              <img src="{{ url('images') }}/logo.svg" class="logo" alt="Politeknik Negeri Banyuwangi">
              <h1>Selamat Datang!</h1>
              <p>SISTEM INFORMASI AKADEMIK POLITEKNIK NEGERI BANYUWANGI</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
          xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-7">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-7">
          <div class="card bg-secondary mt-4 border-0 mb-0">
            <div class="card-body">
              <div class="text-center mb-4">
                <p>Silahkan melengkapi data untuk melanjutkan</p>
              </div>
              <form role="form" method="POST" id="form_action" onsubmit="event.preventDefault(); auth();">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="iconify" data-icon="bx:bxs-envelope" data-inline="false"></i>
                      </span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" id="email" name="email" :value="old('email')" autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="iconify" data-icon="bx:bxs-lock-open" data-inline="false"></i>
                      </span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password" id="password" autocomplete="current-password">
                  </div>
                </div>

                <div class="custom-control custom-checkbox mt-4">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Ingat Saya</label>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary w-100 my-4-5 rounded-sm">{{ __('Masuk') }}</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row register_account">
            <div class="col text-center">
              <p>Daftar Mahasiswa Baru? <a href="{{ url('/akademik/dashboard') }}">Klik Disini</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ url('argon') }}/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="{{ url('argon') }}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('argon') }}/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="{{ url('argon') }}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="{{ url('argon') }}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="{{ url('argon') }}/assets/js/argon.js?v=1.2.0"></script>
  <script type="text/javascript">
    function auth() {
      window.location = "{{ url('/akademik/dashboard') }}";
    }
  </script>
</body>

</html>