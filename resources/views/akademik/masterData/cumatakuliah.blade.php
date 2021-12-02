@extends('layouts.main')

@section('content')

<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="akademik_datamatakuliah">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">

        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">{{ ($id==null)?"TAMBAH":"UBAH" }} DATA MATAKULIAH</h2>
            </div>
          </div>
        </div>

        <hr class="my-4">

        <form id="form_cu">
          <input type="hidden" id="nomor" name="nomor">
          <div class="form-row">

            <div class="col-sm-12 col-12">
              <div class="form-group row mb-0">
                <label>Matakuliah</label>
                <input type="text" class="form-control" id="matakuliah" placeholder="Nama Matakuliah" name="matakuliah">
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Program Studi</label>
                <select class="form-control" id="program_studi" name="program_studi" required>

                </select>
              </div>
            </div>
            
            <!-- <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Semester</label>
                <select class="form-control" id="semester" name="semester" required>
                  <option value="1">Gasal</option>
                  <option value="2">Genap</option>
                </select>
              </div>
            </div> -->
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Kode</label>
                <input type="text" class="form-control" placeholder="Kode Matakuliah" id="kode" name="kode">
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>SKS</label>
                <input type="text" class="form-control" id="sks" placeholder="Jumlah SKS" name="sks" required>
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Bobot</label>
                <input type="text" class="form-control" id="bobot" placeholder="Bobot Matakuliah" name="bobot" required>
              </div>
            </div>
           
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Matakuliah Inggris</label>
                <input type="text" class="form-control" id="matakuliah_inggris" placeholder="Nama Inggris Matakuliah" name="matakuliah_inggris">
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <label>Matakuliah Singkatan</label>
                <input type="text" class="form-control" id="matakuliah_singkatan" placeholder="Nama Singkatan Matakuliah" name="matakuliah_singkatan">
              </div>
            </div>
            <div class="col-sm-4 col-12">
              <div class="form-group row mb-0">
                <label>Matakuliah Wajib</label>
                <select class="form-control" id="mk_wajib" name="mk_wajib">
                  <option value="1">Wajib</option>
                  <option value="0">Tidak Wajib</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4 col-12">
              <div class="form-group row mb-0">
                <label>Matakuliah Jenis</label>
                <select class="form-control" id="matakuliah_jenis" name="matakuliah_jenis" required>

                </select>
              </div>
            </div>
            <div class="col-sm-4 col-12">
              <div class="form-group row mb-0">
                <label>Masuk Penilaian</label>
                <select class="form-control" id="masuk_penilaian" name="masuk_penilaian">
                  <option value="">-</option>
                  <option value="1">Masuk</option>
                  <option value="0">Tidak Masuk</option>
                </select>
              </div>
            </div>
          </div>
          <hr class="my-4">

          <button type="submit" class="btn btn-primary w-100 simpanData-btn ">{{ ($id==null)?"Tambah":"Ubah" }} Data</button>
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
            var url = url_api+"/matakuliah/"+id;
            var type = "put";
        } else {
            var url = url_api+"/matakuliah";
            var type = "post";
        }
        $.ajax({
            url: url,
            type: type,
            dataType: 'json',
            data: data,
            success: function(res) {
                if (res.status=="success") {
                    window.location.href = "{{url('/admin/master/datamatakuliah')}}";                    
                } else {
                    // alert gagal
                }
                
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

    var optMatkulJenis = `<option value=""> - </option>`;
    $.each(dataGlobal['mk_jenis'],function (key,row) {
        optMatkulJenis += `<option value="${row.nomor}">${row.matakuliah_jenis}</option>`
    })
    $('#matakuliah_jenis').append(optMatkulJenis)
    $('#mk_group').append(optMatkulJenis)
    
    if (id!="") {
        $.ajax({
            url: url_api+"/matakuliah/"+id,
            type: 'get',
            dataType: 'json',
            data: {},
            success: function(res) {
                if (res.status=="success") {
                    var data = res['data'][0];
                    $.each(data,function (key,row) {
                        $('#'+key).val(row);
                    })                
                    $('#masuk_penilaian').val(data.masuk_penilaian).change();
                    $('#wali_kelas').val(data.id_wali_kelas).change();
                    
                } else {
                    // alert gagal
                }
                
            }
        });
    }
}
</script>
@endsection