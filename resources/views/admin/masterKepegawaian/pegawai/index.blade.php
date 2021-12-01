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
                    <strong>Berhasil ! </strong>Data Pegawai berhasil ditambahkan.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Pegawai</label>
                        <select name="id_pegawai" class="form-control js-example-basic-single" id="idPegawai" required>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Nama Jabatan</label>
                        <input type="text" class="form-control" name="nama_jabatan" id="namaJabatan"
                            placeholder="Nama jabatan" required>
                    </div>
                </div>

                <div class="form-row">
                      <div class="form-group col-md-6" hidden>
                          <label class="form-control-label" for="username">Username</label>
                          <input type="hidden" name="name" class="form-control" id="username"
                              placeholder="Masukan Username" value="{{ old('name') ?? 'Default value' }}">
                      </div>
                  <div class="col-md-12">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email"
                              placeholder="Masukan Email">
                      </div>
                  </div>
              </div>
              <div class="form-row" hidden>
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="password">Password</label>
                          <input type="hidden" name="password" class="form-control" id="password"
                              placeholder="Masukan Password" value="{{ old('password') ?? 'password' }}">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="password_confirmation">Konfirmasi
                              Password</label>
                          <input type="hidden" class="form-control" id="password_confirmation"
                              name="password_confirmation" placeholder="Konfirmasi Password" value="{{ old('password') ?? 'password' }}">
                      </div>
                  </div>
              </div>
              <hr class="my-4">

              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="nip">NIP / NIK</label>
                          <input type="text" name="nip" class="form-control" id="nip"
                          placeholder="Masukan Nomor Induk Pegawai">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="noid">NOID</label>
                          <input type="text" class="form-control" id="noid" name="noid"
                              placeholder="Masukan NOID">
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="npwp">NPWP</label>
                          <input type="text" class="form-control" name="npwp" id="npwp"
                              placeholder="One of three cols">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="nidn">NIDN</label>
                          <input type="text" class="form-control" name="nidn" id="nidn"
                              placeholder="One of three cols">
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="nama">Nama Pegawai</label>
                          <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Pegawai">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="nip_lama">NIP lama</label>
                          <input type="text" class="form-control" id="nip_lama" name="nip_lama"
                              placeholder="One of three cols">
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                              <label class="form-control-label" for="jurusan">Jurusan</label>
                              <select class="form-control" id="jurusan" name="jurusan">
                              <option>Pilih Jurusan...</option>
                                  @foreach ($jurusan as $item)
                                  <option value="{{$item->jurusan}}">{{$item->jurusan}}</option>
                                  @endforeach
                              </select>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="agama">Agama</label>
                          <input type="text" class="form-control" id="agama" name="agama"
                              placeholder="Contoh : Islam">
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="tmp_lahir">Tempat Lahir</label>
                          <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir"
                              placeholder="Contoh : Jombang">
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="tgl_lahir">Tanggal Lahir</label>
                          <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="exampleFormControlSelect1">Pangkat</label>
                          <select class="form-control" id="exampleFormControlSelect1" name="id_pangkat">
                              <option>Pilih Pangkat...</option>
                              @foreach ($pangkat as $item)
                              <option value="{{ $item->id }}">{{$item->nama_pangkat}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="exampleFormControlSelect1">Staff</label>
                          <select class="form-control" data-toggle="select" name="id_jabatan" id="exampleFormControlSelect1">
                              <option>Pilih Staff...</option>
                              @foreach ($jabatan as $item)
                              <option value="{{ $item->id }}">{{$item->staf}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="nomor_tlp">Nomor Telepon</label>
                          <input type="text" class="form-control" id="nomor_tlp" name="no_tlp"
                              placeholder="Contoh : 0865273944375">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="Jk">Jenis Kelamin</label>
                          <select class="form-control" id="Jk" name="jenis_kelamin">
                              <option>Pilih Jenis Kelamin...</option>
                              <option value="L">Laki-laki</option>
                              <option value="P">Perempuan</option>
                          </select>
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="shift">Shift</label>
                          <input type="text" class="form-control" id="shift" name="shift"
                              placeholder="Masukan shift">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="golongan_darah">Golongan Darah</label>
                          <input type="text" class="form-control" id="golongan_darah" name="gol_darah"
                              placeholder="Contoh : B+">
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="gelar_dpn">Gelar Depan</label>
                          <input type="text" class="form-control" id="gelar_dpn" name="gelar_dpn"
                              placeholder="Contoh : Prof">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="gelar_belakang">Gelar Belakang</label>
                          <input type="text" class="form-control" id="gelar_belakang" name="gelar_blk"
                              placeholder="Contoh : Amd">
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="status_kawin">Status Perkawinan</label>
                          <input type="text" class="form-control" id="status_kawin" name="status_kawin"
                              placeholder="Contoh : Belum Kawin">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                              <label class="form-control-label" for="kelurahan">Kelurahan</label>
                              <select class="form-control" id="kelurahan" name="kelurahan">
                              <option>Pilih kelurahan...</option>
                                  @foreach ($kelurahan as $item)
                                  <option value="{{$item->id_kelurahan}}">{{$item->nama}}</option>
                                  @endforeach
                              </select>
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="kecamatan">Kecamatan</label>
                          <select class="form-control" id="kecamatan" name="kecamatan">
                              <option>Pilih kecamatan...</option>
                              @foreach ($kecamatan as $item)
                              <option value="{{$item->id}}">{{$item->nama}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="kota">Kota</label>
                          <select class="form-control" id="kota" name="kabupaten">
                              <option>Pilih Kota...</option>
                              @foreach ($kota as $item)
                              <option value="{{ $item->id }}">{{$item->nama}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="provinsi">Provinsi</label>
                          <select class="form-control" id="provinsi" name="provinsi">
                              <option>Pilih Provinsi...</option>
                              @foreach ($provinsi as $item)
                              <option value="{{ $item->id }}">{{$item->nama}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="askes">Askes</label>
                          <input type="text" class="form-control" id="askes" name="askes"
                              placeholder="Masukan data Askes">
                      </div>
                  </div>
              </div>

              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="kode_dsn">Kode Dosen</label>
                          <input type="text" class="form-control" id="kode_dsn" name="kode_dosen_sk034"
                              placeholder="Masukan Kode Dosen">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="departemen">Departemen</label>
                          <input type="text" class="form-control" id="departemen" name="departemen"
                              placeholder="Masukan Departemen">
                      </div>
                  </div>

              </div>
              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="praktisi">Praktisi</label>
                          <input type="text" class="form-control" id="praktisi" name="praktisi"
                              placeholder="Masukan Praktisi">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="nama_instansi">Nama Instansi</label>
                          <input type="text" class="form-control" id="nama_instansi" name="nama_instansi"
                              placeholder="Masukan nama instansi">
                      </div>
                  </div>
              </div>
              <div class="form-row">
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="alamat_instansi">Alamat Instansi</label>
                          <input type="text" class="form-control" id="alamat_instansi" name="alamat_instansi"
                              placeholder="Masukan alamat instansi">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group col-md-6">
                          <label class="form-control-label" for="pendidikan">Pendidikan Terakhir</label>
                          <input type="text" class="form-control" id="pendidikan" name="pendidikan_terakhir"
                              placeholder="Masukan Pendidikan Terakhir">
                      </div>
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
    dt_url = '{{ route('
    data - pegawai ') }}';
    dt_opt = {
        processing: true,
        serverSide: true,
        autoWidth: false,
        "order": [
            [0, "desc"]
        ],
        columns: [{
                data: null,
                name: 'no',
                sortable: false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'nip',
                name: 'nip'
            },
            {
                data: 'noid',
                name: 'noid'
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'Aksi',
                name: 'Aksi',
                orderable: false,
                serachable: false,
                sClass: 'text-center'
            },
        ]
    };


    $(document).ready(function () {
        $('.js-example-basic-single').select2();
    });

    function add_btn() {
        $.ajax({
            url: `{{ url('/api/v1') }}/getDataStruktural`,
            method: 'GET',
            success: function (result) {
                $('#idPegawai').html('');
                $('#idPegawai').append($('<option>', {
                    text: "Pilih Pegawai",
                    selected: true,
                    disabled: true,
                }));
                $.each(result.pegawai, function (i, p) {
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
                $.each(result.jabatan, function (a, j) {
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
                url: `{{ url('/api/v1') }}/data-struktural/${id}`,
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
                url: `{{ url('/api/v1') }}/data-struktural/${id}/edit`,
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
                url: `{{ url('/api/v1') }}/data-struktural/${id}`,
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
