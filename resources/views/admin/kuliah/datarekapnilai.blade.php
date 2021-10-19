@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="akademik_datamahasiswa">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Rekap Nilai Mahasiswa</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
            </div>
          </div>
        </div>
        <hr class="my-4 mt">
        <form class="form-select rounded-0">
          <div class="form-row">
            <div class="col-md-12 form-group">
              <label for="jenjang-pendidikan">NIM Mahasiswa</label>
              <select class="form-control" id="nomor" name="nomor"></select>
            </div>
            <div class="col-md-6 form-group">
              <label for="kelas">Tahun</label>
              <select class="form-control" id="tahun" name="tahun">
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
              </select>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="status-mahasiswa">Semester</label>
              <select class="form-control" id="semester" name="semester">
                <option value="1"> Semester Gasal </option>
                <option value="2"> Semester Genap </option>
              </select>
            </div>
          </div>
        </form>
        <hr class="mt">
        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center px-2">No</th>
                <th scope="col">Kode Matakuliah</th>
                <th scope="col">Matakuliah</th>
                <th scope="col" class="text-center">Nilai Angka</th>
                <th scope="col" class="text-center">SKS</th>
                <th scope="col" class="text-center">Nilai Huruf</th>
                <th scope="col">Kelas</th>
                <th scope="col" class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function() {
    
    $('#nomor ').on('change',function (e) {
      var url = `${url_api}/nilai/rekap?nomor=${$('#nomor').val()}&tahun=${$('#tahun').val()}&semester=${$('#semester').val()}`;
      dt.ajax.url(url).load();
    });
    $('select').on('change',function (e) {
      var url = `${url_api}/nilai/rekap?nomor=${$('#nomor').val()}&tahun=${$('#tahun').val()}&semester=${$('#semester').val()}`;
      dt.ajax.url(url).load();
    });
    $("#nomor").select2({
      ajax: {
        url: '{{ url('api/v1/mahasiswa/select-option') }}',
        dataType: 'json',
        delay: 1000,
        data: function (params) {
          return {
            q: params.term,
            page: params.page
          };
        },
        processResults: function ({data}, params) {
          params.page = params.page || 1;

          return {
            results: data.items,
            pagination: {
              more: (params.page * 15) < data.total_count
            }
          };
        },
        cache: true
      },
      placeholder: 'Cari NIM',
      minimumInputLength: 3,
    });

  });

  var nomor = 1;
  dt_url = `${url_api}/nilai/rekap?nomor=${$('#nomor').val()}&tahun=${$('#tahun').val()}&semester=${$('#semester').val()}`;
  dt_opt = {
    "columns": [
      {
        "data" : null,
        "render": ( data, type, row, meta ) => meta.row+1
      },
      {"data" : "kode_matakuliah"},
      {"data" : "matakuliah"},
      {"data" : "na", className: 'text-center'},
      {"data" : "sks", className: 'text-center'},
      {"data" : "nh", className: 'text-center'},
      {"data" : "kelas"},
      {
        "data" : "nomor",
        "render": ( data, type, row, meta) => {
          let text_hapus = row['kode_matakuliah']+" - "+row['matakuliah'];
          let btn_update = `<span class="iconify edit-icon text-primary" onclick="update_nilai('${data}')" data-icon="bx:bx-edit-alt" ></span>` 
          let btn_delete = `<span class="iconify delete-icon text-primary" data-icon="bx:bx-trash"  onclick='delete_btn(${data},"nilai","nilai matakuliah ","${text_hapus}")'></span>`;
          return btn_update+btn_delete;
        }
      }
    ]
  }

  function update_nilai(nomor_nilai) {
    window.location.href = window.location.href+`/edit?nomor_nilai=${nomor_nilai}&tahun=${$('#tahun').val()}`;
  }
</script>
@endsection