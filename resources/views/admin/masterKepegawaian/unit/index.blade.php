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
<<<<<<< HEAD
<<<<<<< HEAD
              <button type="button" class="btn btn-primary" onclick="add_btn()"><i class="iconify-inline mr-1" data-icon='bx:bx-plus-circle'></i> Tambah</button>
=======
              <a href="{{route('dataUnit.create')}}" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-plus-circle'></i> Tambah</a>
>>>>>>> 90957374a7ba3e9db022fe4847b26293081a44e3
=======
              <a href="{{route('dataUnit.create')}}" class="btn btn-primary"><i class="iconify-inline mr-1" data-icon='bx:bx-plus-circle'></i> Tambah</a>
>>>>>>> 3cef9bc60654b5ba233f3e4f66ab70d643751c95
            </div>
          </div>
        </div>
        <hr class="mt">
        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
<<<<<<< HEAD
<<<<<<< HEAD
                <th scope="col">NO</th>
                <th scope="col">Pegawai</th>
=======
                <th scope="col">No</th>
>>>>>>> 90957374a7ba3e9db022fe4847b26293081a44e3
=======
                <th scope="col">No</th>
>>>>>>> 3cef9bc60654b5ba233f3e4f66ab70d643751c95
                <th scope="col">Unit</th>
                <th scope="col">Kepala</th>
                <th scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($unit as $item)
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
              @endforeach
            </tbody>
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
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddlLabel">Tambah Unit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
          @csrf
          <div class="form-group">
            <label for="">Pegawai</label>
            <select class="js-example-basic-single form-control" name="id_pegawai" required>
              <option selected disabled>Pilih Pegawai</option>
              <option value="">Pegawai 1</option>
              <option value="">Pegawai 2</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Nama Unit</label>
            <input type="text" class="form-control" name="unit" placeholder="Nama unit" required>
          </div>
          <div class="form-group">
            <label for="">Nama Kepala</label>
            <input type="text" class="form-control" name="kepala" placeholder="Nama kepala" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
  $(document).ready(function() {
      $('.js-example-basic-single').select2();
  });

 

  function add_btn() {
    $('#modalAdd').modal();
  }

  
</script>
@endsection
