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
                        <h2 class="mb-0">{{ ($id==null)?"TAMBAH":"UBAH" }} DATA KURIKULUM KULIAH</h2>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <form id="form_cu">
                    <input type="hidden" id="id" name="id">
                    <div class="form-row">
                        <div class="col-sm-12 col-12">
                          <div class="form-group row mb-0">
                            <label>Nama Kurikulum</label>
                            <input type="text" class="form-control" id="kurikulum" name="kurikulum">
                          </div>
                          <div class="form-group row mb-0">
                            <label>Pilih Prodi / Jurusan</label>
                            <select name="prodi_id" id="prodi_id" class="form-control">
                                @foreach($prodi as $prodi)
                                    <option value="{{ $prodi->nomor }}">{{ ucwords($prodi->program_studi) }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group row mb-0">
                            <label>Pilih Tahun Ajaran</label>
                            <select name="periode_id" id="periode_id" class="form-control">
                                @foreach($periode as $periode)
                                    <option value="{{ $periode->nomor }}">{{ ucwords($periode->tahun) }} - Semester {{ $periode->semester }}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group row mb-0">
                            <label>Jumlah SKS Total</label>
                            <input type="number" value="0" class="form-control" id="jumlah_sks" name="jumlah_sks" readonly>
                          </div>
                          <div class="form-group row mb-0">
                            <div class="col-md-6 col-sm-6 col-12 mb-2 p-0 pr-2">
                                <label>Jumlah SKS Wajib</label>
                                <input type="number" value="0" class="form-control" id="sks_wajib" name="sks_wajib" min="0" required>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12 mb-2 p-0 pl-2">
                                <label>Jumlah SKS Pilihan</label>
                                <input type="number" value="0" class="form-control" id="sks_pilihan" name="sks_pilihan" min="0" required>
                            </div>
                          </div>
                          <div class="form-group row mb-0">
                            <label>Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="3" class="form-control"></textarea>
                          </div>
                          <div class="form-group row mb-0">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="1">Tidak Aktif</option>
                            </select>
                          </div>
                        </div>

                      </div>
                      <hr class="my-4">

                      <button type="submit" class="btn btn-primary w-100 simpanData-btn ">{{ ($id==null)?"Tambah":"Ubah" }}
                        Data</button>
                </form>
                {{-- <hr class="my-4">
                <div class="col-sm-12 col-12">
                    <div class="form-row row-matkul-tambah">
                        <div class="col-sm-12 col-12">
                            <div class="form-group row mb-0">
                                <label>Tambah Matakuliah</label>
                            </div>
                        </div>
                        <div class="col-sm-5 col-12">
                            <div class="form-group row mb-0">
                                <select class="form-control select-matkul" id="tambah_matkul">

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <input type="text" readonly id="tambah_prodi" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-1 col-12">
                            <div class="form-group row mb-0">
                                <input type="text" readonly id="tambah_sks" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-1 col-12">
                            <div class="form-group row mb-0">
                                <select class="form-control" id="tambah_semester">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1 col-12">
                            <div class="form-group row mb-0">
                                <button class="btn btn-success" id="btn_tambah">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-12 row-matkul">

                </div> --}}
            </div>
        </div>
    </div>
</section>
<script>
    var id = "{{$id}}";
    var arr_matkul={'tambah':[],'update':[],'hapus':[]};
    var count = 0;
    var data_matkul = [{id:'',text:'Pilih matakuliah'}];
    dataGlobal['matakuliah'].forEach(element => {
        data_matkul.push({
            id:element.nomor,
            text: element.kode+" : "+element.matakuliah,
            prodi: element.program_studi,
        })
    })
  $(document).ready(function() {
    if (id!="") {
        getData(id);
    }else{
        $('#status').val(0)
    }

    $("#tambah_matkul").select2({
        ajax: {
            url: '{{ url('api/v1/matakuliah/select-option') }}',
            dataType: 'json',
            delay: 1000,
            data: function (params) {
                return {
                    q: params.term,
                    page: params.page
                };
            },
            processResults: function ({data}, params) {
                params.page = params.page || 1;

                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 15) < data.total_count
                    }
                };
            },
            cache: true
        },
        placeholder: 'Cari Matakuliah'
    })
    $("#tambah_matkul").on('select2:select', function (e) {
        var prodi_selected = e.params.data.program_studi
        var sks = e.params.data.sks
        var prodi = $.grep(dataGlobal['prodi'], function(e){ return e.nomor == prodi_selected; });
        $('#tambah_prodi').val(prodi[0].nama_program+" "+prodi[0].program_studi)
        $('#tambah_sks').val(sks)
    });

    // setMatkul();

    // form tambah data
    $("#form_cu").submit(function(e) {
        e.preventDefault();
        var data = $('#form_cu').serialize();
        var url = url_api+"/kurikulum/"+id;
        var type = "put";

        $.ajax({
            url: url,
            type: type,
            dataType: 'json',
            data: data,
            success: function(res) {
                if (res.status=="success") {
                    window.location.href = "{{url('/admin/master/datakurikulum')}}";
                } else {
                    // alert gagal
                }

            }
        });
    });

    $('#btn_tambah').on('click',function (e) {
        var id_matkul = $("#tambah_matkul").val();
        var matkul = $('#tambah_matkul')[0]['innerText'];
        var prodi = $('#tambah_prodi').val()
        var sks = $('#tambah_sks').val()
        var semester = $('#tambah_semester').val()

        arr_matkul['tambah'].push({'id':'','kurikulum' : id,'matakuliah' : id_matkul,'semester': semester});
        var html = `
        <div class="form-row" id="row_${count}">
                        <div class="col-sm-12 col-12">
                            <div class="form-group row mb-0">
                                <label>Matakuliah</label>
                            </div>
                        </div>
                        <div class="col-sm-5 col-12">
                            <div class="form-group row mb-0">
                                <input type="text" readonly class="form-control select-matkul" id="matkul_${id_matkul}" value="${matkul}">
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <input type="text" readonly class="form-control select-matkul" id="matkul_${id_matkul}" value="${prodi}">
                            </div>
                        </div>
                        <div class="col-sm-1 col-12">
                            <div class="form-group row mb-0">
                                <input type="text" readonly class="form-control select-matkul" id="matkul_${id_matkul}" value="${sks}">
                            </div>
                        </div>
                        <div class="col-sm-1 col-12">
                            <div class="form-group row mb-0">
                                <input type="text" readonly class="form-control select-matkul" id="matkul_${id_matkul}" value="${semester}">
                            </div>
                        </div>
                        <div class="col-sm-1 col-12">
                            <div class="form-group row mb-0">
                                <button type="button" class="btn btn-danger btn-block" onclick="fun_hapus(${count},'',${id_matkul})"><span class="iconify delete-icon" style="color:#fff" data-icon="bx:bx-trash"></span></button>
                            </div>
                        </div>
                    </div>`
        $('.row-matkul').append(html);

        count++;
        $("#tambah_matkul").empty();
        $("#tambah_prodi").val('');
        $("#tambah_semester").val(1);

    })
} );


