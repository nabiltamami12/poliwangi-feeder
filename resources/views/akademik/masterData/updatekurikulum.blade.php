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
                                <button type="submit" class="btn btn-primary w-100 simpanData-btn ">{{ ($id==null)?"Tambah":"Ubah" }} Data</button>
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
                        <div class="col-sm-12 col-12">
                            <div class="form-group row mb-0">
                                <select class="form-control select-matkul" id="tambah_matkul">

                                </select>
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
  $(document).ready(function() {
    if (id!="") {
        getData(id);        
    }else{
        $('#status').val(0)
    }

    setMatkul();

    // form tambah data
    $("#form_cu").submit(function(e) {
        e.preventDefault();
        var data = $('#form_cu').serialize();
        var url = url_api+"/kurikulum/"+id;
        var type = "put";
        console.log(arr_matkul)
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

    $('#tambah_matkul').on('change',function (e) {
        var id_matkul = $(this).val();
        $('#tambah_matkul :selected').attr('disabled',true)
        arr_matkul['tambah'].push({'id':'','kurikulum' : id,'matakuliah' : id_matkul}); 
        var html = `
                <div class="form-row" id="row_${count}"> 
                    <div class="col-sm-12 col-12">
                        <div class="form-group row mb-0">
                            <label>Matakuliah</label>
                        </div>
                    </div>
                    <div class="col-sm-10 col-12">
                        <div class="form-group row mb-0">
                            <select class="form-control select-matkul" id="matkul_${id_matkul}">

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2 col-12">
                        <div class="form-group row mb-0">
                            <button type="button" class="btn btn-danger btn-block" onclick="fun_hapus(${count},'',${id_matkul})">Hapus</button>
                        </div>
                    </div>
                </div>`
        $('.row-matkul').append(html);
        setMatkul(id_matkul)
        console.log(arr_matkul)
        count++;
    })
} );

function setMatkul(id_matkul) {
    console.log("id "+id_matkul)
    var optMatkul = `<option value=""> - </option>`;
    $.each(dataGlobal['matakuliah'],function (key,row) {
        if (id_matkul == undefined) {
            var selected = "";
        }else{
            var selected = "selected";
        }
        optMatkul += `<option value="${row.nomor}">${row.matakuliah}</option>`
    })
    if (id_matkul == undefined) {
        $('#tambah_matkul').append(optMatkul)
    } else {
        $('#tambah_matkul [value='+id_matkul+']').attr('disabled',true)
        $('#matkul_'+id_matkul).append(optMatkul)
        $('#matkul_'+id_matkul).val(id_matkul)
    }
    $('#tambah_matkul').val('');
}

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
                        <div class="col-sm-10 col-12">
                            <div class="form-group row mb-0">
                                <select class="form-control select-matkul" data-id="${row.id}" id="matkul_${row.matakuliah}">

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 col-12">
                            <div class="form-group row mb-0">
                                <button type="button" class="btn btn-danger btn-block" onclick="fun_hapus(${count},${row.id},${row.matakuliah})">Hapus</button>
                            </div>
                        </div>
                    </div>`
                    
                    $('.row-matkul').append(html);
                    setMatkul(row.matakuliah)

                    $('#matkul_'+row.matakuliah).on('change',function (e) {
                        var id_kur_matkul = $(this).data('id');
                        var id_matkul = $(this).val();
                        arr_matkul['update'].push({'id':id_kur_matkul,'kurikulum' : id,'matakuliah' : id_matkul}); 
                        console.log(arr_matkul)
                    })
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