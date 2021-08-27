<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Document</title>
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
  <!-- Custom CSS -->
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box
    }

    body {
      background-color: #fff;
    }


    h2,
    p {
      font-size: 0.85rem;
      line-height: 1.2em;
      color: #000;
      margin-bottom: 0.5rem;
    }

    .document_title {
      font-size: 1.5rem;
      color: #000;
    }

    .tanggal {
      position: absolute;
      top: 0;
      left: 10px;
    }

    .table-bordered {
      border: 2px solid #000;
    }

    .table-bordered th,
    .table-bordered td {
      border: 2px solid #000;
    }

    .table th,
    .table td {
      padding: 0.2rem 1rem;
      vertical-align: baseline;
    }

    .table tr th {
      font-size: 0.75rem;
      font-weight: bold;
      color: #000;
    }

    .table th[scope="row"] {
      font-weight: normal;
    }

    .table td {
      font-size: 0.75rem;
      font-weight: normal;
      color: #000;
    }

    .table .tidak_lulus th[scope="row"],
    .table .tidak_lulus td {
      font-weight: bold;
      font-size: 0.8rem;
    }
  </style>
</head>


<body>
  <header class="position-relative">
    <p class="text-center mt-2">POLIWANGI | SIM</p>
    <p class="tanggal">8/27/2021</p>
    <div class="container">
      <h1 class="document_title text-center mt-2">Evaluasi Berkala</h1>
      <div class="row mt-4 justify-content-between">
        <div class="col-lg-2 col-md-3 col-6">
          <h2>Tahun</h2>
          <h2>Semester</h2>
          <h2>Prodi - Konsentrasi</h2>
        </div>
        <div class="col-lg-2 col-md-3 col-6">
          <p>: 2020/2021</p>
          <p>: Genap</p>
          <p>: Teknik Informatika</p>
        </div>
        <div class="col-lg-2 offset-lg-4 col-md-3 col-6">
          <h2>Jenjang</h2>
          <h2>Kelas / Pararel</h2>
          <h2>Mata Kuliah</h2>
          <h2>Dosen</h2>
        </div>
        <div class="col-lg-2 col-md-3 col-6">
          <p>: D3</p>
          <p>: 1/A</p>
          <p>: Basis Data</p>
          <p>: Dianni Yusuf</p>
        </div>
      </div>
    </div>
  </header>

  <main>
    <div class="container">
      <div class="table-responsive mt-2">
        <table class="table table-bordered table-sm">
          <thead>
            <tr>
              <th scope="col" class="text-center px-1">No</th>
              <th scope="col" class="text-center">NIM</th>
              <th scope="col" class="text-center">NAMA</th>
              <th scope="col" class="text-center px-1">NH</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Egi Sabta Hiro</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Sarifatun Nadia</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Aldi Rizky Gunawan</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Febriyansah Pratama Putra</td>
              <td class="text-center px-1">AB</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Hsp Watulintang Arumdanie</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Chindi Fidaro'Aini</td>
              <td class="text-center px-1">AB</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Devi Oktaviani</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Aulia Miftahul Zanah</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr class="tidak_lulus">
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Dia Lilis Karlina</td>
              <td class="text-center px-1">E</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Avi Julia Rahma</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Aida Andinar Maulidiana</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Wendy Mei Ika Nur Ainni</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Mirza Dwiyan Saputra</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Dhicky Mahesya Tegar Surya Pramana</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Rikiansyah Aris Kurniawan</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Rizky Ramadhan</td>
              <td class="text-center px-1">AB</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Egi Sabta Hiro</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Sarifatun Nadia</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Aldi Rizky Gunawan</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Febriyansah Pratama Putra</td>
              <td class="text-center px-1">AB</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Hsp Watulintang Arumdanie</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Chindi Fidaro'Aini</td>
              <td class="text-center px-1">AB</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Devi Oktaviani</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Aulia Miftahul Zanah</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr class="tidak_lulus">
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Dia Lilis Karlina</td>
              <td class="text-center px-1">E</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Avi Julia Rahma</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Aida Andinar Maulidiana</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Wendy Mei Ika Nur Ainni</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Mirza Dwiyan Saputra</td>
              <td class="text-center px-1">A</td>
            </tr>
            <tr>
              <th scope="row" class="text-center px-1"></th>
              <td class="nim"></td>
              <td>Dhicky Mahesya Tegar Surya Pramana</td>
              <td class="text-center px-1">A</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <p>https://sim.poliwangi.ac.id/index.php?Login=1</p>
        </div>
        <div class="col">
          <p class="halaman text-right">1/1</p>
        </div>
      </div>
    </div>
  </footer>

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
  @yield('js')

  <script>
    const no_column = document.querySelectorAll('th[scope="row"]');
    const nim_column = document.querySelectorAll('.nim');
    for(let number=0; number<no_column.length; number++){
      no_column[number].innerHTML = number+1;
    }

    for(let nomor_nim=0; nomor_nim<nim_column.length; nomor_nim++){
      if(nomor_nim.toString().length === 1){
        nim_column[nomor_nim].innerHTML = "36205540100" + (nomor_nim+2);
      }else if(nomor_nim.toString().length === 2){
        nim_column[nomor_nim].innerHTML = "3620554010" + (nomor_nim+2);
      }
    }

  </script>
</body>

</html>