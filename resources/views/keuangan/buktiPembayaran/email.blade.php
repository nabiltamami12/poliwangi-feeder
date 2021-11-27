@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card card_email mt-4">
        <div class="card-header p-3 pb-4">
          <div class="row">
            <div class="col">
              <div class="inbox_toolbar d-flex align-items-center justify-content-between">
                <div class="back_icon">
                  <i class="iconify" data-icon="ant-design:arrow-left-outlined"></i>
                </div>
                <div class="action_icon">
                  <i class="iconify mr-3" data-icon="bx:bx-archive-in"></i>
                  <i class="iconify mr-3" data-icon="bx:bx-trash"></i>
                  <i class="iconify mr-3" data-icon="carbon:email"></i>
                  <i class="iconify" data-icon="bi:three-dots-vertical"></i>
                </div>
              </div>
              <div class="title d-flex align-items-center justify-content-between mt-4">
                <div>
                  <h1 class="mb-0">Bukti pembayaran</h1>
                  <span>Kotak Masuk</span>
                </div>
                <div>
                  <i class="iconify" data-icon="ei:star"></i>
                </div>
              </div>
              <div class="sender d-flex align-items-center justify-content-between mt-4">
                <div class="d-flex">
                  <i class="iconify sender_profile mr-3" data-icon="carbon:user-avatar-filled"></i>
                  <div>
                    <h3 class="mb-0">Politeknik Banyuwangi <span class="time ml-2">14.42</span></h3>
                    <h5 class="mb-0">kepada saya<span class="iconify-inline ml-1"
                        data-icon="codicon:chevron-down"></span></h5>
                  </div>
                </div>
                <div>
                  <span class="iconify" data-icon="fluent:arrow-reply-24-regular"></span>
                  <i class="iconify" data-icon="bi:three-dots-vertical"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body p-3 pt-4">
          <div class="card card-email_shadow p-3 m-0">
            <div class="email_header">
              <h1 class="mb-0">Halo, <span class="nama text-primary">Jessica Charisa</span></h1>
              <p class="mb-0 mt-4">Selamat, pembayaran anda telah berhasil. Berikut adalah bukti pembayaran pendaftaran
                mahasiswa baru Politeknik Banyuwangi</p>
            </div>

            <div class="email_body mt-2">
              <h2 class="mb-0">Detail Pembayaran</h2>
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <td>No. Kwitansi Pembayaran</td>
                    <td class="text-right">
                      <p class="nomor">1037458</p>
                    </td>
                  </tr>
                  <tr>
                    <td>Nama Calon Mahasiswa:</td>
                    <td class="text-right">
                      <p>Jessica Charisa</p>
                    </td>
                  </tr>
                  <tr>
                    <td>Asal Sekolah:</td>
                    <td class="text-right">
                      <p>SMAN 1 Banyuwangi</p>
                    </td>
                  </tr>
                  <tr>
                    <td>Prodi:</td>
                    <td class="text-right">
                      <p>Manajemen Bisnis</p>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <span>Untuk Pembayaran:</span>
                      <p>Pendaftaran Mahasiswa Baru 2021/2022</p>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <span>Keterangan:</span>
                      <p>Transfer melalui Virtual Account</p>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <span>Nominal:</span>
                      <p class="nominal mt-2">50.000,00</p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="email_footer">
              <h5 class="mb-0 text-center">Butuh arsip bukti pembayaran ? <a href="#">Download Disini</a></h5>
            </div>
          </div>
        </div>

        <div class="card-footer p-0 pb-3 border-0">
          <h5 class="mb-0 text-center">Detail Pembayaran Anda Tidak Sesuai ? <br><a href="#">Hubungi Kami Disini</a>
          </h5>
          <div class="row justify-content-center mt-2">
            <div class="col">
              <div class="d-flex justify-content-center align-items-center">
                <img src="{{ url('images') }}/logo.svg" class="logo" width="46px" alt="Politeknik Negeri Banyuwangi">
                <div class="ml-2">
                  <h6>Politeknik Negeri Banyuwangi</h6>
                  <p>Jalan Raya Jember No.KM13</p>
                  <p>0333-636730</p>
                  <p>poliwangi@poliwangi.ac.id</p>
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