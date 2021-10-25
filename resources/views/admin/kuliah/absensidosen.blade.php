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
					</div>
				</div>
				<hr class="my-4 mt">
				<form class="form-select rounded-0">
					<div class="form-row">
						<div class="col-md-2 form-group">
							<label for="jenjang-pendidikan">Tahun</label>
							<select class="form-control dt-filter" id="tahun" name="tahun"></select>
						</div>
						<div class="col-md-3 form-group">
							<label for="kelas">Semester</label>
							<select class="form-control dt-filter" id="semester" name="semester">
								<option value="1"> Semester Gasal </option>
								<option value="2"> Semester Genap </option>
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

		$('.dt-filter').on('change',function (e) {
      var url = `{{ url('/api/v1') }}/absensi-dosen/rekap?tahun=${form_tahun.value}&semester=${form_semester.value}`;
      dt.ajax.url(url).load();
    });
	});

	function getTahun() {
		$.ajax({
			url: url_api+"/absensi-dosen/list-tahun",
			type: 'get',
			dataType: 'json',
			success: function(res) {
				if (res.status=="success"){
					let opt = '';
					for(const i of res.data) {
						opt += `<option value="${i}">${i}</option>`
					};
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
					"render": ( data, type, row, meta ) => meta.row+1,
					"className": 'text-center'
				},
				{ "data": "nama" },
				{ "data": "jumlah_matakuliah", className: 'text-center' },
				{ "data": "kehadiran", className: 'text-center' },
				{ 
					"data": "jumlah_matakuliah",
					"render": ( data, type, row, meta ) => ( Number(data) * 16 ) - Number(row.kehadiran),
					"className": 'text-center'
				},
				{
					"data": "dosen",
					"render": ( data, type, row, meta ) => {
						return `<span title="Detail" class="iconify edit-icon text-primary" onclick="detail('${data}')" data-icon="bx:bx-edit-alt" ></span>` 
					},
					"className": 'text-center'
				}
			]
		}
		load_datatable();
	}

	function detail(id) {
		window.location.href = `{{url('admin/kuliah/absensi/dosen')}}/${id}/${form_tahun.value}/${form_semester.value}`;
	}
</script>
@endsection