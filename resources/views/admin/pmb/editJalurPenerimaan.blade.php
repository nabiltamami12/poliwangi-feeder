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
              <h2 class="mb-0 text-center text-sm-left">Jalur Penerimaan Mahasiswa Baru</h2>
            </div>
          </div>
        </div>
        <hr>

        <div class="card-body padding--medium">
          <form class="form-inline">
            <h1 class="mr-4">Jalur Penerimaan: </h1>
            <label class="sr-only" for="jalur_penerimaan">Jalur Penerimaan</label>
            <input type="text" class="form-control flex-grow-1" id="jalur_penerimaan" value="Mandiri">
          </form>
          <hr class="mt-4 mb-3">

          <div class="row jalurPMB_pendaftaran">
            <div class="col-lg-6">
              <form>
                <h2 class="card_title mb-2 font-weight-500">Tanggal Pendaftaran</h2>
                <div class="d-sm-flex align-items-center">
                  <div class="form-group">
                    <div class="d-flex align-items-center date_picker w-100 ">
                      <input id="txtDate1" type="text" class="form-control date-input" value="24 January 2022"
                        readonly />
                      <label class="input-group-btn" for="txtDate1">
                        <span class="date_button">
                          <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                        </span>
                      </label>
                    </div>
                  </div>
                  <p class="mx-3 font-weight-500 text-center my-3">Sampai</p>
                  <div class="form-group">
                    <div class="d-flex align-items-center date_picker w-100 ">
                      <input id="txtDate2" type="text" class="form-control date-input" value="24 February 2022"
                        readonly />
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
                  <input type="text" class="form-control text-right" id="biaya_pendaftaran" value="250.000">
                </div>

                <div class="form-group mt-4">
                  <h2 class="card_title mb-2 font-weight-500">Kuota</h2>
                  <label class="sr-only" for="kuota">Kuota</label>
                  <input type="text" class="form-control" id="kuota" value="200">
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
              <button type="submit" class="btn btn-primary w-100 rounded-sm mt-3">Simpan</button>
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
</script>
@endsection