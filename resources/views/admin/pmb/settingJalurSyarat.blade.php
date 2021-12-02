@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid" id="admin_settingJalursyarat">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Syarat Pendaftaran</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <button type="button" onclick="add_btn()" class="btn btn-primary "> <i class="iconify-inline mr-1" data-icon="bx:bxs-plus-circle"></i>
                Tambah</button>
            </div>
          </div>
        </div>

        <hr class="mt-4">
        <div class="row align-items-center px-3 my-4">
          <!-- <div class="col-12 col-md-6">
             <form class="form-inline">
              <div class="form-group row">
                <select class="form-control form-control-sm" id="dataperhalaman">
                  <option>10</option>
                  <option>20</option>
                  <option>30</option>
                </select>
                <label for="dataperhalaman" class="ml-3 mt-2 mt-sm-0">Data per Halaman</label>
              </div>
            </form>
          </div>
          <div class="col-12 col-md-4 offset-md-2 offset-0 text-right p-0 mt-3 mt-md-0">
            <form class="search_form" action="">
              <input class="form-control form-control-sm" type="search" placeholder="Pencarian...">
              <button type="submit">
                <i class="iconify-inline" data-icon="bx:bx-search"></i>
              </button>
            </form> -->
          <!-- </div> -->
        </div>

        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center px-2">No</th>
                <th scope="col" sclass="text-center">Nama</th>
                <th scope="col" class="text-center" style="width: 40px;">Aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <!-- <tr>
                <td class="text-center px-2">1</td>
                <td class="font-weight-bold">Jalur Mandiri</td>
                <td class="text-center">Rp. 2.500.000</td>
                <td class="text-center">200</td>
                <td class="text-center">
                  <i class="iconify-inline delete-icon text-primary" data-icon="bx:bx-trash"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">2</td>
                <td class="font-weight-bold">Jalur Prestasi</td>
                <td class="text-center">Rp. 1.500.000</td>
                <td class="text-center">100</td>
                <td class="text-center">
                  <i class="iconify-inline delete-icon text-primary" data-icon="bx:bx-trash"></span>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>

        <!-- <div class="row justify-content-between align-items-center table-information">
          <h3>Menampilkan 1 sampai 2 dari 2 total data</h3>
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
        </div> -->
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function() {
    var nomor = 1;
    dt_url = `${url_api}/syarat`;
    dt_opt = {
      "columnDefs": [{
        "aTargets": [0],
        "mData": null,
        "mRender": function(data, type, full) {
          res = nomor++;
          return res;
        }
      }, {
        "aTargets": [1],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['nama'];
          return res;
        }
      }, {
        "aTargets": [2],
        "mData": null,
        "mRender": function(data, type, full) {
          var id = data['id'];
          var text_hapus = data['syarat'];
          var btn_update = `<i class="iconify edit-icon" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" ></i>`
          var btn_delete = `<i class="iconify delete-icon" data-icon="bx:bx-trash"  onclick='delete_btn(${id},"syarat","syarat","${text_hapus}")'></i>`;
          res = btn_update + " " + btn_delete;
          return res;
        }
      }, ]
    }
  });
</script>
@endsection