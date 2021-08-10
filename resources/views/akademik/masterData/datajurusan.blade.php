@extends('layouts.mainAkademik')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content  container-fluid" id="akademik_datajurusan">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">

        <div class="card-header p-0 m-0 border-0 
          <div class=" row align-items-center">
          <div class="col">
            <h2 class="mb-0">Data Jurusan</h2>
          </div>
          <div class="col text-right">
            <button type="button" onclick="add_btn()" class="btn-primary "><img src="/images/add-icon--white.png"
                alt="">
              Tambah</button>
          </div>
        </div>

        <hr class="my-4">

        <div class="row align-items-center card-header__filter-search">
          <div class="col-sm-6 col-12">
            <div class="form-group row mb-0">
              <div class="col-2 pr-6">
                <select class="form-control m-0" id="dataperhalaman">
                  <option>10</option>
                  <option>20</option>
                  <option>30</option>
                </select>
              </div>
              <div class="col-sm-6 col-7 ml-3 ml-md-0">
                <label class="dataperhalaman" for="dataperhalaman">Data per Halaman</label>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-12 offset-md-2 offset-0 mt-md-0 mt-2 text-right">
            <label class="sr-only" for="searchdata">Search</label>
            <div class="input-group search-group">
              <input type="search" class="form-control form-control-sm" id="searchdata" placeholder="Pencarian ...">
              <div class="input-group-prepend">
                <div class="input-group-text search-icon"><img src="/images/search-icon.png" alt=""></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table id="datatable" class="table align-items-center table-flush">
          <thead class="table-header">
            <tr>
              <th scope="col">NO</th>
              <th scope="col">JURUSAN</th>
              <th scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>

      </div>

      <div class="row justify-content-between align-items-center table-info">
        <h3>Menampilkan 1 sampai 7 dari 7 total data</h3>
        <div class="pagination mt-2 mt-sm-0">
          <button type="button" class="btn-prev">Previous</button>
          <button type="button" class="btn-number">1</button>
          <button type="button" class="btn-next">Next</button>
        </div>
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
      url: `${url_api}/jurusan`,
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
          res = data['jurusan'];
          return res;
        }
      },{
        "aTargets": [2],
        "mData": null,
        "mRender": function(data, type, full) {
          var id = data['nomor'];
          var text_hapus = data['jurusan'];
          var btn_update = `<span class="iconify edit-icon" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" ></span>` 
          var btn_delete = `<span class="iconify delete-icon" data-icon="bx:bx-trash"  onclick='delete_btn(${id},"jurusan","jurusan","${text_hapus}")'></span>`; 
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