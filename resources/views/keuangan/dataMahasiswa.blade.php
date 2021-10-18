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
							<h2 class="mb-0 text-center text-md-left">Mahasiswa</h2>
						</div>
					</div>
				</div>
				<hr class="my-4 mt">
				<form class="form-select rounded-0">
					<div class="form-row">
						<div class="col-md-4 form-group">
							<label for="jenjang-pendidikan">Jenjang Pendidikan</label>
							<select class="form-control" id="program_studi" name="program_studi">

							</select>
						</div>
						<div class="col-md-4 form-group">
							<label for="kelas">Kelas</label>
							<select class="form-control" id="kelas" name="kelas">

							</select>
						</div>
						<div class="col-md-4 form-group mt-3 mt-md-0">
							<label for="status-mahasiswa">Status Mahasiswa</label>
							<select class="form-control" id="status" name="status">

							</select>
						</div>
					</div>
				</form>
				<hr class="mt">
				<div class="table-responsive">
					<table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
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

		$('#searchdata').on('keyup', function() {
			dt.search(this.value).draw();
		});
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
			var url = `${url_api}/pendaftar/mahasiswa?program_studi=${$('#program_studi').val()}&status=${$('#status').val()}&kelas=${$('#kelas').val()}`;
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

		$.each(dataGlobal['status'],function (key,row) {
			optStatus += `<option value="${row.kode}">${row.status} - ${row.jenis}</option>`
		})
		$('#status').append(optStatus)
		setDatatable();
	}
	function setDatatable() {
		var nomor = 1;
		dt_url = `${url_api}/pendaftar/mahasiswa?program_studi=${$('#program_studi').val()}&status=${$('#status').val()}&kelas=${$('#kelas').val()}`;
		dt_opt = {
			"columnDefs": [
			{
				"aTargets": [0],
				"mData": null,
				"mRender": function(data, type, full) {
					res = nomor++;
					return (res==null)?"-":res;
				}
			},{
				"aTargets": [1],
				"mData": null,
				"mRender": function(data, type, full) {
					res = data['nrp'];
					return (res==null)?"-":res;
				}
			},{
				"aTargets": [2],
				"mData": null,
				"mRender": function(data, type, full) {
					res = data['nama'];
					return (res==null)?"-":res;
				}
			},{
				"aTargets": [3],
				"mData": null,
				"mRender": function(data, type, full) {
					res = data['tgllahir'];
					return (res==null)?"-":res;
				}
			},{
				"aTargets": [4],
				"mData": null,
				"mRender": function(data, type, full) {
					res = data['notelp'];
					return (res==null)?"-":res;
				}
			},{
				"aTargets": [5],
				"mData": null,
				"mRender": function(data, type, full) {
					res = data['email'];
					return (res==null)?"-":res;
				}
			},{
				"aTargets": [6],
				"mData": null,
				"mRender": function(data, type, full) {
					var id = data['nomor'];
					var text_hapus = data['nama'];
					var btn_update = `<span class="iconify edit-icon text-primary" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" ></span>` 
					var btn_delete = `<span class="iconify delete-icon text-primary" data-icon="bx:bx-trash"  onclick='delete_btn(${id},"mahasiswa","mahasiswa","${text_hapus}")'></span>`; 
					res = btn_update+" "+btn_delete;
					return res;
				}
			},
			]
		}
	}
</script>
@endsection