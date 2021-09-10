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
    <!-- <p class="tanggal-waktu">9/6/21, 1:21 PM</p>
    <p class="text-center">Absensi Perkuliahan</p> -->
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
        <td><span id="tahun"></span></td>
      </tr>
      <tr>
        <td>Semester :</td>
        <td><span id="semester"></span></td>
      </tr>
      <tr>
        <td>Program Studi - Konsentrasi :</td>
        <td><span id="prodi"></span></td>
      </tr>
      <tr>
        <td>Tingkat - Pararel :</td>
        <td><span id="kelas"></span></td>
      </tr>
      <tr>
        <td>Mata Kuliah :</td>
        <td><span id="matakuliah"></span></td>
      </tr>
      <tr>
        <td>Dosen :</td>
        <td><span id="dosen"></span></td>
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
      <tbody id="tbody_absensi">
        
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
    <p>Banyuwangi, <span id="tgl"></span></p>
    <p>Kasubag Akademik</p>
    <p class="nip">NIP.</p>
  </div>

  <footer>
    <table class="table-footer">
      <tr>
        <td>
          <p>
            <!-- https://sim.poliwangi.ac.id/jurusan/absensi/CRmahasiswa.php?ht_tahun=2020&program=3&jurusan=1&kelas=1&amp;paralel=A&semester=1&MK=28491 -->
          </p>
        </td>
        <td>
          <!-- <p class="nomor-halaman">1/2</p> -->
        </td>
      </tr>
    </table>
  </footer>
  <script src="{{ url('argon') }}/assets/vendor/jquery/dist/jquery.min.js"></script>

  <script>
    var bulan = ['','Januari','Februari','Mei','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']
    var dt = new Date();
    var jam_sekarang = ((dt.getDate().toString().length==1)?"0"+dt.getDate():dt.getDate())+" "+bulan[dt.getMonth()+1]+" "+dt.getFullYear();
    $('#tgl').html(jam_sekarang)
    var arr_cetak = JSON.parse(localStorage.getItem('cetak-absen'))
    $('#tahun').html(arr_cetak['tahun']+"/"+(arr_cetak['tahun']+1))
    $('#semester').html((arr_cetak['semester']==1)?"Gasal":"Genap")
    $('#prodi').html(arr_cetak['prodi'])
    $('#kelas').html(arr_cetak['kelas'])
    $('#matakuliah').html(arr_cetak['matakuliah'])
    $('#dosen').html(arr_cetak['dosen'])
    $.ajax({
      url: `{{url('/api/v1')}}/absensi/cetak-kelas?kelas=${arr_cetak['id_kelas']}&tahun=${arr_cetak['tahun']}&semester=${arr_cetak['semester']}&matakuliah=${arr_cetak['id_matakuliah']}`,
      type: 'get',
      dataType: 'json',
      data: {},
      beforeSend: function(text) {
              // loading func
      },
      success: function(res) {
        var data = res.data;
        console.log(data)
        if (res.status=="success") {
            setSiswa(data)
        } else {
            // alert gagal
        }
      }
    })
    function setSiswa(data) {
        var html = '';
        var i = 0;
        $.each(data,function (key,row) {
            i++;
            html = `<tr>
                      <td>${i}</td>
                      <td>${row.nim}</td>
                      <td>${row.nama}</td>
                      <td>${(row.pertemuan[1]=="")?"-":row.pertemuan[1]}</td>
                      <td>${(row.pertemuan[2]=="")?"-":row.pertemuan[2]}</td>
                      <td>${(row.pertemuan[3]=="")?"-":row.pertemuan[3]}</td>
                      <td>${(row.pertemuan[4]=="")?"-":row.pertemuan[4]}</td>
                      <td>${(row.pertemuan[5]=="")?"-":row.pertemuan[5]}</td>
                      <td>${(row.pertemuan[6]=="")?"-":row.pertemuan[6]}</td>
                      <td>${(row.pertemuan[7]=="")?"-":row.pertemuan[7]}</td>
                      <td>${(row.pertemuan[8]=="")?"-":row.pertemuan[8]}</td>
                      <td>${(row.pertemuan[9]=="")?"-":row.pertemuan[9]}</td>
                      <td>${(row.pertemuan[10]=="")?"-":row.pertemuan[10]}</td>
                      <td>${(row.pertemuan[11]=="")?"-":row.pertemuan[11]}</td>
                      <td>${(row.pertemuan[12]=="")?"-":row.pertemuan[12]}</td>
                      <td>${(row.pertemuan[13]=="")?"-":row.pertemuan[13]}</td>
                      <td>${(row.pertemuan[14]=="")?"-":row.pertemuan[14]}</td>
                      <td>${(row.pertemuan[15]=="")?"-":row.pertemuan[15]}</td>
                      <td>${(row.pertemuan[16]=="")?"-":row.pertemuan[16]}</td>
                      <td>${row.persentase}</td>
                    </tr>`
            console.log(html)
            $('#tbody_absensi').append(html)
        })
        countData = i;
    }
  </script>
</body>

</html>
