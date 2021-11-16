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
              <h2 class="mb-0">EDIT JADWAL KELAS</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form id="form_cu">
          <input type="hidden" id="id" name="id">
          <div class="form-row">
            <div class="col-sm-12 col-12">
                <div class="form-group row mb-0">
                    @php
                        $kelas = DB::table('kelas')->where('nomor', '=', $id)->first();
                        $matkul = DB::table('matakuliah')->where('program_studi', $kelas->program_studi)->orderBy('matakuliah', 'asc')->get();
                    @endphp
                    <label>Pilih Mata Kuliah</label>
                    <input type="hidden" name="kelas" value="{{ $id }}">
                    <select name="matakuliah" id="matakuliah" class="form-control select2">
                        @foreach($matkul as $m)
                            <option value="{{ $m->nomor }}">{{ strtoupper($m->kode) }} - {{ ucwords($m->matakuliah) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                    @php $hari = DB::table('hari')->get(); @endphp
                    <label>Hari</label>
                    <select name="hari" id="hari" class="form-control select2">
                        @foreach($hari as $h)
                            <option value="{{ $h->nomor }}">{{ ucwords($h->hari) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                    @php $jam = DB::table('jam')->get(); @endphp
                    <label>Jam</label>
                    <select name="jam" id="jam" class="form-control select2">
                        @foreach($jam as $j)
                            <option value="{{ $j->nomor }}">{{ $j->jam }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                @php $dosen = DB::table('pegawai')->get(); @endphp
                <label>Dosen 1</label>
                <select name="dosen" id="dosen" class="form-control select2">
                    @foreach($dosen as $d)
                        <option value="{{ $d->nomor }}">{{ ($d->gelar_dpn == null) ? '' : ucwords($d->gelar_dpn) .'. ' }}{{ ucwords($d->nama) }}{{ ($d->gelar_blk == null) ? '' : ', '. ucwords($d->gelar_blk) }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group row mb-0">
                <label>Dosen 2</label>
                <select name="dosen2" id="dosen2" class="form-control select2">
                    <option value="">Pilih Dosen</option>
                    @foreach($dosen as $d)
                        <option value="{{ $d->nomor }}">{{ ($d->gelar_dpn == null) ? '' : ucwords($d->gelar_dpn) .'. ' }}{{ ucwords($d->nama) }}{{ ($d->gelar_blk == null) ? '' : ', '. ucwords($d->gelar_blk) }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group row mb-0">
                @php $ruang = DB::table('ruang')->get(); @endphp
                <label>Ruangan</label>
                <select name="ruang" id="ruang" class="form-control select2">
                    @foreach($ruang as $r)
                        <option value="{{ $r->nomor }}">{{ ucwords($r->ruang) }} - {{ ucwords($r->keterangan) }}</option>
                    @endforeach
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

<div class="modal fade" id="alert" tabindex="-1" aria-labelledby="konfirmModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <input type="hidden" id="id_konfirm">

        <div class="modal-header">
            <p class="text-center">
                <h5 class="modal-title text-warning text-center">Peringatan</h5>
            </p>
        </div>
        <div class="modal-body">
          <p class="text-center font-weight-bold" id="text_alert"></p>
          <div class="row">
                <div class="col-md-6 mx-auto">
                    <button type="button" class="btn btn-primary w-100" id="close_modal">Oke</button>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<script>
  $(document).ready(function() {
    var id = "{{$id}}";
    var id_kuliah = "{{$id_kuliah}}";
    if (id!="") {
        getData(id_kuliah);
    }else{
        $('#status').val(0)
    }

    $('.select2').select2()

    // form tambah data
    $("#form_cu").submit(function(e) {
        e.preventDefault();
        var url = url_api+"/penjadwalan/"+ id +"/matakuliah/update/" + id_kuliah;
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
                    window.location.href = "{{url('/admin/kuliah/penjadwalan/'. $id. '/matakuliah')}}";
                } else {
                    $('#text_alert').html(res.error.message)
                    $('#alert').modal('show')

                    $('#close_modal').click(function(){
                        $('#alert').modal('hide')
                    })
                }

            }
        });
    });
} );

function getData(id_kuliah) {
    $.ajax({
        url: url_api+"/penjadwalan/edit/"+id_kuliah,
        type: 'get',
        dataType: 'json',
        data: {},
        success: function(res) {
            
            if (res.status=="success") {
                var data = res.data;
                $.each(data,function (key,row) {
                    $('#'+key).val(row).trigger('change');    
                })
            } else {
                // alert gagal
            }

        }
    });
}
</script>
@endsection
