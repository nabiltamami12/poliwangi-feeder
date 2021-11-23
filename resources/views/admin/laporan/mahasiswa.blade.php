@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="akademik_datamahasiswa">
	<div class="row">
		<div class="col-md-10 col-xl-7">
			<div class="card shadow padding--small">
				<form class="form-select rounded-0" id="report-submit-form" method="POST">
                    @csrf
					<div class="card-header p-0 m-0 border-0">
						<div class="row align-items-center">
							<div class="col-12 col-md-6">
								<h2 class="mb-0 text-center text-md-left">Laporan Mahasiswa</h2>
							</div>
						</div>
					</div>
					<hr class="mt">
					<div class="form-row">
						<div class="col form-group">
							<label for="status-mahasiswa">Status Mahasiswa</label   >
							<select class="form-control" id="status-mahasiswa" name="status">
								<option value="">Semua Mahasiswa</option>
								<option value="A">Mahasiswa Aktif</option>
								<option value="X">Mahasiswa Tidak Aktif</option>
								<option value="D">Mahasiswa DO</option>
								<option value="C">Mahasiswa Cuti</option>
							</select>
						</div>
					</div>
					<hr class="mt">
					<div class="form-row">
						<div class="col text-right">
							<button type="submit" class="btn btn-primary">
								<span class="iconify mr-2" data-icon="bytesize:export"></span>
								Export
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection
