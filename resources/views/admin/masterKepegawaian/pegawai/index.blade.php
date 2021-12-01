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
                            <a href="{{route('data-create')}}" class="btn btn-primary"><i
                                    class="iconify-inline mr-1" data-icon='bx:bx-plus-circle'></i> Tambah</a>
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



<!-- Delete Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeletelLabel" aria-hidden="true">
    <div id="loadingDelete"></div>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4>Apakah anda yakin menghapus data pegawai?</h4>
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
  dt_url = `{{ url('/api/v1') }}/getPegawai`;
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


    $(document).ready(function () {
        $('.js-example-basic-single').select2();
    });

    function add_btn() {
        $.ajax({
            url: `{{ url('/api/v1') }}/getDataPegawai`,
            method: 'GET',
            success: function (result) {

                $('#jurusan').html('');
                $('#jurusan').append($('<option>', {
                    text: "Pilih Jurusan",
                    selected: true,
                    disabled: true,
                }));
                $.each(result.pegawai, function (i, p) {
                    $('#jurusan').append($('<option>', {
                        value: p.id,
                        text: p.jurusan,
                    }));
                });

                $('#id_pangkat').html('');
                $('#id_pangkat').append($('<option>', {
                    text: "Pilih Pangkat",
                    selected: true,
                    disabled: true,
                }));
                $.each(result.jabatan, function (a, j) {
                    $('#id_pangkat').append($('<option>', {
                        value: j.id,
                        text: j.nama_pangkat,
                    }));
                });

                $('#staff').html('');
                $('#staff').append($('<option>', {
                    text: "Pilih Staf",
                    selected: true,
                    disabled: true,
                }));
                $.each(result.jabatan, function (a, j) {
                    $('#staff').append($('<option>', {
                        value: j.id,
                        text: j.staf,
                    }));
                });

                $('#kelurahan').html('');
                $('#kelurahan').append($('<option>', {
                    text: "Pilih Jabatan",
                    selected: true,
                    disabled: true,
                }));
                $.each(result.jabatan, function (a, j) {
                    $('#kelurahan').append($('<option>', {
                        value: j.id,
                        text: j.nama,
                    }));
                });

                $('#kota').html('');
                $('#kota').append($('<option>', {
                    text: "Pilih Jabatan",
                    selected: true,
                    disabled: true,
                }));
                $.each(result.jabatan, function (a, j) {
                    $('#kota').append($('<option>', {
                        value: j.id,
                        text: j.nama,
                    }));
                });

                $('#provinsi').html('');
                $('#provinsi').append($('<option>', {
                    text: "Pilih Jabatan",
                    selected: true,
                    disabled: true,
                }));
                $.each(result.jabatan, function (a, j) {
                    $('#provinsi').append($('<option>', {
                        value: j.id,
                        text: j.nama,
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

    $(document).ready(function () {

        var no = 1;

        $('#SubmitAddForm').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: `{{ url('/api/v1') }}/store-pegawai`,
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
                success: function (result) {
                    console.log(result)
                    if (result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function (key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>' + value +
                                '</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('#datatable').DataTable().ajax.reload();
                        setInterval(function () {
                            $('.alert-success').hide();
                            $('#modalAdd').modal('hide');
                            location.reload();
                        }, 500);
                    }
                }
            });
        });

        $('.modelClose').on('click', function () {
            $('#modalEdit').hide();
        });

        var id;

        $('body').on('click', '#getDetailData', function (e) {
            // e.preventDefault();
            id = $(this).data('id');
            $.ajax({
                url: `{{ url('/api/v1') }}/data-pegawai/${id}`,
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function (result) {
                    $('#DetailModalBody').html(result.html);
                    $('#modalDetail').modal();
                }
            });
        });

        $('body').on('click', '#getEditData', function (e) {
            // e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: `{{ url('/api/v1') }}/data-pegawai/${id}/edit`,
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function (result) {
                    $('#EditModalBody').html(result.html);
                    $('#editIdPegawai').html('');
                    $.each(result.pegawai, function (i, p) {
                        $('#editIdPegawai').append($('<option>', {
                            value: p.id,
                            text: p.nama,
                            selected: p.id == result.data.id_pegawai
                        }));
                    });
                    $('#editJabatanStruktural').html('');
                    $.each(result.jabatan, function (i, p) {
                        $('#editJabatanStruktural').append($('<option>', {
                            value: p.id,
                            text: p.nama_jabatan,
                            selected: p.id == result.data
                                .id_jabatan_struktural
                        }));
                    });
                    $('#modalEdit').show();
                }
            });
        });

        $('#SubmitEditForm').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: `{{ url('/api/v1') }}/data-pegawai/${id}`,
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
                success: function (result) {
                    if (result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function (key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>' + value +
                                '</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('#datatable').DataTable().ajax.reload();
                        setInterval(function () {
                            $('.alert-success').hide();
                            $('#modalEdit').hide();
                            location.reload();
                        }, 500);
                    }
                }
            });
        });

        var deleteID;
        $('body').on('click', '#getDeleteId', function () {
            deleteID = $(this).data('id');
        })
        $('#SubmitDeleteForm').click(function (e) {
            e.preventDefault();
            var id = deleteID;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: `{{ url('/api/v1') }}/data-pegawai/${id}`,
                method: 'DELETE',
                success: function (result) {
                    setInterval(function () {
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
