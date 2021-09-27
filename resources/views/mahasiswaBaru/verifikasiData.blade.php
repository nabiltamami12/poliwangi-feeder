@extends('layouts.mainMaba')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
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
    <div class="tab-pane fade show active" id="pills-dataCalonPendaftar" role="tabpanel"
    aria-labelledby="pills-dataCalonPendaftar-tab">
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
              <form class="form_data">
                <div class="form-row">
                  <div class="col-md-6 form-group pr-md-2">
                    <label>Foto Calon Peserta Didik</label>
                    <div class="input_file">
                      <label for="file-input-foto">
                        <i class="iconify fileUpload-icon" data-icon="bx:bx-image-add"></i>
                      </label>
                    </div>
                    <input type="file" class="form-control-file" id="file-input-foto" name="foto" hidden>
                  </div>

                  <div class="col-md-6 form-group mt-3 mt-md-0 pr-0 pr-md-1 pl-md-2">
                    <label>Foto Ijazah</label>
                    <div class="input_file">
                      <label for="file-input-ijazah">
                        <i class="iconify fileUpload-icon" data-icon="bx:bx-image-add"></i>
                      </label>
                    </div>
                    <input type="file" class="form-control-file" id="file-input-ijazah" name="ijasah" hidden>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-12 form-group p-0 mt-4">
                    <label>Surat Pernyataan Taat Peraturan</label>
                    <div class="input_file">
                      <label for="file-input-peraturan">
                        <i class="iconify fileUpload-icon" data-icon="bx:bx-image-add"></i>
                      </label>
                    </div>
                    <input type="file" class="form-control-file" id="file-input-peraturan" name="foto_peraturan" hidden>
                  </div>
                </div>
                <div class="form_action mt-4">
                  <a class="btn btn-info btnPrevious rounded-sm">Sebelumnya</a>
                  <button type="submit" class="btn btn-primary rounded-sm" id="submit-2">Submit</button>
                </div>
              </form>
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
          }else if (index == 'foto'){
            $('#file-input-foto').parent().find('.input_file').css(
              {
                'backgroundImage': 'url({{url("/")}}/pendaftar/'+item+')',
                'backgroundSize': 'cover',
                'backgroundPosition': 'center'
              }
              )
          }else if (index == 'foto_peraturan'){
            $('#file-input-peraturan').parent().find('.input_file').css(
              {
                'backgroundImage': 'url({{url("/")}}/pendaftar/'+item+')',
                'backgroundSize': 'cover',
                'backgroundPosition': 'center'
              }
              )
          }else if (index == 'ijasah'){
            $('#file-input-ijazah').parent().find('.input_file').css(
              {
                'backgroundImage': 'url({{url("/")}}/pendaftar/'+item+')',
                'backgroundSize': 'cover',
                'backgroundPosition': 'center'
              }
              )
          }else{
            $("[name='"+index+"']").val(item)
          } 
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

  $("#submit-2").on('click', function(e) {
    e.preventDefault();
    $.ajax({
      url: url_api+"/pendaftar/update",
      type: 'post',
      dataType: 'json',
      data: new FormData($('.form_data')[1]),
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

</script>
@endsection