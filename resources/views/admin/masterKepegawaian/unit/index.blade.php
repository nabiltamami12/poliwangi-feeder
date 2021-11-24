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
              <h2 class="mb-0">Data Unit</h2>
            </div>
            <div class="col text-right">
              <a href="{{route('dataUnit.create')}}" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-plus-circle'></i> Tambah</a>
            </div>
          </div>
        </div>
        <hr class="mt">
        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Unit</th>
                <th scope="col">Kepala</th>
                <th scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
              {{-- @foreach ($unit as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->unit}}</td>
                <td>{{$item->kepala}}</td>
                <td>                      
                  <a href="{{ route('dataUnit.edit', $item->id)}} " class="btn btn-success btn-sm">Edit</a>

                  <a href="{{route('dataUnit.destroy',$item->id)}}" class="btn btn-danger text-white btn-sm"
                    onclick="event.preventDefault();
                document.getElementById('delete').submit();">
                    Hapus
                  </a>
                  <form id="delete" action="{{route('dataUnit.destroy',$item->id)}}" method="post" style="display: inline;">
                    @csrf
                    @method('delete')
                  </form>
                </td>
              </tr>
              @endforeach --}}
            </tbody>
          </table>
        </div>


      </div>
    </div>
  </div>
</section>

<!-- Delete Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeletelLabel" aria-hidden="true">
  <div id="loadingDelete"></div>
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Hapus Data Unit</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <h4>Apakah anda yakin menghapus data unit?</h4>
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
  dt_url = '{{ route('get-unit') }}';
  dt_opt = {
    processing: true,
    serverSide: true,
    autoWidth: false,
    "order": [[ 0, "desc" ]],
    columns: [
        {data: null, name: 'no', sortable: false, render: function(data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
        {data: 'unit', name: 'unit'},
        {data: 'kepala', name: 'kepala'},
        {data: 'Aksi', name: 'Aksi',orderable:false,serachable:false,sClass:'text-center'},
    ]
  };

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
            url: "{{ route('dataUnit.store') }}",
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
            url: "dataUnit/"+id+"/edit",
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
            url: "dataUnit/"+id,
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
            url: "dataUnit/"+id,
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