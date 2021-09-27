@extends('layouts.mainAdmin')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small card_step">
        <h2 class="mb-2">Data Mahasiswa</h2>
        <hr class="d-none d-md-block">
        {{-- TABS NAVIGATION --}}
        <ul class="nav nav-pills row pr-3 pr-md-0" id="pills-tab" role="tablist">
          <li class="nav-item col-md-4 mt-3 mt-md-0" role="presentation">
            <a class="nav-link active" id="pills-dataAkademik-tab" data-toggle="pill" href="#pills-dataAkademik"
              role="tab" aria-controls="pills-dataAkademik" aria-selected="true">Data Akademik</a>
          </li>
          <li class="nav-item col-md-4 mt-sm-3 mt-md-0" role="presentation">
            <a class="nav-link" id="pills-dataDiri-tab" data-toggle="pill" href="#pills-dataDiri" role="tab"
              aria-controls="pills-dataDiri" aria-selected="false">Data Diri</a>
          </li>
          <li class="nav-item col-md-4 mt-sm-3 mt-md-0" role="presentation">
            <a class="nav-link" id="pills-dataOrtu-tab" data-toggle="pill" href="#pills-dataOrtu" role="tab"
              aria-controls="pills-dataOrtu" aria-selected="false">Data Ortu</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="tab-content" id="pills-tabContent">
    {{-- TAB DATA AKADEMIK --}}
    <div class="tab-pane fade show active" id="pills-dataAkademik" role="tabpanel"
      aria-labelledby="pills-dataAkademik-tab">
      <div class="row">
        <div class="col-xl-12">
          <div class="tab-body">
            <div class="card shadow mt-0 padding--big card_form active">
              <div class="card-header p-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h2 class="mb-0 mt-0">Data Pendidikan Mahasiswa</h2>
                  </div>
                </div>
                <hr class="my-4">
              </div>
              <div class="card-body p-0">
                <form class="form_data">
                  <div class="form-row">
                    <div class="col-md-5 form-group pr-md-4-5">
                      <label>NIM</label>
                      <input type="text" class="form-control" value="362055401002">
                    </div>
                    <div class="col-md-5 form-group mt-3 mt-md-0 px-md-3">
                      <label>Status</label>
                      <select class="form-control">
                        <option selected>Aktif</option>
                        <option>Tidak Aktif</option>
                      </select>
                    </div>
                    <div class="col-md-2 form-group mt-3 mt-md-0 pl-md-4-5">
                      <label>Jenjang</label>
                      <select class="form-control">
                        <option selected>D3</option>
                        <option>D4</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-5 form-group mt-3 pr-md-4-5">
                      <label>Program Studi</label>
                      <select class="form-control">
                        <option selected>Teknik Informatika</option>
                        <option>Teknik Sipil</option>
                      </select>
                    </div>
                    <div class="col-md-5 form-group mt-3 px-md-3">
                      <label>Dosen Wali</label>
                      <input type="text" class="form-control" value="Eka Mistiko Rini">
                    </div>
                    <div class="col-md-2 form-group mt-3 pl-md-4-5">
                      <label>Kelas</label>
                      <input type="text" class="form-control" value="1A">
                    </div>
                  </div>
                  <div class="form_action mt-4-5">
                    <a class="btn btn-info btnNext rounded-sm">Selanjutnya</a>
                    <button type="submit" class="btn btn-primary rounded-sm">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- TAB DATA DIRI --}}
    <div class="tab-pane fade" id="pills-dataDiri" role="tabpanel" aria-labelledby="pills-dataDiri-tab">
      <div class="row">
        <div class="col-xl-12">
          <div class="tab-body">
            <div class="card shadow mt-0 padding--big card_form active">
              <div class="card-header p-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h2 class="mb-0 mt-0">Data Diri Mahasiswa</h2>
                  </div>
                </div>
                <hr class="my-4">
              </div>
              <div class="card-body p-0">
                <form class="form_data">
                  <div class="form-row">
                    <div class="col-md-4 form-group">
                      <label for="nama-siswa">Nama Siswa</label>
                      <input type="text" class="form-control" id="nama-siswa" value="Egi Sabta Hero">
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                      <label for="nik" class="text-nowrap">Nomor Induk Kependudukan</label>
                      <input type="text" class="form-control" id="nik" value="5171042601020003">
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0">
                      <label for="kewarganegaraan">Kewarganegaraan</label>
                      <select class="form-control" id="kewarganegaraan">
                        <option selected>WNI</option>
                        <option>WNA</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-4 form-group mt-3">
                      <label for="tempat-lahir">Tempat Lahir</label>
                      <input type="text" class="form-control" id="tempat-lahir" value="Kota Banyuwangi">
                    </div>
                    <div class="col-md-4 form-group mt-3">
                      <label>Tanggal Lahir</label>
                      <div class="d-flex align-items-center date_picker w-100 ">
                        <input id="txtDate1" type="text" class="form-control date-input" value="26 January 2002"
                          readonly />
                        <label class="input-group-btn" for="txtDate1">
                          <span class="date_button">
                            <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                          </span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                      <label for="urutan-anak">Anak ke</label>
                      <input type="text" class="form-control" id="urutan-anak" value="1">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-4 form-group mt-3">
                      <label for="jenis-kelamin">Jenis Kelamin</label>
                      <select class="form-control" id="jenis-kelamin">
                        <option selected>Laki-Laki</option>
                        <option>Perempuan</option>
                      </select>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                      <label for="agama">Agama</label>
                      <select class="form-control" id="agama">
                        <option selected>Islam</option>
                        <option>Katolik</option>
                        <option>Kristen</option>
                        <option>Hindu</option>
                        <option>Buddha</option>
                        <option>Konghucu</option>
                      </select>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                      <label for="golongan-darah">Golongan darah</label>
                      <select class="form-control" id="golongan-darah">
                        <option>A</option>
                        <option>B</option>
                        <option>AB</option>
                        <option selected>O</option>
                      </select>
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
                    <div class="col-md-6 form-group mt-3">
                      <label for="asal-sekolah">Sekolah Asal</label>
                      <input type="text" class="form-control" id="asal-sekolah" value="SMKN 1 GLAGAH">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 form-group mt-3">
                      <label for="prestasi-olahraga">Prestasi Olahraga</label>
                      <input type="text" class="form-control" id="prestasi-olahraga" value="-"">
                    </div>
                    <div class=" col-md-6 form-group mt-3">
                      <label for="beasiswa">Beasiswa</label>
                      <select class="form-control" id="beasiswa">
                        <option selected>-</option>
                        <option>Jalur Mandiri</option>
                        <option>Jalur Prestasi</option>
                      </select>
                    </div>
                  </div>
                </form>
                <div class="alamat_mahasiswa">
                  <div class="row mt-4-5">
                    <div class="col">
                      <h2 class="card_title">Alamat Mahasiswa</h2>
                    </div>
                  </div>
                  <hr class="my-4">
                  <form class="form_data">
                    <div class="form-row">
                      <div class="col-12 p-0 form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <input type="text" class="form-control" id="alamat" value="Jl.masjid baitul abror ">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 form-group mt-3">
                        <label for="kelurahan">Desa / Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" value="Cantuk Lor">
                      </div>
                      <div class="col-md-4 form-group mt-3">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" value="Singojuruh">
                      </div>
                      <div class="col-md-4 form-group mt-3">
                        <label for="kota">Kabupaten / Kota</label>
                        <input type="text" class="form-control" id="kota" value="Kabupaten Banyuwangi">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 form-group mt-3">
                        <label for="provinsi">Provinsi</label>
                        <select class="form-control" id="provinsi">
                          <option selected>Jawa Timur</option>
                          <option>Jawa Barat</option>
                          <option>Jawa Tengah</option>
                        </select>
                      </div>
                      <div class="col-md-4 form-group mt-3">
                        <label for="kode-pos">Kode Pos</label>
                        <input type="text" class="form-control" id="kode-pos" value="68464">
                      </div>
                      <div class="col-md-4 form-group mt-3">
                        <label for="nomor-telepon">Nomor Telepon</label>
                        <input type="text" class="form-control" id="nomor-telepon" value="085746614391">
                      </div>
                    </div>
                    <div class="form_action mt-4-5">
                      <a class="btn btn-info btnNext rounded-sm">Selanjutnya</a>
                      <button type="submit" class="btn btn-primary rounded-sm">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- TAB DATA ORTU --}}
    <div class="tab-pane fade" id="pills-dataOrtu" role="tabpanel" aria-labelledby="pills-dataOrtu-tab">
      <div class="row">
        <div class="col-xl-12">
          <div class="tab-body">
            <div class="card shadow mt-0 padding--big card_form active">
              <div class="card-header p-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h2 class="mb-0 mt-0">Data Orang Tua</h2>
                  </div>
                </div>
                <hr class="my-4">
              </div>
              <div class="card-body p-0">
                <form class="form_data">
                  <div class="form-row">
                    <div class="col-md-4 form-group">
                      <label>Nama Ayah</label>
                      <input type="text" class="form-control" value="Hapipi"">
                    </div>
                    <div class=" col-md-4 form-group mt-3 mt-md-0">
                      <label>Pekerjaan Ayah</label>
                      <input type="text" class="form-control" value="Buruh">
                    </div>
                    <div class="col-md-4 form-group mt-3 mt-md-0 input_penghasilan">
                      <label>Penghasilan Ayah</label>
                      <input type="text" class="form-control" value="150.000">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-4 form-group mt-3">
                      <label>Tempat Lahir Ayah</label>
                      <input type="text" class="form-control" value="Kota Banyuwangi">
                    </div>
                    <div class="col-md-4 form-group mt-3">
                      <label>Tanggal Lahir Ayah</label>
                      <div class="d-flex align-items-center date_picker w-100 ">
                        <input id="txtDate2" type="text" class="form-control date-input" value="11 January 1965"
                          readonly />
                        <label class="input-group-btn" for="txtDate2">
                          <span class="date_button">
                            <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                          </span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                      <label>Pendidikan Ayah</label>
                      <input type="text" class="form-control" value="-">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-4 form-group mt-3">
                      <label>Nama Ibu</label>
                      <input type="text" class="form-control" value="Suci Cahyanti">
                    </div>
                    <div class=" col-md-4 form-group mt-3">
                      <label>Pekerjaan Ibu</label>
                      <input type="text" class="form-control" value="Ibu Rumah Tangga">
                    </div>
                    <div class="col-md-4 form-group mt-3 input_penghasilan">
                      <label>Penghasilan Ibu</label>
                      <input type="text" class="form-control" value="0">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-4 form-group mt-3">
                      <label>Tempat Lahir Ibu</label>
                      <input type="text" class="form-control" value="Kota Banyuwangi">
                    </div>
                    <div class="col-md-4 form-group mt-3">
                      <label>Tanggal Lahir Ibu</label>
                      <div class="d-flex align-items-center date_picker w-100 ">
                        <input id="txtDate3" type="text" class="form-control date-input" value="21 September 1970"
                          readonly />
                        <label class="input-group-btn" for="txtDate3">
                          <span class="date_button">
                            <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                          </span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                      <label>Pendidikan Ibu</label>
                      <input type="text" class="form-control" value="-">
                    </div>
                  </div>
                </form>
                <div class="alamat_ortu">
                  <div class="row mt-4-5">
                    <div class="col">
                      <h2 class="card_title">Alamat Orang Tua</h2>
                    </div>
                  </div>
                  <hr class="my-4">
                  <form class="form_data">
                    <div class="form-row">
                      <div class="col-12 p-0 form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <input type="text" class="form-control" id="alamat" value="Jl.masjid baitul abror ">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 form-group mt-3">
                        <label for="kelurahan">Desa / Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" value="Cantuk Lor">
                      </div>
                      <div class="col-md-4 form-group mt-3">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" value="Singojuruh">
                      </div>
                      <div class="col-md-4 form-group mt-3">
                        <label for="kota">Kabupaten / Kota</label>
                        <input type="text" class="form-control" id="kota" value="Kabupaten Banyuwangi">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-4 form-group mt-3">
                        <label for="provinsi">Provinsi</label>
                        <select class="form-control" id="provinsi">
                          <option selected>Jawa Timur</option>
                          <option>Jawa Barat</option>
                          <option>Jawa Tengah</option>
                        </select>
                      </div>
                      <div class="col-md-4 form-group mt-3">
                        <label for="kode-pos">Kode Pos</label>
                        <input type="text" class="form-control" id="kode-pos" value="68464">
                      </div>
                      <div class="col-md-4 form-group mt-3">
                        <label for="nomor-telepon">Nomor Telepon</label>
                        <input type="text" class="form-control" id="nomor-telepon" value="085746614391">
                      </div>
                    </div>
                    <div class="form_action mt-4-5">
                      <a class="btn btn-info btnPrevious rounded-sm">Sebelumnya</a>
                      <button type="submit" class="btn btn-primary rounded-sm">Simpan</button>
                    </div>
                  </form>
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