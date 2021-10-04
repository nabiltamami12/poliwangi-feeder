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
              <h2 class="mb-0">Data Periode Kuliah</h2>
            </div>
            <div class="col text-right">
              <button type="button" onclick="add_btn()" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-plus-circle'></i> Tambah</button>
            </div>
          </div>
        </div>
        <hr class="mt">
        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col">NO</th>
                <th scope="col">Periode</th>
                <th scope="col">Semester</th>
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
        var ganjil = (data['semester']==1)?'<span class="text-success">Gasal <i class="iconify-inline mr-1" style="font-size:12px;" data-icon="akar-icons:circle-check-fill"></i></span>' : `<span class="text-warning" style="cursor:pointer;" onclick="change_semester(${data['nomor']},1)">Gasal</span>`
        var genap = (data['semester']==2)?'<span class="text-success">Genap <i class="iconify-inline mr-1" style="font-size:12px;" data-icon="akar-icons:circle-check-fill"></i></span>' : `<span class="text-warning" style="cursor:pointer;" onclick="change_semester(${data['nomor']},2)">Genap</span>`
        res = (data['status']=="1")? ganjil+"  ||  "+genap:"-";
        return res;
      }
    },{
      "targets": [3],
      "data": null,
      "render": function(data, type, full) {
        var aktif = "<span class='text-success' style='font-size:12px;font-weight:600;'>aktif <i class='iconify-inline mr-1' style='font-size:12px;' data-icon='akar-icons:circle-check-fill'></i></span>"
        var non_aktif = `<button class="btn btn-warning btn-sm" onclick="change_status(${data['nomor']})"><i class="iconify-inline mr-1" style="font-size:12px;" data-icon="akar-icons:circle-check-fill"></i>aktifkan</button>`
        res = (data['status']=="1")?aktif:non_aktif;
        return res;
      }
    },{
      "targets": [4],
      "data": null,
      "render": function(data, type, full) {
        var id = data['nomor'];
        var text_hapus = "";
        var btn_update = `<span class="iconify edit-icon text-primary" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" data-inline="true"></span>` 
        var btn_delete = `<span class="iconify delete-icon text-primary" data-icon="bx:bx-trash" data-inline="true" onclick='delete_btn(${id},"periode","periode","${text_hapus}")'></span>`; 
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
          success: function(res) {
            if (res.status=="success") {
              dt.ajax.reload();                
            } else {
              // alert gagal
            }
            ;
        }
    });
}
function change_semester(id,semester) {
  var globalData = JSON.parse(localStorage.getItem('globalData'))
  var periode = globalData['periode']
  periode['semester'] = semester
  
  localStorage.setItem('globalData', JSON.stringify(globalData));
  
    $.ajax({
        url: url_api+"/periode/change_semester/"+id+"/"+semester,
        type: "put",
        dataType: 'json',
        data: {},
          success: function(res) {
            if (res.status=="success") {
              dt.ajax.reload();
            } else {
              // alert gagal
            }
            ;
        }
    });
}
</script>
@endsection
