@extends('layouts.mainAkademik')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content page-content__akademik container-fluid" id="akademik_datajurusan">
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
                
                <hr class="mt my-4">
                
                <form id="form_cu" class="form-input mt-0">
                    <input type="hidden" id="nomor" name="nomor">
                    <div class="form-row">
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label>Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label>Program Studi</label>
                                <select class="form-control" id="program_studi" name="program_studi" required>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label>Kelas</label>
                                <select class="form-control" id="kelas" name="kelas" required>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label>Dosen Wali</label>
                                <select class="form-control" id="dosen_wali" name="dosen_wali" required>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">NIM</label>
                                <input type="text" class="form-control" id="nrp" name="nrp" required>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="kajur">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tmplahir" name="tmplahir" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="sekjur">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tgllahir" name="tgllahir" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="sekjur">Tanggal Masuk</label>
                                <input type="text" class="form-control" id="tglmasuk" name="tglmasuk" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="sekjur">Jalur Penerimaan</label>
                                <input type="text" class="form-control" id="jalur_penerimaan" name="jalur_penerimaan" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="alias">Anak ke</label>
                                <input type="text" class="form-control" id="anak_ke" name="anak_ke" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan_inggris">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan_inggris">Kewarganegaraan</label>
                                <select class="form-control" id="warga" name="warga" required>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan_inggris">Agama</label>
                                <select class="form-control" id="agama" name="agama" required>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan_inggris">Golongan Darah</label>
                                <select class="form-control" id="goldarah" name="goldarah" required>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="konsentrasi">Tahun Lulus</label>
                                <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="akreditasi">Nomor Telp</label>
                                <input type="text" class="form-control" id="notelp" name="notelp" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="akreditasi">Prestasi Olahraga</label>
                                <input type="text" class="form-control" id="prestasi_olahraga" name="prestasi_olahraga" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="akreditasi">Beasiswa</label>
                                <input type="text" class="form-control" id="beasiswa" name="beasiswa" >
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-12">
                            <div class="form-group row mb-0">
                                <div class="card-header p-0 m-0 border-0">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h2 class="mb-0">ALAMAT MAHASISWA</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-12">
                            <hr class="mt">
                        </div>
                        <div class="col-sm-12 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Jalan</label>
                                <input type="text" class="form-control" id="jalan" name="jalan" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">RT</label>
                                <input type="text" class="form-control" id="rt" name="rt" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">RW</label>
                                <input type="text" class="form-control" id="rw" name="rw" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Desa/Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="kajur">Kabupaten / Kota</label>
                                <input type="text" class="form-control" id="kabupaten_kota" name="kabupaten_kota" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="sekjur">Provinsi</label>
                                <input type="text" class="form-control" id="propinsi" name="propinsi" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="alias">Kode Pos</label>
                                <input type="text" class="form-control" id="kode_pos" name="kode_pos" >
                            </div>
                        </div>
                    </div>            
                    <div class="form-row">
                        <div class="col-sm-12 col-12">
                            <div class="form-group row mb-0">
                                <div class="card-header p-0 m-0 border-0">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h2 class="mb-0">DATA ORANG TUA</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-12">
                            <hr class="mt">
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Ayah</label>
                                <input type="text" class="form-control" id="ayah" name="ayah" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Kerja Ayah</label>
                                <input type="text" class="form-control" id="kerja_ayah" name="kerja_ayah" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Penghasilan Ayah</label>
                                <input type="text" class="form-control" id="penghasilan_ayah" name="penghasilan_ayah" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Tempat Lahir Ayah</label>
                                <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Tanggal Lahir Ayah</label>
                                <input type="text" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Pendidikan Ayah</label>
                                <input type="text" class="form-control" id="pendidikan_ayah" name="pendidikan_ayah" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Ibu</label>
                                <input type="text" class="form-control" id="ibu" name="ibu" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Kerja Ibu</label>
                                <input type="text" class="form-control" id="kerja_ibu" name="kerja_ibu" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Penghasilan Ibu</label>
                                <input type="text" class="form-control" id="penghasilan_ibu" name="penghasilan_ibu" >
                            </div>
                        </div>

                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Tempat Lahir Ibu</label>
                                <input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Tanggal Lahir Ibu</label>
                                <input type="text" class="form-control" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Pendidikan Ibu</label>
                                <input type="text" class="form-control" id="pendidikan_ibu" name="pendidikan_ibu" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Nomor Orang Tua</label>
                                <input type="text" class="form-control" id="notelp_ortu" name="notelp_ortu" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Alamat Orang Tua</label>
                                <input type="text" class="form-control" id="alamat_ortu" name="alamat_ortu" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Jalan</label>
                                <input type="text" class="form-control" id="jalan_ortu" name="jalan_ortu" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">RT</label>
                                <input type="text" class="form-control" id="rt_ortu" name="rt_ortu" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">RW</label>
                                <input type="text" class="form-control" id="rw_ortu" name="rw_ortu" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Desa/Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan_ortu" name="kelurahan_ortu" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan_ortu" name="kecamatan_ortu" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="kajur">Kabupaten / Kota</label>
                                <input type="text" class="form-control" id="kabupaten_kota_ortu" name="kabupaten_kota_ortu" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="sekjur">Provinsi</label>
                                <input type="text" class="form-control" id="propinsi_ortu" name="propinsi_ortu" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="alias">Kode Pos</label>
                                <input type="text" class="form-control" id="kode_pos_ortu" name="kode_pos_ortu" >
                            </div>
                        </div>
                    </div>            
                    <div class="form-row">
                        <div class="col-sm-12 col-12">
                            <div class="form-group row mb-0">
                                <div class="card-header p-0 m-0 border-0">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h2 class="mb-0">Sekolah Asal</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-12">
                            <hr class="mt">
                        </div>

                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="akreditasi">Asal Sekolah</label>
                                <input type="text" class="form-control" id="sekolah" name="sekolah" >
                            </div>
                        </div>

                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label for="akreditasi">SMU</label>
                                <input type="text" class="form-control" id="smu" name="smu" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">NUN</label>
                                <input type="text" class="form-control" id="nun" name="nun" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Tanggal Lulus</label>
                                <input type="text" class="form-control" id="tgllulus" name="tgllulus" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <label for="jurusan">Tahun Lulus SMU</label>
                                <input type="text" class="form-control" id="lulussmu" name="lulussmu" >
                            </div>
                        </div>
                    </div>            
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary w-100 simpanData-btn ">{{ ($id==null)?"Tambah":"Ubah" }} Data</button>
                            </div>
                        </div>
                    </div>            
                </form>
                
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
    var id = "{{$id}}";
    getData(id);        
    loading('hide')

    $('#program_studi').on('change',function (e) {
        var program_studi = $(this).val()
        var kelas = $.grep(dataGlobal['kelas'], function(e){ return e.program_studi == program_studi; });
        console.log(program_studi)
        console.log(kelas)
        $('#kelas').html('')
        var optKelas = `<option value=""> - </option>`;
        $.each(kelas,function (key,row) {
        optKelas += `<option value="${row.nomor}">${row.kode}</option>`
        })
        $('#kelas').append(optKelas); 
    })

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
                loading('show')
            },
            success: function(res) {
                if (res.status=="success") {
                    window.location.href = "{{url('/akademik/master/datamahasiswa')}}";                    
                } else {
                    // alert gagal
                }
                loading('hide')
            }
        });
    });
} );

