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
<script type="text/javascript">
  if (localStorage.getItem('pmb') == null) {
    window.location.href = "{{url('/register')}}"
  }
  var url_api = "{{ url('/api/v1') }}";
</script>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Pembayaran VA | {{ config('app.name') }}</title>
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
  <div class="main-content halaman_awal pmbGenerateVA_page">
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
              <div class="row">
                <div class="col">
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h6 class="text-center mb-0">Pendaftaran Berhasil</h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i aria-hidden="true" class="iconify text-success" data-icon="bx:bx-x"></i>
                    </button>
                  </div>
                </div>
              </div>

              <div class="va_aktif">
                <div class="form-group">
                  <label class="mt-4">VA untuk Pembayaran Biaya Pendaftaran</label>
                  <div class="field_kode mt-2">
                    <input type="text" class="form-control font-weight-bold pl-2 rounded" id="va-aktif"
                      value="loading.." readonly>
                    <button class="salin_kode btn btn-primary">Salin Kode</button>
                  </div>
                </div>
              </div>

              <div class="total_tagihan">
                <div class="row mt-4">
                  <div class="col d-flex justify-content-between">
                    <p class="mb-0 text-dark">Total Tagihan</p>
                    <h1 class="mb-0" id="trx-amount">loading..</h1>
                  </div>
                </div>
              </div>

              <div class="informasi_pembayaran">
                <div class="instruksi_pembayaran mt-4">
                  <ul>
                    <li>Pilih Transaksi Lain > Pembayaran > Lainnya > Virtual Account BNI</li>
                    <li>Masukkan Nomor VA <span id="va-aktif-intruksi">loading..</span> kemudian pilih Benar</li>
                    <li>Periksa informasi yang tertera di layar. Pastikan Merchant adalah Politeknik Negeri
                      Banyuwangi, <br> Total tagihan sudah benar dan username. Jika benar, pilih Ya.</li>
                  </ul>
                </div>
                <h6 class="mb-0 font-italic mt-3">Konfirmasi Pembayaran akan dicek secara otomatis 10 menit setelah
                  pembayaran berhasil</h6>
              </div>

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
    const formatAngka = (number) => 
      Intl.NumberFormat("id-ID", { style : 'currency', currency:'IDR', minimumFractionDigits: 0 }).format(number);

    $.ajax({
      url: url_api+"/pendaftar/va",
      type: 'get',
      dataType: 'json',
      data: {},
      headers: {
        'token': localStorage.getItem('pmb')
      },
      beforeSend: function(text) {
      },
      success: function(res) {
        if (res.status=="success") {
          if (res.data.is_lunas == 1) {
            window.location.href = "{{url('/mahasiswabaru/dashboard')}}"
          }else{
            $('#va-aktif').val(res.data.virtual_account)
            $('#va-aktif-intruksi').text(res.data.virtual_account)
            $('#trx-amount').text(formatAngka(res.data.trx_amount))
          }
        } else {
        }
      }
    });

    const input = document.getElementById('va-aktif');
    const coppyBtn = document.querySelector('.salin_kode');
    coppyBtn.onclick = () => {
      input.select();
      if (document.execCommand("copy")) {
        coppyBtn.innerText = "Kode Disalin";
        setTimeout(() => {
          window.getSelection().removeAllRanges();
          coppyBtn.innerText = "Salin Kode";
        }, 3000);
      }
    };
  </script>
</body>

</html>