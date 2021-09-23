@extends('layouts.mainAkademik')

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
                <h2 class="mb-0">Absensi Mahasiswa</h2>
              </div>
              <div class="col text-right">
                <button type="button" id="btn_simpan" class="btn btn-primary">
                  <i class="iconify-inline mr-1" data-icon="bx:bx-save"></i>
                  Simpan
                </button>
              </div>
            </div>
          </div>

          <div class="card-body p-0">
            <form class="form_absensiMhs">
              <div class="form-row mt-4">
                <div class="col-md-4 pr-md-4-5">
                  <label for="program-studi">Program Studi</label>
                  <input type="text" class="form-control" readonly id="prodi"  />
                </div>
                <div class="col-md-4 px-md-3 mt-3 mt-md-0">
                  <label for="mata-kuliah">Mata Kuliah</label>
                  <input type="text" class="form-control" readonly id="matakuliah"  />
                </div>
                <div class="col-md-4 pl-md-4-5 mt-3 mt-md-0">
                  <label for="kelas">Kelas</label>
                  <input type="text" class="form-control" readonly id="kelas"  />
                </div>
              </div>
            </form>

            <hr class="my-4">

            <div class="table-responsive table_absensiMhs p-0">
              <table cellspacing="0" class="table align-items-center table-flush table-borderless table-hover">
                <thead class="table-header">
                  <tr class="main_header">
                    <th rowspan="2" scope="col" class="text-center">NIM</th>
                    <th rowspan="2" scope="col" class="text-center">NAMA</th>
                    <th colspan="16" scope="col" class="text-center px-1">Pertemuan ke-</th>
                    <th rowspan="2" scope="col" class="text-center px-1">Presentase</th>
                  </tr>
                  <tr>
                    <th colspan="1" scope="col" class="text-center px-1">1</th>
                    <th colspan="1" scope="col" class="text-center px-1">2</th>
                    <th colspan="1" scope="col" class="text-center px-1">3</th>
                    <th colspan="1" scope="col" class="text-center px-1">4</th>
                    <th colspan="1" scope="col" class="text-center px-1">5</th>
                    <th colspan="1" scope="col" class="text-center px-1">6</th>
                    <th colspan="1" scope="col" class="text-center px-1">7</th>
                    <th colspan="1" scope="col" class="text-center px-1">8</th>
                    <th colspan="1" scope="col" class="text-center px-1">9</th>
                    <th colspan="1" scope="col" class="text-center px-1">10</th>
                    <th colspan="1" scope="col" class="text-center px-1">11</th>
                    <th colspan="1" scope="col" class="text-center px-1">12</th>
                    <th colspan="1" scope="col" class="text-center px-1">13</th>
                    <th colspan="1" scope="col" class="text-center px-1">14</th>
                    <th colspan="1" scope="col" class="text-center px-1">15</th>
                    <th colspan="1" scope="col" class="text-center px-1">16</th>
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
    var kuliah = "";
    var kelas = "{{$kelas}}";
    var matakuliah = "{{$matkul}}";
    var semester = dataGlobal['periode']['semester'];
    var tahun = dataGlobal['periode']['tahun'];
    var arr_mhs = [];
    $(document).ready(function() {
      getData();
      $('#btn_simpan').on('click',function (e) {
        console.log(arr_mhs)
        $.ajax({
          url: url_api+"/absensi-admin",
          type: 'post',
          dataType: 'json',
          data: {'kuliah':kuliah,'data':arr_mhs},
          beforeSend: function(text) {
              // loading func
              console.log("loading")
              // loading('show')
          },
          success: function(res) {
            console.log(res)
              if (res.status=="success") {
                location.reload()                 
              } else {
                  // alert gagal
              }
              // loading('hide')

          }
        });
      })
    })

    function chooseColor() {
      var conceptName = $(this).find(":selected").text();
      if (conceptName == '-') {
        $(this).css('backgroundColor', '#fff');
      }if (conceptName == 'H') {
        $(this).css('backgroundColor', '#34C38F');
      } else if (conceptName == 'I') {
        $(this).css('backgroundColor', '#28A3EB');
      } else if (conceptName == 'S') {
        $(this).css('backgroundColor', '#F1B44C');
      } else if (conceptName == 'A') {
        $(this).css('backgroundColor', '#F46A6A');
      }
    }
    function getData() {
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
          $('#prodi').val(info.prodi)
          $('#matakuliah').val(info.matakuliah)
          $('#kelas').val(info.kelas)
          console.log(data)
          if (res.status=="success") {
              setMahasiswa(data)
          } else {
              // alert gagal
          }
        }
      })
    }
    function setMahasiswa(data) {
        var html = '';
      $.each(data,function (key,row) {
        html +=  `<tr>
                    <td class="text-center">${row.nim}</td>
                    <td class="font-weight-bold text-capitalize">${row.nama}</td>`;
        for (let index = 1; index <= 16; index++) {
          html += `<td class="text-center px-1">
                      <select class="form-control select-absen" data-absensi="${row.absensi[index]}" data-mhs="${row.mahasiswa}" data-pertemuan="${index}">
                        <option ${(row.pertemuan[index]=="")?'selected':""} value="">-</option>
                        <option ${(row.pertemuan[index]=="H")?'selected':""} value="H">H</option>
                        <option ${(row.pertemuan[index]=="I")?'selected':""} value="I">I</option>
                        <option ${(row.pertemuan[index]=="S")?'selected':""} value="S">S</option>
                        <option ${(row.pertemuan[index]=="A")?'selected':""} value="A">A</option>
                      </select>
                    </td>`
        }
        html += `<td class="text-center px-1">${row.persentase}</td>`
        html += `</tr>`;
      })
      $('.table-body').append(html);


      $(".table_absensiMhs select").each(chooseColor);
      $('.table_absensiMhs select').change(chooseColor);
      $('.select-absen').on('change',function (e) {
        var status = $(this).val(); 
        var mahasiswa = $(this).data('mhs'); 
        var pertemuan = $(this).data('pertemuan'); 
        var absensi = $(this).data('absensi'); 

        check = "insert";
        $.each(arr_mhs, function() { 
            if(this.mahasiswa === mahasiswa && this.pertemuan===pertemuan){ 
              this.status = status;
              check = "update";
            }
        }); 
        if (check == "insert") {
          arr_mhs.push({'nomor':absensi,'mahasiswa':mahasiswa,'kuliah':kuliah,'status':status,'pertemuan':pertemuan})
        }
      })
    }
  </script>
@endsection
