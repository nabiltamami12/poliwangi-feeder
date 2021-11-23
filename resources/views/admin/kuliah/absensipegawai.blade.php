@extends('layouts.main')

@section('style')
<style>
	.modal-dialog {
		position: relative;
		max-width: none;
		margin: 20px 10px 20px 20px;
	}

	#detailtable .badge {
		font-size: 80%;
		margin: 0 3px;
		padding: 8px 15px;
	}
</style>
@endsection

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
							<h2 class="mb-0 text-center text-md-left">Rekap Presensi Pegawai</h2>
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
							<label for="bulan">Bulan</label>
							<select class="form-control dt-filter" id="bulan" name="bulan">
								<option value="all"> All </option>
								<option value="01"> Januari </option>
								<option value="02"> Februari </option>
								<option value="03"> Maret </option>
								<option value="04"> April </option>
								<option value="05"> Mei </option>
								<option value="06"> Juni </option>
								<option value="07"> Juli </option>
								<option value="08"> Agustus </option>
								<option value="09"> September </option>
								<option value="10"> Oktober </option>
								<option value="11"> November </option>
								<option value="12"> Desember </option>
							</select>
						</div>
						<div class="col-md-3 form-group">
							<label for="rekap_presensi">Presensi</label>
							<select class="form-control dt-filter" id="role_presensi" name="role_presensi">
								<option value="all"> All </option>
								<option value="tendik"> Tenaga Didik </option>
								<option value="pns"> PNS </option>
								<option value="kontrak"> Kontrak </option>
								<option value="satpam"> Satpam </option>
								<option value="kebersihan"> Kebersihan </option>
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
								<th scope="col">Kehadiran</th>
								<th scope="col">Tidak Hadir</th>
								<!-- <th scope="col" class="text-center">Staf</th> -->
								<th scope="col" class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Detail -->
	<div class="modal fade" id="detailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Detail Presensi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="DetailModalBody"></div>
					<div class="table-responsive">
						<table id="detailtable" class="table align-items-center table-flush table-borderless table-hover" style="width: 100%;">
							<thead class="table-header">
								<tr>
									<th scope="col" class="text-center">No</th>
									<th scope="col">Tanggal</th>
									<th scope="col">Masuk</th>
									<th scope="col">Pulang</th>
									<th scope="col">Terlambat 1</th>
									<th scope="col">Terlambat 2</th>
									<th scope="col">Pulang Awal</th>
									<th scope="col">Tidak Absen</th>
									<!-- <th scope="col">Tidak Masuk</th>
									<th scope="col">Libur</th> -->
									<th scope="col">Lembur</th>
									<th scope="col">Status</th>
									<!-- <th scope="col">Mulai Istirahat</th>
									<th scope="col">Akhir Istirahat</th>
									<th scope="col">Keterangan</th> -->
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

				</div>
			</div>
		</div>
	</div>

</section>

<script>
	var form_tahun = document.getElementById('tahun');
	var form_bulan = document.getElementById('bulan');
	var form_presensi = document.getElementById('role_presensi');

	$(document).ready(function(){
		getTahun();

		$('.dt-filter').on('change',function (e) {
			var url = `{{ url('/api/v1') }}/absensi-pegawai/rekap?tahun=${form_tahun.value}&bulan=${form_bulan.value}&role=${form_presensi.value}`;
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
		dt_url = `{{ url('/api/v1') }}/absensi-pegawai/rekap?tahun=${form_tahun.value}&bulan=${form_bulan.value}&role=${form_presensi.value}`;
		dt_opt = {
			"columns": [
				{
					"data": null,
					"render": ( data, type, row, meta ) => meta.row+1,
					"className": 'text-center'
				},	
				{ 
					"data": "nama", 
					"render": (data, type, row, meta) => {
						row.gelar_dpn != null? dpn = row.gelar_dpn+'.' : dpn = '';
						row.gelar_blk != null? blk = ', '+row.gelar_blk : blk = '';
						return dpn+data+blk
					} 
				},
				{ "data": "hadir_count" },
				{ "data": "totalpresensi_count", "render": (data, type, row, meta) => Number(data) - Number(row.hadir_count) },
				{
					"data": "id",
					"render": ( data, type, row, meta ) => {
						return `<button class="btn btn-primary btn-sm" onclick="detail('${data}')" >Detail</button>` 
					},
					"className": 'text-center'
				}
			]
		}
		load_datatable();
	}

	function detail(id) {
		tahun = form_tahun.value;
		bulan = form_bulan.value;

		$('#detailtable').dataTable().fnClearTable();
    	$('#detailtable').dataTable().fnDestroy();

		$('#detailtable').DataTable({
			processing: true,
			serverside: true,
			ajax: {
				url: `{{ url('/api/v1') }}/absensi-pegawai/rekap/${id}/${tahun}/${bulan}`,
				type: 'GET',
				headers: {
					"Authorization": window.localStorage.getItem('token')
				}
			},
			columns: [
				{data: null, name: 'no', className: 'text-center', sortable: false, render: function(data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
				{
					data: 'tanggal', 
					name: 'tanggal', 
					className: 'text-center',
					render: (data) => {
						return moment(data).format('DD/MM/YYYY');
					}
				},
				{data: 'masuk', name: 'masuk', defaultContent: "-", className: 'text-center'},
				{data: 'pulang', name: 'pulang', defaultContent: "-", className: 'text-center'},
				{data: 'terlambat1', name: 'terlambat1', defaultContent: "-", className: 'text-center'},
				{data: 'terlambat2', name: 'terlambat2', defaultContent: "-", className: 'text-center'},
				{data: 'pulangawal', name: 'pulangawal', defaultContent: "-", className: 'text-center'},
				{data: 'tidakabsen', name: 'tidakabsen', className: 'text-center'},
				// {data: 'tidakmasuk', name: 'tidakmasuk', className: 'text-center'},
				// {data: 'libur', name: 'libur', className: 'text-center'},
				{data: 'lembur', name: 'lembur', className: 'text-center'},
				{
					data: 'status', 
					name: 'status', 
					className: 'text-center',
					render: (data, type, row, meta) => {
						row.tidakmasuk == 0 && row.libur == 0? masuk = '<span class="badge badge-success badge-sm text-white">Masuk</span>' : masuk = '<span class="badge badge-danger badge-sm text-white">Tidak Masuk</span>';
						row.libur == 0? libur = '' : libur = '<span class="badge badge-primary badge-sm text-white">Libur</span>'
						return masuk+libur;
					}
				},
				// {data: 'mulai_istirahat', name: 'mulai_istirahat'},
				// {data: 'akhir_istirahat', name: 'akhir_istirahat'},
				// {data: 'keterangan', name: 'keterangan'},
			],
			order: [[0, 'asc']],
			language: {
				"paginate": {
					"next": 'Next',
					"previous": 'Previous'
				},
				"processing": "Proses ...",
				"emptyTable": "Tidak ada data dalam tabel",
				"info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ total data",
				"infoEmpty": "Menampilkan 0 sampai 0 dari 0 total data",
				"infoFiltered": "(difilter dari _MAX_ total)",
				"lengthMenu": "_MENU_ Data per halaman",
				"search": "",
				"searchPlaceholder": "Pencarian ..."
			}
		});

		$("#detailModal").modal('show');
	}
</script>
@endsection