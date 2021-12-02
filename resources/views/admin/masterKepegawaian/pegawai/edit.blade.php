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
                            <h2 class="mb-0">{{ ($id==null)?"TAMBAH":"UBAH" }} DATA PEGAWAI</h2>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <form id="form_cu" action="{{ route('update-pegawai', ['id' => $id]) }}" method="POST">
                    @method('put')
                    @csrf
                    @if($errors->any())
                        <div class="text-danger">{{$errors->first()}}</div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nip">NIP / NIK</label>
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
                                    <select class="form-control" id="jurusan" name="jurusan">
                                        
                                    </select>
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
                                <select class="form-control"  id="pangkat" name="id_pangkat">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Staff</label>
                                <select class="form-control" data-toggle="select" name="staff" id="staff">
                                    
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
                                    <option value="L" {{ ($item->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ ($item->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
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
                                <label class="form-control-label" for="status_kawin">Status Perkawinan</label>
                                <!-- <input type="text" class="form-control" value="{{ $item->status_kawin }}" id="status_kawin" name="status_kawin" placeholder="Contoh : Belum Kawin"> -->
                                <select class="form-control" id="status_kawin" name="status_kawin">
                                    <option value="L" {{ ($item->status_kawin) == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                    <option value="P" {{ ($item->status_kawin) == 'Sudah Kawin' ? 'selected' : '' }}>Sudah Kawin</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="provinsi">Provinsi</label>
                                <select class="form-control" value="" id="provinsi" name="provinsi">
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kota">Kota</label>
                                <select class="form-control" value="{{ $item->kota }}" id="kota" name="kabupaten">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kecamatan">Kecamatan</label>
                                <select class="form-control" value="{{ $item->kecamatan }}" id="kecamatan" name="kecamatan">
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kelurahan">Kelurahan</label>
                                <select class="form-control" id="kelurahan" name="kelurahan">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="askes">Askes</label>
                                <input type="text" class="form-control" value="{{ $item->askes }}" id="askes" name="askes"
                                    placeholder="Masukan data Askes">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kode_dsn">Kode Dosen</label>
                                <input type="text" class="form-control" value="{{ $item->kode_dosen_sk034 }}" id="kode_dsn" name="kode_dosen_sk034"
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

                    <div class="row">
                        <div class="col-12">
                            <label for="">Pegawai Status</label>
                            <select name="pegawai_status" id="pegawai_status" class="form-control">
                                <option value="None" {{ ($status->status_karyawan) == 'None' ? 'selected' : '' }}>None</option>
                                <option value="dosen" {{ ($status->status_karyawan) == 'dosen' ? 'selected' : '' }}>Dosen</option>
                                <option value="dosen luar biasa" {{ ($status->status_karyawan) == 'dosen luar biasa' ? 'selected' : '' }}>Dosen Luar Biasa</option>
                                <option value="tendik" {{ ($status->status_karyawan) == 'tendik' ? 'selected' : '' }}>Tenaga Didik</option>
                                <option value="pns" {{ ($status->status_karyawan) == 'pns' ? 'selected' : '' }}>PNS</option>
                                <option value="kontrak" {{ ($status->status_karyawan) == 'kontrak' ? 'selected' : '' }}>Kontrak</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit"
                        class="btn btn-primary w-100 simpanData-btn mt-5">{{ ($id==null)?"Tambah":"Ubah" }}
                        Data</button>
                </form>

            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

$.ajax({
    type:"GET",
    url: `{{ url('/api/v1') }}/data-pegawai/getPangkat`,
    data : {"_token":"{{ csrf_token() }}"},
    dataType: 'JSON',
    success:function(res){    
        // console.log(res)           
        if(res){
            $("#pangkat").empty();
            $("#pangkat").append('<option>---Pilih Pangkat---</option>');
            $.each(res, function(a, j) {
                $('#pangkat').append($('<option>', {
                    value: j.id,
                    text: j.nama_pangkat,
                    selected: j.id == `{{$item->id_pangkat}}`,
                }));
            });
        }else{
            $("#pangkat").empty();
        }
    }
});

$.ajax({
    type:"GET",
    url: `{{ url('/api/v1') }}/data-pegawai/getJurusan`,
    data : {"_token":"{{ csrf_token() }}"},
    dataType: 'JSON',
    success:function(res){    
        // console.log(res)           
        if(res){
            $("#jurusan").empty();
            $("#jurusan").append('<option>---Pilih Jurusan---</option>');
            $.each(res, function(a, j) {
                $('#jurusan').append($('<option>', {
                    value: j.nomor,
                    text: j.jurusan,
                    selected: j.nomor == `{{$item->jurusan}}`,
                }));
            });
        }else{
            $("#jurusan").empty();
        }
    }
});

$.ajax({
    type:"GET",
    url: `{{ url('/api/v1') }}/data-pegawai/getStaff`,
    data : {"_token":"{{ csrf_token() }}"},
    dataType: 'JSON',
    success:function(res){    
        // console.log(res)           
        if(res){
            $("#staff").empty();
            $("#staff").append('<option>---Pilih Staf---</option>');
            $.each(res, function(a, j) {
                $('#staff').append($('<option>', {
                    value: j.id,
                    text: j.staf,
                    selected: j.id == `{{$item->staff}}`,
                }));
            });
        }else{
            $("#staff").empty();
        }
    }
});

$.ajax({
    type:"GET",
    url: `{{ url('/api/v1') }}/getProvinsi`,
    data : {"_token":"{{ csrf_token() }}"},
    dataType: 'JSON',
    success:function(res){    
        // console.log(res)           
        if(res){
            $("#provinsi").empty();
            $("#provinsi").append("<option value=''>---Pilih Provinsi---</option>");
            $.each(res, function(a, j) {
                $('#provinsi').append($('<option>', {
                    value: j.id_provinsi,
                    text: j.nama,
                }));
            });
        }else{
            $("#provinsi").empty();
        }
    }
});

$('#provinsi').change(function(){
    var provID = $(this).val(); 
    console.log($(this).val())   
    if(provID){
        $.ajax({
           type:"GET",
           url: `{{ url('/api/v1') }}/getKabupaten?id_provinsi=`+provID,
           data : {"_token":"{{ csrf_token() }}"},
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#kota").empty();
                $("#kecamatan").empty();
                $("#kota").append("<option value=''>---Pilih Kabupaten / Kota---</option>");
                $.each(res,function(id_kabupaten, nama){
                    $("#kota").append('<option value="'+id_kabupaten+'">'+nama+'</option>');
                });
            }else{
               $("#kota").empty();
               $("#kecamatan").empty();
            }
           }
        });
    }else{
        $("#kota").empty();
        $("#kecamatan").empty();
    }      
   });

   $('#kota').change(function(){
    var kabID = $(this).val(); 
    console.log($(this).val())   
    if(kabID){
        $.ajax({
           type:"GET",
           url: `{{ url('/api/v1') }}/getKecamatan?id_kabupaten=`+kabID,
           data : {"_token":"{{ csrf_token() }}"},
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#kecamatan").empty();
                $("#kelurahan").empty();

                $("#kecamatan").append("<option value=''>---Pilih Kecamatan---</option>");

                $.each(res,function(id_kecamatan, nama){
                    $("#kecamatan").append('<option value="'+id_kecamatan+'">'+nama+'</option>');
                });
            }else{
               $("#kecamatan").empty();
               $("#kelurahan").empty();

            }
           }
        });
    }else{
        $("#kecamatan").empty();
        $("#kelurahan").empty();

    }      
   });

   $('#kecamatan').change(function(){
    var kecID = $(this).val(); 
    console.log($(this).val())   
    if(kecID){
        $.ajax({
           type:"GET",
           url: `{{ url('/api/v1') }}/getKelurahan?id_kecamatan=`+kecID,
           data : {"_token":"{{ csrf_token() }}"},
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#kelurahan").empty();
                $("#kelurahan").append("<option value=''>---Pilih Kelurahan---</option>");

                $.each(res,function(id_kelurahan, nama){
                    $("#kelurahan").append('<option value="'+id_kelurahan+'">'+nama+'</option>');
                });
            }else{
               $("#kelurahan").empty();

            }
           }
        });
    }else{
        $("#kelurahan").empty();
    }      
   });
</script>
@endsection
