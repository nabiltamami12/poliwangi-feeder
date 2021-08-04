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
  <title>Register | {{ config('app.name') }}</title>
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
  <link href="{{ asset('css/login.css') }}" rel="stylesheet">
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
</head>

<body class="bg-default">
  <!-- Main content -->
  <div class="main-content register_page">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7">
      <div class="container">
        <div class="header-body text-center mb-5">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-2">
              <img src="{{ url('images') }}/logo.svg" class="logo" alt="Politeknik Negeri Banyuwangi">
              <h1>Selamat Datang!</h1>
              <p>PENERIMAAN MAHASISWA BARU TAHUN AJARAN 2021/2022</p>
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
    <div class="container mt--9 pb-7">
      <div class="row justify-content-center">
        <div class="col-lg-9 col-md-8">
          <div class="card bg-secondary mt-5 border-0 mb-0">
            <div class="card-body">
              <div class="card_inner">
                <form>
                  <div class="form-group">
                    <label for="jalur-seleksi" class="font-weight-bold">Pilih Jalur Seleksi</label>
                    <select class="form-control" id="jalur-seleksi">
                      <option selected="true" disabled="disabled">Jalur Seleksi</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </form>
              </div>

              <div class="card_inner mt-4">
                <h2>Data Diri</h2>
                <hr>
                <div class="row">
                  <div class="col-12 col-lg-6">
                    <form>
                      <div class="form-group">
                        <label for="nama-lengkap">Nama Lengkap Calon Pendaftar<span>*</span></label>
                        <input type="text" class="form-control" id="nama-lengkap" placeholder="Nama Lengkap" required>
                      </div>
                      <div class="form-group mt-3">
                        <label for="exampleFormControlInput1">Tanggal Lahir<span>*</span></label>
                        <input type="date" class="form-control" id="exampleFormControlInput1"
                          placeholder="name@example.com" required>
                      </div>
                      <div class="form-group mt-3">
                        <label for="asal-sekolah">Asal Sekolah<span>*</span></label>
                        <input type="text" class="form-control" id="asal-sekolah" placeholder="Nama Sekolah Asal"
                          required>
                      </div>
                    </form>
                  </div>
                  <div class="col-12 col-lg-6">
                    <div class="form-group mt-3 mt-lg-0">
                      <label for="foto">Foto Calon Pendaftar<span>*</span></label>
                      <div class="input-foto-siswa">
                        <label for="file-input-foto">
                          <span class="iconify fileUpload-icon" data-icon="bx:bx-image-add" data-inline="false"></span>
                        </label>
                      </div>
                      <input type="file" class="form-control-file d-none">
                    </div>
                  </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col">
                    <h2 class="text-center mt-3">Data Orang Tua</h2>
                    <hr>
                    <form>
                      <div class="form-group">
                        <label for="nama-ayah">Nama Ayah<span>*</span></label>
                        <input type="text" class="form-control" id="nama-ayah" placeholder="Nama Lengkap Ayah" required>
                      </div>
                      <div class="form-group mt-3">
                        <label for="nama-ibu">Nama Ibu<span>*</span></label>
                        <input type="text" class="form-control" id="nama-ibu" placeholder="Nama Lengkap Ibu" required>
                      </div>
                      <div class="form-group mt-3">
                        <label for="nomor-hp">No. HP (WA Aktif) Orang Tua / Wali<span>*</span></label>
                        <input type="tel" class="form-control" id="nomor-hp" placeholder="+62 -"
                          pattern="[+]{1}[0-9]{11,14}" required>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn--blue w-100 mt-4">Submit</button>

            </div>
          </div>
          <div class="row register_account">
            <div class="col text-center">
              <p>Sudah punya akun? <a href="/">Klik Disini</a></p>
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
      window.location = "{{ url('/admin/dashboard') }}";
    }
  </script>
</body>

</html>