@extends('layouts.main')

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
            <h1 class="mr-4">Jalur Penerimaan: </h1>
            <label class="sr-only" for="jalur_daftar">Jalur Penerimaan</label>
            <input type="text" class="form-control flex-grow-1" id="jalur_daftar" name="jalur_daftar">
            <hr class="mt-4 mb-3">

            <div class="row jalurPMB_pendaftaran">
              <div class="col-lg-6">
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
    </form>
  </div>
</section>
@endsection

@section('js')
<script>
  $(function() {
    $(".date-input").datepicker({
      format: "D M Y",
    });
  });

  $(document).ready(function() {
    var id = "{{$id}}";
    getData(id);

    if (id != "") {
      getData(id);
    }
    // form tambah data
    $("#form_cu").submit(function(e) {
      e.preventDefault();
      var data = $('#form_cu').serialize();
      if (id != "") {
        var url = url_api + "/jalurpmb/" + id;
        var type = "put";
      } else {
        var url = url_api + "/jalurpmb";
        var type = "post";

      }
      $.ajax({
        url: url,
        type: type,
        dataType: 'json',
        data: data,
        success: function(res) {
          if (res.status == "success") {
            window.location.href = "{{url('/admin/settingpmb/settingjalurpenerimaan')}}";
          } else {
            // alert gagal
          }
          

        }
      });
    });
  });

  function getData(id) {
    var optJalur_daftar = `<option value=""> - </option>`;
    $.each(dataGlobal['jalur_daftar'], function(key, row) {
      optJalur_daftar += `<option value="${row.nomor}">${row.nama}</option>`
    })
    $('#jalur_daftar').append(optJalur_daftar)

    var optTanggal_awal = `<option value=""> - </option>`;
    $.each(dataGlobal['tanggal_awal'], function(key, row) {
      optTanggal_awal += `<option value="${row.nomor}">${row.nama}</option>`
    })
    $('#tanggal_awal').append(optTanggal_awal)

    var optTanggal_akhir = `<option value=""> - </option>`;
    $.each(dataGlobal['tanggal_akhir'], function(key, row) {
      optTanggal_akhir += `<option value="${row.nomor}">${row.nama}</option>`
    })
    $('#tanggal_akhir').append(optTanggal_akhir)

    var optBiaya = `<option value=""> - </option>`;
    $.each(dataGlobal['biaya'], function(key, row) {
      optBiaya += `<option value="${row.nomor}">${row.nama}</option>`
    })
    $('#biaya').append(optBiaya)

    var optKuota = `<option value=""> - </option>`;
    $.each(dataGlobal['kuota'], function(key, row) {
      optKuota += `<option value="${row.nomor}">${row.nama}</option>`
    })
    $('#kuota').append(optKuota)

    $.ajax({
      url: url_api + "/jalurpmb/" + id,
      type: 'get',
      dataType: 'json',
      data: {},
      success: function(res) {
        if (res.status == "success") {
          var data = res['data'];
          $.each(data, function(key, row) {
            $('#' + key).val(row);
          })
        } else {
          // alert gagal
        }
        

      }
    });
  }
</script>
@endsection