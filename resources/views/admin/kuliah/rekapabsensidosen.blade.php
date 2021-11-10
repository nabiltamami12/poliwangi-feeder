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
                <h2 class="mb-0">Presensi Dosen Tahun {{ $tahun }} Semester {{ ($semester %2 === 1) ? 'Gasal' : 'Genap' }}</h2>
                
                <div>Keterangan: B = Batal, H = Hadir</div>
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
            <div class="table-responsive table_absensiMhs">
              <form id="form-absensi">
                {{ csrf_field() }}
                <table class="table align-items-center table-flush table-borderless table-hover">
                  <thead class="table-header">
                    <tr class="main_header">
                      <th rowspan="2" scope="col" class="text-center">Matakuliah</th>
                      <th rowspan="2" scope="col" class="text-center">Kelas</th>
                      <th colspan="16" scope="col" class="text-center px-1">Pertemuan ke-</th>
                      <th rowspan="2" scope="col" class="text-center px-1">Presentase</th>
                    </tr>
                    <tr>
                      <th scope="col" class="text-center px-1">1</th>
                      <th scope="col" class="text-center px-1">2</th>
                      <th scope="col" class="text-center px-1">3</th>
                      <th scope="col" class="text-center px-1">4</th>
                      <th scope="col" class="text-center px-1">5</th>
                      <th scope="col" class="text-center px-1">6</th>
                      <th scope="col" class="text-center px-1">7</th>
                      <th scope="col" class="text-center px-1">8</th>
                      <th scope="col" class="text-center px-1">9</th>
                      <th scope="col" class="text-center px-1">10</th>
                      <th scope="col" class="text-center px-1">11</th>
                      <th scope="col" class="text-center px-1">12</th>
                      <th scope="col" class="text-center px-1">13</th>
                      <th scope="col" class="text-center px-1">14</th>
                      <th scope="col" class="text-center px-1">15</th>
                      <th scope="col" class="text-center px-1">16</th>
                    </tr>
                  </thead>

                  <tbody class="table-body">
                     
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('js')
  <script>
    var semester = '{{ $semester }}';
    var tahun = '{{ $tahun }}';
    var arr_data = [];
    $(document).ready(function() {
      getData();
      $('#btn_simpan').on('click',function (e) {
        const dosen = '{{ $dosen }}';
        const tahun = '{{ $tahun }}';
        $.ajax({
          url: url_api+"/absensi-dosen/simpan",
          type: 'post',
          dataType: 'json',
          data: {dosen, tahun, arr_data},
          success: function(res) {
            console.log(res)
            if (res.status=="success") {
              window.location.href = "{{url('/admin/kuliah/absensi/dosen')}}";             
            } else {

            }
          }
        });
      })
    })

    function chooseColor() {
      let conceptName = $(this).find(":selected").text();
      if (conceptName === '-') {
        $(this).css('background-color', '#FFF');
        $(this).css('color', '#ADB5BD');
        $(this).css('background-image', 'url("https://api.iconify.design/bx/bx-chevron-down.svg?color=%23ADB5BD")');
        $(this).css('border', '1px solid #ADB5BD');
      } else if (conceptName === 'H') {
        $(this).css('background-color', '#34C38F');
      } else if (conceptName === 'B') {
        $(this).css('background-color', '#F46A6A');
      }

    }
    function getData() {
      $.ajax({
        url: `{{url('/api/v1')}}/absensi-dosen/rekap-presensi/{{ $dosen }}?tahun=${tahun}&semester=${semester}`,
        type: 'get',
        dataType: 'json',
        data: {},
        success: function(res) {
          if (res.status=="success") {
            setMahasiswa(res.data)
          } else {
            // alert gagal
          }
        }
      })
    }
    function setMahasiswa(data) {
        var html = '';
      $.each(data,function (key,row) {
        let kehadiran = 0;
        html +=  `<tr>
                    <td class="text-center">${row.matakuliah}</td>
                    <td class="font-weight-bold text-capitalize">${row.kelas}</td>`;
        for (let idx = 1; idx <= 16; idx++) {
          const pertemuan = row.detail[idx] ? row.detail[idx].pertemuan : '';
          const nomor = row.detail[idx] ? row.detail[idx].nomor : '';
          kehadiran += (['hadir', 'mengajar'].includes(pertemuan)) ? 1 : 0;
          html += `<td class="text-center px-1">
                      <select class="form-control select-absen absen-idx-${row.kuliah}" data-kuliah="${row.kuliah}" data-p="${nomor}" data-pertemuan="${idx}">
                        <option value="">-</option>
                        <option ${(['hadir', 'mengajar'].includes(pertemuan))?'selected':""} value="hadir">H</option>
                        <option ${(['batal'].includes(pertemuan))?'selected':""} value="batal">B</option>
                      </select>
                    </td>`;
        }
        const persen = (kehadiran*100)/16;
        html += `<td class="text-center px-1" id="persen-${row.kuliah}">${persen} %</td>`;
        html += `</tr>`;
      })
      $('.table-body').html(html);


      $(".table_absensiMhs select").each(chooseColor);
      $('.table_absensiMhs select').change(chooseColor);

      function checkWidth() {
        let elemWidth = $('.table_absensiMhs tr td:first-child').outerWidth();
        $('.table_absensiMhs tr td:nth-child(2),.table_absensiMhs .main_header th:nth-child(2)').css("left", elemWidth + 'px');
      }

      let resizeObserver = new ResizeObserver(checkWidth);
      resizeObserver.observe($(".main-content")[0]);

      $(window).on('resize', checkWidth);

      $('.select-absen').on('change',function (e) {
        const status = $(this).val(); 
        const nomor = $(this).data('p');
        const kuliah = $(this).data('kuliah');
        const pertemuan = $(this).data('pertemuan');
        const idx = arr_data.findIndex(e => e.nomor === nomor && e.kuliah === kuliah && e.pertemuan === pertemuan);
        if (idx < 0 ) {
          arr_data.push({nomor,kuliah,status,pertemuan});
        } else {
          arr_data[idx].status = status;
        }
        set_persen(kuliah);
      })
    }

    function set_persen(idx){
      let kehadiran = 0;
      $(`.absen-idx-${idx}`).each(function(key, row){
        if (['hadir', 'mengajar'].includes( row.value )) {
          kehadiran += 1;
        }
      });
      kehadiran = ( kehadiran * 100 ) / 16;
      $(`#persen-${idx}`).html(`${kehadiran} %`);
    }
  </script>
@endsection
