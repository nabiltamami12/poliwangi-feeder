@extends('layouts.mainMaba')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <!-- Modal -->
  <div class="modal fade" id="daftarUlang_unggahDokumen" tabindex="-1" aria-labelledby="daftarUlang_unggahDokumenLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <div class="modal-header">
          <h5 class="modal-title my-3 mx-auto">Upload Berkas</h5>
        </div>
        <div class="modal-body">
          <div style="margin-top: 0px !important;" class="form-group detail_dokumen d-flex justify-content-center align-items-center p-4" id="trigger-browse" style="cursor: pointer;">
            <form class="d-none" onchange="showfilename()">
              <i class="iconify mr-2" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
              <input type="file" id="file" hidden />
              <span id="custom-text" class="nama_dokumen">tidak ada file dipilih</span>
            </form>
            <button type="button" id="custom-btn">
              <i class="iconify text-primary" data-icon="bx:bx-cloud-upload" data-inline="false"></i>
            </button>
          </div>
          <p class="mt-2 mb-0 font-italic jenis_dokumen">Upload Document dengan format .pdf (Max size 10MB)</p>
        </div>
        <div class="modal-footer pt-3">
          <button type="button" class="btn btn-primary w-100 rounded-sm" id="btn-upload">Upload</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small card_step">
        <h2 class="mb-2">Tahapan</h2>
        <hr class="d-none d-md-block">
        {{-- TABS NAVIGATION --}}
        <ul class="nav nav-pills row pr-3 pr-md-0" id="pills-tab" role="tablist">
          <li class="nav-item col-md-6 mt-3 mt-md-0" role="presentation">
            <a class="nav-link active" id="pills-dataCalonPendaftar-tab" data-toggle="pill"
            href="#pills-dataCalonPendaftar" role="tab" aria-controls="pills-dataCalonPendaftar"
            aria-selected="true">Data Calon Peserta Didik</a>
          </li>

          <li class="nav-item col-md-6 mt-sm-3 mt-md-0" role="presentation">
            <a class="nav-link" id="pills-unggahBerkas-tab" data-toggle="pill" href="#pills-unggahBerkas" role="tab"
            aria-controls="pills-unggahBerkas" aria-selected="false">Unggah Berkas</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="tab-content" id="pills-tabContent">
    {{-- TAB DATA CALON PESERTA DIDIK --}}
    <div class="tab-pane fade show active" id="pills-dataCalonPendaftar" role="tabpanel"aria-labelledby="pills-dataCalonPendaftar-tab">
    <div class="row">
      <div class="col-xl-12">
        <div class="tab-body">
          <div class="card shadow mt-0 padding--big card_form active">
            <div class="card-header p-0">
              <div class="row align-items-center">
                <div class="col">
                  <h2 class="mb-0">Identitas Calon Pendaftar</h2>
                </div>
              </div>
              <hr class="my-4">
            </div>

            <div class="card-body p-0">
              <form class="form_data">
                <div class="form-row">
                  <div class="col-md-4 form-group">
                    <label for="nama-siswa">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama-siswa" placeholder="Nama Siswa" name="nama">
                  </div>
                  <div class="col-md-4 form-group mt-3 mt-md-0">
                    <label for="nik" class="text-nowrap">Nomor Induk Kependudukan</label>
                    <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik">
                  </div>
                  <div class="col-md-4 form-group mt-3 mt-md-0">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" id="nisn" placeholder="Nomor Induk Siswa Nasional" name="nisn">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 form-group mt-3">
                    <label for="tempat-lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat-lahir" placeholder="Kota Banyuwangi" name="tempat_lahir">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                    <label>Tanggal Lahir</label>
                    <div class="d-flex align-items-center date_picker w-100 ">
                      <input id="txtDate" type="text" class="form-control date-input" value="23 Jul 2021" readonly name="tgllahir" />
                      <label class="input-group-btn" for="txtDate">
                        <span class="date_button">
                          <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                        </span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4 form-group mt-3">
                    <label for="urutan-anak">Anak ke</label>
                    <input type="text" class="form-control" id="urutan-anak" placeholder="1" name="anak_ke">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 form-group mt-3">
                    <label for="jenis-kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis-kelamin" name="sex">
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                  <div class="col-md-6 form-group pr-0 pr-md-1 mt-3">
                    <label for="saudara">Jumlah Saudara</label>
                    <input type="text" class="form-control" id="saudara" placeholder="2" name="jumlah_anak">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 form-group mt-3">
                    <label for="tahun-lulus">Tahun Lulus</label>
                    <select class="form-control" id="tahun-lulus" name="tahun_lulus_smu">
                      <option>2020</option>
                      <option>2021</option>
                    </select>
                  </div>
                  <div class="col-md-6 form-group mt-3 pr-0 pr-md-1">
                    <label for="asal-sekolah">Asal Sekolah</label>
                    <input type="text" class="form-control" id="asal-sekolah" placeholder="SMKN 1 GLAGAH" name="smu">
                  </div>
                </div>
                <div class="alamat_calonMahasiswa">
                  <div class="row mt-4-5">
                    <div class="col">
                      <h2 class="card_title">Alamat Calon Peserta Didik</h2>
                    </div>
                  </div>
                  <hr class="my-4">
                  <div class="form-row">
                    <div class="col-12 p-0 form-group">
                      <label for="alamat">Alamat Lengkap</label>
                      <input type="text" class="form-control" id="alamat" placeholder="Alamat Calon Peseta Didik" name="alamat">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-4 form-group mt-3">
                      <label for="provinsi">Provinsi</label>
                      <select class="form-control" id="provinsi">
                      </select>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                      <label for="kota">Kabupaten / Kota</label>
                      <select class="form-control" id="kabupaten">
                      </select>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                      <label for="kecamatan">Kecamatan</label>
                      <select class="form-control" id="kecamatan" name="kecamatan">
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 form-group mt-3">
                      <label for="kelurahan">Desa / Kelurahan</label>
                      <select class="form-control" id="kelurahan" name="kelurahan">
                      </select>
                    </div>
                    <div class="col-md-6 form-group mt-3 pr-0 pr-md-1">
                      <label for="kode-pos">Kode Pos</label>
                      <input type="text" class="form-control" id="kode-pos" placeholder="65122">
                    </div>
                  </div>
                  <a class="btn btn-success btnNext rounded-sm mt-4-5 w-100 text-white" id="submit-1">Selanjutnya</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- TAB UNGGAH BERKAS --}}
  <div class="tab-pane fade" id="pills-unggahBerkas" role="tabpanel" aria-labelledby="pills-unggahBerkas-tab">
    <div class="row">
      <div class="col-xl-12">
        <div class="tab-body">
          <div class="card shadow mt-0 padding--big card_form active">
            <div class="card-header p-0">
              <div class="row align-items-center">
                <div class="col">
                  <h2 class="mb-0">Foto Data Diri</h2>
                </div>
              </div>
              <hr class="my-4">
            </div>
            <div class="card-body p-0">
              <div class="form-row table-responsive">
                <table class="table align-items-center table-borderless table-flush table-hover">
                  <thead class="table-header">
                    <tr>
                      <th scope="col" class="text-center px-2">No</th>
                      <th scope="col" style="width: 58%">Keterangan</th>
                      <th scope="col" class="text-center px-2">Tipe</th>
                      <th scope="col">File</th>
                      <th scope="col" class="text-center">Status</th>
                    </tr>
                  </thead>
                  <tbody class="table-body table-body-lg">

                    @php
                      $arr_berkas = [
                        [
                          'title' => 'Foto Calon Peserta Didik',
                          'tipe' => 'Gambar',
                          'berkas' => 'foto',
                        ],
                        [
                          'title' => 'Foto Ijazah',
                          'tipe' => 'Gambar',
                          'berkas' => 'ijasah',
                        ],
                        [
                          'title' => 'Surat Pernyataan Taat Peraturan',
                          'tipe' => 'Gambar',
                          'berkas' => 'foto_peraturan',
                        ],
                      ];
                      for ($i=1; $i < 7; $i++) { 
                        $arr_berkas[] = [
                          'title' => 'Rapor Semester '.$i,
                          'tipe' => 'Gambar',
                          'berkas' => 'rapor_smtr'.$i,
                        ];
                      }
                    @endphp
                    @foreach ($arr_berkas as $key => $el)
                    <tr>
                      <td class="text-center px-2">{{$key+1}}</td>
                      <td>
                        <h2 class="mb-0">{{ $el['title'] }}</h2>
                      </td>
                      <td class="text-center px-2">{{ $el['tipe'] }}</td>
                      <td>
                        <span onclick="show_modal('{{ $el['berkas'] }}')" style="cursor: pointer;">
                          <i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-cloud-upload"></i>
                          <span class="text-primary">Unggah Dokumen</span>
                        </span>
                      </td>
                      <td class="text-center" id="status_{{ $el['berkas'] }}">
                        <i class="iconify status-rejected" data-icon="bi:x-circle-fill"></i>
                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection

