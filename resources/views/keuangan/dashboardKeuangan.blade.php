@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid">
  <!-- Modal -->
  <div class="modal fade" id="templatePerjanjian" tabindex="-1" aria-labelledby="templatePerjanjianModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content padding--medium">
        <h1 class="modal-title text-center mt-2">Template Surat Perjanjian</h1>
        <div class="detail_dokumen d-flex align-items-center justify-content-between mt-5">
          <form>
            <span>
              <i class="iconify mr-2" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
              <input type="file" name="file" class="file" hidden />
              <a class="nama_dokumen" target="_blank">No File</a>
            </span>
          </form>

          <button type="button" class="custom-btn">
            <i class="iconify text-primary" data-icon="bx:bx-cloud-upload" data-inline="false"></i>
          </button>
        </div>
        <label class="mt-3">File saat ini: <span class="status_perjanjian">Sedang dicek...</span></label>
        <p>Silahkan upload lagi untuk mengubah.</p>
        <div class="modal_button mt-4-5 d-flex justify-content-between">
          <button type="button" class="btn btn-outline-placeholder rounded-sm w-100 mr-2 mr-md-3"
          data-dismiss="modal">Kembali</button>
          <button type="button" class="submit btn btn-success rounded-sm w-100 ml-2 ml-md-3">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="masukkanMahasiswa" tabindex="-1" aria-labelledby="masukkanMahasiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content padding--medium">
        <h1 class="modal-title text-center mt-2">Masukkan Mahasiswa dalam Daftar Piutang</h1>
        <div class="form-row mt-5">
          <label for="nim">Pilih Mahasiswa</label>
          <select class="form-control" id="nim" name="nim"></select>
        </div>
        <!-- <label class="mt-3">Pilih Surat Pengajuan</label>
        <div class="detail_dokumen d-flex align-items-center justify-content-between">
          <form>
            <span>
              <i class="iconify mr-2" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
              <input type="file" name="file" class="file" hidden />
              <a class="nama_dokumen" target="_blank">No File</a>
            </span>
          </form>
          <button type="button" class="custom-btn">
            <i class="iconify text-primary" data-icon="bx:bx-cloud-upload" data-inline="false"></i>
          </button>
        </div> -->
        <p class="mt-3">Status piutang mahasiswa akan <b>pending</b> sampai mahasiswa upload berkas surat perjanjian dan keuangan memasukkan data cicilan.</p>
        <div class="modal_button mt-4-5 d-flex justify-content-between">
          <button type="button" class="btn btn-outline-placeholder rounded-sm w-100 mr-2 mr-md-3" data-dismiss="modal">Kembali</button>
          <button onclick="simpanPiutangBaru()" class="submit btn btn-success rounded-sm w-100 ml-2 ml-md-3">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row equal-cols" style="display: none">
    <div class="col-sm-6 col-lg-4">
      <div class="card card-stats mb-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Total Piutang</h5>
              <span class="h2 font-weight-bold mb-0">Rp. <span id="total_piutang"></span></span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-blue text-white rounded-circle shadow">
                <i class="iconify-inline" data-icon="bx:bx-receipt"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm d-flex justify-content-between">
            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
            <span class="text-nowrap text-muted">dari 1 Bulan Terakhir</span>
          </p>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-lg-4">
      <div class="card card-stats mb-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">PIUTANG BELUM TERBAYAR</h5>
              <span class="h2 font-weight-bold mb-0">Rp. <span id="piutang_belum_terbayar"></span></span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                <i class="iconify-inline" data-icon="bx:bx-receipt"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm d-flex justify-content-between">
            <span class="text-danger mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
            <span class="text-nowrap text-muted">dari 1 Bulan Terakhir</span>
          </p>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-lg-4">
      <div class="card card-stats mb-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">TOTAL MAHASISWA BELUM MEMBAYAR</h5>
              <span class="h2 font-weight-bold mb-0"><span id="total_mahasiswa"></span> Orang</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                <i class="iconify-inline" data-icon="bx:bx-receipt"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm d-flex justify-content-between">
            <span class="text-danger mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
            <span class="text-nowrap text-muted">dari 1 Bulan Terakhir</span>
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-3">
              <h2 class="mb-0 text-center text-md-left">Piutang Mahasiswa</h2>
            </div>
            <div class="col-12 col-md-9 text-center text-md-right">
              <button id="template-perjanjian" type="button" class="btn btn-success mt-3 mt-md-0">
                <i class="iconify-inline mr-1" data-icon="bx:bx-cloud-upload"></i>
                Template Perjanjian
              </button>
              <a href="javascript:masukkanMahasiswa()" class="btn btn-primary mt-3 mt-md-0">
                <i class="iconify-inline mr-1" data-icon="carbon:download-study"></i>
                Tambah Piutang
              </a>

              <!-- <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle mt-3 mt-md-0 ml-0 ml-md-1" type="button"
                  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="iconify-inline mr-1" data-icon="bx:bx-cloud-download"></i>
                  Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Rekap Piutan</a>
                </div>
              </div> -->
            </div>
          </div>
        </div>
        <hr class="mt-4">

        <div class="table-responsive">
          <table id="datatable-pending" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center pl-2">No</th>
                <th scope="col" class="pl-2">NIM</th>
                <th scope="col" class="pl-2">Nama Debitur</th>
                <th scope="col" class="text-right pl-2">UKT</th>
                <th scope="col" class="text-right pl-2">SPI</th>
                <th scope="col" class="text-right pl-2">Jumlah</th>
                <th scope="col" class="text-center pl-2">Status<br>Piutang</th>
                <th scope="col" class="text-center pl-2">Aksi</th>
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
@endsection

