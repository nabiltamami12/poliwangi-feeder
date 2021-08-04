@extends('layouts.mainMala')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="absensi_harian">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header border-0 padding--big">
          <div class="row align-items-center">
            <div class="col-12 col-md-3">
              <label class="sr-only" for="selectDate">Date</label>
              <select id="selectDate" class="custom-select">
                <option>24</option>
                <option>25</option>
                <option>26</option>
              </select>
            </div>

            <div class="col-12 col-md-3 mt-md-0 mt-2">
              <label class="sr-only" for="selectMonth">Month</label>
              <select id="selectMonth" class="custom-select">
                <option>Juli</option>
                <option>Agustus</option>
                <option>September</option>
              </select>
            </div>

            <div class="col-12 col-md-6 mt-md-0 mt-2">
              <label class="sr-only" for="selectPeriod">Period</label>
              <select id="selectPeriod" class="custom-select">
                <option>2020, Semester Ganjil</option>
                <option>2020, Semester Genap</option>
                <option>2021 Semester Ganjil</option>
              </select>
            </div>
          </div>
        </div>
        <hr>
        <div class="table-responsive padding--big">
          <table class="table align-items-center table-borderless table-flush table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="border-0">Tanggal</th>
                <th scope="col" class="border-0">Kode</th>
                <th scope="col" class="border-0">Mata Kuliah</th>
                <th scope="col" class="border-0 text-center">Kelas</th>
                <th scope="col" class="border-0 text-center">Jam Absensi</th>
                <th scope="col" class="border-0 text-center">Batas Absensi</th>
                <th scope="col" class="border-0 text-center">Status</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td>
                  02/07/2021
                </td>
                <td>
                  P001
                </td>
                <td class="font--bold">
                  Matematika Dasar
                </td>
                <td class="text-center">
                  MT001
                </td>
                <td class="text-center">
                  11.32
                </td>
                <td class="text-center">
                  12.00
                </td>
                <td class="text-center">
                  <img src="{{ url('images') }}/status-pending.png" class="status status-pending" alt="">
                </td>
              </tr>

              <tr>
                <td>
                  02/07/2021
                </td>
                <td>
                  P001
                </td>
                <td class="font--bold">
                  Bahasa Inggris
                </td>
                <td class="text-center">
                  Lang002
                </td>
                <td class="text-center">
                  13.33
                </td>
                <td class="text-center">
                  14.00
                </td>
                <td class="text-center">
                  <img src="{{ url('images') }}/status-success.png" class="status status-success" alt="">
                </td>
              </tr>

              <tr>
                <td>
                  02/07/2021
                </td>
                <td>
                  P001
                </td>
                <td class="font--bold">
                  Pengantar perkuliahan II
                </td>
                <td class="text-center">
                  KGA12
                </td>
                <td class="text-center">
                  09.46
                </td>
                <td class="text-center">
                  10.00
                </td>
                <td class="text-center">
                  <img src="{{ url('images') }}/status-success.png" class="status status-success" alt="">
                </td>
              </tr>

              <tr>
                <td>
                  28/06/2021
                </td>
                <td>
                  P001
                </td>
                <td class="font--bold">
                  Pengantar perkuliahan II
                </td>
                <td class="text-center">
                  KGA12
                </td>
                <td class="text-center">
                  10.13
                </td>
                <td class="text-center">
                  10.00
                </td>
                <td class="text-center">
                  <img src="{{ url('images') }}/status-rejected.png" class="status status-rejected" alt="">
                </td>
              </tr>

              <tr>
                <td>
                  24/06/2021
                </td>
                <td>
                  P001
                </td>
                <td class="font--bold">
                  Pengantar perkuliahan II
                </td>
                <td class="text-center">
                  KGA12
                </td>
                <td class="text-center">
                  09.46
                </td>
                <td class="text-center">
                  10.00
                </td>
                <td class="text-center">
                  <img src="{{ url('images') }}/status-success.png" class="status status-success" alt="">
                </td>
              </tr>

              <tr>
                <td>
                  24/06/2021
                </td>
                <td>
                  P001
                </td>
                <td class="font--bold">
                  Pengantar perkuliahan II
                </td>
                <td class="text-center">
                  KGA12
                </td>
                <td class="text-center">
                  09.46
                </td>
                <td class="text-center">
                  10.00
                </td>
                <td class="text-center">
                  <img src="{{ url('images') }}/status-success.png" class="status status-success" alt="">
                </td>
              </tr>

              <tr>
                <td>
                  22/06/2021
                </td>
                <td>
                  P001
                </td>
                <td class="font--bold">
                  Pengantar perkuliahan II
                </td>
                <td class="text-center">
                  KGA12
                </td>
                <td class="text-center">
                  09.46
                </td>
                <td class="text-center">
                  10.00
                </td>
                <td class="text-center">
                  <img src="{{ url('images') }}/status-success.png" class="status status-success" alt="">
                </td>
              </tr>

              <tr>
                <td>
                  19/06/2021
                </td>
                <td>
                  P001
                </td>
                <td class="font--bold">
                  Pengantar perkuliahan II
                </td>
                <td class="text-center">
                  KGA12
                </td>
                <td class="text-center">
                  09.46
                </td>
                <td class="text-center">
                  10.00
                </td>
                <td class="text-center">
                  <img src="{{ url('images') }}/status-success.png" class="status status-success" alt="">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection