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
              <h2 class="mb-0 text-center text-sm-left text-capitalize">Pengaturan Program Studi Linear</h2>
            </div>
          </div>
        </div>
        <hr>

        <div class="card-body padding--medium">
          <form id="form_cu">
            <div class="form-group row">
              <div class="col-md-12 pl-3 mt-lg-0">
                <h2 class="card_title font-weight-500 mb-3">Pilih program studi :</h2>
                <div id="list_syarat"></div>
              </div>
            </div>
            <hr class="mt-4 mb-3">
            <div class="row">
              <div class="col">
                <button type="submit" class="btn btn-primary w-100 rounded-sm mt-3">Simpan</button>
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
      let arr_prodi = [];
      $('.option-prodi.text-success').each(function(i, obj) {
        arr_prodi.push(obj.dataset.id)
      });
      console.log(arr_prodi);
      
      $.ajax({
        url: url_api + "/jurusan-linear/" + id,
        type: "post",
        dataType: 'json',
        data: {'prodi':arr_prodi},
        beforeSend: function(text) {
          // loading func
          console.log("loading")
          loading('show')
        },
        success: function(res) {
            console.log(res)
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
      url: url_api + "/jurusan-linear/"+id,
      type: 'get',
      dataType: 'json',
      data: {},
      success: function(res) {
        if (res.status == "success") {
            var data = res.data;
            var html = '';
            var jurusan = ''
            $.each(data,function (key,row) {
                if (jurusan == row.jurusan) {
                    var hidden = "hidden"
                }else{
                    var hidden = ""
                }
                
                html = `
                    <span class="mt-3 font-weight-800" id="jurusan" ${hidden}>${row.jurusan}</span>
                    <div class="py-3 d-flex align-items-center">
                    <i onclick="func_centang('${row.id_prodi}')" style="cursor:pointer" id="centang_${row.id_prodi}" data-id="${row.id_prodi}" class="iconify text-placeholder mr-3 option-prodi" data-icon="akar-icons:circle-check-fill"></i>
                    <span onclick="func_centang('${row.id_prodi}')" style="cursor:pointer" class="d-inline-block">${row.prodi}</span>
                    </div>
                    `
                $('#list_syarat').append(html)
                if (row.selected==1) {
                    $('#centang_'+row.id_prodi).removeClass('text-placeholder')
                    $('#centang_'+row.id_prodi).addClass('text-success')
                }else{
                    $('#centang_'+row.id_prodi).addClass('text-placeholder')
                    $('#centang_'+row.id_prodi).removeClass('text-success')
                }
                jurusan = row.jurusan
            })
        } else {
          // alert gagal
        }
        

      }
    });
  }
  function func_centang(val) {
    const e = '#centang_'+val;
    var id_syarat = $(e).data('id')
    var check = $(e).hasClass('text-placeholder');
    if(check){
      $(e).removeClass('text-placeholder')
      $(e).addClass('text-success')
    }else{
      $(e).addClass('text-placeholder')
      $(e).removeClass('text-success')
    }
  }
</script>
@endsection