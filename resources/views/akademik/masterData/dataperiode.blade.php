@extends('layouts.mainAkademik')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content page-content__akademik container-fluid" id="akademik_dataperiode">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">

        <div class="card-header p-0 m-0 border-0 rounded-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Data Periode</h2>
            </div>
            <div class="col text-right">
              <button type="button" onclick="add_btn()" class="btn--blue add-btn"><img src="/images/add-icon--white.png" alt="">
                Tambah</button>
            </div>
          </div>

          <hr class="mt">
        </div>

        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col">NO</th>
                <th scope="col">Periode</th>
                <th scope="col">Status</th>
                <th scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>

        
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script>
var nomor = 1;
dt_url = `${url_api}/periode`;
dt_opt = {
  // "serverSide": true,
  "columnDefs": [
    {
      "targets": [0],
      "data": null,
      "render": function(data, type, full) {
        res = nomor++;
        return res;
      }
    },{
      "targets": [1],
      "data": null,
      "render": function(data, type, full) {
        res = data['tahun']+"-"+(data['tahun']+1);
        return res;
      }
    },{
      "targets": [2],
      "data": null,
      "render": function(data, type, full) {
        var aktif = "<span>aktif</span>"
        var non_aktif = `<button class="btn btn-primary" onclick="change_status(${data['nomor']})">aktifkan</button>`
        res = (data['status']=="1")?aktif:non_aktif;
        return res;
      }
    },{
      "targets": [3],
      "data": null,
      "render": function(data, type, full) {
        var id = data['nomor'];
        var text_hapus = "";
        var btn_update = `<span class="iconify edit-icon" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" data-inline="true"></span>` 
        var btn_delete = `<span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true" onclick='delete_btn(${id},"periode","periode","${text_hapus}")'></span>`; 
        res = btn_update+" "+btn_delete;
        return res;
      }
    },
  ]
};

function change_status(id) {
    $.ajax({
        url: url_api+"/periode/change_status/"+id,
        type: "put",
        dataType: 'json',
        data: {},
        beforeSend: function(text) {
            // loading func
            console.log("loading")
        },
        success: function(res) {
            if (res.status=="success") {
                dt.ajax.reload();                
            } else {
                // alert gagal
            }
        }
    });
}
</script>
@endsection
