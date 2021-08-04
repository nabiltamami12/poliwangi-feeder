@extends('layouts.mainMala')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content container-fluid" id="presensi">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header border-0 padding--big">
          <div class="row align-items-center">
            <div class="col-12">
              <label class="sr-only" for="selectPeriode">Periode</label>
              <select id="selectPeriode" class="custom-select">
                <option>2020, Semester Ganjil</option>
                <option>2020, Semester Genap</option>
                <option>2021, Semester Ganjil</option>
              </select>
            </div>
          </div>
        </div>
        <hr>
        <div class="table-responsive padding--big">
          <table class="table align-items-center table-borderless table-flush table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="border-0 text-center">Kode</th>
                <th scope="col" class="border-0">Mata Kuliah</th>
                <th scope="col" class="border-0 text-center">Kelas</th>
                <th scope="col" class="border-0 text-center">Total Sesi</th>
                <th scope="col" class="border-0 text-center">Sesi Selesai</th>
                <th scope="col" class="border-0 text-center">Total Absen</th>
                <th scope="col" class="border-0 text-center">Maks. Absen</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center">
                  MTK01
                </td>
                <td class="font--bold">
                  Matematika Dasar
                </td>
                <td class="text-center">
                  MT21
                </td>
                <td class="text-center">
                  5
                </td>
                <td class="text-center">
                  4
                </td>
                <td class="text-center">
                  0
                </td>
                <td class="text-center">
                  2
                </td>
              </tr>

              <tr>
                <td class="text-center">
                  P001
                </td>
                <td class="font--bold">
                  Pengantar perkuliahan II
                </td>
                <td class="text-center">
                  KGA12
                </td>
                <td class="text-center">
                  8
                </td>
                <td class="text-center">
                  5
                </td>
                <td class="text-center">
                  2
                </td>
                <td class="text-center">
                  2
                </td>
              </tr>

              <tr>
                <td class="text-center">
                  MTK01
                </td>
                <td class="font--bold">
                  Matematika Dasar
                  </th>
                <td class="text-center">
                  MT21
                </td>
                <td class="text-center">
                  5
                </td>
                <td class="text-center">
                  4
                </td>
                <td class="text-center">
                  0
                </td>
                <td class="text-center">
                  2
                </td>
              </tr>

              <tr>
                <td class="text-center">
                  P003
                </td>
                <td class="font--bold">
                  Pengantar perkuliahan III
                </td>
                <td class="text-center">
                  KGA08
                </td>
                <td class="text-center">
                  3
                </td>
                <td class="text-center">
                  3
                </td>
                <td class="text-center">
                  0
                </td>
                <td class="text-center">
                  1
                </td>
              </tr>

              <tr>
                <td class="text-center">
                  MTK01
                </td>
                <td class="font--bold">
                  Matematika Dasar
                </td>
                <td class="text-center">
                  MT21
                </td>
                <td class="text-center">
                  5
                </td>
                <td class="text-center">
                  4
                </td>
                <td class="text-center">
                  0
                </td>
                <td class="text-center">
                  2
                </td>
              </tr>

              <tr>
                <td class="text-center">
                  P003
                </td>
                <td class="font--bold">
                  Pengantar perkuliahan III
                </td>
                <td class="text-center">
                  KGA08
                </td>
                <td class="text-center">
                  3
                </td>
                <td class="text-center">
                  3
                </td>
                <td class="text-center">
                  0
                </td>
                <td class="text-center">
                  1
                </td>
              </tr>

              <tr>
                <td class="text-center">
                  P003
                </td>
                <td class="font--bold">
                  Pengantar perkuliahan III
                </td>
                <td class="text-center">
                  KGA08
                </td>
                <td class="text-center">
                  3
                </td>
                <td class="text-center">
                  3
                </td>
                <td class="text-center">
                  0
                </td>
                <td class="text-center">
                  1
                </td>
              </tr>

              <tr>
                <td class="text-center">
                  MTK01
                </td>
                <td class="font--bold">
                  Matematika Dasar
                </td>
                <td class="text-center">
                  MT21
                </td>
                <td class="text-center">
                  5
                </td>
                <td class="text-center">
                  4
                </td>
                <td class="text-center">
                  0
                </td>
                <td class="text-center">
                  2
                </td>
              </tr>

              <tr>
                <td class="text-center">
                  MTK01
                </td>
                <td class="font--bold">
                  Matematika Dasar
                </td>
                <td class="text-center">
                  MT21
                </td>
                <td class="text-center">
                  5
                </td>
                <td class="text-center">
                  4
                </td>
                <td class="text-center">
                  0
                </td>
                <td class="text-center">
                  2
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