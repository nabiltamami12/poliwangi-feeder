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
        @endphp
        <hr class="my-2 mt">
        <form class="form-select rounded-0">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="tahun">Tahun Ajaran</label>
              <select class="form-control" id="tahun" name="tahun">
                  @foreach ($periode as $item)
                    <option value="{{ $item->tahun }}">{{ $item->tahun }}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="status-mahasiswa">Semester</label>
              <select class="form-control" id="semester" name="semester">
                <option value="1"> Semester Gasal </option>
                <option value="2"> Semester Genap </option>
              </select>
            </div>
          </div>
        </form>
        <hr class="my-4">
        <div class="table-responsive">
          <table class="table align-items-center table-bordered table-hover">
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

            <tbody class="table-body">
              <tr>
                <td class="text-center px-2">1</td>
                <td class="text-center">123</td>
                <td class="text-center">BSD</td>
                <td class="text-center">A</td>
                <td class="text-center">4</td>
                <td class="text-center">2</td>
                <td class="text-center">8</td>
              </tr>
            </tbody>
            <tfoot class="table-header">
                <tr>
                    <td colspan="5" class="text-center">Jumlah</td>
                    <td class="text-center">30</td>
                    <td class="text-center">79</td>
                </tr>
                <tr>
                    <td colspan="5" class="text-center">Nilai Mutu Rata-Rata (M/K)</td>
                    <td colspan="2" class="text-center">3.95</td>
                </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection