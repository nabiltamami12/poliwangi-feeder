@extends('layouts.mainAkademik')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0 m-0">
          <div class="row align-items-center">
            <div class="col-lg-5">
              <h3 class="mb-0 text-center text-lg-left font-weight-bold">Nilai Mahasiswa</h3>
            </div>
            <div class="col-12 col-lg-7 text-center text-md-right">
              <button type="button" id="btn_cetak" class="btn btn-icon btn-warning mt-3 mt-md-0">
                <span class="btn-inner--icon"><span class="iconify" data-icon="bx:bx-printer"></span></span>
                <span class="btn-inner--text">Cetak Data</span>
              </button>
              <button type="button" id="btn_publish" class="btn btn-icon btn-secondary mt-3 mt-md-0 ml-0 ml-md-3">
                <span class="btn-inner--icon"><span class="iconify" data-icon="bx:bx-share-alt"></span></span>
                <span class="btn-inner--text">Publish Nilai</span>
              </button>
              <button type="button" id="btn_simpan" class="btn btn-primary mt-3 mt-md-0 ml-0 ml-md-3">
                <span>Simpan</span>
              </button>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <form class="form-select ">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="program-studi">Program Studi</label>
              <select class="form-control" id="prodi">
              </select>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="jenjang">Jenjang</label>
              <select class="form-control" id="semester">
                <option value="1">Semester Gasal</option>
                <option value="2">Semester Genap</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="matakuliah">Mata Kuliah</label>
              <select class="form-control" id="matkul">
                
              </select>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="kelas">Kelas</label>
              <select class="form-control" id="kelas">
              </select>
            </div>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless table-hover mt-4">
            <thead class="table-header">
              
            </thead>

            <tbody class="table-body">
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
var dataFilter
var countData

$(document).ready(function() {
  var id = dataGlobal['user']['nomor'];
  var nama = dataGlobal['user']['nama'];
  var semester = dataGlobal['periode']['semester'];
  var tahun = dataGlobal['periode']['tahun'];
  getFilter(id,semester);

  $('#prodi').on('change',function (e) {
    var program_studi = $(this).val()
    var semester = $('#semester').val()
    getMatkul(program_studi,semester)

    $('.table-header').html('')
    $('.table-body').html('')
  })
  $('#semester').on('change',function (e) {
    var semester = $(this).val();
    var program_studi = $('#prodi').val();
    getMatkul(program_studi,semester);

    $('.table-header').html('')
    $('.table-body').html('')
  })
  $('#matkul').on('change',function (e) {
    var matakuliah = $(this).val()
    var kelas = $.grep(dataFilter['kelas'], function(e){ return e.matakuliah == matakuliah; });

    $('#kelas').html('')
    var optKelas = `<option value=""> - </option>`;
    $.each(kelas,function (key,row) {
      optKelas += `<option value="${row.nomor}">${row.kode}</option>`
    })
    $('#kelas').append(optKelas)

    $('.table-header').html('')
    $('.table-body').html('')
  })
  $('#kelas').on('change',function (e) {
    $('.table-header').html('')
    $('.table-body').html('')
    var id_kelas = $(this).val()
    var matakuliah = $('#matkul').val()
    $.ajax({
      url: url_api+"/nilai?tahun="+tahun+"&kelas="+id_kelas+"&matakuliah="+matakuliah,
      type: 'get',
      dataType: 'json',
      data: {},
      beforeSend: function(text) {
              // loading func
              console.log("loading")
              loading('show')
      },
      success: function(res) {
        var data = res.data;
        if (res.status=="success") {
            setSiswa(data)
        } else {
            // alert gagal
        }
        loading('hide')
      }
    })
  })

  $('#btn_cetak').on('click',function (e) {
    var id_kelas = $('#kelas').val()
    var matakuliah = $('#matkul').val()
    
    var arr = {
      'tahun' : tahun,
      'semester' : $('#semester').val(),
      'prodi' : $('#prodi :selected').text(),
      'kelas' : $('#kelas :selected').text(),
      'id_kelas' : id_kelas,
      'matakuliah' : $('#matkul :selected').text(),
      'id_matakuliah' : matakuliah,
      'dosen' : nama,
    }
    localStorage.setItem('cetak-eval', JSON.stringify(arr));
    window.open("{{url('akademik/kuliah/cetak-evaluasi-nilai/')}}",'_blank');
  })

  $('#btn_publish').on('click',function (e) {
    var dataSimpan = [];
    for (let index = 1; index <= countData; index++) {
      var arr = {
        'nomor' : $('#id_nilai_'+index).val(),
        'is_publisheded' : 1,
        'publisher' : id,
      }
      dataSimpan.push(arr)
    }
    console.log(dataSimpan)
    $.ajax({
      url: url_api+"/nilai/publish",
      type: 'put',
      dataType: 'json',
      data: {"data":dataSimpan},
      beforeSend: function(text) {
              // loading func
              console.log("loading")
              loading('show')
      },
      success: function(res) {
          if (res.status=="success") {
              console.log(res)
          } else {
              // alert gagal
          }
          loading('hide')
      }
    });
  })
  $('#btn_simpan').on('click',function (e) {
    var dataSimpan = [];
    for (let index = 1; index <= countData; index++) {
      var arr = {
        'nomor' : $('#id_nilai_'+index).val(),
        'kuliah' : $('#id_kuliah_'+index).val(),
        'mahasiswa' : $('#id_mahasiswa_'+index).val(),
        'quis1' : $('#uts_'+index).val(),
        'quis2' : $('#uas_'+index).val(),
        'tugas' : $('#tugas_'+index).val(),
        // 'ujian' : $('#ujian_'+index).val(),
        'na' : $('#na_'+index).val(),
        // 'her' : $('#her_'+index).val(),
        'nh' : $('#nh_'+index).val(),
        'keterangan' : $('#keterangan_'+index).val(),
        'nhu' : $('#nhu_'+index).val(),
        // 'nsp' : $('#nsp_'+index).val(),
        'kuis' : $('#kuis_'+index).val(),
        'praktikum' : $('#praktikum_'+index).val(),
      }
      dataSimpan.push(arr)
    }
    console.log(dataSimpan)
    $.ajax({
      url: url_api+"/nilai",
      type: 'post',
      dataType: 'json',
      data: {"data":dataSimpan},
      beforeSend: function(text) {
              // loading func
              console.log("loading")
              loading('show')
      },
      success: function(res) {
          if (res.status=="success") {
              console.log(res)
          } else {
              // alert gagal
          }
          loading('hide')
      }
    });
  })
} );

