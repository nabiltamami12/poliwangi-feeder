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
              <h2 class="mb-0 text-center text-md-left">Data Pendaftar Mahasiswa Baru</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <!-- <button type="button" class="btn btn-primary">
                <i class="iconify-inline mr-2" data-icon="bx:bx-download"></i>
                Import
              </button>
              <button type="button" class="btn btn-warning ml-md-2">
                <i class="iconify-inline" data-icon="bx:bx-upload"></i>
                Eksport
              </button> -->
            </div>
          </div>
        </div>
        <hr class="mt-4">

        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless table-hover" id="datatable">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">No. VA</th>
                <th scope="col">Nama</th>
                <th scope="col" class="text-right">Nominal</th>
                <th scope="col">Status Bayar</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
          </table>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="setBiayaPendaftar" tabindex="-1" aria-labelledby="setBiayaPendaftarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content padding--medium">
        <div class="detail_cicilan">
          <h1 class="modal-title text-center my-2">Atur Biaya SPI dan UKT</h1>
          <form class="mt-4-5">
            <div class="form-row mt-4-5">
              <dl class="row">
                <dt class="col-sm-5">Nama Pendaftar</dt>
                <dd class="col-sm-7">Nama Pendaftar...</dd>
                <dt class="col-sm-5">Program Studi Pilihan 1</dt>
                <dd class="col-sm-7">Prodi pilihan 1</dd>
                <dt class="col-sm-5">Program Studi Pilihan 2</dt>
                <dd class="col-sm-7">Prodi pilihan 2</dd>
                <dt class="col-sm-5">Program Studi Pilihan 3</dt>
                <dd class="col-sm-7">Prodi pilihan 2 - Politeknik Negeri Bengkalis</dd>
              </dl>
              <div class="col-md-6 pr-0 pr-md-2">
                <label for="nominal_spi">Nominal SPI</label>
                <input type="text" class="form-control text-right" id="nominal_spi" placeholder="Rp. x.xxx.xxx">
              </div>
              <div class="col-md-6 pl-0 pl-md-2 mt-3 mt-md-0">
                <label for="kelompok_ukt">Kelompok UKT
                </label>
                <select class="form-control" id="kelompok_ukt">
                  <option value="">Rp500.000</option>
                  <option value="">Rp750.000</option>
                  <option value="">Rp900.000</option>
                  <option value="">Rp1.200.000</option>
                  <option value="">Rp1.750.000</option>
                  <option value="">Rp2.500.000</option>
                  <option value="">Rp3.500.000</option>
                  <option value="">Rp4.000.000</option>
                  <option value="">Rp5.000.000</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal_button mt-4-5 d-flex justify-content-between">
          <button type="button" class="btn btn-outline-danger rounded-sm w-100 mr-2 mr-md-3"
          data-dismiss="modal">Batal</button>
          <button type="button" id="btn_simpan" class="btn btn-success rounded-sm w-100 ml-2 ml-md-3">Simpan</button>
        </div>
      </div>
    </div>
  </div>

</section>

<script>

function importFile() {
  $("#file").click()
}

function clickButton() {
  $("#submit").click();
}
$(document).ready(function() {

var nomor = 1;
dt_url = `${url_api}/pendaftar/keuangan`;
dt_opt = {
"columnDefs": [
    {
      "aTargets": [0],
      "mData": null,
      "className": 'text-center pr-0',
      "mRender": function(data, type, full) {
        return nomor++;
      }
    },{
      "aTargets": [1],
      "mData": null,
      "className": 'text-center',
      "mRender": function(data, type, full) {
        return data['nomor_va'];
      }
    },{
      "aTargets": [2],
      "mData": null,
      "className": 'font-weight-bold text-capitalize',
      "mRender": function(data, type, full) {
        return data['nama'];
      }
    },{
      "aTargets": [3],
      "mData": null,
      "className": 'font-weight-bold text-right',
      "mRender": function(data, type, full) {
        return formatAngka(data['trx_amount']);
      }
    },{
      "aTargets": [4],
      "mData": null,
      "className": 'text-success text-uppercase font-weight-bold',
      "mRender": function(data, type, full) {
        if (data['is_lunas'] == 1) {
          return '<span style="color:green">Lunas</span>'
        }else{
          return '<span style="color:red">Belum Lunas</span>'
        }
      }
    },{
        "aTargets": [5],
        "mData": null,
        "mRender": function(data, type, full) {
          var btn_update = `<button type="button" class="btn btn-primary" onclick="setBiayaPendaftar(${data.nomor})">
            <i class="iconify mr-1" data-icon="bx:bx-cloud-upload"></i>
            <span class="text-white">Atur Biaya</span>
          </button> `
          return res = btn_update;
        }
      }
  ]}


}
 
);

function setBiayaPendaftar(nomor,) {
  console.log(nomor)
  $('#setBiayaPendaftar').modal('show')
  // $.ajax({
  //   url: url_api+"/keuangan/detail?program_studi="+program_studi,
  //   type: 'get',
  //   dataType: 'json',
  //   success: function(res) {
  //     console.log(res)
  //   }
  // })
  // $.ajax({
  //   url: url_api+"/keuangan/detail?program_studi="+program_studi,
  //   type: 'post',
  //   dataType: 'json',
  //   data: {
  //     'tenor' : jml_bulan,
  //     'id_mahasiswa' : id_mahasiswa,
  //     'bulan' : arr_bulan,
  //     'nominal' : arr_nominal,
  //   },
  //   success: function(res) {
  //     console.log(res)
  //   }
  // })
}
</script>
@endsection