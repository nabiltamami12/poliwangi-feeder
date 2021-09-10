@extends('layouts.mainAkademik')

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
              <h2 class="mb-0">{{ ($id==null)?"TAMBAH":"UBAH" }} DATA RUANGAN</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form id="form_cu">
          <input type="hidden" id="nomor" name="nomor">
          <div class="form-row">
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label>Ruang</label>
                <input type="text" class="form-control" id="ruang" name="ruang" required>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan">
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Kode *?</label>
                <select class="form-control" id="kode" name="kode">
                  <option value="L">Laboratorium</option>
                  <option value="K">Kuliah</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Ruang Kuliah *?</label>
                <select class="form-control" id="is_ruang_kuliah" name="is_ruang_kuliah">
                  <option value="0">Ruang Kuliah</option>
                  <option value="1">Ruang Umum</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Kapasitas Mahasiswa</label>
                <input type="text" class="form-control" id="kapasitas_mahasiswa" name="kapasitas_mahasiswa" required>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Kepala</label>
                <select class="form-control" id="kepala" name="kepala">

                </select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Asisten</label>
                <select class="form-control" id="asisten" name="asisten">

                </select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Teknisi</label>
                <select class="form-control" id="teknisi" name="teknisi">

                </select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan" required>

                </select>
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
    getData(id);        

    // form tambah data
    $("#form_cu").submit(function(e) {
        e.preventDefault();
        var data = $('#form_cu').serialize();
        if (id!="") {
            var url = url_api+"/ruangan/"+id;
            var type = "put";
        } else {
            var url = url_api+"/ruangan";
            var type = "post";
        }
        $.ajax({
            url: url,
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
                    window.location.href = "{{url('/akademik/master/dataruangan')}}";                    
                } else {
                    // alert gagal
                }
                loading('hide')
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
    

    var optJurusan = `<option value=""> - </option>`;
    $.each(dataGlobal['jurusan'],function (key,row) {
        optJurusan += `<option value="${row.nomor}" data-alias="${row.alias}">${row.jurusan}</option>`
    })
    $('#jurusan').append(optJurusan)

    var optDosen = `<option value=""> - </option>`;
    $.each(dataGlobal['dosen'],function (key,row) {
        optDosen += `<option value="${row.nomor}">${row.nama}</option>`
    })
    $('#kepala').append(optDosen)
    $('#asisten').append(optDosen)
    $('#teknisi').append(optDosen)
    
    if (id!="") {     
        $.ajax({
            url: url_api+"/ruangan/"+id,
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
                    console.log(data)
                    $.each(data,function (key,row) {
                        $('#'+key).val(row);
                    })                
                    $('#jurusan').val(data.jurusan).change();
                    $('#kepala').val(data.kepala).change();
                    $('#teknisi').val(data.teknisi).change();
                    $('#asisten').val(data.asisten).change();
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