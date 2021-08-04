@extends('layouts.mainMala')

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
          <div class="col-12 col-md-4 mt-3 mt-md-0">
            <div class="input-group mb-2 active">
              <div class="input-group-prepend">
                <div class="input-group-text">1</div>
              </div>
              <input type="text" class="form-control" readonly value="Data Calon Peserta Didik">
            </div>
          </div>

          <div class="col-12 col-md-4 mt-3 mt-md-0">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">2</div>
              </div>
              <input type="text" class="form-control" readonly value="Data Orang Tua">
            </div>
          </div>

          <div class="col-12 col-md-4 mt-3 mt-md-0">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">3</div>
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
          <div class="card-header p-0 m-0 rounded-0 border-0">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="mb-0 mt-0">Identitas Calon Peserta Didik</h2>
              </div>
            </div>
          </div>
          <hr class="mt">
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
              <div class="col-md-4 form-group">
                <label for="tempat-lahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat-lahir" placeholder="Kota Banyuwangi">
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <label for="tanggal-lahir">Tanggal Lahir</label>
                <input class="form-control" type="date" value="2000-11-23" id="tanggal-lahir">
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <label for="anak">Anak ke</label>
                <input type="text" class="form-control" id="anak" placeholder="1">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="jenis-kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis-kelamin">
                  <option>Laki-Laki</option>
                  <option>Perempuan</option>
                </select>
              </div>
              <div class="col-md-6 pr-0 pr-md-1 mt-3 mt-md-0 form-group">
                <label for="saudara">Jumlah Saudara</label>
                <input type="text" class="form-control" id="saudara" placeholder="2">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="tahun-lulus">Tahun Lulus</label>
                <select class="form-control" id="tahun-lulus">
                  <option>2020</option>
                  <option>2021</option>
                </select>
              </div>
              <div class="col-md-6 mt-3 pr-0 pr-md-1 mt-md-0 form-group">
                <label for="asal-sekolah">Asal Sekolah</label>
                <input type="text" class="form-control" id="asal-sekolah" placeholder="2">
              </div>
            </div>
          </form>
          <div class="card-header p-0 m-0 rounded-0 border-0">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="mb-0">Alamat Calon Peserta Didik</h2>
              </div>
            </div>
          </div>
          <hr class="mt">
          <form class="form-identitas">
            <div class="form-row">
              <div class="col-12 p-0 form-group">
                <label for="alamat">Alamat Lengkap</label>
                <input type="text" class="form-control" id="alamat" placeholder="Alamat Calon Peseta Didik">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 form-group">
                <label for="kelurahan">Desa / Kelurahan</label>
                <input type="text" class="form-control" id="kelurahan" placeholder="Nama Kelurahan">
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" placeholder="Nama Kecamatan">
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <label for="kota">Kabupaten / Kota</label>
                <input type="text" class="form-control" id="kota" placeholder="Kota Banyuwangi">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="provinsi">Provinsi</label>
                <select class="form-control" id="provinsi">
                  <option>Jawa Timur</option>
                  <option>Jawa Barat</option>
                </select>
              </div>
              <div class="col-md-6 mt-3 mt-md-0 form-group pr-0 pr-md-1">
                <label for="kode-pos">Kode Pos</label>
                <input type="text" class="form-control" id="kode-pos" placeholder="65122">
              </div>
            </div>
          </form>
          <div class="row submit justify-content-end align-items-center">
            <button type="submit" class="btn btn--blue">Simpan</button>
          </div>
        </div>

        {{-- DATA ORANG TUA --}}
        <div class="card shadow mt-0 padding--big card-form">
          <div class="card-header p-0 m-0 rounded-0 border-0">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="mb-0 mt-0">Data Ayah</h2>
              </div>
            </div>
          </div>
          <hr class="mt">
          <form class="form-identitas">
            <div class="form-row">
              <div class="col-md-4 form-group">
                <label for="nama-ayah">Nama Ayah</label>
                <input type="text" class="form-control" id="nama-ayah" placeholder="Nama Ayah">
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <label for="tempat-lahir-ayah">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat-lahir-ayah" placeholder="Kota Banyuwangi">
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <label for="tanggal-lahir-ayah">Tanggal Lahir</label>
                <input class="form-control" type="date" value="2000-11-23" id="tanggal-lahir">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 form-group">
                <label for="pekerjaan-ayah">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan-ayah" placeholder="PNS">
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <label for="email-ayah">Email</label>
                <input type="text" class="form-control" id="email-ayah" placeholder="emailayah@gmail.com">
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <label for="telepon-ayah">Nomor Telepon</label>
                <input type="text" class="form-control" id="telepon-ayah" placeholder="081248975812">
              </div>
            </div>
          </form>
          <div class="card-header p-0 m-0 rounded-0 border-0">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="mb-0">Data Ibu</h2>
              </div>
            </div>
          </div>
          <hr class="mt">
          <form class="form-identitas">
            <div class="form-row">
              <div class="col-md-4 form-group">
                <label for="nama-ibu">Nama Ibu</label>
                <input type="text" class="form-control" id="nama-ibu" placeholder="Nama Ayah">
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <label for="tempat-lahir-ibu">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat-lahir-ibu" placeholder="Kota Banyuwangi">
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <label for="tanggal-lahir-ibu">Tanggal Lahir</label>
                <input class="form-control" type="date" value="2000-11-23" id="tanggal-lahir">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 form-group">
                <label for="pekerjaan-ibu">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan-ibu" placeholder="PNS">
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <label for="email-ibu">Email</label>
                <input type="text" class="form-control" id="email-ibu" placeholder="emailibu@gmail.com">
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <label for="telepon-ibu">Nomor Telepon</label>
                <input type="text" class="form-control" id="telepon-ibu" placeholder="081248975812">
              </div>
            </div>
          </form>
          <div class="row submit justify-content-end align-items-center">
            <button type="submit" class="btn btn--blue">Simpan</button>
          </div>
        </div>

        {{-- UNGGAH BERKAS --}}
        <div class="card shadow mt-0 padding--big card-form">
          <div class="card-header p-0 m-0 rounded-0 border-0">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="mb-0 mt-0">Unggah Berkas</h2>
              </div>
            </div>
          </div>
          <hr class="mt">

          <form class="form-berkas">
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="foto-siswa">Foto Calon Peserta Didik</label>
                <div class="input-foto-siswa">
                  <label for="file-input-foto">
                    <span class="iconify fileUpload-icon" data-icon="bx:bx-image-add" data-inline="true"></span>
                  </label>
                </div>
                <input type="file" class="form-control-file" id="file-input-foto">
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0 pr-0 pr-md-1">
                <label for="foto-ijazah">Foto Ijazah</label>
                <div class="input-foto-ijazah">
                  <label for="file-input-ijazah">
                    <span class="iconify fileUpload-icon" data-icon="bx:bx-image-add" data-inline="true"></span>
                  </label>
                </div>
                <input type="file" class="form-control-file" id="file-input-ijazah">
              </div>
            </div>
          </form>
          <div class="row submit justify-content-end align-items-center">
            <button type="submit" class="btn btn--blue">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script>
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
</script>

@endsection