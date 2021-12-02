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
              <h2 class="mb-0">Data Report</h2>
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
                <th scope="col">No</th>
                <th scope="col">Nama Pegawai</th>
                <th scope="col">Keterangan</th>
                <th scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
           
            </tbody>
          </table>
        </div>


      </div>
    </div>
  </div>
</section>

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddlLabel" aria-hidden="true">
  <div id="loadingAdd"></div>
  <div class="modal-dialog modal-xl modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddlLabel">Tambah Data Unit</h5>
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
              <strong>Berhasil ! </strong>Unit berhasil ditambahkan.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="form-row">
              <div class="form-group col-md-12">
                <label for="">Pegawai</label>
                <select name="id_pegawai" class="form-control js-example-basic-single" id="idPegawai" required>
                  
                </select>
              </div>
          </div>
          <div class="form-row">            
            <div class="form-group col-md-12">
              <label for="">Keterangan</label>
              <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukan Keterangan" required>
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

{{-- edit --}}

<div class="modal" id="modalEdit" tabindex="-1" aria-labelledby="modalEditlLabel" aria-hidden="true">
  <div id="loadingEdit"></div>
  <div class="modal-dialog modal-xl modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Edit Data Report</h4>
              <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                  <strong>Berhasil ! </strong>Data Unit berhasil diperbarui.
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
              <h4 class="modal-title">Hapus Data Report Pegawai</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <h4>Apakah anda yakin menghapus data report pegawai?</h4>
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
  dt_url =  `{{ url('/api/v1') }}/getReport`; 
  dt_opt = {
    processing: true,
    serverSide: true,
    autoWidth: false,
    "order": [[ 0, "desc" ]],
    columns: [
        {data: null, name: 'no', sortable: false, render: function(data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
        {data: 'id_pegawai', name: 'id_pegawai'},
        {data: 'keterangan', name: 'keterangan'},
        {data: 'Aksi', name: 'Aksi',orderable:false,serachable:false,sClass:'text-center'},
    ]
  };
  
  
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });

  function add_btn() {
    $.ajax({
        url: `{{ url('/api/v1') }}/getDataReport`,
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
        // console.log(parseInt($('#idPegawai').val()),$('#keterangan').val())
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: `{{ url('/api/v1') }}/store-report`,
            method: 'post',
            data: {
                id_pegawai: parseInt($('#idPegawai').val()),
                keterangan: $('#keterangan').val(),
               
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
            url: `{{ url('/api/v1') }}/data-report/${id}`,
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
            url: `{{ url('/api/v1') }}/data-report/${id}/edit`,
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
            url: `{{ url('/api/v1') }}/data-report/${id}`,
            method: 'PUT',
            data: {
                id_pegawai: parseInt($('#editIdPegawai').val()),
                keterangan: $('#editKeterangan').val(),
                
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
            url: `{{ url('/api/v1') }}/data-report/${id}`,
            method: 'DELETE',
            success: function(result) {
                setInterval(function(){ 
                    $('#modalDelete').modal('hide');
                    // $('#datatable').DataTable().ajax.reload();
                    location.reload();
                }, 500);
            }
        });
    });

  });
</script>
@endsection