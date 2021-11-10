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
            <div class="col-12 col-md-12">
              <h2 class="mb-0 text-center text-md-left">GENERATE NIM</h2>
              <span class="text-danger text-sm">* Pastikan kode EPSBED / kode program studi sudah disetting dengan panjang 5 digit
            </div>
          </div>
        </div>
        <hr class="mt-4">

       

        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless table-hover" id="datatable">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center px-2">No</th>
                <th scope="col" class="text-center px-2">Prodi</th>
                <th scope="col" class="text-center px-2">Kode EPSBED</th>
                <th scope="col" class="text-center px-2">Jumlah Pendaftar</th>
                <th scope="col" class="text-center px-2">Aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
             
            </tbody>
          </table>
        </div>

        
      </div>
    </div>
  </div>
<div class="modal fade" id="konfirmModal" tabindex="-1" aria-labelledby="konfirmModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <input type="hidden" id="id_prodi">

        <div class="modal-header">
            <p class="text-center">
                <h5 class="modal-title text-primary text-center">Konfirmasi</h5>
            </p>
        </div>
        <div class="modal-body">
          <p class="text-center font-weight-bold">Apakah anda yakin akan generate NIM untuk program studi :</p>
          <h2 class="text-center mb-4"><span id="text_keterangan"></span></h2>
          <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-modal-cancel w-100" data-dismiss="modal">Batal</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary w-100" onclick="func_generate()">Generate</button>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="listModal" tabindex="-1" aria-labelledby="listModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <input type="hidden" id="id_prodi">

        <div class="modal-body">
          <p class="text-center font-weight-bold">List hasil generate NIM :</p>
          <table class="table align-items-center table-flush table-hover" id="list_generate">
            <thead class="table-header">
              <tr>
                <th scope="col" >No</th>
                <th scope="col" >NIM</th>
                <th scope="col" >Nama</th>
              </tr>
            </thead>

            <tbody class="table-body-list">
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
</section>
<script>
  
$(document).ready(function() {  
  var nomor = 1;
  dt_url = `${url_api}/admin/pendaftar/generate-nim`;
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
          res = data['prodi'];
          return res;
        }
      },{
        "aTargets": [2],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = data['kode_epsbed'];
          return res;
        }
      },{
        "aTargets": [3],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
          res = data['jml_pendaftar']+" Orang";
          return res;
        }
      },{
        "aTargets": [4],
        "mData": null,
        "className": 'text-center px-2',
        "mRender": function(data, type, full) {
            var id = data['nomor']
            if (data['kode_epsbed']==null || data['kode_epsbed']=="") {
                var disabled = "disabled";
            }else{
                var disabled = "";
                if (data['kode_epsbed'].length!=5) {
                    var disabled = "disabled";
                }
                if (data['jml_pendaftar']==0) {
                    var disabled = "disabled";
                }
            }
            var btn_generate = `
                <button class="btn btn-info_transparent text-primary " ${disabled} id="btn_${id}" onclick="func_modal(${id},'${data['prodi']}',${data['jml_pendaftar']})" data-id="${id}">
                    <i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-cog"></i>
                    Generate
                </button>`
            var btn_list = `
                <button class="btn btn-warning" ${disabled} id="btn_${id}" onclick="func_modal_list(${id},'${data['prodi']}',${data['jml_pendaftar']})" data-id="${id}">
                    List
                </button>`

            res = btn_generate+" "+btn_list;
            
            return res;
        }
      }
    ]}
  } 
);
function func_modal(id,prodi,jml_pendaftar) {
    $('#id_prodi').val(id)
    $('#text_keterangan').text(prodi+" - "+jml_pendaftar+" Orang")
    $('#konfirmModal').modal('show')
}
function func_modal_list(id,prodi,jml_pendaftar) {
    $.ajax({
        url: url_api + "/admin/pendaftar/list-generate-nim",
        type: 'get',
        dataType: 'json',
        data: {'program_studi':id},
        success: function(res) {
            console.log(res)
          if (res.status == "success") {
            $('.table-body-list').html('')
            $.each(res.data,function(key,row) {  
              var html = `
                  <tr>
                    <td>
                      ${key+1}
                    </td>
                    <td>
                      ${row.nrp}
                    </td>
                    <td>
                      ${row.nama}
                    </td>
                  </tr>
                `

                $('.table-body-list').append(html)
            })
              $('#listModal').modal('show')

          } else {
            // alert gagal
          }
          
        }
      });
}
function func_generate() {
    $.ajax({
        url: url_api + "/admin/pendaftar/generate-nim",
        type: 'post',
        dataType: 'json',
        data: {'program_studi':$('#id_prodi').val()},
        success: function(res) {
            console.log(res)
          if (res.status == "success") {
            $('#konfirmModal').modal('hide');
            dt.ajax.reload();                
          } else {
            // alert gagal
          }
          
        }
      });
}
</script>
@endsection