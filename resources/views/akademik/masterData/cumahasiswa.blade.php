@extends('layouts.main')

@section('content')

  <!-- Header -->
  <header class="header"></header>

  <!-- Page content -->
  <section class="page-content container-fluid" id="akademik_datajurusan">
    <div class="row">
      <div class="col-xl-12">
        {{-- <div class="card shadow padding--small card_step">
          <hr class="d-none d-md-block">
          <div class='tab-buttons'>
            <span class='content1'>Biodata Diri</span>
            <span class='content2'>Alamat Mahasiswa</span>
            <span class='content3'>Data Orang Tua</span>
            <span class='content4'>Sekolah Asal</span>
          </div>
        </div> --}}

        <div class="card shadow padding--small tab-content">
          <form id="form_cu" class="form-input mt-0">
            <div class="content form-row content1" style="margin-top: 1rem;">
              <div class="card-header p-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h2 class="mb-0">{{ $id == null ? 'TAMBAH' : 'UBAH' }} IDENTITAS MAHASISWA</h2>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-12">
                <hr class="mt" />
              </div>
              <input type="hidden" id="nomor" name="nomor">
              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Nama Siswa</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label>Status</label>
                  <select class="form-control" id="status" name="status" required>

                  </select>
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label>Program Studi</label>
                  <select class="form-control" id="program_studi" name="program_studi" required>

                  </select>
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label>Kelas</label>
                  <select class="form-control" id="kelas" name="kelas" required>

                  </select>
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label>Dosen Wali</label>
                  <select class="form-control" id="dosen_wali" name="dosen_wali" required>

                  </select>
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">NIM</label>
                  <input type="text" class="form-control" id="nrp" name="nrp" placeholder="NIM Mahasiswa" required>
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">NIK</label>
                  <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK Mahasiswa">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">NISN</label>
                  <input type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN Mahasiswa">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="kajur">Tempat Lahir</label>
                  <input type="text" class="form-control" id="tmplahir" name="tmplahir"
                    placeholder="Tempat Lahir Mahasiswa">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="sekjur">Tanggal Lahir</label>
                  <div class="d-flex align-items-center date_picker w-100 ">
                    <input id="tgllahir" name="tgllahir" type="text" class="form-control date-input"
                      placeholder="Pilih Tanggal" readonly />
                    <label class="input-group-btn" for="tgllahir">
                      <span class="date_button">
                        <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="sekjur">Tanggal Masuk</label>
                  <div class="d-flex align-items-center date_picker w-100 ">
                    <input id="tglmasuk" name="tglmasuk" type="text" class="form-control date-input"
                      placeholder="Pilih Tanggal" readonly />
                    <label class="input-group-btn" for="tglmasuk">
                      <span class="date_button">
                        <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="sekjur">Jalur Penerimaan</label>
                  <input type="text" class="form-control" id="jalur_daftar" placeholder="Jalur Penerimaan"
                    name="jalur_daftar">
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="alias">Anak ke</label>
                  <input type="number" class="form-control" id="anak_ke" name="anak_ke" placeholder="0">
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan_inggris">Jenis Kelamin</label>
                  <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan_inggris">Kewarganegaraan</label>
                  <select class="form-control" id="warga" name="warga">
                    <option value="WNI">WNI</option>
                    <option value="WNA">WNA</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan_inggris">Agama</label>
                  <select class="form-control" id="agama" name="agama">

                  </select>
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan_inggris">Golongan Darah</label>
                  <select class="form-control" id="darah" name="darah">

                  </select>
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="konsentrasi">Tahun Lulus</label>
                  <input type="number" class="form-control" id="tahun_lulus" placeholder="20XX" name="tahun_lulus">
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="akreditasi">Nomor Telp</label>
                  <input type="text" class="form-control" id="notelp" name="notelp" placeholder="Nomor Telpon">
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="akreditasi">Prestasi Olahraga</label>
                  <input type="text" class="form-control" id="prestasi_olahraga" name="prestasi_olahraga"
                    placeholder="Prestasi Olahraga">
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="akreditasi">Beasiswa</label>
                  <input type="text" class="form-control" id="beasiswa" name="beasiswa" placeholder="Beasiswa">
                </div>
              </div>
            </div>

            <div class="content form-row content2">
              <div class="card-header p-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h2 class="mb-0">ALAMAT MAHASISWA</h2>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-12">
                <hr class="mt" />
              </div>
              <div class="col-sm-12 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Alamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Tempat Tinggal">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Jalan</label>
                  <input type="text" class="form-control" id="jalan" name="jalan" placeholder="Jalan Tempat Tinggal">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">RT</label>
                  <input type="text" class="form-control" id="rt" name="rt" placeholder="01">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">RW</label>
                  <input type="text" class="form-control" id="rw" name="rw" placeholder="01">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Desa/Kelurahan</label>
                  <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Kelurahan">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Kecamatan</label>
                  <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="kajur">Kabupaten / Kota</label>
                  <input type="text" class="form-control" id="kabupaten_kota" name="kabupaten_kota"
                    placeholder="Kabupaten / Kota">
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="sekjur">Provinsi</label>
                  <input type="text" class="form-control" id="propinsi" name="propinsi" placeholder="Provinsi">
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="alias">Kode Pos</label>
                  <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos">
                </div>
              </div>
            </div>

            <div class="content form-row content3">
              <div class="card-header p-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h2 class="mb-0">DATA ORANG TUA</h2>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-12">
                <hr class="mt">
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Ayah</label>
                  <input type="text" class="form-control" id="ayah" name="ayah" placeholder="Nama Ayah">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Kerja Ayah</label>
                  <input type="text" class="form-control" id="kerja_ayah" name="kerja_ayah"
                    placeholder="Pekerjaan Ayah">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Penghasilan Ayah</label>
                  <input type="text" class="form-control" id="penghasilan_ayah" name="penghasilan_ayah"
                    placeholder="Penghasilan Ayah">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Tempat Lahir Ayah</label>
                  <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah"
                    placeholder="Tempat Lahir Ayah">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Tanggal Lahir Ayah</label>
                  <div class="d-flex align-items-center date_picker w-100 ">
                    <input id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" type="text" class="form-control date-input"
                      placeholder="Pilih Tanggal" readonly />
                    <label class="input-group-btn" for="tanggal_lahir_ayah">
                      <span class="date_button">
                        <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Pendidikan Ayah</label>
                  <input type="text" class="form-control" id="pendidikan_ayah" name="pendidikan_ayah">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Ibu</label>
                  <input type="text" class="form-control" id="ibu" name="ibu" placeholder="Nama Ibu">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Kerja Ibu</label>
                  <input type="text" class="form-control" id="kerja_ibu" name="kerja_ibu" placeholder="Pekerjaan Ibu">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Penghasilan Ibu</label>
                  <input type="text" class="form-control" id="penghasilan_ibu" name="penghasilan_ibu"
                    placeholder="Penghasilan Ibu">
                </div>
              </div>

              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Tempat Lahir Ibu</label>
                  <input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu"
                    placeholder="Tempat Lahir Ibu">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Tanggal Lahir Ibu</label>
                  <div class="d-flex align-items-center date_picker w-100 ">
                    <input id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" type="text" class="form-control date-input"
                      placeholder="Pilih Tanggal" readonly />
                    <label class="input-group-btn" for="tanggal_lahir_ibu">
                      <span class="date_button">
                        <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Pendidikan Ibu</label>
                  <input type="text" class="form-control" id="pendidikan_ibu" name="pendidikan_ibu"
                    placeholder="Pendidikan Ibu">
                </div>
              </div>
              <div class="col-sm-12 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Nomor Orang Tua</label>
                  <input type="text" class="form-control" id="notelp_ortu" name="notelp_ortu"
                    placeholder="Nomor Telpon Orang Tua">
                </div>
              </div>
              <div class="col-sm-12 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Alamat Orang Tua</label>
                  <input type="text" class="form-control" id="alamat_ortu" name="alamat_ortu"
                    placeholder="Alamat Orang Tua">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Jalan</label>
                  <input type="text" class="form-control" id="jalan_ortu" name="jalan_ortu" placeholder="Jalan">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">RT</label>
                  <input type="text" class="form-control" id="rt_ortu" name="rt_ortu" placeholder="01">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">RW</label>
                  <input type="text" class="form-control" id="rw_ortu" name="rw_ortu" placeholder="01">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Desa/Kelurahan</label>
                  <input type="text" class="form-control" id="kelurahan_ortu" name="kelurahan_ortu"
                    placeholder="Kelurahan">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Kecamatan</label>
                  <input type="text" class="form-control" id="kecamatan_ortu" name="kecamatan_ortu"
                    placeholder="Kecamatan">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="kajur">Kabupaten / Kota</label>
                  <input type="text" class="form-control" id="kabupaten_kota_ortu" name="kabupaten_kota_ortu"
                    placeholder="Kabupaten">
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="sekjur">Provinsi</label>
                  <input type="text" class="form-control" id="propinsi_ortu" name="propinsi_ortu"
                    placeholder="Provinsi">
                </div>
              </div>
              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="alias">Kode Pos</label>
                  <input type="text" class="form-control" id="kode_pos_ortu" name="kode_pos_ortu"
                    placeholder="Kode Pos">
                </div>
              </div>
            </div>

            <div class="content form-row content4">
              <div class="col-sm-12 col-12">
                <div class="form-group row mb-0">
                  <div class="card-header p-0 m-0 border-0">
                    <div class="row align-items-center">
                      <div class="col">
                        <h2 class="mb-0">Sekolah Asal</h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-12">
                <hr class="mt">
              </div>

              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="akreditasi">Asal Sekolah</label>
                  <input type="text" class="form-control" id="sekolah" name="sekolah" placeholder="Asal Sekolah">
                </div>
              </div>

              <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                  <label for="akreditasi">SMU</label>
                  <input type="text" class="form-control" id="smu" name="smu" placeholder="SMU">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">NUN</label>
                  <input type="text" class="form-control" id="nun" name="nun" placeholder="Nilai NUN">
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Tanggal Lulus</label>
                  <div class="d-flex align-items-center date_picker w-100 ">
                    <input id="tgllulus" name="tgllulus" type="text" class="form-control date-input"
                      placeholder="Pilih Tanggal" readonly />
                    <label class="input-group-btn" for="tgllulus">
                      <span class="date_button">
                        <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Tahun Lulus SMU</label>
                  <input type="text" class="form-control" id="lulussmu" name="lulussmu" placeholder="20XX">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-12">
                <div class="form-group row mb-0">
                  <button type="submit"
                    class="btn btn-primary w-100 simpanData-btn ">{{ $id == null ? 'Tambah' : 'Ubah' }}
                    Data</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script>
    const arr_date_form = ['tglmasuk', 'tgllulus', 'tgllahir', 'tanggal_lahir_ayah', 'tanggal_lahir_ibu'];
    $(document).ready(function() {
      var id = "{{ $id }}";
      getData(id);


      $('#program_studi').on('change', function(e) {
        var program_studi = $(this).val()
        var kelas = $.grep(dataGlobal['kelas'], function(e) {
          return e.program_studi == program_studi;
        });

        $('#kelas').html('')
        var optKelas = `<option value=""> - </option>`;
        $.each(kelas, function(key, row) {
          optKelas += `<option value="${row.nomor}">${row.kode}</option>`
        })
        $('#kelas').append(optKelas);
      })

      // form tambah data
      $("#form_cu").submit(function(e) {
        e.preventDefault();
        var data = $('#form_cu').serializeArray();
        for(const i in data){
          if (arr_date_form.includes(data[i].name)) {
            data[i].value = reformat_date( $('#'+data[i].name).val() );
          } 
        }
        if (id != "") {
          var url = url_api + "/mahasiswa/" + id;
          var type = "put";
        } else {
          var url = url_api + "/mahasiswa";
          var type = "post";
        }
        $.ajax({
          url: url,
          type: type,
          dataType: 'json',
          data: data,
          success: function(res) {
            if (res.status == "success") {
              window.location.href = "{{ url('/admin/master/datamahasiswa') }}";
            } else {
              // alert gagal
            }

          }
        });
      });

      // Tab
      // $('.tab-buttons span').first().addClass('active');
      // $('.content').hide();
      // $('.tab-content .content1').show();
      // $('.tab-buttons span').click(function() {
      //   $('.tab-buttons span').removeClass('active');
      //   const getClass = $(this).attr('class').split(' ')[0];
      //   $(this).addClass('active');
      //   $('.content').each(function() {
      //     if ($(this).hasClass(getClass)) {
      //       $(this).fadeIn(500);
      //     } else {
      //       $(this).hide();
      //     }
      //   });
      // });
    });

    async function getData(id) {


      var optProdi = `<option value=""> - </option>`;
      $.each(dataGlobal['prodi'], function(key, row) {
        optProdi += `<option value="${row.nomor}">${row.nama_program} ${row.program_studi}</option>`
      })
      $('#program_studi').append(optProdi)

      var optStatus = `<option value=""> - </option>`;
      $.each(dataGlobal['status'], function(key, row) {
        optStatus += `<option value="${row.kode}">${row.status}</option>`
      })
      $('#status').append(optStatus)

      var optDosen = `<option value=""> - </option>`;
      $.each(dataGlobal['dosen'], function(key, row) {
        optDosen += `<option value="${row.nomor}">${row.nama}</option>`
      })
      $('#dosen_wali').append(optDosen)

      var optAgama = `<option value=""> - </option>`;
      $.each(dataGlobal['agama'], function(key, row) {
        optAgama += `<option value="${row.nomor}">${row.agama}</option>`
      })
      $('#agama').append(optAgama)

      var optGoldarah = `<option value=""> - </option>`;
      $.each(dataGlobal['goldarah'], function(key, row) {
        optGoldarah += `<option value="${row.nomor}">${row.goldarah}</option>`
      })
      $('#darah').append(optGoldarah)

      if (id != "") {
        $.ajax({
          url: url_api + "/mahasiswa/" + id,
          type: 'get',
          dataType: 'json',
          data: {},
          success: function(res) {
            if (res.status == "success") {
              var data = res['data'];
              $.each(data, function(key, row) {
                if (arr_date_form.includes(key)) {
                  $('#' + key).datepicker('setDate', new Date(row));
                } else {
                  $('#' + key).val(row);
                }
              })
              var kelas = $.grep(dataGlobal['kelas'], function(e) {
                return e.program_studi == data.program_studi;
              });
              $('#kelas').html('')
              var optKelas = `<option value=""> - </option>`;
              $.each(kelas, function(key, row) {
                optKelas += `<option value="${row.nomor}">${row.kode}</option>`
              })
              $('#kelas').append(optKelas);
              $('#kelas').val(data.kelas)
            } else {
              // alert gagal
            }

          }
        });
      }
    }
  </script>
@endsection