@section('js')
<script>
  $(function () {
    dt_pageLength = 100;
    dt_type = 'post'
    dt_url = `${url_api}/keuangan/list-cicilan`;
    dt_opt = {
      serverSide: true,
      order: [[0, 'desc']],
      columnDefs: [
      {
        "aTargets": [0, 6],
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          return data;
        }
      },{
        "aTargets": 1,
        "className": 'font-weight-bold text-capitalize px-2',
        "mRender": function(data, type, full) {
          return data;
        }
      },{
        "aTargets": 2,
        "className": 'px-2',
        "mRender": function(data, type, full) {
          return data;
        }
      },{
        "aTargets": [3, 4, 5],
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          return formatAngka(data);
        }
      },{
        "aTargets": 7,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          return `<a class="btn btn-sm btn-primary" href="{{url('')}}/keuangan/rekapitulasi/piutangmahasiswa/detail/`+data+`">
                    <i class="iconify mr-1" data-icon="bx:bxs-user-detail"></i>
                    <span class="text-white">Detail Piutang</span>
                  </a>`;
        }
      }
      ]
    };
    load_datatable();
  });

  $(document).ready(function () {
    getInfo()

    $("#nim").select2({
      ajax: {
        url: '{{ url('api/v1/mahasiswa/select-option') }}',
        dataType: 'json',
        delay: 1000,
        data: function (params) {
          return {
            q: params.term,
            page: params.page
          };
        },
        processResults: function ({data}, params) {
          params.page = params.page || 1;
          return {
            results: data.items,
            pagination: {
              more: (params.page * 15) < data.total_count
            }
          };
        },
        cache: true
      },
      placeholder: 'Cari NIM',
      minimumInputLength: 3,
    });
  })

  $('#templatePerjanjian .custom-btn').on('click', function () {
    $('#templatePerjanjian [name="file"]').click()
  })
  $('#templatePerjanjian [name="file"]').on('change', function () {
    let fileName = this.value.match(/[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/)[0];
    $('#templatePerjanjian .nama_dokumen').text(fileName)
  })

  $('#templatePerjanjian .submit').on('click', function () {
    var file_data = $('#templatePerjanjian [name="file"]').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);

    $.ajax({
        url: url_api+"/keuangan/template-perjanjian",
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(res){
          $('#templatePerjanjian .nama_dokumen').html('Upload sukses: <a href="'+url_api+'/download/template-perjanjian" target="_blank">Lihat</a>')
          check_file_perjanjian()
        }
    });
  })

  function getInfo() {
    $.ajax({
        url: url_api+"/keuangan/stats",
        type: 'get',
        dataType: 'json',
        data: {},
        beforeSend: function(text) {
          loading('show')
        },
        success: function(res) {
          console.log(res.data.total_mahasiswa)
          if (res.status=="success") {
            $('#total_piutang').text(res.data.total_piutang);
            $('#piutang_belum_terbayar').text(res.data.belum_terbayar);
            $('#total_mahasiswa').text(res.data.total_mahasiswa);
          } else {
            
          }
          loading('hide')
        }
    })
  }

  function check_file_perjanjian() {
    $.ajax({
        url: url_api+"/keuangan/template-perjanjian",
        dataType: 'json',
        cache: false,
        type: 'get',
        success: function(res){
          if (res.status == 'success') {
            $('.status_perjanjian').html('<a href="'+res.data+'" target="_blank">Telah diupload</a>')
          }else{
            $('.status_perjanjian').html('Belum diupload')
          }
        }
    });
  }

  $('#template-perjanjian').on('click', function () {
    $('#templatePerjanjian').modal('show')
    check_file_perjanjian()
  })

  function masukkanMahasiswa(){
    $('#masukkanMahasiswa').modal('show')
  }

  $('#masukkanMahasiswa .custom-btn').on('click', function () {
    $('#masukkanMahasiswa [name="file"]').click()
  })
  $('#masukkanMahasiswa [name="file"]').on('change', function () {
    let fileName = this.value.match(/[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/)[0];
    $('#masukkanMahasiswa .nama_dokumen').text(fileName)
  })

  function simpanPiutangBaru() {
    if ($('#masukkanMahasiswa [name="nim"]').val() == null) {
      return false
    }
    var id_mahasiswa = $('#masukkanMahasiswa [name="nim"]').val();   
    var form_data = new FormData();
    form_data.append('id_mahasiswa', id_mahasiswa);
    $.ajax({
        url: url_api+"/keuangan/perjanjian",
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(res){
          location.reload()
        }
    });
  }
</script>
@endsection