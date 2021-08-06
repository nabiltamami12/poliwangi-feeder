@extends('layouts.mainAkademik')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content  container-fluid" id="akademik_datajurusan">
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow padding--small">

                <div class="card-header p-0 m-0 border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="mb-0">{{ ($id==null)?"TAMBAH":"UBAH" }} IDENTITAS MAHASISWA</h2>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <form id="form_cu" class="form-input">
                    <input type="hidden" id="nomor" name="nomor">
                    <div class="form-row">
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label>Kelas</label>
                                <select class="form-control" id="kelas" name="kelas" required>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label>Status</label>
                                <input type="text" class="form-control" id="status" name="status">
                            </div>
                        </div>
                        <div class="col-sm-12 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">NRP</label>
                                <input type="text" class="form-control" id="nrp" name="nrp" required>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik">
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="kajur">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tmplahir" name="tmplahir">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="sekjur">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tgllahir" name="tgllahir">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="alias">Anak ke</label>
                                <input type="text" class="form-control" id="anak_ke" name="anak_ke">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan_inggris">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="konsentrasi">Tahun Lulus</label>
                                <input type="text" class="form-control" id="lulussmu" name="lulussmu">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="akreditasi">Asal Sekolah</label>
                                <input type="text" class="form-control" id="sekolah" name="sekolah">
                            </div>
                        </div>
                    </div>
                    <div class="card-header p-0 m-0 border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">ALAMAT MAHASISWA</h2>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Desa/Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan">
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="kajur">Kabupaten / Kota</label>
                                <input type="text" class="form-control" id="kabupaten_kota" name="kabupaten_kota">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="sekjur">Provinsi</label>
                                <input type="text" class="form-control" id="propinsi" name="propinsi">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="alias">Kode Pos</label>
                                <input type="text" class="form-control" id="kode_pos" name="kode_pos">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-primary w-100 simpanData-btn ">{{ ($id==null)?"Tambah":"Ubah" }}
                        Data</button>
                </form>

            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
    var id = "{{$id}}";
    getData(id);        

    // form tambah data
    $("#form_cu").submit(function(e) {
        e.preventDefault();
        var data = $('#form_cu').serialize();
        if (id!="") {
            var type = "put";
        } else {
            var type = "post";
        }
        $.ajax({
            url: url_api+"/mahasiswa/"+id,
            type: type,
            dataType: 'json',
            data: data,
            beforeSend: function(text) {
                // loading func
                console.log("loading")
            },
            success: function(res) {
                if (res.status=="success") {
                    window.location.href = "{{url('/akademik/master/datamahasiswa')}}";                    
                } else {
                    // alert gagal
                }
            }
        });
    });
} );

async function getData(id) {
    await getGlobalData();

    var optKelas = `<option value=""> - </option>`;
    $.each(dataGlobal['kelas'],function (key,row) {
        optKelas += `<option value="${row.nomor}">${row.kode}</option>`
    })
    $('#kelas').append(optKelas)

    if (id!="") {
        $.ajax({
            url: url_api+"/mahasiswa/"+id,
            type: 'get',
            dataType: 'json',
            data: {},
            beforeSend: function(text) {
                    // loading func
                    console.log("loading")
            },
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
}
</script>
@endsection