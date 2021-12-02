@extends('layouts.main')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content  container-fluid" id="akademik_datajurusan">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">

        <div class="card-header p-0 m-0 border-0 ">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">{{ ($id==null)?"TAMBAH":"UBAH" }} DATA DOSEN PENGAMPU</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form id="form_cu">
          <input type="hidden" id="nomor" name="nomor">
          <div class="form-row">

            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Program Studi</label>
                <input type="text" class="form-control" id="program_studi" name="program_studi" readonly></select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" readonly></select>
              </div>
            </div>
          </div>
          <hr class="mt">
          <div class="form-row">
          <div class="col-sm-12 col-12">
              <div class="form-row row-matkul">
                
              </div>
            </div>
      </div>
    </div>
  </div>
</section>
<script>
var id = "{{$id}}";
$(document).ready(function() {
  getData(id);
});

async function getData(id) {
    if (id!="") {
        $.ajax({
            url: url_api+"/kelas/dosen/"+id,
            type: 'get',
            dataType: 'json',
            data: {},
            success: function(res) {
                if (res.status=="success") {
                    var data = res['data'];
                    $('#program_studi').val(data.program_studi)
                    $('#kelas').val(data.kelas)
                    $.each(data.matkul,function (key,row) {
                        html = `<div class="col-sm-6 col-12">
                                    <div class="form-group row mb-0">
                                        <label>Matakuliah</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="form-group row mb-0">
                                        <label>Dosen</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="form-group row mb-0">
                                        <input type="text" class="form-control" id="matkul_${row.id_matkul}" name="matkul_${row.id_matkul}" value="${row.matkul}" readonly></select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="form-group row mb-0">
                                        <select class="form-control select-dosen" id="dosen_${row.id_matkul}">

                                        </select>
                                    </div>
                                </div>`
                                $('.row-matkul').append(html)
                                var optDosen = `<option value=""> - </option>`;
                                $.each(dataGlobal['dosen'],function (key_dosen,row_dosen) {
                                    if (row.dosen == row_dosen.nomor) {
                                        var selected = "selected";
                                        optDosen += `<option ${selected} value="${row_dosen.nomor}" >${row_dosen.nama}</option>`
                                    }else{
                                    //     if (row.program_studi==row_dosen.nomor) {
                                    //     var selected = "selected";
                                    //     optDosen += `<option ${selected} value="${row_dosen.nomor}" >${row_dosen.nama}</option>`
                                    //     } else {
                                        var selected = "";
                                        optDosen += `<option ${selected} value="${row_dosen.nomor}" >${row_dosen.nama}</option>`
                                    //     }
                                    }
                                })
                                $('#dosen_'+row.id_matkul).append(optDosen);
                                $('#dosen_'+row.id_matkul).attr('data-id',row.nomor);
                                $('#dosen_'+row.id_matkul).on('change',function (e) {
                                    var id_pengampu = $(this).data('id');
                                    var id_dosen = $(this).val();
                                    if (id_pengampu == undefined) {
                                        id_pengampu = ""
                                        var type = "post"
                                    }else{
                                        var type = "put"
                                    }
                                    var arr = {
                                        'dosen' : id_dosen,
                                        'matakuliah' : row.id_matkul
                                    }
                                    $.ajax({
                                        url: url_api+"/dosenpengampu/"+id_pengampu,
                                        type: type,
                                        dataType: 'json',
                                        data: arr,
                                        success: function(res) {
                                            console.log(res)
                                            if (res.status=="success") {
                                                $('#dosen_'+row.id_matkul).attr('data-id',res.data[0].nomor)
                                                $('#dosen_'+row.id_matkul).val(res.data[0].dosen).change()
                                            } else {
                                                // alert gagal
                                            }
                                            ;
                                        }
                                    });
                                })
                    })
                    ;
                } else {
                    // alert gagal
                }
            }
        });
    }
}
</script>
@endsection