@extends('layouts.mainMala')

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
            <div class="col">
              <h3 class="mb-0">Unduh KHS</h3>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <div class="table-responsive">
          <table class="table align-items-center table-borderless table-flush table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center px-2">No</th>
                <th scope="col" style="width: 75%">Keterangan</th>
                <th scope="col" class="text-center">File</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center px-2">1</td>
                <td>
                  <h2>KHS Semester Satu</h2>
                </td>
                <td class="text-center">
                  <i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-cloud-download"></i>
                  <span class="font-weight-bold text-primary">Unduh File PDF</span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">2</td>
                <td>
                  <h2>KHS Semester Dua</h2>
                </td>
                <td class="text-center">
                  <i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-cloud-download"></i>
                  <span class="font-weight-bold text-primary">Unduh File PDF</span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">3</td>
                <td>
                  <h2>KHS Semester Tiga</h2>
                </td>
                <td class="text-center">
                  <i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-cloud-download"></i>
                  <span class="font-weight-bold text-primary">Unduh File PDF</span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">4</td>
                <td>
                  <h2>KHS Semester Empat</h2>
                </td>
                <td class="text-center">
                  <i class="iconify-inline mr-1 text-primary" data-icon="bx:bx-cloud-download"></i>
                  <span class="font-weight-bold text-primary">Unduh File PDF</span>
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