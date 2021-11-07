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
              <h2 class="mb-0">TAMBAH MATA KULIAH KE DALAM KURIKULUM</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form id="form_cu">
          <input type="hidden" id="id" name="id">
          <div class="form-row">
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label>Pilih Mata Kuliah</label>
                <input type="hidden" name="kurikulum" value="{{ $id }}">
                <select name="matakuliah" id="matakuliah" class="form-control">
                    @foreach($matkul as $matkul)
                        <option value="{{ $matkul->nomor }}">{{ ucwords($matkul->matakuliah) }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group row mb-0">
                <label>Semester</label>
                <input type="number" value="0" class="form-control" id="totalSks" name="semester">
              </div>
              <div class="form-group row mb-0">
                <label>Status</label>
                <select name="status" id="" class="form-control">
                    <option value="wajib">Wajib</option>
                    <option value="pilihan">Pilihan</option>
                </select>
              </div>
            </div>

          </div>
          <hr class="my-4">

          <button type="submit" class="btn btn-primary w-100 simpanData-btn ">Tambah Mata Kuliah</button>
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
    }else{
        $('#status').val(0)
    }

    $('#matakuliah').select2()

    $('#sksWajib').keyup(function(){
        var jumlahWajib = $(this).val(),
            jumlahPilihan = $('#sksPilihan').val(),
            totalSks = parseInt(jumlahWajib) + parseInt(jumlahPilihan)

        $('#totalSks').val(totalSks)
    })

    $('#sksWajib').click(function(){
        var jumlahWajib = $(this).val(),
            jumlahPilihan = $('#sksPilihan').val(),
            totalSks = parseInt(jumlahWajib) + parseInt(jumlahPilihan)

        $('#totalSks').val(totalSks)
    })

    $('#sksPilihan').keyup(function(){
        var jumlahWajib = $('#sksWajib').val(),
            jumlahPilihan = $(this).val(),
            totalSks = parseInt(jumlahWajib) + parseInt(jumlahPilihan)

        $('#totalSks').val(totalSks)
    })

    $('#sksPilihan').click(function(){
        var jumlahWajib = $('#sksWajib').val(),
            jumlahPilihan = $(this).val(),
            totalSks = parseInt(jumlahWajib) + parseInt(jumlahPilihan)

        $('#totalSks').val(totalSks)
    })

    // form tambah data
    $("#form_cu").submit(function(e) {
        e.preventDefault();
        var url = url_api+"/kurikulum/"+ id +"/matakuliah";
        var type = "post";
        $.ajax({
            url: url,
            type: type,
            dataType: 'json',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(res) {
                if (res.status=="success") {
                    window.location.href = "{{url('/admin/master/datakurikulum/'. $id. '/matakuliah')}}";
                } else {
                    // alert gagal
                }

            }
        });
    });
} );

function getData(id) {
    $.ajax({
        url: url_api+"/kurikulum/"+id,
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
