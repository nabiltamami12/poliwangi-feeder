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
  <!-- Bootstrap Datepicker -->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
  type="text/css" />
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ url('argon') }}/assets/css/argon.css?v=1.2.0" type="text/css">
  <script src="{{ url('js/util.js') }}"></script>
  <!-- Custom CSS -->
  <link href="{{ asset('css/halamanAwal.css') }}" rel="stylesheet">
</head>

<body class="bg-default">
  <!-- Main content -->
  <div class="main-content halaman_awal register_page">
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
      <div class="col-lg-9">
        <div class="card bg-secondary mt-5 border-0 mb-0 rounded">
          <form id="form">
            <div class="card-body">
              <div class="card_inner">
                <div class="form-group mb-0">
                  <label for="jalur-seleksi" class="font-weight-bold">Pilih Jalur Seleksi</label>
                  <select class="form-control" id="jalur_seleksi" name="jalur_daftar">
                  </select>
                </div>
              </div>

              <div class="card_inner mt-4" id="list_jurusan">
                <h2>Pilihan Jurusan Politeknik Negeri Banyuwangi</h2>
                <hr>
                <input type="hidden" id="jml_seleksi" name="jml_seleksi">
                
              </div>

              <div class="card_inner mt-4">
                <h2>Pilihan Politeknik Lainnya</h2>
                <hr>
                <div class="form-group mb-0">
                  <label class="font-weight-bold">Pilih Politeknik</label>
                  <select class="form-control" id="politeknik_lain" name="politeknik_lain">
                  </select>
                </div>
                <div class="form-group mb-0 mt-3">
                  <label class="font-weight-bold">Pilih Program Studi</label>
                  <select class="form-control" id="program_studi_luar"  name="program_studi_luar" >
                  </select>
                </div>  
              </div>

              <div class="card_inner mt-4">
                <h2>Data Diri</h2>
                <hr>
                <div class="row">
                  <div class="col-12 col-lg-6">
                    <div class="form-group">
                      <label for="nama-lengkap">Nama Lengkap Calon Pendaftar<span>*</span></label>
                      <input type="text" class="form-control" id="nama-lengkap" placeholder="Nama Lengkap" required name="nama">
                    </div>
                    <div class="form-group">
                      <label for="nama-ayah">Email<span>*</span></label>
                      <input type="email" class="form-control" id="email" placeholder="useremail@provider.com" required name="email">
                    </div>
                    <div class="form-group mt-3">
                      <label>Tanggal Lahir<span>*</span></label>
                      <div class="d-flex align-items-center date_picker w-100 ">
                        <input id="txtDate" type="text" class="form-control date-input" placeholder="DD/MM/YYYY" name="tgllahir" readonly />
                        <label class="input-group-btn" for="txtDate">
                          <span class="date_button">
                            <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                          </span>
                        </label>
                      </div>
                    </div>
                    <div class="form-group mt-3">
                      <label for="asal-sekolah">Asal Sekolah<span>*</span></label>
                      <input type="text" class="form-control" id="asal-sekolah" placeholder="Nama Sekolah Asal"
                      required name="smu">
                    </div>
                  </div>
                  <div class="col-12 col-lg-6">
                    <div class="form-group mt-3 mt-lg-0">
                      <label>Foto Calon Pendaftar<span>*</span></label>
                      <div class="input-foto-siswa" style="background-position: center center;background-size: cover;">
                        <label for="file-input-foto">
                          <i class="iconify fileUpload-icon" data-icon="bx:bx-image-add"></i>
                        </label>
                      </div>
                      <input type="file" class="form-control-file" id="file-input-foto" hidden name="foto" onchange="previewFile(this);">
                    </div>
                  </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col">
                    <h2 class="text-center mt-3">Data Orang Tua</h2>
                    <hr>
                    <div class="form-group">
                      <label for="nama-ayah">Nama Ayah<span>*</span></label>
                      <input type="text" class="form-control" id="nama-ayah" placeholder="Nama Lengkap Ayah" required name="ayah">
                    </div>
                    <div class="form-group mt-3">
                      <label for="nama-ibu">Nama Ibu<span>*</span></label>
                      <input type="text" class="form-control" id="nama-ibu" placeholder="Nama Lengkap Ibu" required name="ibu">
                    </div>
                    <div class="form-group mt-3">
                      <label for="nomor-hp">No. HP (WA Aktif) Orang Tua / Wali<span>*</span></label>
                      <input type="text" class="form-control" id="nomor-hp" placeholder="+62 -" required name="notelp_ortu">
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-100 mt-4 rounded-sm">Simpan</button>
            </div>
            <form>
            </div>
            <div class="row register_account">
              <div class="col text-center">
                <p>Sudah punya akun? <a href="{{ url('/') }}">Klik Disini</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ url('argon') }}/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript">
    function loading(status) {
        if (status=="show") {
            $(".loaderScreen-wrapper").fadeIn("fast");
        } else {
            $(".loaderScreen-wrapper").fadeOut("slow");
        }
    }
    var url_api = "{{ url('/api/v1') }}";
    
    if (localStorage.getItem("globaldataRegister") === null) {
      $.when(
        $.ajax({
          url: url_api+"/globaldataregister",
          type: 'get',
          dataType: 'json',
          data: {},
          success: function(res) {
            if (res.status=="success") {
              localStorage.setItem('globaldataRegister', JSON.stringify(res['data']));
            }
            ;
          }
        })
      ).done(function(reslt){
      });
    }
  </script>
  <script src="{{ url('argon') }}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('argon') }}/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="{{ url('argon') }}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="{{ url('argon') }}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Bootstrap Datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"
    type="text/javascript"></script>
  <!-- Argon JS -->
  <script src="{{ url('argon') }}/assets/js/argon.js?v=1.2.0"></script>
  <script type="text/javascript">
    var dataGlobal = ''
    var politeknik = []
    var politeknik_jurusan = []
    var jurusan = []
    var prodi = []
    $(document).ready(function(){
      getData();
      $("#txtDate").datepicker({
        format: "dd MM yyyy",
      });
      
      $('#politeknik_lain').on('change',function (e) {
        var politeknik_lain = $(this).val()
        var jurusan = $.grep(politeknik_jurusan, function(e){ return e.id_politeknik == politeknik_lain; });
        $('#program_studi_luar').html('')
        var optJurusanLain = `<option value=""> - </option>`;
        $.each(jurusan,function (key,row) {
          optJurusanLain += `<option value="${row.id}">${row.jenjang} ${row.jurusan}</option>`
        })
        $('#program_studi_luar').append(optJurusanLain); 
      })
      $("#form").submit(function(e) {
        e.preventDefault();
        // console.log(e.target)
        $.ajax({
          url: url_api+"/pendaftar",
          type: 'post',
          dataType: 'json',
          data: new FormData(e.target),
          processData: false,
          contentType: false,
          beforeSend: function(text) {
          },
          success: function(res) {
            console.log(res)
            // if (res.status=="success") {
            //   localStorage.setItem('pmb', res.data)
            //   window.location.href = "{{url('/pmbgenerateva')}}"
            // } else {
            //   alert('Error: '.res.data.message)
            // }
          }
        });
      });
    })
    function getData() {
      $.ajax({
        url: url_api+"/jalurpmb-register",
        type: 'get',
        dataType: 'json',
        data: {},
        beforeSend: function(text) {
        },
        success: function(res) {
          if (dataGlobal == null) {
            dataGlobal = JSON.parse(localStorage.getItem('globaldataRegister'))
          }
          var jalur_pmb = res.data.jalur_pmb
          politeknik = res.data.politeknik
          politeknik_jurusan = res.data.politeknik_jurusan
          jurusan = res.data.jurusan
          prodi = res.data.prodi
          if (res.status=="success") {
            var html = '';
            html = '<option value="">Pilih Jalur</option>'
            $.each(jalur_pmb,function (key,row) {
              if (row.is_active==1) {
                html = `<option data-jml="${row.jml_seleksi}" value="${row.id}">${row.jalur_daftar}</option>`;
                $('#jalur_seleksi').append(html);
              }
            })
            var jml_seleksi = $('#jalur_seleksi :selected').data('jml');
            $("#jml_seleksi").val(jml_seleksi)
            for (let index = 0; index < jml_seleksi; index++) {
              var html = ``
              html = `<div class="form-group mb-0">
                  <label class="font-weight-bold">Pilih Jurusan Ke-${index+1}</label>
                  <select class="form-control" id="jurusan_${index}" name="jurusan_${index}">
                  </select>
                </div>
                <div class="form-group mb-0 mt-3">
                  <label class="font-weight-bold">Pilih Program Studi Ke-${index+1}</label>
                  <select class="form-control" id="program_studi_${index}" name="program_studi_${index}">
                  </select>
                </div>
                <hr>`;
              $('#list_jurusan').append(html);
              var optJurusan = `<option value=""> - </option>`;
              $.each(jurusan,function (key,row) {
                optJurusan += `<option value="${row.nomor}">${row.jurusan}</option>`
              })
              $('#jurusan_'+index).append(optJurusan)
              $('#jurusan_'+index).on('change',function (e) {
              var jurusan = $(this).val()
              var kelas = $.grep(prodi, function(e){ return e.jurusan == jurusan; });
              $('#program_studi_'+index).html('')
              var optKelas = `<option value=""> - </option>`;
              $.each(kelas,function (key,row) {
                optKelas += `<option value="${row.nomor}">${row.nama_program} ${row.program_studi}</option>`
              })
              $('#program_studi_'+index).append(optKelas); 
            })
            }

            

            var html = '<option value="">Pilih Politeknik</option>'
            $.each(politeknik,function (key,row) {
              if (row.id != 1) {
                html += `<option value="${row.id}">${row.politeknik}</option>`;
              }
            })
            $('#politeknik_lain').append(html);
          }
        }
      });
    }

        function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $('.input-foto-siswa').css('background-image', "url('"+reader.result+"')")
            }
 
            reader.readAsDataURL(file);
        }
    }
  </script>
</body>

</html>