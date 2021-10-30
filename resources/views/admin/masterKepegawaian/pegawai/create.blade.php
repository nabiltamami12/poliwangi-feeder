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
                            <h2 class="mb-0">{{ ($id==null)?"TAMBAH":"UBAH" }} DATA PERIODE KULIAH</h2>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <form id="form_cu">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label" for="example2cols1Input">NIP</label>
                            <input type="text" class="form-control" id="example2cols1Input" placeholder="One of two cols">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label" for="example2cols2Input">NOID</label>
                            <input type="text" class="form-control" id="example2cols2Input" placeholder="One of two cols">
                          </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols2Input">NPWP</label>
                                <input type="text" class="form-control" id="example3cols2Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols3Input">NIDN</label>
                                <input type="text" class="form-control" id="example3cols3Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Nama Pegawai</label>
                                <input type="text" class="form-control" id="example3cols1Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">NIP lama</label>
                                <input type="text" class="form-control" id="example3cols1Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>                
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Jurusan</label>
                                <input type="text" class="form-control" id="example3cols1Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols3Input">Agama</label>
                                <input type="text" class="form-control" id="example3cols3Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Pangkat</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>6</option>
                                  <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Jabatan Struktural</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Nomor Telepon</label>
                                <input type="text" class="form-control" id="example3cols1Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Jenis Kelamin</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>Pilih Jenis Kelamin...</option>
                                  <option value="L">Laki-laki</option>
                                  <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>                       
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols2Input">Shift</label>
                                <input type="text" class="form-control" id="example3cols2Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols3Input">Golongan Darah</label>
                                <input type="text" class="form-control" id="example3cols3Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Gelar Depan</label>
                                <input type="text" class="form-control" id="example3cols1Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols2Input">Gelar Belakang</label>
                                <input type="text" class="form-control" id="example3cols2Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>                       
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols3Input">Status Kawin</label>
                                <input type="text" class="form-control" id="example3cols3Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Kelurahan</label>
                                <input type="text" class="form-control" id="example3cols1Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Kecamatan</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Kota</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Provinsi</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Askes</label>
                                <input type="text" class="form-control" id="example3cols1Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Kode Dosen</label>
                                <input type="text" class="form-control" id="example3cols1Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Departemen</label>
                                <input type="text" class="form-control" id="example3cols1Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                      
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Praktisi</label>
                                <input type="text" class="form-control" id="example3cols1Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Nama Instansi</label>
                                <input type="text" class="form-control" id="example3cols1Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Alamat Instansi</label>
                                <input type="text" class="form-control" id="example3cols1Input"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="example3cols1Input">Pendidikan Terakhir</label>
                                <input type="text" class="form-control" id="example3cols1Input"
                                    placeholder="One of three cols">
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
