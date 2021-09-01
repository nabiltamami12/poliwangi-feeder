@extends('layouts.mainAkademik')

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
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="kajur">Program Studi</label>
                <select class="form-control" id="prodi" name="prodi" >
                </select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="sekjur">Sumbangan Pembangunan Institusi</label>
                <input type="text" class="form-control" id="spi" name="spi" >
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label for="sekjur">Kelompok 1</label>
                <input type="text" class="form-control" id="kelompok_1" name="kelompok_1" >
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label for="sekjur">Kelompok 2</label>
                <input type="text" class="form-control" id="kelompok_2" name="kelompok_2" >
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label for="sekjur">Kelompok 3</label>
                <input type="text" class="form-control" id="kelompok_3" name="kelompok_3" >
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label for="sekjur">Kelompok 4</label>
                <input type="text" class="form-control" id="kelompok_4" name="kelompok_4" >
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label for="sekjur">Kelompok 5</label>
                <input type="text" class="form-control" id="kelompok_5" name="kelompok_5" >
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label for="sekjur">Kelompok 6</label>
                <input type="text" class="form-control" id="kelompok_6" name="kelompok_6" >
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label for="sekjur">Kelompok 7</label>
                <input type="text" class="form-control" id="kelompok_7" name="kelompok_7" >
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label for="sekjur">Kelompok 8</label>
                <input type="text" class="form-control" id="kelompok_8" name="kelompok_8" >
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
            var type = "put";
        } else {
            var type = "post";
        }
        $.ajax({
            url: url_api+"/jurusan/"+id,
            type: type,
            dataType: 'json',
            data: data,
            beforeSend: function(text) {
                // loading func
                console.log("loading")
                loading('show')
            },
            success: function(res) {
                if (res.status=="success") {
                    window.location.href = "{{url('/akademik/master/datajurusan')}}";                    
                } else {
                    // alert gagal
                }
                loading('hide')

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
        beforeSend: function(text) {
                // loading func
                console.log("loading")
                loading('show')

        },
        success: function(res) {
            if (res.status=="success") {
                var data = res['data'][0];
                $.each(data,function (key,row) {
                    $('#'+key).val(row);
                })                
            } else {
                // alert gagal
            }
            loading('hide')

        }
    });
}
</script>
@endsection