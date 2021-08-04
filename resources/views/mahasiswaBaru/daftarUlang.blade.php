@extends('layouts.mainMaba')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="daftar_ulang">
  <!-- Modal -->
  <div class="modal fade" id="unggahDokumen" tabindex="-1" aria-labelledby="unggahDokumenLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <div class="modal-header">
          <h5 class="modal-title mt-4 mx-auto">Upload Surat Keterangan Hasil Ujian</h5>
        </div>
        <div class="modal-body mt-2">
          <div class="form-group">
            <div class="input_file p-3">
              <label for="input_file">
                <span class="iconify" data-icon="bx:bx-cloud-upload" data-inline="false"></span>
              </label>
            </div>
            <input type="file" class="form-control-file d-none" id="input_file">
          </div>
          <p class="mt-2 mb-0 font-italic">Upload Document dengan format .pdf (Max size 2MB)</p>
        </div>
        <div class="modal-footer pt-3">
          <button type="button" class="btn btn--blue btn-modal-ok w-100">Upload</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--medium">
        <div class="card-header p-0 border-0">
          <div class="row">
            <div class="col">
              <h3 class="mb-0">Persyaratan Daftar Ulang</h3>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <div class="table-responsive">
          <table class="table align-items-center table-borderless table-flush table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="border-0 text-center px-2">No</th>
                <th scope="col" class="border-0" style="width: 50%">Keterangan</th>
                <th scope="col" class="border-0">File</th>
                <th scope="col" class="border-0 text-center">Status</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center px-2">1</td>
                <td>
                  <h2 class="mb-0">Ijazah SMA/SMK/MA/Sederajat</h2>
                </td>
                <td>
                  <span class="iconify text--blue" data-icon="bx:bx-file-blank" data-inline="true"></span>
                  <span class="text--blue">dokumen terunggah</span>
                </td>
                <td class="text-center">
                  <span class="iconify status-success" data-icon="fluent:clock-20-filled" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">2</td>
                <td>
                  <h2 class="mb-0">Surat Keterangan Hasil Ujian</h2>
                </td>
                <td>
                  <span data-toggle="modal" data-target="#unggahDokumen" class="pointer">
                    <span class="iconify text--blue" data-icon="bx:bx-upload" data-inline="true"></span>
                    <span class="text--blue">Unggah Dokumen</span>
                  </span>
                </td>
                <td class="text-center">
                  <span class="iconify status-pending" data-icon="fluent:clock-20-filled" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">3</td>
                <td>
                  <h2 class="mb-0">Bukti Pembayaran Pendaftaran</h2>
                </td>
                <td>
                  <span class="iconify text--blue" data-icon="bx:bx-file-blank" data-inline="true"></span>
                  <span class="text--blue">dokumen terunggah</span>
                </td>
                <td class="text-center">
                  <span class="iconify status-success" data-icon="fluent:clock-20-filled" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">4</td>
                <td>
                  <h2 class="mb-0">Bukti Telah Diterima di Politeknik Negeri Banyuwangi</h2>
                </td>
                <td>
                  <span data-toggle="modal" data-target="#unggahDokumen" class="pointer">
                    <span class="iconify text--blue" data-icon="bx:bx-upload" data-inline="true"></span>
                    <span class="text--blue">Unggah Ulang Dokumen</span>
                  </span>
                </td>
                <td class="text-center">
                  <span class="iconify status-rejected" data-icon="bi:x-circle-fill" data-inline="true"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection