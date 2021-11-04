@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="akademik_datamahasiswa">
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow padding--small">

				<div class="card-header p-0 m-0 border-0">
					<div class="row align-items-center">
						<div class="col-12 col-md-6">
							<h2 class="mb-0 text-center text-md-left">Data Mahasiswa</h2>
						</div>
						<div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
							<button type="button" onclick="add_btn()" class="btn btn-primary">
								<span class="iconify mr-2" data-icon="bx:bxs-plus-circle"></span>
								Tambah
							</button>
						</div>
					</div>
				</div>
				<hr class="my-4 mt">
				<form class="form-select rounded-0">
					<div class="form-row">
						<div class="col-md-6 form-group">
							<label for="jenjang-pendidikan">Jenjang Pendidikan</label>
							<select class="form-control" id="program_studi" name="program_studi">
								
							</select>
						</div>
						<div class="col-md-6 form-group">
							<label for="kelas">Kelas</label>
							<select class="form-control" id="kelas" name="kelas">
								
							</select>
						</div>
					</div>
				</form>
				<hr class="mt">
				<div class="table-responsive">
					<table id="datatable" class="table align-items-center table-flush table-borderless table-hover" style="width: 100%;">
						<thead class="table-header">
							<tr>
								<th scope="col" class="text-center px-2">No</th>
								<th scope="col">NIM</th>
								<th scope="col">Nama</th>
								<th scope="col" class="text-center">Tanggal Lahir</th>
								<th scope="col" class="text-center">No. Telp</th>
								<th scope="col" class="text-center">Email</th>
								<th scope="col" class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$(document).ready(function() {
		getData();

		$('#program_studi').on('change',function (e) {
			var program_studi = $(this).val()
			var kelas = $.grep(dataGlobal['kelas'], function(e){ return e.program_studi == program_studi; });

			$('#kelas').html('')
			var optKelas = `<option value=""> - </option>`;
			$.each(kelas,function (key,row) {
				optKelas += `<option value="${row.nomor}">${row.kode}</option>`
			})
			$('#kelas').append(optKelas); 
		})
		$('select').on('change',function (e) {
			var url = `${url_api}/mahasiswa?program_studi=${$('#program_studi').val()}&kelas=${$('#kelas').val()}`;
			dt.ajax.url(url).load();
		})
	} );
	async function getData() {
		var optProgram,optJurusan,optKelas,optStatus;
		$.each(dataGlobal['prodi'],function (key,row) {
			optProgram += `<option value="${row.nomor}">${row.nama_program} ${row.program_studi}</option>`
		})
		$('#program_studi').append(optProgram)

		var kelas = $.grep(dataGlobal['kelas'], function(e){ return e.program_studi == $('#program_studi').val(); });
		$('#kelas').html('')
		var optKelas = `<option value=""> - </option>`;
		$.each(kelas,function (key,row) {
			optKelas += `<option value="${row.nomor}">${row.kode}</option>`
		})
		$('#kelas').append(optKelas); 
		setDatatable();
	}
	function setDatatable() {
		var nomor = 1;
		dt_url = `${url_api}/mahasiswa?program_studi=${$('#program_studi').val()}&kelas=${$('#kelas').val()}`;
		dt_opt = {
			serverSide: true,
			order: [[0, 'desc']]
		}
	}
	</script>
	@endsection