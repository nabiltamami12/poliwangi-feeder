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
              <h2 class="mb-0">{{ ($id==null)?"TAMBAH":"UBAH" }} DATA KURIKULUM KULIAH</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form id="form_cu">
          <input type="hidden" id="id" name="id">
          <div class="form-row">
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label>Nama Kurikulum</label>
                <input type="text" class="form-control" id="kurikulum" name="kurikulum">
              </div>
              <div class="form-group row mb-0">
                <label>Pilih Prodi / Jurusan</label>
                <select name="prodi_id" id="" class="form-control">
                    @foreach($prodi as $prodi)
                        <option value="{{ $prodi->nomor }}">{{ ucwords($prodi->program_studi) }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group row mb-0">
                <label>Pilih Tahun Ajaran</label>
                <select name="periode_id" id="" class="form-control">
                    @foreach($periode as $periode)
                        <option value="{{ $periode->nomor }}">{{ ucwords($periode->tahun) }} - Semester {{ $periode->semester }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group row mb-0">
                <label>Jumlah SKS Total</label>
                <input type="number" value="0" class="form-control" id="totalSks" name="jumlah_sks" readonly>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-6 col-sm-6 col-12 mb-2 p-0 pr-2">
                    <label>Jumlah SKS Wajib</label>
                    <input type="number" value="0" class="form-control" id="sksWajib" name="sks_wajib" min="0" required>
                </div>
                <div class="col-md-6 col-sm-6 col-12 mb-2 p-0 pl-2">
                    <label>Jumlah SKS Pilihan</label>
                    <input type="number" value="0" class="form-control" id="sksPilihan" name="sks_pilihan" min="0" required>
                </div>
              </div>
              <div class="form-group row mb-0">
                <label>Keterangan</label>
                <textarea name="keterangan" id="" rows="3" class="form-control"></textarea>
              </div>
              <div class="form-group row mb-0">
                <label>Status</label>
                <select name="status" id="" class="form-control">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
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
    if (id!="") {
        getData(id);
    }else{
        $('#status').val(0)
    }

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
        if (id!="") {
            var url = url_api+"/kurikulum/"+id;
            var type = "put";
        } else {
            var url = url_api+"/kurikulum";
            var type = "post";
        }
        $.ajax({
            url: url,
            type: type,
            dataType: 'json',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(res) {
                if (res.status=="success") {
                    window.location.href = "{{url('/admin/master/datakurikulum')}}";
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
