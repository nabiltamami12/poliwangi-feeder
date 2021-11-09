@extends('layouts.main')

@section('content')
<style>
    .badge{
        color:#fff !important;
        cursor:pointer;
    }
</style>
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="akademik_datamahasiswa">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0 mb-3">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Data Pendaftar Mahasiswa Baru</h2>
            </div>
          </div>
        </div>
        <form class="form-select rounded-0">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="jenjang-pendidikan">Jenjang Pendidikan</label>
              <select class="form-control" id="program_studi" name="program_studi">
                
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label for="kelas">Jalur Penerimaan</label>
              <select class="form-control" id="jalur_penerimaan" name="jalur_penerimaan">
                
              </select>
            </div>
          </div>
        </form>
        <hr class="my-4 mt">

        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">No. Pendaftar</th>
                <th scope="col" style="width: 25%">Nama</th>
                <th scope="col" style="width: 25%">Jalur Penerimaan</th>
                <th scope="col" style="width: 25%">Status</th>
                <th scope="col" style="width: 25%">Status Bayar</th>
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
        <input type="hidden" id="id_delete">
        <input type="hidden" id="endpoint">

        <div class="modal-header">
            <p class="text-center">
                <h5 class="modal-title text-warning text-center">Detail Pendaftar</h5>
            </p>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_pendaftar">
          <h4 class="mb-0 mb-2" id="prodi">Nomor Pendaftar</h4>
          <h5 class="mb-0 mb-3" id="nomor_pendaftar" style="font-weight:400;">201231248</h5>
          <h4 class="mb-0 mb-2" id="prodi">Nama Pendaftar</h4>
          <h5 class="mb-0 mb-3" id="nama_pendaftar" style="font-weight:400;">201231248</h5>
          <h4 class="mb-0 mb-2" id="prodi">Jalur Penerimaan</h4>
          <h5 class="mb-0 mb-3" id="jalur_pendaftar" style="font-weight:400;">201231248</h5>
          <h4 class="mb-0 mb-2" id="prodi">Diterima di :</h4>
          <div class="mb-3" id="list_pilihan">
            <div id="list_poliwangi">

            </div>
            <div id="list_poltek">

            </div>
            <div class="d-flex" onclick="func_centang(this,0,'')" style="cursor:pointer">
              <i id="centang_tidak_lolos" class="iconify centang-pilihan text-placeholder mt-1 mr-3" data-icon="akar-icons:circle-check-fill"></i>
              <p class="d-inline-block font-weight-bold">Tidak Lolos</p>
            </div> 
          </div>
          <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-modal-cancel w-100" data-dismiss="modal">Batal</button>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-primary w-100" onclick="func_simpan()">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
<script>
  var prodi_selected,poltek_selected;
  $(document).ready(function() {
  getData();

  $('#searchdata').on('keyup', function() {
    dt.search(this.value).draw();
  });
  $('select').on('change',function (e) {
    if ($('#jalur_penerimaan').val()=="") {
        var jalur = "";
    } else {
        var jalur = `&jalur=${$('#jalur_penerimaan').val()}`        
    }
    var url = `${url_api}/admin/pendaftar?program_studi=${$('#program_studi').val()}`+jalur;
    dt.ajax.url(url).load();
  })
} );
async function getData() {
    var optProgram,optJurusan,optKelas,optStatus;
    console.log(dataGlobal['prodi'])
    optProgram = `<option value=""> - </option>`
    $.each(dataGlobal['prodi'],function (key,row) {
        optProgram += `<option value="${row.nomor}">${row.nama_program} ${row.program_studi}</option>`
    })
    $('#program_studi').append(optProgram)

    optStatus = `<option value=""> - </option>`
    $.each(dataGlobal['jalur_pmb'],function (key,row) {
        optStatus += `<option value="${row.id}">${row.jalur_daftar}</option>`
    })
    $('#jalur_penerimaan').append(optStatus)
    setDatatable();
}
function func_centang(e,id_selected,poltek) {
  $('.centang-pilihan').removeClass('text-success')
  $('.centang-pilihan').addClass('text-placeholder')
  $(e).find('.centang-pilihan').removeClass('text-placeholder')
  $(e).find('.centang-pilihan').addClass('text-success')
  prodi_selected = id_selected;
  poltek_selected = poltek;
}


function func_simpan() {
    var id_pendaftar = $('#id_pendaftar').val();
    
    $.ajax({
        url: url_api+"/admin/pendaftar/verifikasi/"+id_pendaftar,
        type: 'put',
        dataType: 'json',
        data: {'program_studi':prodi_selected,'poltek':poltek_selected},
        success: function(res) {
            console.log(res)
            if (res.status=="success") {

                $('#centang_tidak_lolos').removeClass('text-success')
                $('#centang_tidak_lolos').addClass('text-placeholder')
                $('#konfirmModal').modal('hide');
                dt.ajax.reload();    
            } else {
                // alert gagal
            }
            

        }
    });
}

