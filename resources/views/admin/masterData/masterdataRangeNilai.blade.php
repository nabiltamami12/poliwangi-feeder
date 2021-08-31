@extends('layouts.mainAdmin')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--medium">
        <div class="card-header p-0">
          <div class="row align-items-center">
            <div class="col-md-6">
              <h2 class="mb-0 text-center text-md-left">Range Nilai</h2>
            </div>
            <div class="col-md-6 text-center text-md-right mt-3 mt-md-0">
              <a class="btn btn-primary" href="/admin/masterdata/dataprodi/tambahdata" role="button">
                <i class="iconify mr-1" data-icon="bx:bx-edit-alt"></i>
                Edit Data
              </a>
            </div>
          </div>
        </div>
        <hr class="my-4">

        <form class="form_rangenilai">
          <div class="form-row">
            <div class="col-sm d-flex align-items-center justify-content-between">
              <div class="grade_nilai bg-primary">A</div>
              <label class="sr-only" for="gradeA_start">Nilai A</label>
              <input type="text" class="form-control" id="gradeA_start" value="100">
            </div>
            <div class="col-sm d-flex align-items-center mt-2 mt-sm-0">
              <label for="gradeA_end">Sampai</label>
              <input type="text" class="form-control" id="gradeA_end" value="81">
            </div>
          </div>

          <div class="form-row mt-4-5">
            <div class="col-sm d-flex align-items-center justify-content-between">
              <div class="grade_nilai bg-primary">AB</div>
              <label class="sr-only" for="gradeAB_start">Nilai AB</label>
              <input type="text" class="form-control" id="gradeAB_start" value="80">
            </div>
            <div class="col-sm d-flex align-items-center mt-2 mt-sm-0">
              <label for="gradeAB_end">Sampai</label>
              <input type="text" class="form-control" id="gradeAB_end" value="71">
            </div>
          </div>

          <div class="form-row mt-4-5">
            <div class="col-sm d-flex align-items-center justify-content-between">
              <div class="grade_nilai bg-primary">B</div>
              <label class="sr-only" for="gradeB_start">Nilai B</label>
              <input type="text" class="form-control" id="gradeB_start" value="70">
            </div>
            <div class="col-sm d-flex align-items-center mt-2 mt-sm-0">
              <label for="gradeB_end">Sampai</label>
              <input type="text" class="form-control" id="gradeB_end" value="66">
            </div>
          </div>

          <div class="form-row mt-4-5">
            <div class="col-sm d-flex align-items-center justify-content-between">
              <div class="grade_nilai bg-primary">BC</div>
              <label class="sr-only" for="gradeBC_start">Nilai BC</label>
              <input type="text" class="form-control" id="gradeBC_start" value="65">
            </div>
            <div class="col-sm d-flex align-items-center mt-2 mt-sm-0">
              <label for="gradeBC_end">Sampai</label>
              <input type="text" class="form-control" id="gradeBC_end" value="61">
            </div>
          </div>

          <div class="form-row mt-4-5">
            <div class="col-sm d-flex align-items-center justify-content-between">
              <div class="grade_nilai bg-primary">C</div>
              <label class="sr-only" for="gradeC_start">Nilai C</label>
              <input type="text" class="form-control" id="gradeC_start" value="60">
            </div>
            <div class="col-sm d-flex align-items-center mt-2 mt-sm-0">
              <label for="gradeC_end">Sampai</label>
              <input type="text" class="form-control" id="gradeC_end" value="56">
            </div>
          </div>

          <div class="form-row mt-4-5">
            <div class="col-sm d-flex align-items-center justify-content-between">
              <div class="grade_nilai bg-primary">D</div>
              <label class="sr-only" for="gradeD_start">Nilai D</label>
              <input type="text" class="form-control" id="gradeD_start" value="55">
            </div>
            <div class="col-sm d-flex align-items-center mt-2 mt-sm-0">
              <label for="gradeD_end">Sampai</label>
              <input type="text" class="form-control" id="gradeD_end" value="41">
            </div>
          </div>

          <div class="form-row mt-4-5">
            <div class="col-sm d-flex align-items-center justify-content-between">
              <div class="grade_nilai bg-primary">E</div>
              <label class="sr-only" for="gradeE_start">Nilai E</label>
              <input type="text" class="form-control" id="gradeE_start" value="40">
            </div>
            <div class="col-sm d-flex align-items-center mt-2 mt-sm-0">
              <label for="gradeE_end">Sampai</label>
              <input type="text" class="form-control" id="gradeE_end" value="0">
            </div>
          </div>
        </form>
      </div>
    </div>
</section>
@endsection