async function getData(id) {
    

    var optProdi = `<option value=""> - </option>`;
    $.each(dataGlobal['prodi'],function (key,row) {
        optProdi += `<option value="${row.nomor}">${row.nama_program} ${row.program_studi}</option>`
    })
    $('#program_studi').append(optProdi)

    var kelas = $.grep(dataGlobal['kelas'], function(e){ return e.program_studi == $('#program_studi').val(); });
    $('#kelas').html('')
    var optKelas = `<option value=""> - </option>`;
    $.each(kelas,function (key,row) {
      optKelas += `<option value="${row.nomor}">${row.kode}</option>`
    })
    $('#kelas').append(optKelas); 

    var optStatus = `<option value=""> - </option>`;
    $.each(dataGlobal['status'],function (key,row) {
        optStatus += `<option value="${row.kode}">${row.status}</option>`
    })
    $('#status').append(optStatus)

    var optDosen = `<option value=""> - </option>`;
    $.each(dataGlobal['dosen'],function (key,row) {
        optDosen += `<option value="${row.nomor}">${row.nama}</option>`
    })
    $('#dosen_wali').append(optDosen)

    var optAgama = `<option value=""> - </option>`;
    $.each(dataGlobal['agama'],function (key,row) {
        optAgama += `<option value="${row.nomor}">${row.agama}</option>`
    })
    $('#agama').append(optAgama)

    var optGoldarah = `<option value=""> - </option>`;
    $.each(dataGlobal['goldarah'],function (key,row) {
        optGoldarah += `<option value="${row.nomor}">${row.goldarah}</option>`
    })
    $('#goldarah').append(optGoldarah)

    if (id!="") {
        $.ajax({
            url: url_api+"/mahasiswa/"+id,
            type: 'get',
            dataType: 'json',
            data: {},
            beforeSend: function(text) {
                    // loading func
                    console.log("loading")
                    loading('show')
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
                loading('hide')
            }
        });
    }
}
</script>
@endsection