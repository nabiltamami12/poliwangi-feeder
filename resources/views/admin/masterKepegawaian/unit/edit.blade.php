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
                            <h2 class="mb-0">{{ ($id==null)?"TAMBAH":"UBAH" }} DATA UNIT</h2>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <form id="form_cu" action="{{route('dataUnit.update', $item->id)}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="form-row">
                        <div class="col-sm-12 col-12">
                            <div class="form-group row mb-0">
                                <label class="form-control-label" for="id_pegawai">Nama Pegawai</label>
                                <select class="form-control" id="id_pegawai" name="id_pegawai">
                                    <option>Pilih Nama Pegawai...</option>
                                    @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row mb-0">
                                <label>Unit</label>
                                <input type="text" class="form-control" id="unit" name="unit">
                            </div>
                            <div class="form-group row mb-0">
                                <label>Kepala</label>
                                <input type="text" class="form-control" id="kepala" name="kepala">
                            </div>
                        </div>

                    </div>
                    <hr class="my-4">

                    <button type="submit"
                        class="btn btn-primary w-100 simpanData-btn ">{{ ($id==null)?"Tambah":"Ubah" }}
                        Data</button>
                </form>

            </div>
        </div>
    </div>
</section>
{{-- <script>
  $(document).ready(function() {
    var id = "{{$id}}";
if (id!="") {
getData(id);
}else{
$('#status').val(0)
}

// form tambah data
$("#form_cu").submit(function(e) {
e.preventDefault();
var data = $('#form_cu').serialize();
if (id!="") {
var url = url_api+"/periode/"+id;
var type = "put";
} else {
var url = url_api+"/periode";
var type = "post";
}
$.ajax({
url: url,
type: type,
dataType: 'json',
data: data,
success: function(res) {
if (res.status=="success") {
window.location.href = "{{url('/admin/master/dataperiode')}}";
} else {
// alert gagal
}

}
});
});
} );

function getData(id) {
$.ajax({
url: url_api+"/periode/"+id,
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
</script> --}}
@endsection
