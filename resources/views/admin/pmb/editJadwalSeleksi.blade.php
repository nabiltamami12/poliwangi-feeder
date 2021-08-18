@extends('layouts.mainAdmin')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">

        <div class="card-header padding--medium m-0 border-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Jadwal Seleksi</h2>
            </div>
            <div class="col text-right">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
        <hr>

        <div class="card-body">
          <div class="jadwal_sehari">
            <div class="keterangan_hari">
              <p class="d-inline mb-0 font-weight-bold text-black mr-3">Hari</p>
              <span class="badge badge-primary">Senin</span>
            </div>
            <hr class="my-3">

            <form class="form-inline jumlah_sesi">
              <div class="form-group">
                <label for="jumlah-sesi" class="d-inline">Jumlah Sesi</label>
                <select class="form-control form-control-sm d-inline ml-4" id="jumlah-sesi">
                  <option>1</option>
                  <option>2</option>
                  <option selected>3</option>
                </select>
              </div>
            </form>

            <div class="row detail_waktu mt-3">
              <div class="col-md-6">
                <label for="jam_selesai">Jam</label>
                <form class="form">
                  <input type="time" class="form-control" id="jam_selesai" value="07:30">
                  <label for="jam_selesai">Sampai</label>
                  <input type="time" class="form-control" id="jam_selesai" value="07:30">
                </form>
              </div>
              <div class="col-md-6 mt-3 mt-md-0">
                <label for="kuota">Kuota</label>
                <input type="text" class="form-control text-center" value="100">
              </div>
            </div>

            <div class="row detail_waktu mt-3">
              <div class="col-md-6">
                <label for="jam_selesai">Jam</label>
                <form class="form">
                  <input type="time" class="form-control" id="jam_selesai" value="07:30">
                  <label for="jam_selesai">Sampai</label>
                  <input type="time" class="form-control" id="jam_selesai" value="07:30">
                </form>
              </div>
              <div class="col-md-6 mt-3 mt-md-0">
                <label for="kuota">Kuota</label>
                <input type="text" class="form-control text-center" value="100">
              </div>
            </div>

            <div class="row detail_waktu mt-3">
              <div class="col-md-6">
                <label for="jam_selesai">Jam</label>
                <form class="form">
                  <input type="time" class="form-control" id="jam_selesai" value="07:30">
                  <label for="jam_selesai">Sampai</label>
                  <input type="time" class="form-control" id="jam_selesai" value="07:30">
                </form>
              </div>
              <div class="col-md-6 mt-3 mt-md-0">
                <label for="kuota">Kuota</label>
                <input type="text" class="form-control text-center" value="100">
              </div>
            </div>
          </div>

          <div class="jadwal_sehari mt-4">
            <div class="keterangan_hari">
              <p class="d-inline mb-0 font-weight-bold text-black mr-3">Hari</p>
              <span class="badge badge-primary">Selasa</span>
            </div>
            <hr class="my-3">

            <form class="form-inline jumlah_sesi">
              <div class="form-group">
                <label for="jumlah-sesi" class="d-inline">Jumlah Sesi</label>
                <select class="form-control form-control-sm d-inline ml-4" id="jumlah-sesi">
                  <option selected>1</option>
                  <option>2</option>
                  <option>3</option>
                </select>
              </div>
            </form>

            <div class="row detail_waktu mt-3">
              <div class="col-md-6">
                <label for="jam_selesai">Jam</label>
                <form class="form">
                  <input type="time" class="form-control" id="jam_selesai" value="07:30">
                  <label for="jam_selesai">Sampai</label>
                  <input type="time" class="form-control" id="jam_selesai" value="07:30">
                </form>
              </div>
              <div class="col-md-6 mt-3 mt-md-0">
                <label for="kuota">Kuota</label>
                <input type="text" class="form-control text-center" value="100">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection