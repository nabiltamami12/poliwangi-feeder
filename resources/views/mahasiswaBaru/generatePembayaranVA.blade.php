@extends('layouts.mainMaba')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="pembayaran_va">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header border-0 padding--medium">
          <div class="row">
            <div class="col">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="text-center">Pengajuan Keringanan Anda Disetujui</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true" class="text-success">&times;</span>
                </button>
              </div>

              <div class="pembayaran">
                <h2>Pembayaran</h2>
                <hr class="mt-4">
                <button type="submit" class="btn btn--blue w-100 mt-4">Generate VA Pembayaran</button>
                <hr class="mt-4">
              </div>

              <div class="va_aktif">
                <div class="form-group">
                  <label for="va-aktif" class="mt-4-5">VA Aktif Saat Ini</label>
                  <div class="field_kode mt-2">
                    <input type="text" class="form-control" id="va-aktif" value="MB92817" readonly>
                    <button class="salin_kode btn--blue">Salin Kode</button>
                  </div>
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
  const input = document.getElementById('va-aktif');
  const coppyBtn = document.querySelector('.salin_kode');
  coppyBtn.onclick = () => {
    input.select();
    if (document.execCommand("copy")) {
      coppyBtn.innerText = "Kode Disalin";
      setTimeout(() => {
        window.getSelection().removeAllRanges();
        coppyBtn.innerText = "Copy";
      }, 3000);
    }
  };
</script>
@endsection