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
              <h2 class="mb-0">DATA RANGE NILAI</h2>
            </div>
            <div class="col text-right">
              <button type="button" onclick="func_simpan()" class="btn btn-warning"></i>Simpan</button>
            </div>
          </div>
        </div>

        <hr class="my-4">
        <input type="hidden" id="nomor" name="nomor">
        <div class="form-row">
            <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                    <label>Tanggal Awal</label>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                    <label>Tanggal Akhir</label>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                    <div class="d-flex w-100 align-items-center date_picker">
                        <input id="tanggal_awal" type="text" class="form-control date-input" name="tanggal_awal" />
                        <label class="input-group-btn" for="txtDate2">
                        <span class="date_button">
                            <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                        </span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="form-group row mb-0">
                    <div class="d-flex w-100 align-items-center date_picker">
                        <input id="tanggal_akhir" type="text" class="form-control date-input" name="tanggal_akhir" />
                        <label class="input-group-btn" for="txtDate2">
                        <span class="date_button">
                            <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                        </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div id="list_nilai">
            
        </div>
        <hr class="my-4">

        <button type="button" onclick="func_tambah()" class="btn btn-primary w-100 simpanData-btn ">Tambah Nilai</button>
      </div>
    </div>
  </div>
</section>
<script>
var count = 0;
var last_versi;
$(document).ready(function() {
    getData();        
    
} );

function func_simpan() {
    var versi = Number(last_versi)+1;
    console.log(versi)
    var arr_range=[];
    for (let index = 0; index < count; index++) {
        var arr = {
            'tanggal_awal' : $('#tanggal_awal').val(),
            'tanggal_akhir' : $('#tanggal_akhir').val(),
            'nh' : $('#nh_'+index).val(),
            'na' : $('#na_'+index).val(),
            'na_atas' : $('#na_atas_'+index).val(),
            'akumulasi' : $('#akumulasi_'+index).val(),
            'versi' : versi,
        }
        if($('#nh_'+index).val()!=undefined){
            arr_range.push(arr);
        }
    }
    var url = url_api+"/rangenilai";
    var type = "post";
    $.ajax({
        url: url,
        type: type,
        dataType: 'json',
        data: {data:arr_range},
        success: function(res) {
            console.log(res)
            if (res.status=="success") {
                window.location.href = "{{url('/admin/master/datarangenilai')}}";                    
                
            } else {
                // alert gagal
            }
            
        }
    });
}

function func_tambah() {
    var html = `
            <div class="form-row" id="row_${count}">
                <div class="6 col-12">
                    <div class="form-group row mb-0">
                        <label>Nilai Huruf</label>
                    </div>
                </div>
                <div class="6ol-sm-3 col-12">
                    <div class="form-group row mb-0">
                        <label>Nilai Bawah</label>
                    </div>
                </div>
                <div class="col-sm-3 col-12">
                    <div class="form-group row mb-0">
                        <label>Nilai Atas</label>
                    </div>
                </div>
                <div class="col-sm-2 col-12">
                    <div class="form-group row mb-0">
                        <label>Akumulasi</label>
                    </div>
                </div>
                <div class="col-sm-2 col-12">
                    <div class="form-group row mb-0">
                        <label></label>
                    </div>
                </div>
                <div class="col-sm-2 col-12">
                    <div class="form-group row mb-0">
                        <input type="text" class="form-control" id="nh_${count}" name="nh" placeholder="A">
                    </div>
                </div>
                <div class="col-sm-3 col-12">
                    <div class="form-group row mb-0">
                        <input type="text" class="form-control" id="na_${count}" name="na" placeholder="0">
                    </div>
                </div>
                <div class="col-sm-3 col-12">
                    <div class="form-group row mb-0">
                        <input type="text" class="form-control" id="na_atas_${count}" name="na_atas" placeholder="0">
                    </div>
                </div>
                <div class="col-sm-2 col-12">
                    <div class="form-group row mb-0">
                        <input type="text" class="form-control" id="akumulasi_${count}" name="akumulasi" placeholder="0.0">
                    </div>
                </div>

                <div class="col-sm-2 col-12">
                    <div class="form-group row mb-0">
                        <input type="button" class="btn btn-danger" onclick="func_hapus(${count})" value="Hapus">
                    </div>
                </div>
            </div>`;
    $('#list_nilai').append(html)
    count++;
}

function func_hapus(index) {
    $('#row_'+index).remove();
}

function getData(id) {
    $.ajax({
        url: url_api+"/rangenilai",
        type: 'get',
        dataType: 'json',
        data: {},
        success: function(res) {
            console.log(res)
            if (res.status=="success") {
                $.each(res.data,function (key,row) {
                    $('#tanggal_awal').val(formatTanggal(row.tanggal_awal))
                    $('#tanggal_akhir').val(formatTanggal(row.tanggal_akhir))
                    last_versi = row.versi;
                    var html = `
                            <div class="form-row" id="row_${count}">
                                <div class="col-sm-2 col-12">
                                    <div class="form-group row mb-0">
                                        <label>Nilai Huruf</label>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-12">
                                    <div class="form-group row mb-0">
                                        <label>Nilai Bawah</label>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-12">
                                    <div class="form-group row mb-0">
                                        <label>Nilai Atas</label>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-12">
                                    <div class="form-group row mb-0">
                                        <label>Akumulasi</label>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-12">
                                    <div class="form-group row mb-0">
                                        <label></label>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-12">
                                    <div class="form-group row mb-0">
                                        <input type="text" class="form-control" id="nh_${count}" name="nh" value="${row.nh}">
                                    </div>
                                </div>
                                <div class="col-sm-3 col-12">
                                    <div class="form-group row mb-0">
                                        <input type="text" class="form-control" id="na_${count}" name="na" value="${row.na}">
                                    </div>
                                </div>
                                <div class="col-sm-3 col-12">
                                    <div class="form-group row mb-0">
                                        <input type="text" class="form-control" id="na_atas_${count}" name="na_atas" value="${row.na_atas}">
                                    </div>
                                </div>
                                <div class="col-sm-2 col-12">
                                    <div class="form-group row mb-0">
                                        <input type="text" class="form-control" id="akumulasi_${count}" name="akumulasi" value="${row.akumulasi}">
                                    </div>
                                </div>

                                <div class="col-sm-2 col-12">
                                    <div class="form-group row mb-0">
                                        <input type="button" class="btn btn-danger" onclick="func_hapus(${count})" value="Hapus">
                                    </div>
                                </div>
                            </div>`;
                    $('#list_nilai').append(html)
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