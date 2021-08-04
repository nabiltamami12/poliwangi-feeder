@extends('layouts.mainAkademik')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content page-content__akademik container-fluid" id="akademik_datajurusan">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">{{ ($id==null)?"TAMBAH":"UBAH" }} DATA JURUSAN</h2>
            </div>
          </div>
        </div>

        <hr class="mt">

        <form id="form_cu" class="form-input mt-0">
          <input type="hidden" id="nomor" name="nomor">
          <div class="form-row">
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label for="jurusan">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" >
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="kajur">Ketua Jurusan</label>
                <input type="text" class="form-control" id="kajur" name="kajur" >
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="sekjur">Sekretaris Jurusan</label>
                <input type="text" class="form-control" id="sekjur" name="sekjur" >
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="alias">Alias</label>
                <input type="text" class="form-control" id="alias" name="alias" >
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="jurusan_inggris">Jurusan Inggris</label>
                <input type="text" class="form-control" id="jurusan_inggris" name="jurusan_inggris" >
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="jurusan_lengkap">Jurusan Lengkap</label>
                <input type="text" class="form-control" id="jurusan_lengkap" name="jurusan_lengkap" >
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="konsentrasi">Konsentrasi</label>
                <input type="text" class="form-control" id="konsentrasi" name="konsentrasi" >
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="akreditasi">Akreditasi</label>
                <input type="text" class="form-control" id="akreditasi" name="akreditasi" >
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label for="sk_akreditasi">SK Akreditasi</label>
                <input type="text" class="form-control" id="sk_akreditasi" name="sk_akreditasi" >
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
            },
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
            } else {
                // alert gagal
            }
        }
    });
}
</script>
@endsection