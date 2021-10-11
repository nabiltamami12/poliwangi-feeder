@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid">
  <!-- Modal -->
  <div class="modal fade" id="dokumenPiutangModal" tabindex="-1" aria-labelledby="dokumenPiutangModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content padding--medium">
        <div class="dokumen_pengajuan">
          <h1 class="modal-title text-center my-2">Dokumen Pengajuan Piutang</h1>
          <div class="detail_dokumen d-flex align-items-center justify-content-between mt-5 mb-2">
            <span>
              <i class="iconify mr-2" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
              <span class="nama_dokumen">Dokumen_Bryan_Wijaya.pdf</span>
            </span>
            <i class="iconify text-primary" data-icon="bx:bx-cloud-download" data-inline="false"></i>
          </div>
        </div>
        <div class="dokumen_perjanjian">
          <h1 class="modal-title text-center mt-5 mb-2">Dokumen Perjanjian Piutang</h1>
          <div class="detail_dokumen d-flex align-items-center justify-content-between mt-5">
            <span>
              <i class="iconify mr-2" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
              <span class="nama_dokumen">Dokumen_Bryan_Wijaya.pdf</span>
            </span>
            <i class="iconify text-primary" data-icon="bx:bx-cloud-download" data-inline="false"></i>
          </div>
        </div>
        <div class="modal_button mt-4-5 d-flex justify-content-between">
          <button type="button" class="btn btn-outline-placeholder rounded-sm w-100 mr-2 mr-md-3"
            data-dismiss="modal">Kembali</button>
          <button type="button" class="btn btn-success rounded-sm w-100 ml-2 ml-md-3">Setujui</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="uploadPerjanjianModal" tabindex="-1" aria-labelledby="uploadPerjanjianModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content padding--medium">
        <div class="perjanjian_pembayaran">
          <h1 class="modal-title text-center mt-2">Upload Perjanjian Pembayaran</h1>
          <div class="detail_dokumen upload-perjanjian d-flex align-items-center justify-content-between mt-5">
            <form>
              <span>
                <i class="iconify mr-2" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
                <input type="file" id="file" hidden />
                <input type="text" id="id_piutang" hidden />
                <input type="text" id="id_mahasiswa" hidden />

                <a id="nama_dokumen_perjanjian" class="nama_dokumen" target="_blank">No File</a>
              </span>
            </form>
            <button type="button" id="custom-btn">
              <i class="iconify text-primary" data-icon="bx:bx-cloud-upload" data-inline="false"></i>
            </button>
          </div>
        </div>
        <hr class="my-4-5">
        <div class="detail_cicilan">
          <h1 class="modal-title text-center my-2">Detail Cicilan Pembayaran</h1>
          <form class="mt-4-5">
            <div class="form-row">
              <label for="">Jumlah Cicilan</label>
              <select class="form-control" id="jumlah_cicilan">
                <?php for ($i=1; $i <= 12 ; $i++) { ?>
                  <option value="{{$i}}">{{$i}}</option>
                <?php } ?>
              </select>
            </div>
            <div id="list_cicilan">
              <div class="form-row mt-4-5">
                <div class="col-md-6 pr-0 pr-md-2">
                  <label for="bulan">Bulan Cicilan Ke-1</label>
                  <select class="form-control" id="bulan_1">
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
                </div>
                <div class="col-md-6 pl-0 pl-md-2 mt-3 mt-md-0">
                  <label for="nominal">Nominal Cicilan Ke-1</label>
                  <input type="text" class="form-control text-right" id="nominal_1" placeholder="Rp. x.xxx.xxx">
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal_button mt-4-5 d-flex justify-content-between">
          <button type="button" class="btn btn-outline-danger rounded-sm w-100 mr-2 mr-md-3"
            data-dismiss="modal">Batal</button>
          <button type="button" id="btn_simpan" class="btn btn-success rounded-sm w-100 ml-2 ml-md-3">Submit</button>
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
              {{-- <button type="button" class="btn btn-success mt-3 mt-md-0">
                <i class="iconify-inline mr-1" data-icon="bx:bxs-plus-circle"></i>
                Tambah
              </button> --}}

              <!-- <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle mt-3 mt-md-0 ml-0 ml-md-1" type="button"
                  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="iconify-inline mr-1" data-icon="bx:bx-cloud-download"></i>
                  Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{url('api/v1/keuangan/export/rekap-piutang')}}">Rekap Piutan</a>
                </div>
              </div> -->
            </div>
          </div>
        </div>
        <hr class="mt-4">

        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center pl-2">No</th>
                <th scope="col" class="pl-2">nim</th>
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
var path_berkas = "{{asset('')}}";
var nomor = 1;
dt_url = `${url_api}/keuangan/list_cicilan`;
  dt_opt = {
  "columnDefs": [
      {
        "aTargets": [0],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = nomor++;
          return res;
        }
      },{
        "aTargets": [1],
        "mData": null,
        "className": 'font-weight-bold text-capitalize px-2',
        "mRender": function(data, type, full) {
          res = data['nim'];
          return res;
        }
      },{
        "aTargets": [2],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = data['nama'];
          return res;
        }
      },{
        "aTargets": [3],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = formatAngka(data['ukt']);
          return res;
        }
      },{
        "aTargets": [4],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = formatAngka(data['spi']);
          return res;
        }
      },{
        "aTargets": [5],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = formatAngka(data['jumlah']);
          return res;
        }
      },{
        "aTargets": [6],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = data['status_piutang'];
          return res;
        }
      },{
        "aTargets": [7],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {          
          var file_perjanjian = data['path_perjanjian'];
          var id = data['id'];
          var id_mahasiswa = data['id_mahasiswa'];
          var btn_update = `
                  <button type="button" class="btn btn-primary" onclick="perjanjianModal(${id},${id_mahasiswa},'${file_perjanjian}')">
                    <i class="iconify mr-1" data-icon="bx:bx-cloud-upload"></i>
                    <span class="text-white">Upload Perjanjian</span>
                  </button> ` 
          return res = btn_update;
        }
      }
    ]}
  $(document).ready(function () {
    getInfo()

    $('#jumlah_cicilan').on('change',function (e) {
      $('#list_cicilan').html('')
      var html = '';
      for (let index = 1; index <= $(this).val(); index++) {
        html += `<div class="form-row mt-4-5">
              <div class="col-md-6 pr-0 pr-md-2">
                <label for="bulan_${index}">Bulan Cicilan Ke-${index}</label>
                <select class="form-control" id="bulan_${index}">
                  <option value="1">Januari</option>
                  <option value="2">Februari</option>
                  <option value="3">Maret</option>
                  <option value="4">April</option>
                  <option value="5">Mei</option>
                  <option value="6">Juni</option>
                  <option value="7">Juli</option>
                  <option value="8">Agustus</option>
                  <option value="9">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>
              </div>
              <div class="col-md-6 pl-0 pl-md-2 mt-3 mt-md-0">
                <label for="nominal_${index}">Nominal Cicilan Ke-${index}</label>
                <input type="text" class="form-control text-right" id="nominal_${index}" placeholder="Rp. x.xxx.xxx">
              </div>
            </div>`
      }
      $('#list_cicilan').append(html);
    })

    $('#btn_simpan').on('click',function (e) {
      var arr_bulan = [];
      var arr_nominal = [];
      var jml_bulan = $('#jumlah_cicilan').val();
      var id_piutang = $('#id_piutang').val();
      var id_mahasiswa = $('#id_mahasiswa').val();
      for (let index = 1; index <= jml_bulan; index++) {
        var key = arr_bulan.indexOf($('#bulan_'+index).val());
        if(key !== -1){
          arr_nominal[key] = $('#nominal_'+index).val()
        } else{
          arr_bulan.push($('#bulan_'+index).val());
          arr_nominal.push($('#nominal_'+index).val());
        }
      }
      var arr = {
        'tenor' : jml_bulan,
        'id_mahasiswa' : id_mahasiswa,
        'bulan' : arr_bulan,
        'nominal' : arr_nominal,
      }
      $.ajax({
          url: url_api+"/keuangan/cicilan/"+id_piutang,
          type: 'post',
          dataType: 'json',
          data: arr,
          success: function(res) {
            console.log(res)
            location.reload()
          }
      })
    })
  })
  const inputFile = document.getElementById("file");
  const customBtn = document.getElementById("custom-btn");
  const customText = document.getElementById("nama_dokumen_perjanjian");
  // const formUpload = document.querySelector(".upload-perjanjian form");
  // const formWrapper = document.querySelector('.upload-perjanjian');

  customBtn.addEventListener("click", function () {
    inputFile.click();
  });

  inputFile.addEventListener("change", function () {
    if (inputFile.value) {
      let fileName = inputFile.value.match(/[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/)[0];
      customText.innerHTML = fileName;
      uploadPerjanjian()
    } else {
      customText.innerHTML = "tidak ada file dipilih";
    }
  });
  function getInfo() {
    $.ajax({
        url: url_api+"/keuangan/stats",
        type: 'get',
        dataType: 'json',
        data: {},
        beforeSend: function(text) {
                // loading func
                console.log("loading")
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

  function uploadPerjanjian(){
      var id_piutang = $('#id_piutang').val();
      var file_data = $('#file').prop('files')[0];   
      var form_data = new FormData();                  
      form_data.append('file', file_data);

      $.ajax({
          url: url_api+"/keuangan/perjanjian/"+id_piutang,
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

  function pengajuanModal() {
    $('#dokumenPiutangModal').modal('show')
  }
  function perjanjianModal(id,id_mahasiswa,file_perjanjian) {
    $('#id_piutang').val(id)
    $('#id_mahasiswa').val(id_mahasiswa)
    $('#nama_dokumen_perjanjian').prop('href',path_berkas+"/"+file_perjanjian)
    $('#uploadPerjanjianModal').modal('show')
  }
</script>
@endsection