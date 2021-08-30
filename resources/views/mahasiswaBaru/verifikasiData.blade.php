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
                    <h2 class="mb-0 mt-0">Identitas Calon Pendaftar</h2>
                  </div>
                </div>
              </div>
              <hr class="my-4">
              <form class="form_data">
                <div class="form-row">
                  <div class="col-md-4 form-group">
                    <label for="nama-siswa">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama-siswa" placeholder="Nama Siswa">
                  </div>
                  <div class="col-md-4 form-group mt-3 mt-md-0">
                    <label for="nik" class="text-nowrap">Nomor Induk Kependudukan</label>
                    <input type="text" class="form-control" id="nik" placeholder="NIK">
                  </div>
                  <div class="col-md-4 form-group mt-3 mt-md-0">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" id="nisn" placeholder="Nomor Induk Siswa Nasional">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 form-group mt-3">
                    <label for="tempat-lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat-lahir" placeholder="Kota Banyuwangi">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                    <label>Tanggal Lahir</label>
                    <div class="d-flex align-items-center date_picker">
                      <input id="txtDate" type="text" class="form-control date-input " value="23 Jul 2021" readonly />
                      <label class="input-group-btn" for="txtDate">
                        <span class="date_button">
                          <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                        </span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4 form-group mt-3">
                    <label for="urutan-anak">Anak ke</label>
                    <input type="text" class="form-control" id="urutan-anak" placeholder="1">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 form-group mt-3">
                    <label for="jenis-kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis-kelamin">
                      <option>Laki-Laki</option>
                      <option>Perempuan</option>
                    </select>
                  </div>
                  <div class="col-md-6 form-group pr-0 pr-md-1 mt-3">
                    <label for="saudara">Jumlah Saudara</label>
                    <input type="text" class="form-control" id="saudara" placeholder="2">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 form-group mt-3">
                    <label for="tahun-lulus">Tahun Lulus</label>
                    <select class="form-control" id="tahun-lulus">
                      <option>2020</option>
                      <option>2021</option>
                    </select>
                  </div>
                  <div class="col-md-6 form-group mt-3 pr-0 pr-md-1">
                    <label for="asal-sekolah">Asal Sekolah</label>
                    <input type="text" class="form-control" id="asal-sekolah" placeholder="SMKN 1 GLAGAH">
                  </div>
                </div>
              </form>

              <div class="card-header p-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h2 class="mb-0 mt-4-5">Alamat Calon Peserta Didik</h2>
                  </div>
                </div>
              </div>
              <hr class="my-4">
              <form class="form_data">
                <div class="form-row">
                  <div class="col-12 p-0 form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <input type="text" class="form-control" id="alamat" placeholder="Alamat Calon Peseta Didik">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 form-group mt-3">
                    <label for="kelurahan">Desa / Kelurahan</label>
                    <input type="text" class="form-control" id="kelurahan" placeholder="Nama Kelurahan">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" class="form-control" id="kecamatan" placeholder="Nama Kecamatan">
                  </div>
                  <div class="col-md-4 form-group mt-3">
                    <label for="kota">Kabupaten / Kota</label>
                    <input type="text" class="form-control" id="kota" placeholder="Kota Banyuwangi">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6 form-group mt-3">
                    <label for="provinsi">Provinsi</label>
                    <select class="form-control" id="provinsi">
                      <option>Jawa Timur</option>
                      <option>Jawa Barat</option>
                    </select>
                  </div>
                  <div class="col-md-6 form-group mt-3 pr-0 pr-md-1">
                    <label for="kode-pos">Kode Pos</label>
                    <input type="text" class="form-control" id="kode-pos" placeholder="65122">
                  </div>
                </div>
                <a class="btn btn-success btnNext rounded-sm mt-4-5 w-100 text-white">Selanjutnya</a>
              </form>
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
                    <h2 class="mb-0 mt-0">Foto Data Diri</h2>
                  </div>
                </div>
              </div>
              <hr class="my-4">

              <form class="form_data">
                <div class="form-row">
                  <div class="col-md-6 form-group pr-md-2">
                    <label>Foto Calon Peserta Didik</label>
                    <div class="input_file">
                      <label for="file-input-foto">
                        <i class="iconify fileUpload-icon" data-icon="bx:bx-image-add"></i>
                      </label>
                    </div>
                    <input type="file" class="form-control-file" id="file-input-foto" hidden>
                  </div>

                  <div class="col-md-6 form-group mt-3 mt-md-0 pr-0 pr-md-1 pl-md-2">
                    <label>Foto Ijazah</label>
                    <div class="input_file">
                      <label for="file-input-ijazah">
                        <i class="iconify fileUpload-icon" data-icon="bx:bx-image-add"></i>
                      </label>
                    </div>
                    <input type="file" class="form-control-file" id="file-input-ijazah" hidden>
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
                    <input type="file" class="form-control-file" id="file-input-peraturan" hidden>
                  </div>
                </div>
                <div class="form_action mt-4">
                  <a class="btn btn-info btnPrevious rounded-sm">Sebelumnya</a>
                  <button type="submit" class="btn btn-primary rounded-sm">Submit</button>
                </div>
              </form>
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
  $(document).ready(function(){
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
</script>
@endsection