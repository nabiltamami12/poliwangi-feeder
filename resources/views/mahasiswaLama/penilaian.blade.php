@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0">
          <div class="row align-items-center">
            {{-- <div class="col">
              <h3 class="mb-0">KHS (Kartu Hasil Studi)</h3>
            </div> --}}
            <div class="col-lg-5">
                <h3 class="mb-0 text-center text-lg-left font-weight-bold" id="title-page">KHS (Kartu Hasil Studi)</h3>
            </div>
            <div class="col-12 col-lg-7 text-center text-md-right">
                <a href="" class="btn btn-primary mt-3 mt-md-0 ml-0 ml-md-3">
                    <span>Cetak KHS</span>
                </a>
            </div>
          </div>
        </div>
        @php
            use App\Models\Periode;
            $periode = Periode::all();
            $periodeAktif = Periode::where('status', '=', 1)->first();
        @endphp
        <hr class="my-2 mt">
        <form class="form-select rounded-0">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="tahun">Tahun Ajaran</label>
              <select class="form-control" id="tahun" name="tahun">
                  @foreach ($periode as $item)
                    <option value="{{ $item->tahun }}" {{ $item->tahun == $periodeAktif->tahun ? 'selected' : '' }}>{{ $item->tahun }}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="status-mahasiswa">Semester</label>
              <select class="form-control" id="semester" name="semester">
                <option value="1" {{ $periodeAktif->semester % 2 !== 0 ? 'selected' : '' }}> Semester Gasal </option>
                <option value="2" {{ $periodeAktif->semester % 2 == 0 ? 'selected' : '' }}> Semester Genap </option>
              </select>
            </div>
          </div>
        </form>
        <hr class="my-4">
        <div class="table-responsive" id="render">
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  loadData()

  $('#tahun').unbind().on('change', function(){loadData()})

  $('#semester').unbind().on('change', function(){loadData()})

  function loadData(){
    var tahun = $('#tahun').val()
    var semester = $('#semester').val()
    var url = url_api+'/mahasiswa/penilaian/2149/'+ tahun +'/'+ semester +'/getNilai'
    
    $.ajax({
      url: url,
      method: 'get',
      dataType: 'json',
      success: function(data){
        if(data.data.length){
          var nomor = 1
          let mutu = 0, kredit = 0
          var render = `<table class="table align-items-center table-bordered table-hover">
                <thead class="table-header">
                  <tr>
                    <th scope="col" class="text-center px-2">No</th>
                    <th scope="col" class="text-center">Kode</th>
                    <th scope="col" class="text-center">Matakuliah</th>
                    <th scope="col" class="text-center">HM</th>
                    <th scope="col" class="text-center">AM</th>
                    <th scope="col" class="text-center">K</th>
                    <th scope="col" class="text-center">M</th>
                  </tr>
                </thead>

                <tbody class="table-body">`

          $.each(data.data, function(key, val){
            render += `
                  <tr>
                    <td class="text-center px-2">${nomor++}</td>
                    <td class="text-center">${val.kode}</td>
                    <td class="text-center">${val.matakuliah}</td>
                    <td class="text-center">${val.nhu}</td>
                    <td class="text-center">${(parseFloat(val.am) % 1 > 0) ? parseFloat(val.am) : parseInt(val.am)}</td>
                    <td class="text-center">${val.sks}</td>
                    <td class="text-center">${(parseFloat(val.am) * parseFloat(val.sks) % 1 > 0) ? parseFloat(val.am) * parseFloat(val.sks) : parseInt(parseFloat(val.am) * parseFloat(val.sks))}</td>
                  </tr>`
            
            mutu = parseFloat(mutu) + parseFloat(parseFloat(val.am) * parseFloat(val.sks))
            kredit = parseFloat(kredit) + parseFloat(val.sks)
          })
          render += `
                  </tbody>
                  <tfoot class="table-header">
                    <tr>
                        <td colspan="5" class="text-center">Jumlah</td>
                        <td class="text-center">${kredit}</td>
                        <td class="text-center">${(parseFloat(mutu) % 1 > 0) ? parseFloat(mutu) : parseInt(mutu)}</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-center">Nilai Mutu Rata-Rata (M/K)</td>
                        <td colspan="2" class="text-center">${parseFloat(mutu) / parseInt(kredit)}</td>
                    </tr>
                  </tfoot>
                </table>`
          
          $('#render').html(render)
        } else {
          $('#render').html('<h1 class="my-3 text-center">KHS Belum diijinkan untuk diakses.</h1>')
        }
      },
      error: function(xhr){
        // code
      }
    })
  }
</script>
@endsection