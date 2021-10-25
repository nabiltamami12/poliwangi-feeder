@extends('layouts.main')

@section('content')
  <!-- Header -->
  <header class="header"></header>

  <!-- Page content -->
  <section class="page-content container-fluid">
    <div class="row">
      <div class="col-xl-12">
        <div class="card shadow padding--big">
          <div class="card-header p-0">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="mb-0">Presensi Mahasiswa</h2>
              </div>
              <div class="col text-right">
               
              </div>
            </div>
          </div>

          <div class="card-body p-0">
            <form class="">
              <div class="row mt-4">
                <div class="col-md-4">
                  <label for="program-studi">Program Studi</label>
                  <select class="form-control" name="prodi" id="prodi"></select>
                  <!-- <input type="text" class="form-control" readonly id="prodi"  /> -->
                </div>
                <div class="col-md-4">
                  <label for="kelas">Kelas</label>
                  <select class="form-control" name="kelas" id="kelas"></select>
                  <!-- <input type="text" class="form-control" readonly id="kelas"  /> -->
                </div>
                <div class="col-md-4">
                  <label for="mata-kuliah">Mata Kuliah</label>
                  <select class="form-control" name="matkul" id="matkul"></select>
                  <!-- <input type="text" class="form-control" readonly id="matakuliah"  /> -->
                </div>
              </div>
            </form>

            <hr class="my-4">

            <div class="table-responsive table_absensiMhs">
              <table class="table align-items-center table-flush table-borderless table-hover">
                <thead class="table-header">
                  <tr class="main_header">
                    <th rowspan="2" scope="col" class="text-center">NIM</th>
                    <th rowspan="2" scope="col" class="text-center">NAMA</th>
                    <th colspan="16" scope="col" class="text-center px-1">Pertemuan ke-</th>
                    <th rowspan="2" scope="col" class="text-center px-1">Presentase</th>
                  </tr>
                  <tr>
                    <th scope="col" class="text-center px-1"">1</th>
                    <th scope="col" class="text-center px-1"">2</th>
                    <th scope="col" class="text-center px-1"">3</th>
                    <th scope="col" class="text-center px-1"">4</th>
                    <th scope="col" class="text-center px-1"">5</th>
                    <th scope="col" class="text-center px-1"">6</th>
                    <th scope="col" class="text-center px-1"">7</th>
                    <th scope="col" class="text-center px-1"">8</th>
                    <th scope="col" class="text-center px-1"">9</th>
                    <th scope="col" class="text-center px-1"">10</th>
                    <th scope="col" class="text-center px-1"">11</th>
                    <th scope="col" class="text-center px-1"">12</th>
                    <th scope="col" class="text-center px-1"">13</th>
                    <th scope="col" class="text-center px-1"">14</th>
                    <th scope="col" class="text-center px-1"">15</th>
                    <th scope="col" class="text-center px-1"">16</th>
                  </tr>
                </thead>

                <tbody class="table-body">
                   
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('js')
  <script>
  	var dataFilter, countData, id_dosen, range;
    var kuliah = "";
    // var kelas = "909";
    // var matakuliah = "6462";
    var semester = dataGlobal['periode']['semester'];
    var tahun = dataGlobal['periode']['tahun'];
    var arr_mhs = [];
	var id_dosen = dataGlobal['user']['nomor'];
	var nama = dataGlobal['user']['nama'];

    $(document).ready(function() {
        getFilter(id_dosen)
    //   getData();
        $('select').on('change',function (e) {
            $('.table-body').html('')
        })
        $('#prodi').on('change',function (e) {
			var program_studi = $(this).val()
			var semester = 1
			getKelas(program_studi,semester)

			return true;
		})
        $('#matkul').on('change',function (e) {
			$('.table-body').html('')
			var kelas = $('#kelas').val()
			var matakuliah = $('#matkul').val()

			$.ajax({
                url: `{{url('/api/v1')}}/absensi/rekap-kelas-mahasiswa?kelas=${kelas}&tahun=${tahun}&semester=${semester}&matakuliah=${matakuliah}`,
                type: 'get',
                dataType: 'json',
                data: {},
                beforeSend: function(text) {
                        // loading func
                },
                success: function(res) {
                    var data = res.data.data;
                    var info = res.data.info;
                    kuliah = info.kuliah
                    if (res.status=="success") {
                        setMahasiswa(data)
                    } else {
                        // alert gagal
                    }
                }
            })
		})

        $('#btn_simpan').on('click',function (e) {
            console.log(arr_mhs)
            $.ajax({
            url: url_api+"/absensi-admin",
            type: 'post',
            dataType: 'json',
            data: {'kuliah':kuliah,'data':arr_mhs},
            success: function(res) {
                console.log(res)
                if (res.status=="success") {
                    window.location.href = "{{url('/admin/kuliah/absensi/rekap')}}";             
                } else {
                    // alert gagal
                }
                

            }
            });
        })
    })

    async function getFilter(id_dosen) {
        var semester = 1
        $.ajax({
            url: url_api+"/dosen/filter/"+id_dosen+"/"+semester,
            type: 'get',
            dataType: 'json',
            data: {},
            success: function(res) {
                if (res.status=="success") {
                    var data = res['data'];
                    dataFilter = data;
                    $('#prodi').html('')              
                    var optProdi = `<option value=""> - </option>`;
                    $.each(data['prodi'],function (key,row) {
                        optProdi += `<option value="${row.nomor}">${row.nama_program} ${row.program_studi}</option>`
                    })
                    $('#prodi').append(optProdi)
                } else {
						// alert gagal
                }
                return true;
            }
        });
    }

    function getKelas(prodi,semester) {
        var kelas = $.grep(dataFilter['kelas'], function(e){ return e.program_studi == prodi; });
        $('#kelas').html('')
        var optKelas = `<option value=""> - </option>`;
        $.each(kelas,function (key,row) {
            optKelas += `<option value="${row.nomor}">${row.kode}</option>`;
        });
        $('#kelas').append(optKelas);
        $('#matkul').html('')
        return true;
    }

    $('#kelas').on('change',function (e) {
        var kelas = $(this).val()
        var kelas = $.grep(dataFilter['matakuliah'], function(e){ return e.kelas == kelas; });

        $('#matkul').html('')
        var optMatkul = `<option value=""> - </option>`;
        $.each(kelas,function (key,row) {
            optMatkul += `<option value="${row.nomor}">${row.matakuliah}</option>`
        })
        $('#matkul').append(optMatkul)
    })

    function setMahasiswa(data) {
        var html = '';
        $.each(data,function (key,row) {
            html +=  `<tr>
                        <td class="text-center">${row.nim}</td>
                        <td class="font-weight-bold text-capitalize">${row.nama}</td>`;
            for (let index = 1; index <= 16; index++) {
                html += `<td class="text-center px-1">`;
                if (row.pertemuan[index]=="") {  
                    html += `<input type="text" readonly class="form-control" style="width:30px;height:30px;background-color:#FFF;color:#000" value="-" />`
                } else if (row.pertemuan[index]=="H") {
                    html += `<input type="text" readonly class="form-control" style="width:30px;height:30px;background-color:#34C38F;color:#FFF" value="H" />`
                } else if (row.pertemuan[index]=="I") {
                    html += `<input type="text" readonly class="form-control" style="width:30px;height:30px;background-color:#28A3EB;color:#FFF" value="I" />`
                } else if (row.pertemuan[index]=="S") {
                    html += `<input type="text" readonly class="form-control" style="width:30px;height:30px;background-color:#F1B44C;color:#FFF" value="S" />`
                } else if (row.pertemuan[index]=="A") {
                    html += `<input type="text" readonly class="form-control" style="width:30px;height:30px;background-color:#F46A6A;color:#FFF" value="A" />`
                } 
                html += `</td>`
            }
            html += `<td class="text-center px-1">${row.persentase}</td>`
            html += `</tr>`;
        })
        $('.table-body').append(html);

        function checkWidth() {
            let elemWidth = $('.table_absensiMhs tr td:first-child').outerWidth();
            console.log(elemWidth);
            $('.table_absensiMhs tr td:nth-child(2),.table_absensiMhs .main_header th:nth-child(2)').css("left",
            elemWidth + 'px');
        }

        let resizeObserver = new ResizeObserver(checkWidth);
        resizeObserver.observe($(".main-content")[0]);

        $(window).on('resize', checkWidth);
    }
  </script>
@endsection
