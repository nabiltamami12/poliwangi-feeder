@extends('layouts.main')

@section('content')

<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">{{ ($id==null)?"TAMBAH":"UBAH" }} DATA JURUSAN</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form id="form_cu" class="form-input">
          <input type="hidden" id="nomor" name="nomor">
          <div class="form-row">
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label for="jurusan">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan">
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="kajur">Ketua Jurusan</label>
                <select class="form-control" id="kepala" name="kepala" >
                </select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="sekjur">Jurusan Inggris</label>
                <input type="text" class="form-control" id="jurusan_inggris" name="jurusan_inggris" >
              </div>
            </div>
          </div>
          <hr class="my-4">
          <button type="submit" class="btn btn-primary w-100 simpanData-btn ">{{ ($id==null)?"Tambah":"Ubah" }}
            Data</button>
        </form>

      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function() {
    var id = "{{$id}}";
    var optDosen = `<option value=""> - </option>`;
    $.each(dataGlobal['dosen'],function (key,row) {
        optDosen += `<option value="${row.nomor}">${row.nama}</option>`
    })
    $('#kepala').append(optDosen)

    if (id!="") {
        getData(id);        
    }

    // form tambah data
    $("#form_cu").submit(function(e) {
        e.preventDefault();
        var data = $('#form_cu').serialize();
        if (id!="") {
            var url = url_api+"/jurusan/"+id;
            var type = "put";
        } else {
            var url = url_api+"/jurusan";
            var type = "post";
        }
        $.ajax({
            url: url,
            type: type,
            dataType: 'json',
            data: data,
            success: function(res) {
                if (res.status=="success") {
                    window.location.href = "{{url('/akademik/master/datajurusan')}}";                    
                } else {
                    // alert gagal
                }
                

            }
        });
    });
} );

function getData(id) {
    $.ajax({
        url: url_api+"/jurusan/"+id,
        type: 'get',
        dataType: 'json',
        data: {},
        success: function(res) {
            if (res.status=="success") {
                var data = res['data'][0];
                $.each(data,function (key,row) {
                    $('#'+key).val(row);
                })                
            } else {
                // alert gagal
            }
            

        }
    });
}
</script>
@endsection