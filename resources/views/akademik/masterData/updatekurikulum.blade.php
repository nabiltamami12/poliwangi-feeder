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
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label>Kurikulum</label>
                                <input type="text" class="form-control" id="kurikulum" name="kurikulum">
                                <input type="hidden" id="status" name="status">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group row mb-0">
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-primary w-100 simpanData-btn ">Simpan Data</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr class="my-4">
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
                        
                </div>
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
            data: {
                'kurikulum':$('#kurikulum').val(),
                'matkul':arr_matkul
            },
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