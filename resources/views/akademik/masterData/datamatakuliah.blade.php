@extends('layouts.mainAkademik')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content  container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Data Kelas</h2>
            </div>
            <div class="col text-right">
              <button type="button" class="btn btn-primary">
                <i class="iconify mr-1" onclick="add_btn()" data-icon="bx:bxs-plus-circle"></i>
                Tambah
              </button>
            </div>
          </div>
          <hr class="my-4">

          <div class="row align-items-center mt-0 padding--small py-0 ">
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <select class="form-control form-control-sm" id="dataperhalaman">
                  <option>10</option>
                  <option>20</option>
                  <option>30</option>
                </select>
                <label class="label-datashowperpage mb-0 ml-3" for="dataperhalaman">Data per Halaman</label>
              </div>
            </div>

            <div class="col-md-4 col-12 offset-md-2 offset-0 mt-md-0 mt-2 p-0 text-right">
              <label class="sr-only" for="searchdata">Search</label>
              <div class="input-group">
                <input type="search" class="form-control form-control-sm" id="searchdata" placeholder="Pencarian ...">
                <div class="input-group-prepend">
                  <div class="input-group-text search-icon">
                    <i class="iconify" data-icon="fluent:search-32-regular"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-borderless table-flush table-hover">

            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center p-2">No</th>
                <th scope="col">Kode</th>
                <th scope="col">Matakuliah</th>
                <th scope="col" class="text-center">Jenis</th>
                <th scope="col" class="text-center">Semester</th>
                <th scope="col" class="text-center">Aksi</th>
              </tr>
            </thead>
          </table>
        </div>

        <div class="row justify-content-between align-items-center table-information">
          <h3>Menampilkan 1 sampai 7 dari 7 total data</h3>
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item disabled" aria-label="Previous">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">1<span class="sr-only">(current)</span></a>
              </li>
              <li class="page-item disabled" aria-label="Next">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function() {
  var nomor = 1;
dt = $('#datatable').DataTable({
    "processing": true,
    "ajax": {
      url: `${url_api}/matakuliah`,
      type: 'GET',
      data: {},
      headers: {
        "Authorization": window.localStorage.getItem('token')
      },
    },
    "aoColumnDefs": [
      {
        "aTargets": [0],
        "mData": null,
        "mRender": function(data, type, full) {
          res = nomor++;
          return res;
        }
      },{
        "aTargets": [1],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['kode'];
          return res;
        }
      },{
        "aTargets": [2],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['matakuliah'];
          return res;
        }
      },{
        "aTargets": [3],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['nama_mk_jenis'];
          return res;
        }
      },{
        "aTargets": [4],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['semester'];
          return res;
        }
      },{
        "aTargets": [5],
        "mData": null,
        "mRender": function(data, type, full) {
          var id = data['nomor'];
          var text_hapus = data['kode'];
          var btn_update = `<i class="iconify edit-icon" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" ></span>` 
          var btn_delete = `<i class="iconify delete-icon" data-icon="bx:bx-trash"  onclick='delete_btn(${id},"matakuliah","matakuliah","${text_hapus}")'></span>`; 
          res = btn_update+" "+btn_delete;
          return res;
        }
      },
    ],
    "sDom": 'lrtip',
    "lengthChange": false,
    "info": false,
    "language": {
      "paginate": {
        "next": '&gt;',
        "previous": '&lt;'
      },
      "processing": "Loading ..."
    }
  })
  dt.on('order.dt search.dt', function() {
    dt.column(0, {
      search: 'applied',
      order: 'applied'
    }).nodes().each(function(cell, i) {
      cell.innerHTML = i + 1;
    });
  }).draw();

  $('#searchdata').on('keyup', function() {
    dt.search(this.value).draw();
  });
} );
</script>
@endsection