function setSiswa(data) {
  var html = '';
  $('.table-header').html('')
  $('.table-body').html('')
  $('.table-header').append(`<tr>
                <th scope="col" class="text-center pl-2 pr-0">No</th>
                <th scope="col" class="text-center px-3">NIM</th>
                <th scope="col" class="pl-1" style="width: 15%">Nama</th>
                <th scope="col" class="text-center px-1">UTS</th>
                <th scope="col" class="text-center px-1">UAS</th>
                <th scope="col" class="text-center px-1">Tugas</th>
                <th scope="col" class="text-center px-1">Kuis</th>
                <th scope="col" class="text-center px-1">Kehadiran</th>
                <th scope="col" class="text-center px-1">Praktikum</th>
                <th scope="col" class="text-center px-1">NA</th>
                <th scope="col" class="text-center px-1">UP</th>
                <th scope="col" class="text-center px-1">NHU</th>
                <th scope="col" class="text-center px-1">NH</th>
                <th scope="col" class="text-center px-2">Keterangan</th>
              </tr>`)
  var i = 0;
  $.each(data,function (key,row) {
    if (row.nomor==null) {
      var id_nilai = 0;
    }else{
      var id_nilai = row.nomor;
    }
    i++;
    html = `<tr>
                <td class="text-center pl-2 pr-0">${i}</td>
                <input type="hidden" id="id_mahasiswa_${i}" value="${row.id_mahasiswa}">
                <input type="hidden" id="id_kuliah_${i}" value="${row.id_kuliah}">
                <input type="hidden" id="id_nilai_${i}" value="${row.nomor}">
                <td class="text-center px-3">${row.nim}</td>
                <td class="font-weight-bold text-capitalize pl-1">${row.nama}</td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uts_${i}" value="${row.quis1}" ${(row.is_published==1)?"readonly":""}>
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uas_${i}" value="${row.quis2}" ${(row.is_published==1)?"readonly":""}>
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="tugas_${i}" value="${row.tugas}" ${(row.is_published==1)?"readonly":""}>
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kuis_${i}" value="${row.kuis}" ${(row.is_published==1)?"readonly":""}>
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kehadiran_${i}" readonly>
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="praktikum_${i}" value="${row.praktikum}" ${(row.is_published==1)?"readonly":""}>
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="na_${i}" value="${row.na}" readonly>
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="up_${i}" readonly>
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="nhu_${i}" value="${row.nhu}" readonly>
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="nh_${i}" value="${row.nh}" readonly>
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="keterangan_${i}" value="${row.keterangan}" ${(row.is_published==1)?"readonly":""}>
                  </div>
                </td>
              </tr>`
    $('.table-body').append(html)
  })
  countData = i;
}

function getMatkul(prodi,semester) {
  var matkul = $.grep(dataFilter['matakuliah'], function(e){ return e.program_studi == prodi; });
  var matkul = $.grep(matkul, function(e){ return e.semester == semester; });

  $('#matkul').html('')
  var optMatkul = `<option value=""> - </option>`;
  $.each(matkul,function (key,row) {
    optMatkul += `<option value="${row.nomor}">${row.matakuliah}</option>`
  })
  $('#matkul').append(optMatkul)
  var matakuliah = $('#matkul').val()
  var kelas = $.grep(dataFilter['kelas'], function(e){ return e.matakuliah == matakuliah; });

  $('#kelas').html('')
  var optKelas = `<option value=""> - </option>`;
  $.each(kelas,function (key,row) {
    optKelas += `<option value="${row.nomor}">${row.kode}</option>`
  })
  $('#kelas').append(optKelas)
}
async function getFilter(id,semester) {
  $.ajax({
    url: url_api+"/dosen/filter/"+id+"/"+semester,
    type: 'get',
    dataType: 'json',
    data: {},
    beforeSend: function(text) {
            // loading func
            console.log("loading")
            loading('show')
    },
    success: function(res) {
        if (res.status=="success") {
            var data = res['data'];
            dataFilter = data;
            console.log(dataFilter)
            $('#prodi').html('')              
            var optProdi = `<option value=""> - </option>`;
            $.each(data['prodi'],function (key,row) {
              optProdi += `<option value="${row.nomor}">${row.nama_program} ${row.program_studi}</option>`
            })
            $('#prodi').append(optProdi)
        } else {
            // alert gagal
        }
        loading('hide')
    }
  });
}
</script>
@endsection