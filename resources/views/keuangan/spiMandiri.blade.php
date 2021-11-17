@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Data Sumbangan Pengembangan Institusi</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <form id="form_cu" enctype="multipart/form-data">
                @csrf
              <input type="file" name="file" id="file" onchange="clickButton()" hidden>
              <input type="submit" value="submit" id="submit" hidden>
              </form>
              <a href="{{url('/template/template-spi.xlsx')}}" class="btn btn-primary" target="_blank">
                <i class="iconify-inline mr-1" data-icon="bx:bxs-download"></i>
                Template Import
              </a>
              <button type="button" class="btn btn-primary" onclick="importFile()">
                <i class="iconify-inline mr-1" data-icon="bx:bx-download"></i>
                Import
              </button>
              <button type="button" class="btn btn-warning" onclick="exportModal()">
                <i class="iconify-inline mr-1" data-icon="bx:bx-upload"></i>
                Eksport
              </button>
            </div>
          </div>
        </div>
        <hr class="mt-4">
        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless table-hover" id="datatable">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center pr-0">No</th>
                <th scope="col" class="text-center">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col" class="text-center">Tanggal</th>
                <th scope="col" class="text-right">Tarif spi</th>
                <th scope="col" class="text-right">Pembayaran spi</th>
                <th scope="col" class="text-right">Piutang</th>
                <th scope="col" class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody class="table-body">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <div class="modal-header">
            <p class="text-center">
                <h5 class="modal-title text-warning text-center">Export Modal</h5>
            </p>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <p>Program Studi</p>
            <select class="form-control w-100" id="prodi_export">

            </select>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-modal-cancel w-100" data-dismiss="modal">Batal</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary w-100" onclick="export_func()">Export</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<script>
  function importFile() {
    $("#file").click()
  }

  function clickButton() {
    $("#submit").click();
  }
  function exportModal() {
    $('#exportModal').modal('show')
  }
  function export_func() {
    var prodi = $('#prodi_export').val()
    window.location.href=`${url_api}/keuangan/spi/export/${prodi}`
  }
  $(document).ready(function() {
    var optProdi = ``;
    $.each(dataGlobal['prodi'],function (key,row) {
      optProdi += `<option value="${row.nomor}">${row.nama_program} ${row.program_studi}</option>`
    })
    $('#prodi_export').append(optProdi)

    dt_pageLength = 100;
    dt_type = 'post'
    dt_url = `${url_api}/keuangan/spi`;
    dt_opt = {
      serverSide: true,
      order: [[0, 'desc']],
      columnDefs: [
      {
        "aTargets": 3,
        "className": 'text-center',
        "mRender": function (data, type, row) {
          return formatTanggal(data);
        }
      },{
        "aTargets": [4, 5, 6],
        "className": 'font-weight-bold text-right',
        "mRender": function(data, type, full) {
          return formatAngka(data);
        }
      },{
        "aTargets": 7,
        "className": 'font-weight-bold text-right',
        "mRender": function(data, type, full) {
          return `<a href="{{ url('keuangan/rekapitulasi/spi/detail/`+data+`') }}" class="btn btn-sm btn-primary"><i class="iconify mr-1" data-icon="bx:bxs-user-detail"></i>
          <span class="text-white">Lihat Detail</span></a>`
        }
      }
      ]
    };
    load_datatable();

    $("#form_cu").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: url_api+"/keuangan/spi/import",
        type: "post",
        dataType: 'json',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(res) {
          if (res.status=="success") {
            window.location.href = "{{url('/keuangan/rekapitulasi/spi')}}";
          } else {
            console.log("Gagal");
          }
        }
      });
    });
  });
</script>
@endsection