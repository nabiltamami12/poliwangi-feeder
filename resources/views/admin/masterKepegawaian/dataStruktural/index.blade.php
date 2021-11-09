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
              <h2 class="mb-0">Data Struktural</h2>
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
                <th scope="col">Pegawai</th>
                <th scope="col">Jabatan</th>
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
<div class="modal fade" id="konfirmModal" tabindex="-1" aria-labelledby="konfirmModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <input type="hidden" id="id_konfirm">

        <div class="modal-header">
            <p class="text-center">
                <h5 class="modal-title text-warning text-center">Peringatan</h5>
            </p>
        </div>
        <div class="modal-body">
          <p class="text-center font-weight-bold">Apakah anda yakin mau mengganti periode aktif ?</p>
          <p class="text-center">Hal ini dapat menyebabkan perubahan data pada website</p>
          <h2 class="text-center mb-4"><span id="text_hapus"></span></h2>
          <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-modal-cancel w-100" data-dismiss="modal">Batal</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary w-100" id="btn_modal_hapus" onclick="konfirm_func()">Yakin</button>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddlLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddlLabel">Tambah Data Struktural</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
              <strong>Berhasil ! </strong>Jabatan Struktural berhasil ditambahkan.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="">Pegawai</label>
                <select name="id_pegawai" class="form-control js-example-basic-single" id="idPegawai" required>
                  <option selected disabled>Pilih Pegawai</option>
                  @foreach($pegawai as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="">Nama Jabatan</label>
                <input type="text" class="form-control" name="nama_jabatan" id="namaJabatan" placeholder="Nama jabatan" required>
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Tmt</label>
              <input type="text" class="form-control" name="tmt" id="tmt" placeholder="tmt" required>
            </div>
            <div class="form-group col-md-6">
              <label for="">Nomor SK</label>
                <input type="text" class="form-control" name="nomor_sk" id="nomorSk" placeholder="Nomor SK" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Tanggal SK</label>
              <input type="date" class="form-control" name="tanggal_sk" id="tanggalSk" placeholder="Tanggal SK" required>
            </div>
            <div class="form-group col-md-6">
              <label for="">Yang Mengesahkan</label>
                <input type="text" class="form-control" name="pejabat_yg_mengesahkan" id="pejabatYgMengesahkan" placeholder="Yang Mengesahkan" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Jabatan Fungsional</label>
              <input type="text" class="form-control" name="jabatan_fungsional" id="jabatanFungsional" placeholder="Jabatan Fungsional" required>
            </div>
            <div class="form-group col-md-6">
              <label for="">Jabatan Struktural</label>
              <input type="text" class="form-control" name="jabatan_struktural" id="jabatanStruktural" placeholder="Jabatan Struktural" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Tmt Struktural</label>
              <input type="text" class="form-control" name="tmt_struktural" id="tmtStruktural" placeholder="Tmt Struktural" required>
            </div>
            <div class="form-group col-md-6">
              <label for="">Tmt Kerja</label>
              <input type="text" class="form-control" name="tmt_kerja" id="tmtKerja" placeholder="Tmt Kerja" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Tmt Kontrak</label>
              <input type="text" class="form-control" name="tmt_kontrak" id="tmtKontrak" placeholder="Tmt Kontrak" required>
            </div>
            <div class="form-group col-md-6">
              <label for="">Status</label>
              <input type="text" class="form-control" name="status" id="status" placeholder="Status" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="">Keterangan</label>
              <textarea name="keterangan" id="keterangan" class="form-control" rows="7" placeholder="keterangan" required></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="SubmitAddForm">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- Detail Modal -->
<div class="modal" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Detail Data Struktural</h4>
              <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <div id="DetailModalBody">
                    
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal" id="modalEdit" tabindex="-1" aria-labelledby="modalEditlLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Edit Data Struktural</h4>
              <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                  <strong>Berhasil ! </strong>Data Struktural berhasil diperbarui.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div id="EditModalBody">
                    
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="SubmitEditForm">Update</button>
              <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>
 
<!-- Delete Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeletelLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Hapus Data Struktural</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <h4>Apakah anda yakin menghapus data struktural?</h4>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" id="SubmitDeleteForm">Iya</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
      </div>
  </div>
</div>

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
          res = data['tahun']+"-"+(Number(data['tahun'])+1);
          return res;
        }
      },{
        "targets": [2],
        "data": null,
        "render": function(data, type, full) {
          res = (data['status']=="1")?data['tahun']+data['semester']:"-";
          return res;
        }
      },{
        "targets": [3],
        "data": null,
        "render": function(data, type, full) {
          var ganjil = (data['semester']==1)?'<span class="text-success">Gasal <i class="iconify-inline mr-1" style="font-size:12px;" data-icon="akar-icons:circle-check-fill"></i></span>' : `<span class="text-warning" style="cursor:pointer;" onclick="change_semester(${data['nomor']},1)">Gasal</span>`
          var genap = (data['semester']==2)?'<span class="text-success">Genap <i class="iconify-inline mr-1" style="font-size:12px;" data-icon="akar-icons:circle-check-fill"></i></span>' : `<span class="text-warning" style="cursor:pointer;" onclick="change_semester(${data['nomor']},2)">Genap</span>`
          res = (data['status']=="1")? ganjil+"  ||  "+genap:"-";
          return res;
        }
      },{
        "targets": [4],
        "data": null,
        "render": function(data, type, full) {
          var aktif = "<span class='text-success' style='font-size:12px;font-weight:600;'>aktif <i class='iconify-inline mr-1' style='font-size:12px;' data-icon='akar-icons:circle-check-fill'></i></span>"
          var non_aktif = `<button class="btn btn-warning btn-sm" onclick="change_status(${data['nomor']})"><i class="iconify-inline mr-1" style="font-size:12px;" data-icon="akar-icons:circle-check-fill"></i>aktifkan</button>`
          res = (data['status']=="1")?aktif:non_aktif;
          return res;
        }
      },{
        "targets": [5],
        "data": null,
        "render": function(data, type, full) {
          var id = data['nomor'];
          var text_hapus = data['tahun']+"-"+(parseInt(data['tahun'])+1);
          var btn_update = `<span class="iconify edit-icon text-primary" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" data-inline="true"></span>` 
          var btn_delete = `<span class="iconify delete-icon text-primary" data-icon="bx:bx-trash" data-inline="true" onclick='delete_btn(${id},"periode","periode","${text_hapus}")'></span>`; 
          res = btn_update+" "+btn_delete;
          return res;
        }
      },
    ]
  };

  function change_status(id) {
      $('#konfirmModal').modal('show');
      $('#id_konfirm').val(id)
    }
    function konfirm_func() {
      var id = $("#id_konfirm").val();
      $.ajax({
        url: url_api+"/periode/change_status/"+id,
        type: "put",
        dataType: 'json',
        data: {},
        success: function(res) {
          if (res.status=="success") {
                $('#konfirmModal').modal('hide');
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
          }
      });
  }

  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });

  function add_btn() {
    $('#modalAdd').modal();
  }

  function delete_btn() {
    $('#modalDelete').modal();
  }

  $(document).ready(function() {

    var no = 1;
    var dataTable = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        // pageLength: 5,
        // scrollX: true,
        "order": [[ 0, "desc" ]],
        ajax: '{{ route('get-data') }}',
        columns: [
            {data: null, name: 'no', sortable: false, render: function(data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
            {data: 'id_pegawai', name: 'id_pegawai'},
            {data: 'nama_jabatan', name: 'nama_jabatan'},
            {data: 'Aksi', name: 'Aksi',orderable:false,serachable:false,sClass:'text-center'},
        ]
    });

    $('#SubmitAddForm').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('dataStruktural.store') }}",
            method: 'post',
            data: {
                id_pegawai: parseInt($('#idPegawai').val()),
                nama_jabatan: $('#namaJabatan').val(),
                tmt: $('#tmt').val(),
                nomor_sk: $('#nomorSk').val(),
                tanggal_sk: $('#tanggalSk').val(),
                pejabat_yg_mengesahkan: $('#pejabatYgMengesahkan').val(),
                keterangan: $('#keterangan').val(),
                jabatan_fungsional: $('#jabatanFungsional').val(),
                jabatan_struktural: $('#jabatanStruktural').val(),
                status: $('#status').val(),
                tmt_struktural: $('#tmtStruktural').val(),
                tmt_kerja: $('#tmtKerja').val(),
                tmt_kontrak: $('#tmtKontrak').val(),
            },
            success: function(result) {
                console.log(result)
                if(result.errors) {
                    $('.alert-danger').html('');
                    $.each(result.errors, function(key, value) {
                        $('.alert-danger').show();
                        $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                    });
                } else {
                    $('.alert-danger').hide();
                    $('.alert-success').show();
                    $('#datatable').DataTable().ajax.reload();
                    setInterval(function(){ 
                        $('.alert-success').hide();
                        $('#modalAdd').modal('hide');
                        location.reload();
                    }, 1000);
                }
            }
        });
    });

    $('.modelClose').on('click', function(){
        $('#modalEdit').hide();
    });

    var id;

    $('body').on('click', '#getDetailData', function(e) {
        // e.preventDefault();
        id = $(this).data('id');
        $.ajax({
            url: "dataStruktural/"+id,
            method: 'GET',
            // data: {
            //     id: id,
            // },
            success: function(result) {
                $('#DetailModalBody').html(result.html);
                $('#modalDetail').modal();
            }
        });
    });

    $('body').on('click', '#getEditData', function(e) {
        // e.preventDefault();
        $('.alert-danger').html('');
        $('.alert-danger').hide();
        id = $(this).data('id');
        $.ajax({
            url: "dataStruktural/"+id+"/edit",
            method: 'GET',
            // data: {
            //     id: id,
            // },
            success: function(result) {
              $('#EditModalBody').html(result.html);
              $('#editIdPegawai').html('');
              $.each(result.pegawai, function(i, p) {
                  $('#editIdPegawai').append($('<option>', {
                      value: p.id,
                      text: p.nama,
                      selected: p.id == result.data.id_pegawai
                  }));
              });
              $('#modalEdit').show();
            }
        });
    });

    $('#SubmitEditForm').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "dataStruktural/"+id,
            method: 'PUT',
            data: {
                id_pegawai: parseInt($('#editIdPegawai').val()),
                nama_jabatan: $('#editNamaJabatan').val(),
                tmt: $('#editTmt').val(),
                nomor_sk: $('#editNomorSk').val(),
                tanggal_sk: $('#editTanggalSk').val(),
                pejabat_yg_mengesahkan: $('#editPejabatYgMengesahkan').val(),
                keterangan: $('#editKeterangan').val(),
                jabatan_fungsional: $('#editJabatanFungsional').val(),
                jabatan_struktural: $('#editJabatanStruktural').val(),
                status: $('#editStatus').val(),
                tmt_struktural: $('#editTmtStruktural').val(),
                tmt_kerja: $('#editTmtKerja').val(),
                tmt_kontrak: $('#editTmtKontrak').val(),
            },
            success: function(result) {
                if(result.errors) {
                    $('.alert-danger').html('');
                    $.each(result.errors, function(key, value) {
                        $('.alert-danger').show();
                        $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                    });
                } else {
                    $('.alert-danger').hide();
                    $('.alert-success').show();
                    $('#datatable').DataTable().ajax.reload();
                    setInterval(function(){ 
                        $('.alert-success').hide();
                        $('#modalEdit').hide();
                        location.reload();
                    }, 1000);
                }
            }
        });
    });

    var deleteID;
    $('body').on('click', '#getDeleteId', function(){
        deleteID = $(this).data('id');
    })
    $('#SubmitDeleteForm').click(function(e) {
        e.preventDefault();
        var id = deleteID;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "dataStruktural/"+id,
            method: 'DELETE',
            success: function(result) {
                setInterval(function(){ 
                    $('#modalDelete').modal('hide');
                    $('#datatable').DataTable().ajax.reload();
                    location.reload();
                }, 1000);
            }
        });
    });

  });
</script>
@endsection
