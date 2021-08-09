@extends('layouts.mainMaba')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="tahapan">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small card_step">
        <h2>Tahapan</h2>
        <hr class="d-none d-md-block">
        <div class="row tab-header">
          <div class="col-12 col-md-6 mt-3 mt-md-0">
            <div class="input-group mb-2 active">
              <div class="input-group-prepend">
                <div class="input-group-text">1</div>
              </div>
              <input type="text" class="form-control" readonly value="Data Calon Peserta Didik">
            </div>
          </div>

          <div class="col-12 col-md-6 mt-3 mt-md-0">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">2</div>
              </div>
              <input type="text" class="form-control" readonly value="Unggah Berkas">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12">
      <div class="tab-body">
        {{-- DATA CALON PESERTA DIDIK --}}
        <div class="card shadow mt-0 padding--big card-form active">
          <div class="card-header p-0 m-0  border-0">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="mb-0 mt-0">Identitas Calon Pendaftar</h2>
              </div>
            </div>
          </div>
          <hr class="my-4">
          <form class="form-identitas">
            <div class="form-row">
              <div class="col-md-4 form-group">
                <label for="nama-siswa">Nama Siswa</label>
                <input type="text" class="form-control" id="nama-siswa" placeholder="Nama Siswa">
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <label for="nik">Nomor Induk Kependudukan</label>
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
                  <input id="txtDate" type="text" class="form-control date-input cursor_default" value="23 Jul 2021"
                    readonly />
                  <label class="input-group-btn" for="txtDate">
                    <span class="date_button">
                      <span class="iconify" data-icon="bx:bx-calendar" data-inline="false"></span>
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
                <input type="text" class="form-control" id="asal-sekolah" placeholder="2">
              </div>
            </div>
          </form>

          <div class="card-header p-0 m-0  border-0">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="mb-0 mt-4-5">Alamat Calon Peserta Didik</h2>
              </div>
            </div>
          </div>
          <hr class="my-4">
          <form class="form-identitas">
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
            <button type="submit" class="btn btn-success w-100 mt-4-5 button_selanjutnya">Selanjutnya</button>
          </form>
        </div>

        {{-- UNGGAH BERKAS --}}
        <div class="card shadow mt-0 padding--big card-form">
          <div class="card-header p-0 m-0  border-0">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="mb-0 mt-0">Foto Data Diri</h2>
              </div>
            </div>
          </div>
          <hr class="my-4">
          <form class="form-berkas">
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label>Foto Calon Peserta Didik</label>
                <div class="input_file">
                  <label for="file-input-foto">
                    <span class="iconify fileUpload-icon" data-icon="bx:bx-image-add"></span>
                  </label>
                </div>
                <input type="file" class="form-control-file" id="file-input-foto">
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0 pr-0 pr-md-1">
                <label>Foto Ijazah</label>
                <div class="input_file">
                  <label for="file-input-ijazah">
                    <span class="iconify fileUpload-icon" data-icon="bx:bx-image-add"></span>
                  </label>
                </div>
                <input type="file" class="form-control-file" id="file-input-ijazah">
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-12 form-group p-0 mt-4">
                <label>Surat Pernyataan Taat Peraturan</label>
                <div class="input_file">
                  <label for="file-input-peraturan">
                    <span class="iconify fileUpload-icon" data-icon="bx:bx-image-add"></span>
                  </label>
                </div>
                <input type="file" class="form-control-file" id="file-input-peraturan">
              </div>
            </div>
            <div class="form_action mt-4">
              <button class="btn button_sebelumnya">Sebelumnya</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script>
  $(document).ready(function(){
    $("#txtDate").datepicker({
      format: "dd MM yyyy",
    });
  })

  // TABS TAHAPAN
  let tabHeader = document.querySelector(".tab-header");
  let tabBody = document.getElementsByClassName("tab-body")[0];
  let inputGroup = tabHeader.getElementsByClassName("input-group");
  let formControl = document.getElementsByClassName('form-control');

  for (let i = 0; i < inputGroup.length; i++) {
    inputGroup[i].style.cursor="pointer";
    formControl[i].style.cursor="pointer";
    inputGroup[i].addEventListener("click", function () {
          tabHeader
              .getElementsByClassName("active")[0]
              .classList.remove("active");
          inputGroup[i].classList.add("active");
          tabBody.getElementsByClassName("active")[0].classList.remove("active");
          tabBody.getElementsByClassName("card")[i].classList.add("active");
      });
  }

  const buttonSelanjutnya = document.querySelector('.button_selanjutnya');
  const buttonSebelumnya = document.querySelector('.button_sebelumnya');
  const card = document.getElementsByClassName('card-form');

  buttonSelanjutnya.addEventListener("click", function(e){
    e.preventDefault();
    card[0].classList.remove('active');
    card[1].classList.add('active');
    inputGroup[0].classList.remove('active');
    inputGroup[1].classList.add('active');
  })

  buttonSebelumnya.addEventListener("click", function(e){
    e.preventDefault();
    card[0].classList.add('active');
    card[1].classList.remove('active');
    inputGroup[0].classList.add('active');
    inputGroup[1].classList.remove('active');
  })
</script>
@endsection