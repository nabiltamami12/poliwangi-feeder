@extends('layouts.mainMaba')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <!-- Modal -->
  <div class="modal fade" id="daftarUlang_unggahDokumen" tabindex="-1" aria-labelledby="daftarUlang_unggahDokumenLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <div class="modal-header">
          <h5 class="modal-title my-3 mx-auto">Upload Surat Keterangan Hasil Ujian</h5>
        </div>
        <div class="modal-body">
          <div class="form-group detail_dokumen d-flex justify-content-center align-items-center p-4">
            <form class="d-none" onchange="showfilename()">
              <i class="iconify mr-2" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
              <input type="file" id="file" hidden />
              <span id="custom-text" class="nama_dokumen">tidak ada file dipilih</span>
            </form>
            <button type="button" id="custom-btn">
              <i class="iconify text-primary" data-icon="bx:bx-cloud-upload" data-inline="false"></i>
            </button>
          </div>
          <p class="mt-2 mb-0 font-italic jenis_dokumen">Upload Document dengan format .pdf (Max size 2MB)</p>
        </div>
        <div class="modal-footer pt-3">
          <button type="button" class="btn btn-primary w-100 rounded-sm">Upload</button>
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
                <th scope="col" class="border-0" style="width: 58%">Keterangan</th>
                <th scope="col" class="border-0">File</th>
                <th scope="col" class="border-0 text-center">Status</th>
              </tr>
            </thead>

            <tbody class="table-body table-body-lg">
              <tr>
                <td class="text-center px-2">1</td>
                <td>
                  <h2 class="mb-0">Ijazah SMA/SMK/MA/Sederajat</h2>
                </td>
                <td>
                  <i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-file-blank"></i>
                  <span class="text-primary">dokumen terunggah</span>
                </td>
                <td class="text-center">
                  <i class="iconify status-success" data-icon="fluent:clock-20-filled"></i>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">2</td>
                <td>
                  <h2 class="mb-0">Surat Keterangan Hasil Ujian</h2>
                </td>
                <td>
                  <span data-toggle="modal" data-target="#daftarUlang_unggahDokumen">
                    <i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-cloud-upload"></i>
                    <span class="text-primary">Unggah Dokumen</span>
                  </span>
                </td>
                <td class="text-center">
                  <i class="iconify status-pending" data-icon="fluent:clock-20-filled"></i>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">3</td>
                <td>
                  <h2 class="mb-0">Bukti Pembayaran Pendaftaran</h2>
                </td>
                <td>
                  <i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-file-blank"></i>
                  <span class="text-primary">dokumen terunggah</span>
                </td>
                <td class="text-center">
                  <i class="iconify status-success" data-icon="fluent:clock-20-filled"></i>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">4</td>
                <td>
                  <h2 class="mb-0">Bukti Telah Diterima di Politeknik Negeri Banyuwangi</h2>
                </td>
                <td>
                  <span data-toggle="modal" data-target="#daftarUlang_unggahDokumen">
                    <i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-cloud-upload"></i>
                    <span class="text-primary">Unggah Ulang Dokumen</span>
                  </span>
                </td>
                <td class="text-center">
                  <i class="iconify status-rejected" data-icon="bi:x-circle-fill"></i>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">5</td>
                <td>
                  <h2 class="mb-0">Surat Pernyataan Taat Peraturan</h2>
                </td>
                <td>
                  <span data-toggle="modal" data-target="#daftarUlang_unggahDokumen">
                    <i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-cloud-upload"></i>
                    <span class="text-primary">Unggah Ulang Dokumen</span>
                  </span>
                </td>
                <td class="text-center">
                  <i class="iconify status-rejected" data-icon="bi:x-circle-fill"></i>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">6</td>
                <td>
                  <h2 class="mb-0">Upload Foto dengan Almamater</h2>
                </td>
                <td>
                  <span data-toggle="modal" data-target="#daftarUlang_unggahDokumen">
                    <i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-cloud-upload"></i>
                    <span class="text-primary">Unggah Ulang Dokumen</span>
                  </span>
                </td>
                <td class="text-center">
                  <i class="iconify status-rejected" data-icon="bi:x-circle-fill"></i>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">7</td>
                <td>
                  <h2 class="mb-0 d-inline">Upload Dokumen Pengajuan Keringanan
                    <h2 class="d-inline text-warning">(Optional)</span>
                    </h2>
                </td>
                <td>
                  <span data-toggle="modal" data-target="#daftarUlang_unggahDokumen">
                    <i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-cloud-upload"></i>
                    <span class="text-primary">Unggah Dokumen</span>
                  </span>
                </td>
                <td class="text-center">
                  <i class="iconify status-pending" data-icon="fluent:clock-20-filled"></i>
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

@section('js')
<script>
  const inputFile = document.getElementById("file");
  const customBtn = document.getElementById("custom-btn");
  const customText = document.getElementById("custom-text");

  customBtn.addEventListener("click", function () {
    inputFile.click();
  });

  inputFile.addEventListener("change", function () {
    if (inputFile.value) {
      let fileName = inputFile.value.match(/[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/)[0];
      customText.innerHTML = fileName;
    } else {
      customText.innerHTML = "tidak ada file dipilih";
    }
  });


  const formWrapper = document.querySelector('.detail_dokumen');
  const formUpload = document.querySelector(".detail_dokumen form");
  function showfilename(){
    formUpload.classList.remove('d-none');
    formWrapper.classList.remove('justify-content-center');
    formWrapper.classList.add('justify-content-between');
  }

</script>
@endsection