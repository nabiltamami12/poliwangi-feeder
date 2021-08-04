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
              <h2 class="mb-0">{{ ($id==null)?"TAMBAH":"UBAH" }} DATA JURUSAN</h2>
            </div>
          </div>
        </div>

        <hr class="mt">

        <form id="form_cu">
          <input type="hidden" id="nomor" name="nomor">
          <div class="form-row">
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label>Program</label>
                <select class="form-control" id="program" name="program"></select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan"></select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" >
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Pararel</label>
                <input type="text" class="form-control" id="pararel" name="pararel" >
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Kode</label>
                <input type="text" class="form-control" id="kode" name="kode" readonly>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Kode Kelas Absen</label>
                <input type="text" class="form-control" id="kode_kelas_absen" name="kode_kelas_absen" >
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Kode EPSBED</label>
                <input type="text" class="form-control" id="kode_epsbed" name="kode_epsbed" >
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>konsentrasi</label>
                <input type="text" class="form-control" id="konsentrasi" name="konsentrasi" >
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Wali Kelas</label>
                <select class="form-control" id="wali_kelas" name="wali_kelas"></select>
              </div>
            </div>
          </div>
          <hr class="mt">
          <button type="submit" class="btn--blue w-100 simpanData-btn add-btn">{{ ($id==null)?"Tambah":"Ubah" }} Data</button>
        </form>
        
      </div>
    </div>
  </div>
</section>
<script>
$(document).ready(function() {
    var id = "{{$id}}";
    getData(id);        

    // form tambah data
    $("#form_cu").submit(function(e) {
        e.preventDefault();
        var data = $('#form_cu').serialize();
        if (id!="") {
            var type = "put";
        } else {
            var type = "post";
        }
        $.ajax({
            url: url_api+"/kelas/"+id,
            type: type,
            dataType: 'json',
            data: data,
            beforeSend: function(text) {
                // loading func
                console.log("loading")
            },
            success: function(res) {
                if (res.status=="success") {
                    window.location.href = "{{url('/akademik/master/datakelas')}}";                    
                } else {
                    // alert gagal
                }
            }
        });
    });

    $('#kelas').on('keyup',function (e) {
        var alias = $('#jurusan :selected').data('alias');
        $('#kode').val($(this).val()+""+alias+""+$('#pararel').val());
    })

    $('#pararel').on('keyup',function (e) {
        var alias = $('#jurusan :selected').data('alias');
        $('#kode').val($('#kelas').val()+""+alias+""+$(this).val());
    })
} );

async function getData(id) {
    await getGlobalData();

    var optProgram = `<option value=""> - </option>`;
    $.each(dataGlobal['program'],function (key,row) {
        optProgram += `<option value="${row.nomor}">${row.program}</option>`
    })
    $('#program').append(optProgram)

    var optJurusan = `<option value=""> - </option>`;
    $.each(dataGlobal['jurusan'],function (key,row) {
        optJurusan += `<option value="${row.nomor}" data-alias="${row.alias}">${row.jurusan}</option>`
    })
    $('#jurusan').append(optJurusan)

    var optDosen = `<option value=""> - </option>`;
    $.each(dataGlobal['dosen'],function (key,row) {
        optDosen += `<option value="${row.nomor}">${row.nama}</option>`
    })
    $('#wali_kelas').append(optDosen)

    if (id!="") {
        $.ajax({
            url: url_api+"/kelas/"+id,
            type: 'get',
            dataType: 'json',
            data: {},
            beforeSend: function(text) {
                    // loading func
                    console.log("loading")
            },
            success: function(res) {
                if (res.status=="success") {
                    var data = res['data'][0];
                    $.each(data,function (key,row) {
                        $('#'+key).val(row);
                    })                
                    $('#jurusan').val(data.jurusan).change();
                    $('#wali_kelas').val(data.id_wali_kelas).change();
                } else {
                    // alert gagal
                }
            }
        });
    }
}
</script>
@endsection