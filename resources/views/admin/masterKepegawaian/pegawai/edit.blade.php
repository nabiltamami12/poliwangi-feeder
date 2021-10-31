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

                <form id="form_cu" action="{{route('dataPegawai.update', $item->id)}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nip">NIP</label>
                                <input type="text" name="nip" class="form-control" value="{{ $item->nip }}" id="nip"
                                    placeholder="Masukan Nomor Induk Pegawai negeri sipil">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="noid">NOID</label>
                                <input type="text" class="form-control" value="{{ $item->noid }}" id="noid" name="noid"
                                    placeholder="Masukan NOID">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="npwp">NPWP</label>
                                <input type="text" class="form-control" value="{{ $item->npwp }}" name="npwp" id="npwp"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nidn">NIDN</label>
                                <input type="text" class="form-control" value="{{ $item->nidn }}" name="nidn" id="nidn"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nama">Nama Pegawai</label>
                                <input type="text" class="form-control" value="{{ $item->nama }}" name="nama" id="nama" placeholder="Masukan Nama Pegawai">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nip_lama">NIP lama</label>
                                <input type="text" class="form-control" value="{{ $item->nip_lama }}" id="nip_lama" name="nip_lama"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="jurusan">Jurusan</label>
                                <input type="text" class="form-control" value="{{ $item->jurusan }}" id="jurusan" name="jurusan"
                                    placeholder="Masukan Jurusan">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="agama">Agama</label>
                                <input type="text" class="form-control" value="{{ $item->agama }}" id="agama" name="agama"
                                    placeholder="Contoh : Islam">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="tmp_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" value="{{ $item->tmp_lahir }}" id="tmp_lahir" name="tmp_lahir"
                                    placeholder="Contoh : Jombang">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" value="{{ $item->tgl_lahir }}" id="tgl_lahir" name="tgl_lahir">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Pangkat</label>
                                <select class="form-control"  id="exampleFormControlSelect1" name="id_pangkat">
                                    @foreach ($pangkat as $item)
                                    <option value="{{ $item->id }}">{{$item->nama_pangkat}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Jabatan
                                    Struktural</label>
                                <select class="form-control" data-toggle="select" name="id_jabatan" id="exampleFormControlSelect1">
                                    @foreach ($jabatan as $item)
                                    <option value="{{ $item->id }}">{{$item->nama_jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nomor_tlp">Nomor Telepon</label>
                                <input type="text" class="form-control" value="{{ $item->no_tlp }}" id="nomor_tlp" name="no_tlp"
                                    placeholder="Contoh : 0865273944375">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="Jk">Jenis Kelamin</label>
                                <select class="form-control" id="Jk" name="jenis_kelamin">
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
                                <label class="form-control-label" for="shift">Shift</label>
                                <input type="text" class="form-control" value="{{ $item->shift }}" id="shift" name="shift"
                                    placeholder="Masukan shift">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="golongan_darah">Golongan Darah</label>
                                <input type="text" class="form-control" value="{{ $item->gol_darah }}" id="golongan_darah" name="gol_darah"
                                    placeholder="Contoh : B+">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="gelar_dpn">Gelar Depan</label>
                                <input type="text" class="form-control" value="{{ $item->gelar_dpn }}" id="gelar_dpn" name="gelar_dpn"
                                    placeholder="Contoh : Prof">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="gelar_belakang">Gelar Belakang</label>
                                <input type="text" class="form-control" value="{{ $item->gelar_blk }}" id="gelar_belakang" name="gelar_blk"
                                    placeholder="Contoh : Amd">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="status_kawin">Status Kawin</label>
                                <input type="text" class="form-control" value="{{ $item->status_kawin }}" id="status_kawin" name="status_kawin"
                                    placeholder="Contoh : Belum Kawin">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kelurahan">Kelurahan</label>
                                <input type="text" class="form-control" value="{{ $item->kelurahan }}" id="kelurahan" name="kelurahan"
                                    placeholder="Contoh : Rejosopinggir">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kecamatan">Kecamatan</label>
                                <select class="form-control" value="{{ $item->kecamatan }}" id="kecamatan" name="kecamatan">
                                    @foreach ($kecamatan as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kota">Kota</label>
                                <select class="form-control" value="{{ $item->kota }}" id="kota" name="kabupaten">
                                    @foreach ($kota as $item)
                                    <option value="{{ $item->id }}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="provinsi">Provinsi</label>
                                <select class="form-control" value="{{ $item->provinsi }}" id="provinsi" name="provinsi">
                                    @foreach ($provinsi as $item)
                                    <option value="{{ $item->id }}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="askes">Askes</label>
                                <input type="text" class="form-control" value="{{ $item->askes }}" id="askes" name="askes"
                                    placeholder="One of three cols">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kode_dsn">Kode Dosen</label>
                                <input type="text" class="form-control" value="{{ $item->kode_dosen }}" id="kode_dsn" name="kode_dosen"
                                    placeholder="Masukan Kode Dosen">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="departemen">Departemen</label>
                                <input type="text" class="form-control" value="{{ $item->departemen }}" id="departemen" name="departemen"
                                    placeholder="Masukan Departemen">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="praktisi">Praktisi</label>
                                <input type="text" class="form-control" value="{{ $item->praktisi }}" id="praktisi" name="praktisi"
                                    placeholder="Masukan Praktisi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nama_instansi">Nama Instansi</label>
                                <input type="text" class="form-control" value="{{ $item->nama_instansi }}" id="nama_instansi" name="nama_instansi"
                                    placeholder="Masukan nama instansi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="alamat_instansi">Alamat Instansi</label>
                                <input type="text" class="form-control" value="{{ $item->alamat_instansi }}" id="alamat_instansi" name="alamat_instansi"
                                    placeholder="Masukan alamat instansi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="pendidikan">Pendidikan Terakhir</label>
                                <input type="text" class="form-control" value="{{ $item->pendidikan_terakhir }}" id="pendidikan" name="pendidikan_terakhir"
                                    placeholder="Masukan Pendidikan Terakhir">
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
