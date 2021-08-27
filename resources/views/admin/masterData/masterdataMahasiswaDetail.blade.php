@extends('layouts.mainAdmin')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small card_step">
        <h2>Data Mahasiswa</h2>
        <hr class="d-none d-md-block">
        <div class="form-row tab-header">
          <div class="col-md-4 pr-md-2">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">1</div>
              </div>
              <input type="text" class="form-control" readonly value="Data Akademik">
            </div>
          </div>

          <div class="col-md-4 mt-3 mt-md-0 px-md-1">
            <div class="input-group mb-2 active">
              <div class="input-group-prepend">
                <div class="input-group-text">2</div>
              </div>
              <input type="text" class="form-control" readonly value="Data Diri">
            </div>
          </div>

          <div class="col-md-4 mt-3 mt-md-0 pl-md-2">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">3</div>
              </div>
              <input type="text" class="form-control" readonly value="Data Orang Tua">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
        aria-controls="pills-home" aria-selected="true">Home</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
        aria-controls="pills-profile" aria-selected="false">Profile</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
        aria-controls="pills-contact" aria-selected="false">Contact</a>
    </li>
  </ul>



  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      HOME
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
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
              </div>
              <hr class="my-4">
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
                    <div class="d-flex align-items-center date_picker">
                      <input id="txtDate" type="text" class="form-control date-input " value="26 January 2002"
                        readonly />
                      <label class="input-group-btn" for="txtDate">
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

              <div class="card-header p-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h2 class="mb-0 mt-4-5">Alamat Mahasiswa</h2>
                  </div>
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
                  <button
                    class="btn btn-info text-primary font-weight-bold button_selanjutnya rounded-sm">Selanjutnya</button>
                  <button type="submit" class="btn btn-primary rounded-sm">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
      CONTACT
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

  // let tabHeader = document.querySelector(".tab-header");
  // let tabBody = document.getElementsByClassName("tab-body")[0];
  // let inputGroup = tabHeader.getElementsByClassName("input-group");
  // let formControl = document.getElementsByClassName('form-control');

  // for (let i = 0; i < inputGroup.length; i++) {
  //   inputGroup[i].style.cursor="pointer";
  //   formControl[i].style.cursor="pointer";
  //   inputGroup[i].addEventListener("click", function () {
  //         tabHeader
  //             .getElementsByClassName("active")[0]
  //             .classList.remove("active");
  //         inputGroup[i].classList.add("active");
  //         tabBody.getElementsByClassName("active")[0].classList.remove("active");
  //         tabBody.getElementsByClassName("card")[i].classList.add("active");
  //     });
  // }

  // const buttonSelanjutnya = document.querySelector('.button_selanjutnya');
  // const buttonSebelumnya = document.querySelector('.button_sebelumnya');
  // const card = document.getElementsByClassName('card_form');

  // buttonSelanjutnya.addEventListener("click", function(e){
  //   e.preventDefault();
  //   card[0].classList.remove('active');
  //   card[1].classList.add('active');
  //   inputGroup[0].classList.remove('active');
  //   inputGroup[1].classList.add('active');
  // })

  // buttonSebelumnya.addEventListener("click", function(e){
  //   e.preventDefault();
  //   card[0].classList.add('active');
  //   card[1].classList.remove('active');
  //   inputGroup[0].classList.add('active');
  //   inputGroup[1].classList.remove('active');
  // })
</script>
@endsection