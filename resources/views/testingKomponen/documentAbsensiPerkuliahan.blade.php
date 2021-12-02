<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body {
      position: relative;
      width: 90%;
      margin-right: auto;
      margin-left: auto;
    }

    .table-responsive {
      display: block;
      overflow-x: auto;
      width: 100%;
      -webkit-overflow-scrolling: touch;
    }

    .text-center {
      text-align: center;
    }

    .tanggal-waktu {
      position: absolute;
      top: 0;
      left: -20px;
    }

    .table-header {
      margin-top: 20px;
      border-collapse: collapse;
      margin-left: auto;
      margin-right: auto;
      border-collapse: collapse;
    }

    .table-header tr th {
      text-align: left;
      font-size: 1.1rem;
      padding: 10px 0;
      font-weight: 500;
    }

    .table-header tr td {
      padding: 2px 0;
      font-size: 1rem;
    }

    .table-header tr>td:first-child {
      text-align: right;
      padding-right: 10px;
    }

    .table-main {
      margin-top: 30px;
      border-collapse: collapse;
      width: 100%;
      margin-left: auto;
      margin-right: auto;
    }

    .table-main td {
      text-align: center;
    }

    .table-main,
    .table-main tr th,
    .table-main tr td {
      border: 1px solid black;
    }

    .table-keterangan {
      margin-top: 15px;
      display: inline-block;
      vertical-align: text-top;
      width: 45%;
    }

    .table-keterangan tr th:first-child,
    .table-keterangan tr td:first-child {
      text-align: right;
    }

    .penutup-dokumen {
      margin-top: 15px;
      display: inline-block;
      vertical-align: text-top;
      width: 50%;
    }

    .penutup-dokumen .nip {
      margin-top: 70px;
    }

    footer {
      margin-top: 130px;
    }

    footer table {
      width: 100%;
    }

    footer table .nomor-halaman {
      text-align: right;
    }
  </style>
</head>

<body>
  <header>
    <p class="tanggal-waktu">9/6/21, 1:21 PM</p>
    <p class="text-center">Absensi Perkuliahan</p>
  </header>

  <table class="table-header">
    <thead>
      <tr>
        <th colspan="2">Rekap Absensi Kehadiran Mahasiswa</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Tahun ajaran :</td>
        <td>2020/2021</td>
      </tr>
      <tr>
        <td>Semester :</td>
        <td>Ganjil</td>
      </tr>
      <tr>
        <td>Program Studi - Konsentrasi :</td>
        <td>Teknik Informatika</td>
      </tr>
      <tr>
        <td>Jenjang :</td>
        <td>D3</td>
      </tr>
      <tr>
        <td>Tingkat - Pararel :</td>
        <td>1 (Satu) - A</td>
      </tr>
      <tr>
        <td>Mata Kuliah :</td>
        <td>Pendidikan Agama</td>
      </tr>
      <tr>
        <td>Dosen :</td>
        <td>M. Karimullah</td>
      </tr>
    </tbody>
  </table>

  <div class="table-responsive">
    <table class="table-main">
      <thead>
        <tr>
          <th rowspan="2">No</th>
          <th rowspan="2">NIM</th>
          <th rowspan="2">Nama Mahasiswa</th>
          <th colspan="16">Minggu</th>
          <th rowspan="2">Proses<br />Kehadiran</th>
        </tr>
        <tr>
          <th colspan="1">1</th>
          <th colspan="1">2</th>
          <th colspan="1">3</th>
          <th colspan="1">4</th>
          <th colspan="1">5</th>
          <th colspan="1">6</th>
          <th colspan="1">7</th>
          <th colspan="1">8</th>
          <th colspan="1">9</th>
          <th colspan="1">10</th>
          <th colspan="1">11</th>
          <th colspan="1">12</th>
          <th colspan="1">13</th>
          <th colspan="1">14</th>
          <th colspan="1">15</th>
          <th colspan="1">16</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>362055401002</td>
          <td>Egi Sabta Hiro</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>100%</td>
        </tr>
        <tr>
          <td>2</td>
          <td>362055401003</td>
          <td>Sarifatun Nadia</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>100%</td>
        </tr>
        <tr>
          <td>3</td>
          <td>362055401004</td>
          <td>Aldi Rizky Gunawan</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>100%</td>
        </tr>
        <tr>
          <td>4</td>
          <td>362055401005</td>
          <td>Febriyansah Pratama Putra</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>100%</td>
        </tr>
        <tr>
          <td>5</td>
          <td>362055401006</td>
          <td>Hsp Watulintang Arumdanie</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>100%</td>
        </tr>
        <tr>
          <td>6</td>
          <td>362055401007</td>
          <td>Chindi Fidaro'Aini</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>100%</td>
        </tr>
        <tr>
          <td>7</td>
          <td>362055401008</td>
          <td>Devi Oktaviani</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>100%</td>
        </tr>
        <tr>
          <td>8</td>
          <td>362055401009</td>
          <td>Aulia Miftahul Zanah</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>100%</td>
        </tr>
        <tr>
          <td>9</td>
          <td>362055401010</td>
          <td>Dia Lilis Karlina</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>100%</td>
        </tr>
        <tr>
          <td>10</td>
          <td>362055401011</td>
          <td>Avi Julia Rahma</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>100%</td>
        </tr>
        <tr>
          <td>11</td>
          <td>362055401012</td>
          <td>Aida Andinar Maulidiana</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>100%</td>
        </tr>
        <tr>
          <td>12</td>
          <td>362055401013</td>
          <td>Wendy Mei Ika Nur Ainni</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>100%</td>
        </tr>
        <tr>
          <td>13</td>
          <td>362055401014</td>
          <td>Mirza Dwiyan Saputra</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>100%</td>
        </tr>
        <tr>
          <td>14</td>
          <td>362055401015</td>
          <td>Dhicky Mahesya TegarSurya Pramana</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>100%</td>
        </tr>
        <tr>
          <td>15</td>
          <td>362055401016</td>
          <td>Rikiansyah Aris Kurniawan</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>S</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>H</td>
          <td>94%</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="table-keterangan">
    <table>
      <thead>
        <tr>
          <th>Keterangan :</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>H :</td>
          <td>Hadir</td>
        </tr>
        <tr>
          <td>I :</td>
          <td>Ijin</td>
        </tr>
        <tr>
          <td>S :</td>
          <td>Sakit</td>
        </tr>
        <tr>
          <td>A :</td>
          <td>Alpha</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="penutup-dokumen">
    <p>Banyuwangi, 06-Sep-2021</p>
    <p>Kasubag Akademik</p>
    <p class="nip">NIP.</p>
  </div>

  <footer>
    <table class="table-footer">
      <tr>
        <td>
          <p>
            https://sim.poliwangi.ac.id/jurusan/absensi/CRmahasiswa.php?ht_tahun=2020&program=3&jurusan=1&kelas=1&amp;paralel=A&semester=1&MK=28491
          </p>
        </td>
        <td>
          <p class="nomor-halaman">1/2</p>
        </td>
      </tr>
    </table>
  </footer>
</body>

</html>