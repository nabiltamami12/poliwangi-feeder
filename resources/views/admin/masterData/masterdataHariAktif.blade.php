@extends('layouts.mainAdmin')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__admin container-fluid" id="admin_masterdatahariaktif">
  <div class="row">
    <div class="col-12 col-md-8">
      <div class="card shadow padding--small">
        <div class="calendar calendar-first" id="calendar_first">
          <div class="calendar_header">
            <button class="switch-month switch-left">
              <span class="iconify" data-icon="bx:bx-chevron-left"></span>
            </button>
            <h2></h2>
            <button class="switch-month switch-right">
              <span class="iconify" data-icon="bx:bx-chevron-right"></span>
            </button>
          </div>
          <hr class="my-4">
          <div class="calendar_weekdays"></div>
          <div class="calendar_content"></div>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-4">
      <div class="card shadow padding--small detailKalendaer">
        <div class="detailKalender_header">
          <h2 class="mb-0">Detail Kalender</h2>
        </div>
        <hr class="my-4">
        <div class="detailKalender_content">
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control textarea_notresize" id="keterangan" rows="8"></textarea>
          </div>
        </div>

        <div class="mt-4">
          <select name="sources" id="sources" class="customSelect sources" placeholder="Hari Aktif">
            <option value="hariAktif">Hari Aktif</option>
            <option value="hariLibur">Hari Libur</option>
            <option value="HariLiburNasional">Hari Libur Nasional</option>
          </select>

          <div class="row">
            <div class="col text-right">
              <button type="submit" class="btn btn-primary mt-4">
                <span class="iconify" data-icon="bx:bx-save"></span>
                <span>Simpan</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
<script src="{{ asset('js/customOption.js') }}"></script>
@endsection