@section('js')
<script>
  const arr_berkas = [ 'foto', 'ijasah', 'foto_peraturan', 'rapor_smtr1', 'rapor_smtr2', 'rapor_smtr3', 'rapor_smtr4', 'rapor_smtr5', 'rapor_smtr6' ];
  $.ajax({
    url: url_api+"/pendaftar",
    type: 'get',
    dataType: 'json',
    data: {},
    headers: {
      'token': localStorage.getItem('pmb')
    },
    beforeSend: function(text) {
    },
    success: function(res) {
      $.each(res.data, function(index, item) {
        if($("[name='"+index+"']").length != 0){
          if (index == 'tgllahir') {
            $("[name='"+index+"']").datepicker('setDate', new Date(item));
          } else{
            $("[name='"+index+"']").val(item)
          } 
        } else if (arr_berkas.includes(index) && item) {
          $('#status_'+index).html(`<i class="iconify status-success" data-icon="fluent:clock-20-filled"></i>`)
        }
      });
    }
  });

  $("#submit-1").on('click', function() {
    $.ajax({
      url: url_api+"/pendaftar/update",
      type: 'post',
      dataType: 'json',
      data: new FormData($('.form_data')[0]),
      headers: {
        'token': localStorage.getItem('pmb')
      },
      processData: false,
      contentType: false,
      beforeSend: function(text) {
      },
      success: function(res) {
      }
    });
  });

  $(document).ready(function(){
    $.ajax({
      url: url_api+"/list-provinsi",
      dataType: 'json',
      beforeSend: function(text) {
      },
      success: function(res) {
        var selector = '#provinsi'
        if (res.status=="success") {
          var html_opsi = '';
          html_opsi = '<option value="">Pilih Provinsi</option>'
          $(selector).append(html_opsi);
          $.each(res.data,function (key,row) {
            html_opsi = `<option value="${row.id_provinsi}">${row.nama}</option>`;
              $(selector).append(html_opsi);
          })
        }
      }
    });

    $(".date-input").datepicker({
      format: "dd MM yyyy",
    });

    $(".btnNext").click(function () {
      $(".nav-pills .active").parent().next("li").find("a").trigger("click");
    });

    $(".btnPrevious").click(function () {
      $(".nav-pills .active").parent().prev("li").find("a").trigger("click");
    });
  })

  $(document).on('change', '#provinsi', function (e) {
    $('#kecamatan').empty()
    $('#kelurahan').empty()
    var id_provinsi = e.target.value
    var selector = '#kabupaten'
    $(selector).empty()
    $(selector).empty()
    $.ajax({
      url: url_api+"/list-kabupaten/"+id_provinsi,
      dataType: 'json',
      beforeSend: function(text) {
      },
      success: function(res) {
        if (res.status=="success") {
          var html_opsi = '';
          html_opsi = '<option value="">Pilih Kabupaten</option>'
          $(selector).append(html_opsi);
          $.each(res.data,function (key,row) {
            html_opsi = `<option value="${row.id_kabupaten}">${row.nama}</option>`;
              $(selector).append(html_opsi);
          })
        }
      }
    });
  })

  $(document).on('change', '#kabupaten', function (e) {
    $('#kelurahan').empty()
    var id_kabupaten = e.target.value
    var selector = '#kecamatan'
    $(selector).empty()
    $.ajax({
      url: url_api+"/list-kecamatan/"+id_kabupaten,
      dataType: 'json',
      beforeSend: function(text) {
      },
      success: function(res) {
        if (res.status=="success") {
          var html_opsi = '';
          html_opsi = '<option value="">Pilih Kecamatan</option>'
          $(selector).append(html_opsi);
          $.each(res.data,function (key,row) {
            html_opsi = `<option value="${row.id_kecamatan}">${row.nama}</option>`;
              $(selector).append(html_opsi);
          })
        }
      }
    });
  })

  $(document).on('change', '#kecamatan', function (e) {
    var id_kecamatan = e.target.value
    var selector = '#kelurahan'
    $(selector).empty()
    $.ajax({
      url: url_api+"/list-kelurahan/"+id_kecamatan,
      dataType: 'json',
      beforeSend: function(text) {
      },
      success: function(res) {
        if (res.status=="success") {
          var html_opsi = '';
          html_opsi = '<option value="">Pilih Kelurahan</option>'
          $(selector).append(html_opsi);
          $.each(res.data,function (key,row) {
            html_opsi = `<option value="${row.id_kelurahan}">${row.nama}</option>`;
              $(selector).append(html_opsi);
          })
        }
      }
    });
  })

  /** browse file */
  const inputFile = document.getElementById("file");
  const customBtn = document.getElementById("custom-btn");
  const customText = document.getElementById("custom-text");
  document.getElementById('trigger-browse').addEventListener('click', function () {
    inputFile.click();
  })
  customBtn.addEventListener("click", function () {
    inputFile.click();
  });
  inputFile.addEventListener("change", function () {
    if (inputFile.value) {
      let fileName = inputFile.value.match(/[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/)[0];
      customText.innerHTML = fileName;
    } else {
      customText.innerHTML = "tidak ada file dipilih";
    }
  });
  const formWrapper = document.querySelector('.detail_dokumen');
  const formUpload = document.querySelector(".detail_dokumen form");
  function showfilename(){
    formUpload.classList.remove('d-none');
    formWrapper.classList.remove('justify-content-center');
    formWrapper.classList.add('justify-content-between');
  }
  /** end browse file */

  function show_modal(berkas) {
    $('#file').val("");
    customText.innerHTML = "tidak ada file dipilih";
    $('#btn-upload').attr("onclick", `send('${berkas}')`);
    $('#daftarUlang_unggahDokumen').modal('show');
  }

  function send(berkas) {
    const fileupload = $('#file').prop('files')[0];
    if (fileupload && fileupload!="" && berkas) {
      let formData = new FormData();
      formData.append('nama', berkas);
      formData.append('file', fileupload);
      $.ajax({
        type: 'POST',
        url: url_api+"/pendaftar/update-berkas",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        headers: {
          'token': localStorage.getItem('pmb')
        },
        success: function (res) {
          window.location.reload();
        },
        error: function () {
          alert("Data Gagal Diupload");
        }
      });
    }
  }
</script>
@endsection