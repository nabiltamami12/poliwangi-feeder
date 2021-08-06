@extends('layouts.mainAkademik')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content page-content__akademik container-fluid" id="akademik_datajurusan">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">

        <div class="card-header p-0 m-0 border-0 rounded-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">{{ ($id==null)?"TAMBAH":"UBAH" }} DATA DOSEN PENGAMPU</h2>
            </div>
          </div>
        </div>

        <hr class="mt">

        <form id="form_cu">
          <input type="hidden" id="nomor" name="nomor">
          <div class="form-row">
            
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label>Dosen</label>
                <input type="text" class="form-control" id="nama" name="nama" readonly></select>
              </div>
            </div>
            
            <div class="col-sm-12 col-12">
              <div class="form-row row-matkul">
                
              </div>
            </div>
          </div>
          <hr class="mt">
        </form>
        
      </div>
    </div>
  </div>
</section>
<script>
var id = "{{$id}}";
$(document).ready(function() {
  getData(id);
});

function searchMatkul(program,jurusan,id_pengampu,id_matkul,status) {
  console.log("search func")
  console.log(program)
  console.log(jurusan)
  var matkul = $.grep(dataGlobal['matakuliah'], function(e){ return e.program == program; });
  var matkul = $.grep(dataGlobal['matakuliah'], function(e){ return e.jurusan == jurusan; });
  console.log(matkul)
  // var optMatkul = `<option value=""> - </option>`;
  // console.log("id_pengampu = "+id_pengampu)
  // console.log("id_matkul = "+id_matkul)
  // $.each(matkul,function (key,row) {
  //   if (row.nomor==id_matkul) {
  //     var selected = "selected";
  //   } else {
  //     var selected = "";
  //   }
  //   optMatkul += `<option ${selected} value="${row.nomor}">${row.matakuliah}</option>`
  // })
  // if (status=="tambah") {
  //   $('#matkul').html('')
  //   $('#matkul').append(optMatkul)
  // } else {
  //   $('#matkul_'+id_pengampu).append(optMatkul);
  //   $('#matkul_'+id_pengampu).attr('data-id',id_pengampu);
  // }
}

function setMatkul(id_select_prodi,id_select_matkul,row,status) {
  
  var html = "";
  html = `<div class="col-sm-5 col-12">
                  <div class="form-group row mb-0">
                      <label>Program Studi</label>
                  </div>
              </div>
              <div class="col-sm-5 col-12">
                  <div class="form-group row mb-0">
                      <label>Matakuliah</label>
                  </div>
              </div>
              <div class="col-sm-2 col-12">
                  <div class="form-group row mb-0">
                      <label></label>
                  </div>
              </div>
              <div class="col-sm-5 col-12">
                  <div class="form-group row mb-0">
                      <select class="form-control select-prodi" id="${id_select_prodi}" `+(status=="update")?`data-id=${row.nomor} data-matkul=${row.matakuliah}`:''+` >

                      </select>
                  </div>
              </div>
              <div class="col-sm-5 col-12">
                  <div class="form-group row mb-0">
                      <select class="form-control select-matkul" id="${id_select_matkul}">

                      </select>
                  </div>
              </div>`
  if (status!="tambah") {
    html += `<div class="col-sm-2 col-12">
      <div class="form-group row mb-0">
          <button type="button" class="btn btn-danger">Hapus</button>
      </div>
    </div>`
  } 
  $('.row-matkul').append(html);
  var optProdi = `<option value=""> - </option>`;
  $.each(dataGlobal['prodi'],function (key_prodi,row_prodi) {
      if (status == "tambah") {
        var selected = "";
        optProdi += `<option ${selected} value="${row_prodi.nomor}" data-program="${row_prodi.program}" data-jurusan="${row_prodi.jurusan}">${row_prodi.nama_program} ${row_prodi.nama_jurusan}</option>`
      }else{
        if (row.program_studi==row_prodi.nomor) {
          var selected = "selected";
          optProdi += `<option ${selected} value="${row_prodi.nomor}" data-program="${row_prodi.program}" data-jurusan="${row_prodi.jurusan}">${row_prodi.nama_program} ${row_prodi.nama_jurusan}</option>`
        } else {
          var selected = "";
          optProdi += `<option ${selected} value="${row_prodi.nomor}" data-program="${row_prodi.program}" data-jurusan="${row_prodi.jurusan}">${row_prodi.nama_program} ${row_prodi.nama_jurusan}</option>`
        }
      }
  })
  $('#'+id_select_prodi).append(optProdi);
  $('#'+id_select_prodi).on('change',function (e) {
    var program = $('#'+id_select_prodi+' :selected').data('program');
    var jurusan = $('#'+id_select_prodi+' :selected').data('jurusan');
    var id_pengampu = $(this).data('id');
    var id_matkul = $(this).data('idmatkul');
    // console.log(id_pengampu)
    // console.log(id_matkul)
    console.log(program)
    console.log(jurusan)
    searchMatkul(program,jurusan,id_pengampu,id_matkul,status);
  })
  // $('.select-matkul').on('change',function (e) {
  //   var id_pengampu = $(this).data('id');
  //   var id_matkul = $(this).val();
  //   console.log("id_pengampu = "+id_pengampu)
  //   console.log("id_matkul = "+id_matkul)
  //   if (id_pengampu == undefined) {
  //     id_pengampu = ""
  //     var type = "post"
  //   }else{
  //     var type = "put"
  //   }
  //   var arr = {
  //     'dosen' : id,
  //     'matakuliah' : id_matkul
  //   }
  //   $.ajax({
  //     url: url_api+"/dosenpengampu/"+id_pengampu,
  //     type: type,
  //     dataType: 'json',
  //     data: arr,
  //     beforeSend: function(text) {
  //       // loading func
  //       console.log("loading")
  //     },
  //     success: function(res) {
  //       if (res.status=="success") {
  //         window.location.href = "{{url('/akademik/master/datakelas')}}";                    
  //       } else {
  //         // alert gagal
  //       }
  //     }
  //   });
  // })
}

async function getData(id) {
  

    if (id!="") {
        $.ajax({
            url: url_api+"/dosenpengampu/"+id,
            type: 'get',
            dataType: 'json',
            data: {},
            beforeSend: function(text) {
                    // loading func
                    console.log("loading")
            },
            success: function(res) {
                if (res.status=="success") {
                    var data = res['data'];
                    $('#nama').val(data.nama)
                    $.each(data.matkul,function (key,row) {
                      var id_pengampu = row.nomor;
                      if (id_pengampu==null) {
                        var id_select_prodi = 'prodi'; 
                        var id_select_matkul = 'matkul'; 
                      } else {
                        var id_select_prodi = 'prodi_'+id_pengampu;
                        var id_select_matkul = 'matkul_'+id_pengampu;
                      }
                      setMatkul(id_select_prodi,id_select_matkul,row,'update')
                      
                      if (id_pengampu!=null) {
                        searchMatkul(row.program,row.jurusan,id_pengampu,row.matakuliah)
                        setMatkul("prodi","matkul",row,'tambah')
                      }
                    })
                } else {
                    // alert gagal
                }
            }
        });
    }
}
</script>
@endsection