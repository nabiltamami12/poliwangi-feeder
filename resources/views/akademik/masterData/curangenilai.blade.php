@extends('layouts.main')

@section('content')

<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">

        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">{{ ($id==null)?"TAMBAH":"UBAH" }} DATA RANGE NILAI</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form id="form_cu">
          <input type="hidden" id="nomor" name="nomor">
          <div class="form-row">
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>NH</label>
                <input type="text" class="form-control" id="nh" name="nh">
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Akumulasi</label>
                <input type="text" class="form-control" id="akumulasi" name="akumulasi">
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>NA</label>
                <input type="text" class="form-control" id="na" name="na">
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>NA atas</label>
                <input type="text" class="form-control" id="na_atas" name="na_atas">
              </div>
            </div>
          </div>
          <hr class="my-4">

          <button type="submit" class="btn btn-primary w-100 simpanData-btn ">{{ ($id==null)?"Tambah":"Ubah" }} Data</button>
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
            var url = url_api+"/rangenilai/"+id;
            var type = "put";
        } else {
            var url = url_api+"/rangenilai";
            var type = "post";
        }
        $.ajax({
            url: url,
            type: type,
            dataType: 'json',
            data: data,
            success: function(res) {
                if (res.status=="success") {
                    window.location.href = "{{url('/akademik/master/datarangenilai')}}";                    
                } else {
                    // alert gagal
                }
                
            }
        });
    });
} );

function getData(id) {
    $.ajax({
        url: url_api+"/rangenilai/"+id,
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