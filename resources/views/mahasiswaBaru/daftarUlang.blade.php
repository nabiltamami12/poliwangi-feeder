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
          <div class="form-group detail_dokumen d-flex justify-content-center align-items-center p-4" id="trigger-browse" style="cursor: pointer;">
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
          <button type="button" class="btn btn-primary w-100 rounded-sm" id="btn-upload">Upload</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--medium">
        <div class="card-header p-0">
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
                <th scope="col" class="text-center px-2">No</th>
                <th scope="col" style="width: 58%">Keterangan</th>
                <th scope="col">File</th>
                <th scope="col" class="text-center">Status</th>
              </tr>
            </thead>

            <tbody class="table-body table-body-lg"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script>

$(document).ready(function () {
  getData();
});

function getData() {
  $.ajax({
    url: url_api+"/syarat-pendaftar",
    type: 'get',
    dataType: 'json',
    data: {},
    headers: {
      'token': localStorage.getItem('pmb')
    },
    success: function(res) {
      if (res.status=="success") {
        let i = 1;
        $.each(res.data,function (key,row) {
          let html = '';
          if(row.status === '1'){
            html = `<tr>
                <td class="text-center px-2">${i++}</td>
                <td>
                  <h2 class="mb-0">${row.nama}</h2>
                </td>
                <td>
                  <i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-file-blank"></i>
                  <span class="text-primary">dokumen terunggah</span>
                </td>
                <td class="text-center">
                  <i class="iconify status-success" data-icon="fluent:clock-20-filled"></i>
                </td>
              </tr>`;
          } else if (row.status === null) {
            html = `<tr>
                <td class="text-center px-2">${i++}</td>
                <td>
                  <h2 class="mb-0">Surat Keterangan Hasil Ujian</h2>
                </td>
                <td>
                  <span onclick="show_modal('${row.id_syarat}')" style="cursor: pointer;">
                    <i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-cloud-upload"></i>
                    <span class="text-primary">Unggah Dokumen</span>
                  </span>
                </td>
                <td class="text-center">
                  <i class="iconify status-pending" data-icon="fluent:clock-20-filled"></i>
                </td>
              </tr>`;
          } else {
            html = `<tr>
                <td class="text-center px-2">${i++}</td>
                <td>
                  <h2 class="mb-0">Upload Foto dengan Almamater</h2>
                </td>
                <td>
                  <span onclick="show_modal('${row.id_syarat}', 'put')" style="cursor: pointer;">
                    <i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-cloud-upload"></i>
                    <span class="text-primary">Unggah Ulang Dokumen</span>
                  </span>
                </td>
                <td class="text-center">
                  <i class="iconify status-rejected" data-icon="bi:x-circle-fill"></i>
                </td>
              </tr>`;
          }
          $('.table-body').append(html);
        })

        
      }
    }
  });
}

function show_modal(syarat, action = 'post') {
  $('#file').val("");
  customText.innerHTML = "tidak ada file dipilih";
  $('#btn-upload').attr("onclick", `send('${syarat}', '${action}')`);
  $('#daftarUlang_unggahDokumen').modal('show');
}

function send(syarat, action) {
  const fileupload = $('#file').prop('files')[0];
  if (fileupload && fileupload!="" && Number(syarat) > 0) {
    let formData = new FormData();
    formData.append('syarat', syarat);
    formData.append('file', fileupload);
    $.ajax({
      type: 'POST',
      url: url_api+`/berkas${(action === 'post') ? '' : '_update'}`,
      data: formData,
      cache: false,
      processData: false,
      contentType: false,
      headers: {
        'token': localStorage.getItem('pmb')
      },
      success: function (res) {
        window.location.reload();
      },
      error: function () {
        alert("Data Gagal Diupload");
      }
    });
  }
}

  const inputFile = document.getElementById("file");
  const customBtn = document.getElementById("custom-btn");
  const customText = document.getElementById("custom-text");

  document.getElementById('trigger-browse').addEventListener('click', function () {
    inputFile.click();
  })

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