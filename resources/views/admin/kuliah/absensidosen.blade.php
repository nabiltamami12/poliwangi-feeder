@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="admin_datamahasiswa">
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow padding--small">

				<div class="card-header p-0 m-0 border-0">
					<div class="row align-items-center">
						<div class="col-12 col-md-6">
							<h2 class="mb-0 text-center text-md-left">Rekap Presensi Dosen</h2>
						</div>
						<div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
							<button type="button" onclick='detail_btn()' class="btn btn-success">
								<span class="iconify mr-2" data-icon="bx:bx-pencil"></span>
								Edit
							</button>
							<button type="button" onclick="cetak()" class="btn btn-warning">
								<span class="iconify mr-2" data-icon="bx:bx-printer"></span>
								Cetak 
							</button>
						</div>
					</div>
				</div>
				<hr class="my-4 mt">
				<form class="form-select rounded-0">
					<div class="form-row">
						<div class="col-md-2 form-group">
							<label for="jenjang-pendidikan">Tahun</label>
							<select class="form-control" id="tahun" name="tahun"></select>
						</div>
						<div class="col-md-3 form-group">
							<label for="kelas">Semester</label>
							<select class="form-control" id="semester" name="semester">
								<option value="1"> Semester Gasal </option>
								<option value="2"> Semester Genap </option>
							</select>
						</div>
					</div>
				</form>
				<hr class="mt">
				<div class="table-responsive">
					<table id="datatable-pending" class="table align-items-center table-flush table-borderless table-hover">
						<thead class="table-header">
							<tr>
								<th scope="col" class="text-center px-2">No</th>
								<th scope="col">Nama</th>
								<th scope="col" class="text-center">Jml Matakuliah</th>
								<th scope="col" class="text-center">Kehadiran</th>
								<th scope="col" class="text-center">Tidak Hadir</th>
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
	var form_tahun = document.getElementById('tahun');
	var form_semester = document.getElementById('semester');

	$(document).ready(function(){
		getTahun();
	});

	function getTahun() {
		$.ajax({
			url: url_api+"/absensi-dosen/list-tahun",
			type: 'get',
			dataType: 'json',
			success: function(res) {
				if (res.status=="success"){
					let opt = '';
					for(const i of res.data) opt += `<option value="${i}">${i}</option>`;
						if (opt !== '') {
							document.getElementById('tahun').innerHTML = opt;
						setDatatable();
					}
				}
				return true;
			}
		});
	}

	function setDatatable() {
		var nomor = 1;
		dt_url = `{{ url('/api/v1') }}/absensi-dosen/rekap?tahun=${form_tahun.value}&semester=${form_semester.value}`;
		dt_opt = {
			"columns": [
				{
					"data": null,
					"render": ( data, type, row, meta ) => meta.row+1
				},
				{ "data": "dosen" },
				{ "data": "dosen", className: 'text-center' },
				{ "data": "dosen", className: 'text-center' },
				{ "data": "dosen", className: 'text-center' },
				{ "data": "dosen", className: 'text-center' }
			]
		}
		load_datatable();
	}

	function detail_btn(id) {
		var kelas = $('#kelas').val();
		var matakuliah = $('#matakuliah').val();

		if((kelas == null || kelas == "") || (matakuliah == null  || matakuliah == "")){
			alert('Lengkapi kelas dan matakuliah terlebih dahulu')
		}else{
			window.location.href = "{{url($page.'/kuliah/absensi/rekap-mahasiswa/')}}"+"/"+kelas+"/"+matakuliah;
		}
	}

	function cetak() {
		if (($('#kelas').val()==null || $('#kelas').val()=="") || ($('#matakuliah').val()==null || $('#matakuliah').val()=="") ) {
			alert('Pilih kelas terlebih dahulu!')
		} else {
			var id_kelas = $('#kelas').val()
			var matakuliah = $('#matakuliah').val()

			var arr = {
				'tahun' : dataGlobal['periode']['tahun'],
				'semester' : dataGlobal['periode']['semester'],
				'prodi' : $('#program_studi :selected').text(),
				'kelas' : $('#kelas :selected').text(),
				'id_kelas' : id_kelas,
				'matakuliah' : $('#matakuliah :selected').text(),
				'id_matakuliah' : matakuliah,
				'dosen' : '',
			}
			console.log(arr)
			localStorage.setItem('cetak-absen', JSON.stringify(arr));

			window.open("{{url($page.'/kuliah/cetak-absensi-kelas/')}}",'_blank');
		}
	}
</script>
@endsection