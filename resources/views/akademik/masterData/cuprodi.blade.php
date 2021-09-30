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
              <h2 class="mb-0">{{ ($id==null)?"TAMBAH":"UBAH" }} DATA PROGRAM STUDI</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form id="form_cu">
          <input type="hidden" id="nomor" name="nomor">
          <div class="form-row">
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan">

                </select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Program</label>
                <select class="form-control" id="program" name="program" required>

                </select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Program Studi</label>
                <input type="text" class="form-control" id="program_studi" name="program_studi">
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Alias</label>
                <input type="text" class="form-control" id="alias" name="alias">
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Kepala Program Studi</label>
                <select class="form-control" id="kepala" name="kepala">

                </select>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Kode EPSBED</label>
                <input type="text" class="form-control" id="kode_epsbed" name="kode_epsbed">
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
      if (id != "") {
        var url = url_api + "/prodi/" + id;
        var type = "put";
      } else {
        var url = url_api + "/prodi";
        var type = "post";
      }
      $.ajax({
        url: url,
        type: type,
        dataType: 'json',
        data: data,
        success: function(res) {
          if (res.status == "success") {
            window.location.href = "{{url('/akademik/master/dataprodi')}}";
          } else {
            // alert gagal
          }
          
        }
      });
    });
  });

  async function getData(id) {


    var optProgram = `<option value=""> - </option>`;
    $.each(dataGlobal['program'], function(key, row) {
      optProgram += `<option value="${row.nomor}">${row.program}</option>`
    })
    $('#program').append(optProgram)

    var optJurusan = `<option value=""> - </option>`;
    $.each(dataGlobal['jurusan'], function(key, row) {
      optJurusan += `<option value="${row.nomor}" data-alias="${row.alias}">${row.jurusan}</option>`
    })
    $('#jurusan').append(optJurusan)

    var optDosen = `<option value=""> - </option>`;
    $.each(dataGlobal['dosen'], function(key, row) {
      optDosen += `<option value="${row.nomor}">${row.nama}</option>`
    })
    $('#kepala').append(optDosen)

    if (id != "") {
      $.ajax({
        url: url_api + "/prodi/" + id,
        type: 'get',
        dataType: 'json',
        data: {},
        success: function(res) {
          if (res.status == "success") {
            var data = res['data'][0];
            $.each(data, function(key, row) {
              $('#' + key).val(row);
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