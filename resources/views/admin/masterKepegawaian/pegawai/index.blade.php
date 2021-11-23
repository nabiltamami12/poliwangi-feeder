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
              <h2 class="mb-0">Data Kepegawaian</h2>
            </div>
            <div class="col text-right">
              <a href="{{route('dataPegawai.create')}}" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-plus-circle'></i> Tambah</a>
            </div>
          </div>
        </div>
        <hr class="mt">
        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col">NO</th>
                <th scope="col">NIP</th>
                <th scope="col">NOID</th>
                <th scope="col">Nama</th>
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

<!-- Edit Modal -->
{{-- <div class="modal" id="modalEdit" tabindex="-1" aria-labelledby="modalEditlLabel" aria-hidden="true">
  <div id="loadingEdit"></div>
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Edit Pegawai</h4>
              <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                  <strong>Berhasil !</strong>Pangkat berhasil diperbarui.
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
</div> --}}

@endsection
@section('js')
<script>

  var nomor = 1;
  dt_url = '{{ route('get-pegawai') }}';
  dt_opt = {
    processing: true,
    serverSide: true,
    autoWidth: false,
    "order": [[ 0, "desc" ]],
    columns: [
        {data: null, name: 'no', sortable: false, render: function(data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
        {data: 'nip', name: 'nip'},
        {data: 'noid', name: 'noid'},
        {data: 'nama', name: 'nama'},
        {data: 'Aksi', name: 'Aksi',orderable:false,serachable:false,sClass:'text-center'},
    ]
  };

  // function change_status(id) {
  //     $('#konfirmModal').modal('show');
  //     $('#id_konfirm').val(id)
  //   }
  //   function konfirm_func() {
  //     var id = $("#id_konfirm").val();
  //     $.ajax({
  //       url: url_api+"/periode/change_status/"+id,
  //       type: "put",
  //       dataType: 'json',
  //       data: {},
  //       success: function(res) {
  //         if (res.status=="success") {
  //               $('#konfirmModal').modal('hide');
  //               dt.ajax.reload();                
  //             } else {
  //               // alert gagal
  //             }
  //             ;
  //         }
  //     });
  // }
  // function change_semester(id,semester) {
  //   var globalData = JSON.parse(localStorage.getItem('globalData'))
  //   var periode = globalData['periode']
  //   periode['semester'] = semester
    
  //   localStorage.setItem('globalData', JSON.stringify(globalData));
    
  //     $.ajax({
  //         url: url_api+"/periode/change_semester/"+id+"/"+semester,
  //         type: "put",
  //         dataType: 'json',
  //         data: {},
  //           success: function(res) {
  //             if (res.status=="success") {
  //               dt.ajax.reload();
  //             } else {
  //               // alert gagal
  //             }
  //         }
  //     });
  // }

  function add_btn() {
    $('#modalAdd').modal();
  }

  function delete_btn() {
    $('#modalDelete').modal();
  }

  $(document).ready(function() {

    var no = 1;

    $('#SubmitAddForm').click(function(e) {
        // $("#loadingAdd").addClass("lds-dual-ring"); 
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('dataPangkat.store') }}",
            method: 'post',
            data: {
                nama_pangkat: $('#namaPangkat').val(),
                golongan: $('#golongan').val(),
                urut: $('#urut').val(),
            },
            success: function(result) {
              if(result.errors) {
                  $('.alert-danger').html('');
                  $.each(result.errors, function(key, value) {
                      $('.alert-danger').show();
                      $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                  });
                  // $("#loadingAdd").removeClass("lds-dual-ring"); 
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
    $('body').on('click', '#getEditPegawai', function(e) {
        $("#loading").addClass("lds-dual-ring"); 
        // e.preventDefault();
        $('.alert-danger').html('');
        $('.alert-danger').hide();
        id = $(this).data('id');
        $.ajax({
            url: "dataPegawai/"+id+"/edit",
            method: 'GET',
            // data: {
            //     id: id,
            // },
            success: function(result) {
                $('#EditModalBody').html(result.html);
                $("#loading").removeClass("lds-dual-ring");
                $('#modalEdit').show();
            }
        });
    });

    $('#SubmitEditForm').click(function(e) {
        // $("#loadingEdit").addClass("lds-dual-ring"); 
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "dataPangkat/"+id,
            method: 'PUT',
            data: {
                nama_pangkat: $('#editNamaPangkat').val(),
                golongan: $('#editGolongan').val(),
                urut: $('#editUrut').val(),
            },
            success: function(result) {
                if(result.errors) {
                    $('.alert-danger').html('');
                    // $("#loading").removeClass("lds-dual-ring"); 
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
        // $("#loadingDelete").addClass("lds-dual-ring"); 
        e.preventDefault();
        var id = deleteID;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "dataPangkat/"+id,
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
