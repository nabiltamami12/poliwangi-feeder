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
                            <button type="button" onclick="add_btn()" class="btn btn-primary"><i
                                    class="iconify-inline mr-1" data-icon='bx:bx-plus-circle'></i> Tambah</button>
                        </div>
                    </div>
                </div>
                <hr class="mt">
                <div class="table-responsive">
                    <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
                        <thead class="table-header">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">NIP / NIK</th>
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

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddlLabel" aria-hidden="true">
    <div id="loadingAdd"></div>
    <div class="modal-dialog modal-xl modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddlLabel">Tambah Data Pegawai</h5>
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
                    <strong>Berhasil ! </strong>Data Pegawai berhasil ditambahkan.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- <div class="form-group col-md-6">
              <label for="">Pegawai</label>
              <select name="id_pegawai" class="form-control js-example-basic-single" id="idPegawai" required>
              </select>
            </div> --}}
                <div class="form-row">
                    <div class="form-group col-md-6" hidden>
                        <label for="">Username</label>
                        <input type="hidden" class="form-control" name="name" id="username"
                            placeholder="Masukan Username" value="{{ old('name') ?? 'Default value' }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email">
                    </div>
                </div>
                <div class="form-row" hidden>
                    <div class="form-group col-md-6">
                        <label for="">Password</label>
                        <input type="hidden" name="password" class="form-control" id="password"
                            placeholder="Masukan Password" value="{{ old('password') ?? 'password' }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Konfirmasi Password</label>
                        <input type="hidden" class="form-control" id="password_confirmation"
                            name="password_confirmation" placeholder="konfirmasi_password"
                            value="{{ old('password') ?? 'password' }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">NIP</label>
                        <input type="text" name="nip" class="form-control" id="nip"
                            placeholder="Masukan Nomor Induk Pegawai">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">NOID</label>
                        <input type="text" class="form-control" id="noid" name="noid" placeholder="Masukan NOID">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">NPWP</label>
                        <input type="text" class="form-control" name="npwp" id="npwp"
                            placeholder="Masukan Nomor Pokok Wajib Pajak">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">NIDN</label>
                        <input type="text" class="form-control" name="nidn" id="nidn"
                            placeholder="Masukan Nomor Induk Dosen Nasional">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Nama Pegawai</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            placeholder="Masukan Nama Pegawai">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">NIP Lama</label>
                        <input type="text" class="form-control" id="nip_lama" name="nip_lama"
                            placeholder="Masukan NIP lama">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Jurusan</label>
                        <select name="jurusan" class="form-control js-example-basic-single" id="jurusan" required>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Agama</label>
                        <select class="form-control" id="agama" name="agama">
                            <option>Pilih Agama...</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Tempat Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Pangkat</label>
                        <select name="id_pangkat" class="form-control js-example-basic-single" id="id_pangkat" required>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Staff</label>
                        <select name="staff" class="form-control js-example-basic-single" id="staff" required>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Nomor Telepon</label>
                        <input type="text" class="form-control" id="nomor_tlp" name="no_tlp"
                                    placeholder="Contoh : 0865273944375">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option>Pilih Jenis Kelamin...</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Shift</label>
                        <input type="text" class="form-control" id="shift" name="shift"
                        placeholder="Masukan shift">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Gol Darah</label>
                        <input type="text" class="form-control" id="golongan_darah" name="gol_darah"
                        placeholder="Contoh : B+">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Gelar Depan</label>
                        <input type="text" class="form-control" id="gelar_dpn" name="gelar_dpn"
                        placeholder="Contoh : Prof">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Gelar Belakang</label>
                        <input type="text" class="form-control" id="gelar_belakang" name="gelar_blk"
                        placeholder="Contoh : Amd">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Status Perkawinan</label>
                        <select class="form-control" id="status_kawin" name="status_kawin">
                            <option>Pilih Jenis Kelamin...</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Sudah Kawin">Sudah Kawin</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Kelurahan</label>
                        <select name="kelurahan" class="form-control js-example-basic-single" id="kelurahan" required>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Kecamatan</label>
                        <select name="kecamatan" class="form-control js-example-basic-single" id="kecamatan" required>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Kota / Kabupaten</label>
                        <select name="kota" class="form-control js-example-basic-single" id="kota" required>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Provinsi</label>
                        <select name="provinsi" class="form-control js-example-basic-single" id="provinsi" required>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Askes</label>
                        <input type="text" class="form-control" id="askes" name="askes"
                                    placeholder="Masukan data Askes">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Kode Dosen</label>
                        <input type="text" class="form-control" id="kode_dosen_sk034" name="kode_dosen_sk034"
                        placeholder="Masukan Kode Dosen">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Departemen</label>
                        <input type="text" class="form-control" id="departemen" name="departemen"
                        placeholder="Masukan Departemen">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Praktisi</label>
                        <input type="text" class="form-control" id="praktisi" name="praktisi"
                        placeholder="Masukan Praktisi">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Nama Instansi</label>
                        <input type="text" class="form-control" id="nama_instansi" name="nama_instansi"
                                    placeholder="Masukan nama instansi">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Alamat Instansi</label>
                        <input type="text" class="form-control" id="alamat_instansi" name="alamat_instansi"
                        placeholder="Masukan alamat instansi">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Pendidikan Terakhir</label>
                        <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir"
                        placeholder="Masukan Pendidikan Terakhir">
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
