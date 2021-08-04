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
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>
                    Semester
                    <select class="form-control">
                        <option value="1"> 1 </option>
                        <option value="2"> 2 </option>
                        <option value="3"> 3 </option>
                    </select>
                </label>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
              <button type="submit" class="btn--blue w-100 simpanData-btn add-btn">Tambah Semester</button>
              </div>
            </div>
            <div class="col-sm-12 col-12">
            <div class="form-row">
                <div class="col-sm-12 col-12">
                    <div class="form-group row mb-0">
                        <label>Matakuliah</label>
                    </div>
                </div>
                <div class="col-sm-10 col-12">
                    <div class="form-group row mb-0">
                        <select class="form-control" id="matkul_1">

                        </select>
                    </div>
                </div>
                <div class="col-sm-2 col-12">
                    <div class="form-group row mb-0">
                        <button type="button" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
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

function getData(id) {
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
                } else {
                    // alert gagal
                }
            }
        });
    }
}
</script>
@endsection