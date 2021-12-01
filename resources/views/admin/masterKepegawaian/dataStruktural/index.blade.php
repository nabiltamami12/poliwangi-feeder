@extends('layouts.main')

@section('content')

<!-- Header -->
<header class="header"></header>

<div id="loading"></div>

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
                <th scope="col">No SK</th>
                <th scope="col">Nama Jabatan</th>
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
  <div id="loadingAdd"></div>
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
                <span class="text-danger float-right">*(Wajib diisi)</span>
                <select name="id_pegawai" class="form-control js-example-basic-single" id="idPegawai" required>
                  
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="">Nama Jabatan</label>
                <input type="text" class="form-control" name="nama_jabatan" id="namaJabatan" placeholder="Nama jabatan" required>
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Nomor SK</label>
                <input type="text" class="form-control" name="nomor_sk" id="nomorSk" placeholder="Nomor SK" required>
            </div>
            <div class="form-group col-md-6">
              <label for="">Tanggal SK</label>
              <input type="date" class="form-control" name="tanggal_sk" id="tanggalSk" placeholder="Tanggal SK" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
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
              <select name="jabatan_struktural" class="form-control js-example-basic-single" id="jabatanStruktural" required>
                  
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Tmt Struktural</label>
              <input type="date" class="form-control" name="tmt_struktural" id="tmtStruktural" placeholder="Tmt Struktural" required>
            </div>
            <div class="form-group col-md-6">
              <label for="">Tmt Kerja</label>
              <input type="date" class="form-control" name="tmt_kerja" id="tmtKerja" placeholder="Tmt Kerja" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Tmt Kontrak</label>
              <input type="date" class="form-control" name="tmt_kontrak" id="tmtKontrak" placeholder="Tmt Kontrak" required>
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
  <div id="loadingEdit"></div>
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
  <div id="loadingDelete"></div>
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
  dt_url = `{{ url('/api/v1') }}/getData`;
  dt_opt = {
    processing: true,
    serverSide: true,
    autoWidth: false,
    // pageLength: 5,
    // scrollX: true,
    "order": [[ 0, "desc" ]],
    columns: [
        {data: null, name: 'no', sortable: false, render: function(data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
        {data: 'nomor_sk', name: 'nomor_sk'},
        {data: 'nama_jabatan', name: 'nama_jabatan'},
        {data: 'Aksi', name: 'Aksi',orderable:false,serachable:false,sClass:'text-center'},
    ]
    
  };

  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });

  function add_btn() {
    $.ajax({
        url: `{{ url('/api/v1') }}/getDataStruktural`,
        method: 'GET',
        success: function(result) {
          $('#idPegawai').html('');
          $('#idPegawai').append($('<option>', {
            text: "Pilih Pegawai",
            selected: true,
            disabled: true,
          }));
          $.each(result.pegawai, function(i, p) {
            $('#idPegawai').append($('<option>', {
              value: p.id,
              text: p.nama,
            }));
          });

          $('#jabatanStruktural').html('');
          $('#jabatanStruktural').append($('<option>', {
            text: "Pilih Jabatan",
            selected: true,
            disabled: true,
          }));
          $.each(result.jabatan, function(a, j) {
            $('#jabatanStruktural').append($('<option>', {
              value: j.id,
              text: j.nama_jabatan,
            }));
          });

          $('.js-example-basic-single').select2();
          $('#modalAdd').modal();
        }
    });
  }

  function delete_btn() {
    $('#modalDelete').modal();
  }

  $(document).ready(function() {

    var no = 1;

    $('#SubmitAddForm').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: `{{ url('/api/v1') }}/data-struktural`,
            method: 'post',
            data: {
                id_pegawai: parseInt($('#idPegawai').val()),
                nama_jabatan: $('#namaJabatan').val(),
                nomor_sk: $('#nomorSk').val(),
                tanggal_sk: $('#tanggalSk').val(),
                pejabat_yg_mengesahkan: $('#pejabatYgMengesahkan').val(),
                keterangan: $('#keterangan').val(),
                jabatan_fungsional: $('#jabatanFungsional').val(),
                id_jabatan_struktural: parseInt($('#jabatanStruktural').val()),
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
                    }, 500);
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
            url: `{{ url('/api/v1') }}/data-struktural/${id}`,
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
            url: `{{ url('/api/v1') }}/data-struktural/${id}/edit`,
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
              $('#editJabatanStruktural').html('');
              $.each(result.jabatan, function(i, p) {
                  $('#editJabatanStruktural').append($('<option>', {
                      value: p.id,
                      text: p.nama_jabatan,
                      selected: p.id == result.data.id_jabatan_struktural
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
            url: `{{ url('/api/v1') }}/data-struktural/${id}`,
            method: 'PUT',
            data: {
                id_pegawai: parseInt($('#editIdPegawai').val()),
                nama_jabatan: $('#editNamaJabatan').val(),
                nomor_sk: $('#editNomorSk').val(),
                tanggal_sk: $('#editTanggalSk').val(),
                pejabat_yg_mengesahkan: $('#editPejabatYgMengesahkan').val(),
                keterangan: $('#editKeterangan').val(),
                jabatan_fungsional: $('#editJabatanFungsional').val(),
                id_jabatan_struktural: parseInt($('#editJabatanStruktural').val()),
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
                    }, 500);
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
            url: `{{ url('/api/v1') }}/data-struktural/${id}`,
            method: 'DELETE',
            success: function(result) {
                setInterval(function(){ 
                    $('#modalDelete').modal('hide');
                    $('#datatable').DataTable().ajax.reload();
                    location.reload();
                }, 500);
            }
        });
    });

  });
</script>
@endsection