function fun_hapus(index,id_kur_matkul,id_matkul) {
    if (id_kur_matkul=='') {
        $.each(arr_matkul['tambah'],function (key,row) {
            console.log(row)
            if (row.matakuliah==id_matkul) {
                arr_matkul['tambah'].splice(key, 1);
                return false;
            }
        })
    } else {
        arr_matkul['hapus'].push({'id':id_kur_matkul,'kurikulum' : id,'matakuliah' : id_matkul});
    }
    $('#row_'+index).remove()
    $('#tambah_matkul [value='+id_matkul+']').attr('disabled',false);
    console.log(arr_matkul)
}

function getData(id) {
    $.ajax({
        url: url_api+"/kurikulum/"+id,
        type: 'get',
        dataType: 'json',
        data: {},
        success: function(res) {
            var data = res['data']
            if (res.status=="success") {
                var data_kurikulum = data['kurikulum'][0];
                $.each(data_kurikulum,function (key,row) {
                    $('#'+key).val(row);
                })

                $('#sks_wajib').keyup(function(){
                    var jumlahWajib = $(this).val(),
                        jumlahPilihan = $('#sks_pilihan').val(),
                        totalSks = parseInt(jumlahWajib) + parseInt(jumlahPilihan)

                    $('#jumlah_sks').val(totalSks)
                })

                $('#sks_wajib').click(function(){
                    var jumlahWajib = $(this).val(),
                        jumlahPilihan = $('#sks_pilihan').val(),
                        totalSks = parseInt(jumlahWajib) + parseInt(jumlahPilihan)

                    $('#jumlah_sks').val(totalSks)
                })

                $('#sks_pilihan').keyup(function(){
                    var jumlahWajib = $('#sks_wajib').val(),
                        jumlahPilihan = $(this).val(),
                        totalSks = parseInt(jumlahWajib) + parseInt(jumlahPilihan)

                    $('#jumlah_sks').val(totalSks)
                })

                $('#sks_pilihan').click(function(){
                    var jumlahWajib = $('#sks_wajib').val(),
                        jumlahPilihan = $(this).val(),
                        totalSks = parseInt(jumlahWajib) + parseInt(jumlahPilihan)

                    $('#jumlah_sks').val(totalSks)
                })

                var data_matkul = data['kurikulum_matkul'];
                $.each(data_matkul,function (key,row) {
                    html = `
                    <div class="form-row" id="row_${count}">
                        <div class="col-sm-12 col-12">
                            <div class="form-group row mb-0">
                                <label>Matakuliah</label>
                            </div>
                        </div>
                        <div class="col-sm-5 col-12">
                            <div class="form-group row mb-0">
                                <input type="text" readonly class="form-control select-matkul" data-id="${row.id}" id="matkul_${row.matakuliah}" value="${row.kode} : ${row.nama_matkul}">
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group row mb-0">
                                <input type="text" readonly class="form-control select-matkul" data-id="${row.id}" id="matkul_${row.matakuliah}" value="${row.prodi}">
                            </div>
                        </div>
                        <div class="col-sm-1 col-12">
                            <div class="form-group row mb-0">
                                <input type="text" readonly class="form-control select-matkul" data-id="${row.id}" id="matkul_${row.matakuliah}" value="${row.sks}">
                            </div>
                        </div>
                        <div class="col-sm-1 col-12">
                            <div class="form-group row mb-0">
                                <input type="text" readonly class="form-control select-matkul" data-id="${row.id}" id="matkul_${row.matakuliah}" value="${row.semester}">
                            </div>
                        </div>
                        <div class="col-sm-1 col-12">
                            <div class="form-group row mb-0">
                                <button type="button" class="btn btn-danger btn-block" onclick="fun_hapus(${count},${row.id},${row.matakuliah})"><span class="iconify delete-icon" style="color:#fff" data-icon="bx:bx-trash"></span></button>
                            </div>
                        </div>
                    </div>`

                    $('.row-matkul').append(html);

                    count++;
                })
            } else {
                // alert gagal
            }

        }
    });
}
</script>
@endsection
