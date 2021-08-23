@extends('layouts.mainAdmin')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid" id="admin_masterdatarangenilai">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--medium">

        <div class="card-header p-0 m-0 border-0 ">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Range Nilai</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <a class="btn btn-primary" href="/admin/masterdata/dataprodi/tambahdata" role="button">
                <i class="iconify mr-1" data-icon="bx:bx-edit-alt"></i>
                Edit Data
              </a>
            </div>
          </div>
        </div>

        <hr class="my-4">
        <form class="form_rangenilai">
          <div class="row">
            <div class="col d-flex align-items-center">
              <div class="grade_nilai bg-primary mr-2 mr-sm-4">A</div>
              <input type="text" class="form-control mr-5 mr-sm-4" value="100">
            </div>
            <div class="col d-flex align-items-center pl-0 ml--5 ml-sm--3">
              <span class="mr-3 mr-sm-4">Sampai</span>
              <input type="text" class="form-control" value="81">
            </div>
          </div>

          <div class="row mt-4-5">
            <div class="col d-flex align-items-center">
              <div class="grade_nilai bg-primary mr-2 mr-sm-4">AB</div>
              <input type="text" class="form-control mr-5 mr-sm-4" value="80">
            </div>
            <div class="col d-flex align-items-center pl-0 ml--5 ml-sm--3">
              <span class="mr-3 mr-sm-4">Sampai</span>
              <input type="text" class="form-control" value="71">
            </div>
          </div>

          <div class="row mt-4-5">
            <div class="col d-flex align-items-center">
              <div class="grade_nilai bg-primary mr-2 mr-sm-4">B</div>
              <input type="text" class="form-control mr-5 mr-sm-4" value="70">
            </div>
            <div class="col d-flex align-items-center pl-0 ml--5 ml-sm--3">
              <span class="mr-3 mr-sm-4">Sampai</span>
              <input type="text" class="form-control" value="66">
            </div>
          </div>

          <div class="row mt-4-5">
            <div class="col d-flex align-items-center">
              <div class="grade_nilai bg-primary mr-2 mr-sm-4">BC</div>
              <input type="text" class="form-control mr-5 mr-sm-4" value="65">
            </div>
            <div class="col d-flex align-items-center pl-0 ml--5 ml-sm--3">
              <span class="mr-3 mr-sm-4">Sampai</span>
              <input type="text" class="form-control" value="63">
            </div>
          </div>

          <div class="row mt-4-5">
            <div class="col d-flex align-items-center">
              <div class="grade_nilai bg-primary mr-2 mr-sm-4">C</div>
              <input type="text" class="form-control mr-5 mr-sm-4" value="60">
            </div>
            <div class="col d-flex align-items-center pl-0 ml--5 ml-sm--3">
              <span class="mr-3 mr-sm-4">Sampai</span>
              <input type="text" class="form-control" value="56">
            </div>
          </div>

          <div class="row mt-4-5">
            <div class="col d-flex align-items-center">
              <div class="grade_nilai bg-primary mr-2 mr-sm-4">D</div>
              <input type="text" class="form-control mr-5 mr-sm-4" value="55">
            </div>
            <div class="col d-flex align-items-center pl-0 ml--5 ml-sm--3">
              <span class="mr-3 mr-sm-4">Sampai</span>
              <input type="text" class="form-control" value="41">
            </div>
          </div>

          <div class="row mt-4-5">
            <div class="col d-flex align-items-center">
              <div class="grade_nilai bg-primary mr-2 mr-sm-4">E</div>
              <input type="text" class="form-control mr-5 mr-sm-4" value="40">
            </div>
            <div class="col d-flex align-items-center pl-0 ml--5 ml-sm--3">
              <span class="mr-3 mr-sm-4">Sampai</span>
              <input type="text" class="form-control" value="0">
            </div>
          </div>
        </form>
      </div>
    </div>
</section>
@endsection