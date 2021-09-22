@extends('layouts.mainAkademik')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow ">
        <div class="card-header padding--medium">
          <div class="row align-items-center">
            <div class="col-12">
              <h2 class="mb-0 text-center text-sm-left">{{ ($id==null)?"TAMBAH":"UBAH" }} Jalur Penerimaan Mahasiswa Baru</h2>
            </div>
          </div>
        </div>
        <hr>

        <div class="card-body padding--medium">
          <form id="form_cu">
            <form class="form-inline">
              <h1 class="mr-4">Jalur Penerimaan: </h1>
              <label class="sr-only" for="jalur_penerimaan">Jalur Penerimaan</label>
              <input type="text" class="form-control flex-grow-1" id="jalur_penerimaan" name="jalur_penerimaan">
            </form>
            <hr class="mt-4 mb-3">

            <div class="row jalurPMB_pendaftaran">
              <div class="col-lg-6">
                <form>
                  <h2 class="card_title mb-2 font-weight-500">Tanggal Pendaftaran</h2>
                  <div class="d-sm-flex align-items-center">
                    <div class="form-group">
                      <div class="d-flex align-items-center date_picker">
                        <input id="tanggal_awal" type="text" class="form-control date-input" name="tanggal_awal" />
                        <label class="input-group-btn" for="txtDate1">
                          <span class="date_button">
                            <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                          </span>
                        </label>
                      </div>
                    </div>
                    <p class="mx-3 font-weight-500 text-center my-3">Sampai</p>
                    <div class="form-group">
                      <div class="d-flex align-items-center date_picker">
                        <input id="tanggal_akhir" type="text" class="form-control date-input" name="tanggal_akhir" />
                        <label class="input-group-btn" for="txtDate2">
                          <span class="date_button">
                            <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mt-4 biaya_pendaftaran">
                    <h2 class="card_title mb-2 font-weight-500">Biaya Pendaftaran</h2>
                    <label class="sr-only" for="biaya_pendaftaran">Biaya Pendaftaran</label>
                    <input type="text" class="form-control text-right" id="biaya" name="biaya">
                  </div>

                  <div class="form-group mt-4">
                    <h2 class="card_title mb-2 font-weight-500">Kuota</h2>
                    <label class="sr-only" for="kuota">Kuota</label>
                    <input type="text" class="form-control" id="kuota" name="kuota">
                  </div>
                </form>
              </div>

              <div class="col-lg-6 pl-3 mt-4 mt-lg-0">
                <h2 class="card_title font-weight-500">Syarat Pendaftaran</h2>
                <div class="py-3 d-flex">
                  <i class="iconify text-success mr-3" data-icon="akar-icons:circle-check-fill"></i>
                  <p class="d-inline-block">Ijazah SMA/SMK/MA/Sederajat</p>
                </div>
                <div class="py-3 d-flex">
                  <i class="iconify text-success mr-3" data-icon="akar-icons:circle-check-fill"></i>
                  <p class="d-inline-block">Surat Keterangan Hasil Ujian</p>
                </div>
                <div class="py-3 d-flex">
                  <i class="iconify text-success mr-3" data-icon="akar-icons:circle-check-fill"></i>
                  <p class="d-inline-block">Bukti Pembayaran Pendaftaran</p>
                </div>
                <div class="py-3 d-flex">
                  <i class="iconify text-placeholder mr-3" data-icon="akar-icons:circle-check-fill"></i>
                  <p class="d-inline-block text-wrap">Bukti Telah Diterima di Politeknik Negeri Banyuwangi</p>
                </div>
                <div class="py-3 d-flex">
                  <i class="iconify text-placeholder mr-3" data-icon="akar-icons:circle-check-fill"></i>
                  <p class="d-inline-block">Surat Pernyataan Taat Peraturan</p>
                </div>
                <div class="py-3 d-flex">
                  <i class="iconify text-placeholder mr-3" data-icon="akar-icons:circle-check-fill"></i>
                  <p class="d-inline-block">Upload Foto dengan Almamater</p>
                </div>
                <div class="py-3 d-flex">
                  <i class="iconify text-success mr-3" data-icon="akar-icons:circle-check-fill"></i>
                  <p class="d-inline-block">Upload Dokumen Pengajuan Keringanan <span class="text-primary">(Optional)</span></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <button type="submit" class="btn btn-primary w-100 rounded-sm mt-3">{{ ($id==null)?"Tambah":"Ubah" }}Simpan</button>
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
  $(function() {
    $(".date-input").datepicker({
      format: "dd MM yyyy",
    });
  });

  $(document).ready(function() {
    var id = "{{$id}}";
    getData(id);
    $('#jalur_penerimaan').on('change', function(e) {
      var program_studi = $(this).val()
      var kelas = $.grep(dataGlobal['kelas'], function(e) {
        return e.program_studi == program_studi;
      });
      console.log(program_studi)
      console.log(kelas)
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
      var data = $('#form_cu').serialize();
      if (id != "") {
        var url = url_api + "/matakuliah/" + id;
        var type = "put";
      } else {
        var url = url_api + "/matakuliah";
        var type = "post";
      }
      $.ajax({
        url: url,
        type: type,
        dataType: 'json',
        data: data,
        beforeSend: function(text) {
          // loading func
          console.log("loading")
          loading('show')
        },
        success: function(res) {
          if (res.status == "success") {
            window.location.href = "{{url('/akademik/master/datamatakuliah')}}";
          } else {
            // alert gagal
          }
          loading('hide')
        }
      });
    });

  });

  async function getData(id) {


    var optProdi = `<option value=""> - </option>`;
    $.each(dataGlobal['prodi'], function(key, row) {
      optProdi += `<option value="${row.nomor}">${row.nama_program} ${row.program_studi}</option>`
    })
    $('#program_studi').append(optProdi)

    var optMatkulJenis = `<option value=""> - </option>`;
    $.each(dataGlobal['mk_jenis'], function(key, row) {
      optMatkulJenis += `<option value="${row.nomor}">${row.matakuliah_jenis}</option>`
    })
    $('#matakuliah_jenis').append(optMatkulJenis)
    $('#mk_group').append(optMatkulJenis)

    if (id != "") {
      $.ajax({
        url: url_api + "/jalur_pmb/" + id,
        type: 'get',
        dataType: 'json',
        data: {},
        beforeSend: function(text) {
          // loading func
          console.log("loading")
          loading('show')
        },
        success: function(res) {
          if (res.status == "success") {
            var data = res['data'][0];
            $.each(data, function(key, row) {
              $('#' + key).val(row);
            })
            $('#masuk_penilaian').val(data.masuk_penilaian).change();
            $('#wali_kelas').val(data.id_wali_kelas).change();

            var kelas = $.grep(dataGlobal['kelas'], function(e) {
              return e.program_studi == data.program_studi;
            });

            var optKelas = `<option value=""> - </option>`;
            $.each(kelas, function(key, row) {
              if (row.kelas == data.kelas) {
                var select = "selected";
              } else {
                var select = "";
              }

              optKelas += `<option ${select} value="${row.nomor}">${row.kode}</option>`
            })
            $('#kelas').append(optKelas);

          } else {
            // alert gagal
          }
          loading('hide')
        }
      });
    }
  }
</script>
@endsection