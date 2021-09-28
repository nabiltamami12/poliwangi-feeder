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
              <h2 class="mb-0 text-center text-md-left">Data Pendaftar</h2>
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
                <th scope="col" class="text-right" style="width: 25%">Jalur Penerimaan</th>
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
</section>
<script>
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
    $.each(dataGlobal['prodi'],function (key,row) {
        optProgram = `<option value="${row.nomor}">${row.nama_program} ${row.program_studi}</option>`
    })
    $('#program_studi').append(optProgram)

    optStatus = `<option value=""> - </option>`
    $.each(dataGlobal['jalur_pmb'],function (key,row) {
        optStatus += `<option value="${row.id}">${row.jalur_daftar}</option>`
    })
    $('#jalur_penerimaan').append(optStatus)
    setDatatable();
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
            var id = data['nomor']
            var status_belum = `<span id="btn_${id}" data-id="${id}" class="btn-pendaftar badge badge-danger">
                    <i class="iconify-inline mr-1" data-icon="bi:x-circle-fill"></i>
                    <span class="text-capitalize" style="color:#fff">Tidak Diterima</span>
                  </span>`
            var status_sudah = `<span id="btn_${id}" data-id="${id}" class="badge badge-success">
                    <i class="iconify-inline mr-1" data-icon="akar-icons:circle-check-fill"></i>
                    <span class="text-capitalize" style="color:#fff">Diterima</span>
                  </span>`

            res = (data['is_lunas']==1)?status_sudah:status_belum;
            $('#btn_'+id).on('click',function (e) {
                var id_pendaftar = $(this).data('id');

                $.ajax({
                    url: url_api+"/admin/pendaftar/verifikasi/"+id_pendaftar,
                    type: 'put',
                    dataType: 'json',
                    data: {},
                    beforeSend: function(text) {
                        // loading func
                        console.log("loading")
                        // loading('show')
                    },
                    success: function(res) {
                        console.log(res)
                        if (res.status=="success") {
                            if ($('#btn_'+id).hasClass('badge-danger')) {
                                $('#btn_'+id).html('');
                                $('#btn_'+id).removeClass('badge-danger')
                                $('#btn_'+id).addClass('badge-success')
                                $('#btn_'+id).append(`<i class="iconify-inline mr-1" data-icon="akar-icons:circle-check-fill"></i>
                                            <span class="text-capitalize" style="color:#fff">Diterima</span>`);
                            }else{
                                $('#btn_'+id).html('');
                                $('#btn_'+id).removeClass('badge-success')
                                $('#btn_'+id).addClass('badge-danger')
                                $('#btn_'+id).append(`<i class="iconify-inline mr-1" data-icon="bi:x-circle-fill"></i>
                                            <span class="text-capitalize" style="color:#fff">Tidak Diterima</span>`);
                            }           
                        } else {
                            // alert gagal
                        }
                        // loading('hide')

                    }
                });
            })
            return res;
          }
        },
      ]}
}
</script>
@endsection