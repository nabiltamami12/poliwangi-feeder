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
                
                <form id="form_cu" action="{{url('/api/v1/store-pegawai')}}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6" hidden>
                            <div class="form-group">
                                <label class="form-control-label" for="username">Username</label>
                                <input type="hidden" name="name" class="form-control" id="username"
                                    placeholder="Masukan Username" value="{{ old('name') ?? 'Default value' }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email</label>
                                <span class="text-danger float-right">*wajib di isi</span>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukan Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" hidden>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="password">Password</label>
                                <input type="hidden" name="password" class="form-control" id="password"
                                    placeholder="Masukan Password" value="{{ old('password') ?? 'password' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="password_confirmation">Konfirmasi
                                    Password</label>
                                <input type="hidden" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Konfirmasi Password" value="{{ old('password') ?? 'password' }}">
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nip">NIP</label>
                                <span class="text-danger float-right">*wajib di isi</span>
                                <input type="text" name="nip" class="form-control" id="nip"
                                placeholder="Masukan Nomor Induk Pegawai" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="noid">NOID</label>
                                <input type="text" class="form-control" id="noid" name="noid"
                                    placeholder="Masukan NOID">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="npwp">NPWP</label>
                                <input type="text" class="form-control" name="npwp" id="npwp"
                                    placeholder="Masukan Nomor Pokok Wajib Pajak">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nidn">NIDN</label>
                                <input type="text" class="form-control" name="nidn" id="nidn"
                                    placeholder="Masukan Nomor Induk Dosen Nasional">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nik">NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukan Nomor Induk Kependudukan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nip_lama">NIP lama</label>
                                <input type="text" class="form-control" id="nip_lama" name="nip_lama"
                                    placeholder="Masukan NIP lama">
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="nama">Nama Pegawai</label>
                                <span class="text-danger float-right">*wajib di isi</span>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Pegawai" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="gelar_dpn">Gelar Depan</label>
                                <input type="text" class="form-control" id="gelar_dpn" name="gelar_dpn"
                                    placeholder="Contoh : Prof">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="gelar_belakang">Gelar Belakang</label>
                                <input type="text" class="form-control" id="gelar_belakang" name="gelar_blk"
                                    placeholder="Contoh : Amd">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label class="form-control-label" for="jurusan">Jurusan</label>
                                <span class="text-danger float-right">*wajib di isi</span>
                                    <select class="form-control js-example-basic-single" id="jurusan" name="jurusan" required>
                                        
                                    </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="agama">Agama</label>
                                <input type="text" class="form-control" id="agama" name="agama"
                                    placeholder="Contoh : Islam">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="tmp_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir"
                                    placeholder="Contoh : Jombang">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Pangkat</label>
                                <select class="form-control js-example-basic-single" data-toggle="select" id="pangkat" name="id_pangkat">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlSelect1">Staff</label>
                                <span class="text-danger float-right">*wajib di isi</span>

                                <select class="form-control js-example-basic-single" data-toggle="select" name="staff" id="staff" required>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nomor_tlp">Nomor Telepon</label>
                                <input type="text" class="form-control" id="nomor_tlp" name="no_tlp"
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
                                <input type="text" class="form-control" id="shift" name="shift"
                                    placeholder="Masukan shift">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="golongan_darah">Golongan Darah</label>
                                <input type="text" class="form-control" id="golongan_darah" name="gol_darah"
                                    placeholder="Contoh : B+">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="status_kawin">Status Pernikahan</label>
                                    <select class="form-control" id="status_kawin" name="status_kawin">
                                        <option>Pilih Status Pernikahan...</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Sudah Kawin">Sudah Kawin</option>
                                    </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="provinsi">Provinsi</label>
                                <span class="text-danger float-right">*wajib di isi</span>
                                <select class="form-control js-example-basic-single" id="provinsi" name="provinsi" required>
                                    <option>Pilih Provinsi...</option>
                                
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kota">Kota</label>
                                <span class="text-danger float-right">*wajib di isi</span>
                                <select class="form-control js-example-basic-single" id="kota" name="kabupaten" required>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kecamatan">Kecamatan</label>
                                <span class="text-danger float-right">*wajib di isi</span>
                                <select class="form-control js-example-basic-single" id="kecamatan" name="kecamatan" required>
                                   
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kelurahan">Kelurahan</label>
                                <span class="text-danger float-right">*wajib di isi</span>
                                <select class="form-control js-example-basic-single" id="kelurahan" name="kelurahan" required>
                                
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="askes">Askes</label>
                                <input type="text" class="form-control" id="askes" name="askes"
                                    placeholder="Masukan data Askes">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kode_dsn">Kode Dosen</label>
                                <input type="text" class="form-control" id="kode_dsn" name="kode_dosen_sk034"
                                    placeholder="Masukan Kode Dosen">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="departemen">Departemen</label>
                                <input type="text" class="form-control" id="departemen" name="departemen"
                                    placeholder="Masukan Departemen">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="praktisi">Praktisi</label>
                                <input type="text" class="form-control" id="praktisi" name="praktisi"
                                    placeholder="Masukan Praktisi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nama_instansi">Nama Instansi</label>
                                <input type="text" class="form-control" id="nama_instansi" name="nama_instansi"
                                    placeholder="Masukan nama instansi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="alamat_instansi">Alamat Instansi</label>
                                <input type="text" class="form-control" id="alamat_instansi" name="alamat_instansi"
                                    placeholder="Masukan alamat instansi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="pendidikan">Pendidikan Terakhir</label>
                                <input type="text" class="form-control" id="pendidikan" name="pendidikan_terakhir"
                                    placeholder="Masukan Pendidikan Terakhir">
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">

                    <div class="row">
                        <div class="col-12">
                            <label for="">Pegawai Status</label>
                            <select name="pegawai_status" id="pegawai_status" class="form-control">
                                <option selected value="None">None</option>
                                <option value="dosen">Dosen</option>
                                <option value="dosen luar biasa">Dosen Luar Biasa</option>
                                <option value="tendik">Tenaga Didik</option>
                                <option value="pns">PNS</option>
                                <option value="kontrak">Kontrak</option>
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
            $("#provinsi").append('<option>---Pilih Provinsi---</option>');
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
                $("#kota").append('<option>---Pilih Kabupaten / Kota---</option>');
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

                $("#kecamatan").append('<option>---Pilih Kecamatan---</option>');

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
                $("#kelurahan").append('<option>---Pilih Kelurahan---</option>');

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
