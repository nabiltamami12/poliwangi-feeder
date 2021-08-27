@extends('layouts.mainMaba')

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
              <h2 class="mb-0">Identitas Mahasiswa</h2>
            </div>
            <div class="col text-right">
              <button type="button" class="btn btn-primary">
                <span class="iconify-inline mr-1" data-icon="bx:bx-trash"></span>
                Hapus Data
              </button>
            </div>
          </div>
          <hr class="my-4">
        </div>

        <form class="form_data">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Nama Siswa</label>
              <input type="text" class="form-control" value="Aldi Rizky Kurniawan">
            </div>
            <div class="form-group col-md-4 mt-3 mt-md-0">
              <label class="text-nowrap">Nomor Induk Kependudukan</label>
              <input type="text" class="form-control" value="144208395802">
            </div>
            <div class="form-group col-md-4 mt-3 mt-md-0">
              <label>NISN</label>
              <input type="text" class="form-control" value="2346813132">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4 mt-3">
              <label>Tempat Lahir</label>
              <input type="text" class="form-control" value="Kota Banyuwangi">
            </div>
            <div class="form-group col-md-4 mt-3">
              <label>Tanggal Lahir</label>
              <div class="d-flex align-items-center date_picker">
                <input id="txtDate" type="text" class="form-control date-input " value="13 Jul 2021" readonly />
                <label class="input-group-btn" for="txtDate">
                  <span class="date_button">
                    <i class="iconify" data-icon="bx:bx-calendar" data-inline="false"></i>
                  </span>
                </label>
              </div>
            </div>
            <div class="form-group col-md-4 mt-3">
              <label>Anak ke</label>
              <input type="text" class="form-control" value="1">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6 mt-3">
              <label>Jenis Kelamin</label>
              <select class="form-control">
                <option selected>Laki-laki</option>
                <option>Perempuan</option>
              </select>
            </div>
            <div class="form-group col-md-6 mt-3">
              <label>Jumlah Saudara</label>
              <input type="text" class="form-control" value="2">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6 mt-3">
              <label>Tahun Lulus</label>
              <select class="form-control">
                <option selected>2020</option>
                <option>2021</option>
              </select>
            </div>
            <div class="form-group col-md-6 mt-3">
              <label>Asal Sekolah</label>
              <input type="text" class="form-control" value="SMKN 1 GLAGAH">
            </div>
          </div>
        </form>

        <div class="card-header p-0 mt-4-5">
          <h2 class="mb-0">Alamat Calon Peserta Didik</h2>
          <hr class="mt-4">
        </div>
        <form class="form_data">
          <div class="form-row">
            <div class="form-group col-12 mt-4">
              <label>Alamat Lengkap</label>
              <input type="text" class="form-control" value="Jl. Adi Sucipto 7">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4 mt-3">
              <label>Desa / Kelurahan</label>
              <input type="text" class="form-control" value="Taman Baru">
            </div>
            <div class="form-group col-md-4 mt-3">
              <label>Kecamatan</label>
              <input type="text" class="form-control" value="Banyuwangi">
            </div>
            <div class="form-group col-md-4 mt-3">
              <label>Kabupaten / Kota</label>
              <input type="text" class="form-control" value="Kabupaten Banyuwangi">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6 mt-3">
              <label>Provinsi</label>
              <select class="form-control">
                <option selected>Jawa Timur</option>
                <option>Jawa Tengah</option>
                <option>Jawa Barat</option>
              </select>
            </div>
            <div class="form-group col-md-6 mt-3">
              <label>Kode Pos</label>
              <input type="text" class="form-control" value="68416">
            </div>
          </div>
        </form>

        <div class="card-header p-0 mt-4-5">
          <h2 class="mb-0">Berkas Mahasiswa</h2>
          <hr class="mt-4">
        </div>
        <form class="form_data">
          <div class="form-row">
            <div class="form-group col-md-6 mt-4 pr-md-2">
              <label>Foto Calon Peserta Didik</label>
              <input type="file" class="form-control form-control-lg">
            </div>
            <div class="form-group col-md-6 mt-3 pl-md-2">
              <label>Foto Ijazah</label>
              <input type="file" class="form-control form-control-lg">
            </div>
          </div>
          <button type="submit" class="btn btn-primary rounded-sm w-100 mt-4-5">Submit</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script>
  $(document).ready(function(){
      $("#txtDate").datepicker({
        format: "dd MM yyyy",
      });
    })
</script>
@endsection