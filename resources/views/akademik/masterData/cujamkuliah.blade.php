@extends('layouts.mainAkademik')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content  container-fluid" id="akademik_datajamkuliah">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">

        <div class="card-header p-0 m-0 border-0 ">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">{{ ($id==null)?"TAMBAH":"UBAH" }} DATA JAM KULIAH</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form id="form_cu" class="form-input">
          <input type="hidden" id="nomor" name="nomor">
          <div class="form-row">
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label>Khusus</label>
                <input type="text" class="form-control" id="khusus" name="khusus">
              </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label>Program</label>
                <select class="form-control" id="program" name="program">

                </select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Hari</label>
                <select class="form-control" id="hari" name="hari">
                  <option value="1">Senin</option>
                  <option value="2">Selasa</option>
                  <option value="3">Rabu</option>
                  <option value="4">Kamis</option>
                  <option value="5">Jumat</option>
                  <option value="6">Sabtu</option>
                  <option value="7">Minggu</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Kode</label>
                <input type="text" class="form-control" id="kode" name="kode">
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Jam</label>
                <input type="text" class="form-control" id="jam" name="jam">
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Sore</label>
                <select class="form-control" id="sore" name="sore">
                  <option value="1">Iya</option>
                  <option value="0">Tidak</option>
                </select>
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
            url: url_api+"/jamkuliah/"+id,
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
                    window.location.href = "{{url('/akademik/master/datajamkuliah')}}";                    
                } else {
                    // alert gagal
                }
                loading('hide')
            }
        });
    });
} );

async function getData(id) {
    

    var optProgram = `<option value=""> - </option>`;
    $.each(dataGlobal['program'],function (key,row) {
        optProgram += `<option value="${row.nomor}">${row.program}</option>`
    })
    $('#program').append(optProgram)
    if (id!="") {
        
        $.ajax({
            url: url_api+"/jamkuliah/"+id,
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
}
</script>
@endsection