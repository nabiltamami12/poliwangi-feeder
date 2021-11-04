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
					</div>
				</div>
				<hr class="my-4 mt">
				<form class="form-select rounded-0">
					<div class="form-row">
						<div class="col-md-6 form-group">
							<label for="jenjang-pendidikan">Jenjang Pendidikan</label>
							<select class="form-control" id="program" name="program">
								
							</select>
						</div>
						<div class="col-md-6 form-group">
							<label for="jenjang-pendidikan">Jurusan</label>
							<select class="form-control" id="jurusan" name="jurusan">
								
							</select>
						</div>
						<div class="col-md-4 form-group">
							<label for="jenjang-pendidikan">Tahun</label>
							<select class="form-control" id="jurusan" name="jurusan">
								
							</select>
						</div>
						<div class="col-md-4 form-group">
							<label for="jenjang-pendidikan">Semester</label>
							<select class="form-control" id="jurusan" name="jurusan">
								
							</select>
						</div>
						<div class="col-md-4 form-group mt-3 mt-md-0">
							<label for="status-mahasiswa">Status Mahasiswa</label>
							<select class="form-control" id="status" name="status">
								
							</select>
						</div>
						<div class="col-md-12 form-group mt-3 mt-md-0">
								<button type="button" onclick="cari_btn()" class="btn btn-primary w-100">
										Cari
								</button>
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

//   $('#program_studi').on('change',function (e) {
//     var program_studi = $(this).val()
//     var kelas = $.grep(dataGlobal['kelas'], function(e){ return e.program_studi == program_studi; });
		
//     $('#kelas').html('')
//     var optKelas = `<option value=""> - </option>`;
//     $.each(kelas,function (key,row) {
//       optKelas += `<option value="${row.nomor}">${row.kode}</option>`
//     })
//     $('#kelas').append(optKelas); 
//   })
});
function cari_btn() {
		var where = `status=${$('#status').val()}`;
		if ($('#program').val() != "-") {
				where += `&program=${$('#program').val()}`;
		}
		if ($('#jurusan').val() != "-") {
				where += `&jurusan=${$('#jurusan').val()}`;
		}
		if ($('#kelas').val() != "-") {
				where += `&kelas=${$('#kelas').val()}`;
		}
		var url = `${url_api}/mahasiswa-lama?${where}`;    
		dt.ajax.url(url).load();
}
async function getData() {
		var optProgram,optJurusan,optKelas,optStatus;
		$.ajax({
				url: url_api + "/prodi-lama",
				type: 'get',
				dataType: 'json',
				data: {},
				success: function(res) {
				if (res.status == "success") {

						var optProgram = `<option value="-"> - </option>`;
						$.each(res.data.program,function (key,row) {
								optProgram += `<option value="${row.nomor}">${row.program} </option>`
						})
						$('#program').append(optProgram)
						var optJurusan = `<option value="-"> - </option>`;
						$.each(res.data.jurusan,function (key,row) {
								optJurusan += `<option value="${row.nomor}">${row.jurusan} </option>`
						})
						$('#jurusan').append(optJurusan)
				} else {
						// alert gagal
				}

				}
		});

		// var kelas = $.grep(dataGlobal['kelas'], function(e){ return e.program_studi == $('#program_studi').val(); });
		// $('#kelas').html('')
		// var optKelas = `<option value=""> - </option>`;
		// $.each(kelas,function (key,row) {
		//   optKelas += `<option value="${row.nomor}">${row.kode}</option>`
		// })
		// $('#kelas').append(optKelas); 

		$.each(dataGlobal['status'],function (key,row) {
				optStatus += `<option value="${row.kode}">${row.status} - ${row.jenis}</option>`
		})
		$('#status').append(optStatus)
		setDatatable();
}
function setDatatable() {
	var nomor = 1;
	var where = `status=${$('#status').val()}`;
	if ($('#program').val() != null) {
			where += `&program=${$('#program').val()}`;
	}
	if ($('#jurusan').val() != null) {
			where += `&jurusan=${$('#jurusan').val()}`;
	}
	if ($('#kelas').val() != null) {
			where += `&kelas=${$('#kelas').val()}`;
	}
	console.log(where)
	dt_url = `${url_api}/mahasiswa-lama?${where}`;
	dt_opt = {
		serverSide: true,
		order: [[0, 'desc']]
	}
}
</script>
@endsection