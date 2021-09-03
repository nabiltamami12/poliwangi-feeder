@extends('layouts.mainKeuangan')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card_kwitansi p-2 mt-4">
        <div class="card-header p-0">
          <div class="row">
            <div class="col-5">
              <div class="d-flex align-items-center">
                <img src="{{ url('images') }}/logo.svg" class="logo" width="32px" alt="Politeknik Negeri Banyuwangi">
                <div class="ml-2">
                  <h1>Politeknik Negeri Banyuwangi</h1>
                  <p>Jalan Raya Jember No.KM13</p>
                  <p>0333-636730</p>
                  <p>poliwangi@poliwangi.ac.id</p>
                </div>
              </div>
            </div>
            <div class="col-5">
              <h1 class="text-center">BUKTI PEMBAYARAN <br>(JENIS PEMBAYARAN)</h1>
            </div>
            <div class="col-2">
              <h1 class="text-right">19 April 2021</h1>
            </div>
          </div>
        </div>

        <div class="card-body p-0 px-2 mt-3">
          <form>
            <div class="form-group d-flex align-items-center">
              <label for="nomorKwitansi" class="font-italic">No. Kwitansi Pembayaran</label>
              <input type="text" id="nomorKwitansi" value="1037458">
            </div>

            <div class="form-group d-flex align-items-center mt-2">
              <label for="namaSiswa" class="font-italic">Nama Calon Siswa</label>
              <input type="text" id="namaSiswa" value="Jessica Charisa">
            </div>

            <div class="form-group d-flex align-items-center mt-2">
              <label for="programStudi" class="font-italic">Program Studi</label>
              <input type="text" id="programStudi" value="Manajemen Bisnis">
            </div>

            <div class="form-group d-flex align-items-center mt-2">
              <label for="keperluanPembayaran" class="font-italic">Untuk Pembayaran</label>
              <input type="text" id="keperluanPembayaran" value="Pendaftaran Mahasiswa Baru 2021/2022">
            </div>

            <div class="form-group d-flex align-items-center mt-2">
              <label for="keterangan" class="font-italic">Keterangan</label>
              <input type="text" id="keterangan" value="Bayar melalui Virtual Account">
            </div>
          </form>
        </div>

        <div class="card-footer p-0 px-2 mt-4">
          <div class="row total_pembayaran">
            <div class="col">
              <h1>50.000,00</h1>
              <p><span>Terbilang:</span> <br>Lima puluh ribu rupiah</p>
            </div>
          </div>
          <div class="row tanda_pembayaran">
            <div class="col-5 offset-7">
              <p>Banyuwangi, 03 September 2021</p>
              <div class="tanda_tangan"></div>
              <p class="text-center">Penerima</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection