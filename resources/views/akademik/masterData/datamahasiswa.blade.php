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
							<select class="form-control" id="program_studi" name="program_studi" onchange="reset_filter(['kelas']);get_kelas();">
								<option value=""> - </option>
							</select>
						</div>
						<div class="col-md-6 form-group">
							<label for="kelas">Kelas</label>
							<select class="form-control" id="kelas" name="kelas">
								<option value=""> - </option>
							</select>
						</div>
					</div>
				</form>
				<hr class="mt">
				<div class="table-responsive">
					<table id="datatable-pending" class="table align-items-center table-flush table-borderless table-hover" style="width: 100%;">
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
	var f_prodi = document.getElementById('program_studi');
	var f_kelas = document.getElementById('kelas');
	f_kelas.disabled = true;
	$(document).ready(function() {
		get_prodi();
		setDatatable();

		$('select').on('change',function (e) {
			var url = `${url_api}/mahasiswa?program_studi=${f_prodi.value}&kelas=${f_kelas.value}`;
			dt.ajax.url(url).load();
		})
	});
	function setDatatable() {
		var nomor = 1;
		dt_url = `${url_api}/mahasiswa?program_studi=${f_prodi.value}&kelas=${f_kelas.value}`;
		dt_opt = {
			serverSide: true,
			order: [[0, 'desc']]
		}
		load_datatable();
	}
	function get_prodi() {
		$.ajax({
			url: url_api + `/prodi-mahasiswa?status=A`,
			type: 'get',
			dataType: 'json',
			success: function(res) {
				if (res.status == "success") {
					let optProdi = `<option value=""> - </option>`;
					$.each(res.data,function (key,row) {
						optProdi += `<option value="${row.program_studi}">${row.program} ${row.jurusan}</option>`
					})
					$('#program_studi').html(optProdi)
				}
				return true;
			}
		});
		return true;
	}
	function get_kelas() {
		$.ajax({
			url: url_api + `/mahasiswa-kelas?status=A&program_studi=${f_prodi.value}`,
			type: 'get',
			dataType: 'json',
			success: function(res) {
				if (res.status == "success") {
					let optKelas = `<option value=""> - </option>`;
					$.each(res.data,function (key,row) {
						optKelas += `<option value="${row.kelas}">${row.kode}</option>`
					})
					$('#kelas').html(optKelas);
					f_kelas.disabled = false;
				}
				return true;
			}
		});
		return true;
	}
	function reset_filter(opt){
		for(const i of opt){
			let obj = document.getElementById(i);
			obj.disabled = true;
			obj.selectedIndex = 0;
		}
		return true;
	}
	</script>
	@endsection
