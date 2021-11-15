@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow ">
        <div class="card-header padding--medium">
          <div class="row align-items-center">
            <div class="col-12">
              <h2 class="mb-0 text-center text-sm-left text-capitalize">{{ ($id==null)?"TAMBAH":"UBAH" }} Syarat Pendaftaran</h2>
            </div>
          </div>
        </div>
        <hr>

        <div class="card-body padding--medium">
          <form id="form_cu">
            <div class="form-row">
              <div class="col-md-4 col-12">
                <div class="form-group row mb-0">
                  <label for="jurusan">Jenjang</label>
                  <select class="form-control" id="jenjang" name="jenjang" >
                  </select>
                </div>
              </div>
              <div class="col-md-8 col-12">
                <div class="form-group row mb-0">
                  <label for="kajur">Jurusan</label>
                  <input type="text" class="form-control" id="jurusan" name="jurusan">
                </div>
              </div>
            </div>
            <hr class="mt-4 mb-3">
            <div class="row">
              <div class="col">
                <button type="submit" class="btn btn-primary w-100 rounded-sm mt-3">{{ ($id==null)?"Tambah":"Ubah" }}</button>
              </div>
            </div>
        </div>
      </div>
    </div>
    </form>
  </div>
</section>
@endsection

@section('js')
<script>
    var id = "{{$id}}";
  $(document).ready(function() {

    if (id != "") {
      getData(id);
    }else{
      getData(0);
    }
    // form tambah data
    $("#form_cu").submit(function(e) {
      e.preventDefault();
      var data = $('#form_cu').serialize();
      if (id != "") {
        var url = url_api + "/jurusan-asal/" + id;
        var type = "put";
      } else {
        var url = url_api + "/jurusan-asal";
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
          if (res.status == "success") {
            window.history.go(-1);
          } else {
            // alert gagal
          }
          loading('hide')

        }
      });
    });
  });

  function getData(id) {
    $.ajax({
      url: url_api + "/jurusan-asal/" + id,
      type: 'get',
      dataType: 'json',
      data: {},
      beforeSend: function(text) {
        // loading func
        console.log("loading")
        loading('show')
      },
      success: function(res) {
        if (res.status == "success") {
          var data = res['data'];
          $.each(data.data, function(key, row) {
            $('#' + key).val(row);
          })
          var optNama = `<option value=""> - </option>`;
          $.each(data.jenjang, function(key, row) {
            optNama += `<option value="${row}">${row}</option>`
          })
          $('#jenjang').append(optNama)

        } else {
          // alert gagal
        }
        loading('hide')

      }
    });
  }
</script>
@endsection