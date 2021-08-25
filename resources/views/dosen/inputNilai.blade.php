@extends('layouts.mainDosen')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="dosen_inputnilai">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-3">
              <h3 class="mb-0 text-center text-md-left font-weight-bold">Nilai Mahasiswa</h3>
            </div>
            <div class="col-12 col-md-9 text-center text-md-right">
              <button type="button" class="btn btn-icon btn-warning mt-3 mt-md-0">
                <span class="btn-inner--icon"><span class="iconify" data-icon="bx:bx-printer"></span></span>
                <span class="btn-inner--text">Cetak Data</span>
              </button>
              <button type="button" class="btn btn-icon btn-secondary mt-3 mt-md-0 ml-0 ml-md-3">
                <span class="btn-inner--icon"><span class="iconify" data-icon="bx:bx-share-alt"></span></span>
                <span class="btn-inner--text">Publish Nilai</span>
              </button>
              <button type="button" class="btn btn-primary mt-3 mt-md-0 ml-0 ml-md-3">
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
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
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
                <option selected>MT001</option>
                <option>MT002</option>
              </select>
            </div>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless table-hover mt-4">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center pl-2 pr-0">No</th>
                <th scope="col" class="text-center px-3">NIM</th>
                <th scope="col" class="pl-1" style="width: 15%">Nama</th>
                <th scope="col" class="text-center px-1">UTS</th>
                <th scope="col" class="text-center px-1">UAS</th>
                <th scope="col" class="text-center px-1">Tugas</th>
                <th scope="col" class="text-center px-1">Kuis</th>
                <th scope="col" class="text-center px-1">Praktek</th>
                <th scope="col" class="text-center px-1">Up</th>
                <th scope="col" class="text-center px-1">Kehadiran</th>
                <th scope="col" class="text-center px-1">Akumulasi</th>
                <th scope="col" class="text-center px-2">Keterangan</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center pl-2 pr-0">1</td>
                <td class="text-center px-3">345245345</td>
                <td class="font-weight-bold text-capitalize pl-1">Jessica Wijaya</td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uts1" value="75">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uas1">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="tugas1">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kuis1">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="praktek1">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="up1">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kehadiran1">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="akumulasi1">
                  </div>
                </td>
                <td class="text-center px-2">Keterangan</td>
              </tr>

              <tr>
                <td class="text-center pl-2 pr-0">2</td>
                <td class="text-center px-3">345245345</td>
                <td class="font-weight-bold text-capitalize pl-1">Jessica Wijaya</td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uts2" value="75">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uas2">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="tugas2">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kuis2">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="praktek2">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="up2">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kehadiran2">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="akumulasi2">
                  </div>
                </td>
                <td class="text-center px-2">Keterangan</td>
              </tr>

              <tr>
                <td class="text-center pl-2 pr-0">3</td>
                <td class="text-center px-3">345245345</td>
                <td class="font-weight-bold text-capitalize pl-1">Jessica Wijaya</td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uts3" value="75">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uas3">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="tugas3">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kuis3">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="praktek3">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="up3">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kehadiran3">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="akumulasi3">
                  </div>
                </td>
                <td class="text-center px-2">Keterangan</td>
              </tr>

              <tr>
                <td class="text-center pl-2 pr-0">4</td>
                <td class="text-center px-3">345245345</td>
                <td class="font-weight-bold text-capitalize pl-1">Jessica Wijaya</td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uts4" value="75">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uas4">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="tugas4">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kuis4">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="praktek4">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="up4">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kehadiran4">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="akumulasi4">
                  </div>
                </td>
                <td class="text-center px-2">Keterangan</td>
              </tr>

              <tr>
                <td class="text-center pl-2 pr-0">5</td>
                <td class="text-center px-3">345245345</td>
                <td class="font-weight-bold text-capitalize pl-1">Jessica Wijaya</td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uts5" value="75">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uas5">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="tugas5">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kuis5">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="praktek5">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="up5">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kehadiran5">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="akumulasi5">
                  </div>
                </td>
                <td class="text-center px-2">Keterangan</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
$(document).ready(function() {
  var id = dataGlobal['user']['nomor'];
  var semester = dataGlobal['periode']['semester'];
  var dataFilter
  getFilter(id,semester);

  $('#prodi').on('change',function (e) {
    var program_studi = $(this).val()
    var matkul = $.grep(dataFilter['matkul'], function(e){ return e.program_studi == program_studi; });
    
    $('#prodi').html('')              
    var optProdi = `<option value=""> - </option>`;
    $.each(dataFilter['matkul'],function (key,row) {
      optProdi += `<option value="${row.nomor}" data-alias="${row.alias}">${row.program_studi}</option>`
    })
    $('#prodi').append(optProdi)
  })
  $('#semester').on('change',function (e) {

  })
} );
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
              optProdi += `<option value="${row.nomor}">${row.program_studi}</option>`
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