function func_modal(id) {
  $.ajax({
    url: url_api+"/admin/pendaftar-konfirmasi/"+id,
    type: 'get',
    dataType: 'json',
    data: {},
    headers: {},
    success: function(res) {
      if (res.status=="success") {
        $('#id_pendaftar').val(res.data.pendaftar.id);
        $('#nama_pendaftar').text(res.data.pendaftar.nama);
        $('#nomor_pendaftar').text(res.data.pendaftar.nodaftar);
        $('#jalur_pendaftar').text(res.data.pendaftar.jalur_daftar);
        $('#list_poliwangi').html('');
        var i = 0;
        $.each(res.data.poliwangi,function (key,row) {
          console.log(row)
          var html = `          
            <div class="d-flex" onclick="func_centang(this,${row.id},'poliwangi')" style="cursor:pointer">
              <i id="centang_${i}" class="iconify centang-pilihan text-placeholder mt-1 mr-3" data-icon="akar-icons:circle-check-fill"></i>
              <p class="d-inline-block font-weight-bold">Politeknik Neger Banyuwangi - ${row.prodi}</p>
            </div>`
          $('#list_poliwangi').append(html);
          console.log(i+" == "+res.data.pendaftar.program_studi)
          if (row.id==res.data.pendaftar.program_studi) {
            console.log("sama")
            $('#centang_'+i).removeClass('text-placeholder');
            $('#centang_'+i).addClass('text-success');
          }
          i++;
        })

        $('#list_poltek').html('');
        if (res.data.poltek_lain != null) {
          var html = `  
            <div class="d-flex" onclick="func_centang(this,${res.data.poltek_lain.id},'poltek')" style="cursor:pointer">
              <i id="centang_${i}" class="iconify centang-pilihan text-placeholder mt-1 mr-3" data-icon="akar-icons:circle-check-fill"></i>
              <p class="d-inline-block font-weight-bold">${res.data.poltek_lain.politeknik} - ${res.data.poltek_lain.prodi}</p>
            </div>`
          $('#list_poltek').append(html);
          if (res.data.poltek_lain.id==res.data.pendaftar.program_studi_luar) {
            console.log("sama")
            $('#centang_'+i).removeClass('text-placeholder');
            $('#centang_'+i).addClass('text-success');
          }

        }
        if (res.data.pendaftar.status=="T") {
          $('#centang_tidak_lolos').removeClass('text-placeholder')
          $('#centang_tidak_lolos').addClass('text-success')
        }
      }
      $('#konfirmModal').modal('show')

    }
  });
}
function setDatatable() {
    if ($('#jalur_penerimaan').val()=="") {
        var jalur = "";
    } else {
        var jalur = `&jalur=${$('#jalur_penerimaan').val()}`        
    }
  var nomor = 1;
  dt_url = `${url_api}/admin/pendaftar?program_studi=${$('#program_studi').val()}`+jalur;
dt_opt = {
  "columnDefs": [
        {
          "aTargets": [0],
          "mData": null,
          "mRender": function(data, type, full) {
            res = nomor++;
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [1],
          "mData": null,
          "mRender": function(data, type, full) {
            res = data['nodaftar'];
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [2],
          "mData": null,
          "mRender": function(data, type, full) {
            res = data['nama'];
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [3],
          "mData": null,
          "mRender": function(data, type, full) {
            res = data['jalur_penerimaan'];
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [4],
          "mData": null,
          "mRender": function(data, type, full) {
            res = (data['status']=="Y")?"<span class='text-success'>LOLOS</span>":(data['status']=="T")?"<span class='text-danger'>TIDAK LOLOS</span>":"<span class='text-warning'>MENUNGGU</span>";
            return (res==null)?"-":res;
          }
        },{
          "aTargets": [5],
          "mData": null,
          "mRender": function(data, type, full) {
            var id = data['nomor']
            
            var status_sudah = `
            
                  <span id="btn_${id}" onclick="func_modal(${id})" data-id="${id}" class="badge btn-info_transparent text-primary">
                    <i class="iconify-inline mr-1 text-primary" data-icon="akar-icons:circle-check-fill"></i>
                    <span class="text-capitalize text-primary">Konfirmasi</span>
                  </span>`

            res = status_sudah;
            
            return res;
          }
        },
      ]}
}
</script>
@endsection