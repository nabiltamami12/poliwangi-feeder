@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__keuangan container-fluid">

	<!-- Modal -->
	<div class="modal fade" id="cetakRekapPembayaranModal" tabindex="-1" aria-labelledby="cetakRekapPembayaranModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content padding--medium">
				<h1 class="modal-title text-center my-2">Cetak Rekap Pembayaran Mahasiswa</h1>
				<div class="form-group mt-5">
					<label>Nomor Induk Mahasiswa</label>
					<input type="text" class="form-control" placeholder="1029181931">
				</div>
				<button type="submit" class="btn btn-primary mt-5 w-100 rounded-sm">cetak</button>
			</div>
		</div>
	</div>

	<div class="modal fade" id="importDataModal" tabindex="-1" aria-labelledby="uploadPerjanjianModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content padding--medium">
				<div class="perjanjian_pembayaran">
					<h1 class="modal-title text-center mt-2">Import Pembayaran UKT</h1>
					<p class="mt-5"><a target="_blank" href="{{url('/template/Template Upload UKT.xlsx')}}">Download Template Upload UKT</a></p>
					<div style="cursor: pointer;" class="pilih-file detail_dokumen upload-perjanjian d-flex align-items-center justify-content-between">
						<form>
							<span>
								<i class="iconify mr-2" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
								<input type="file" id="file_ukt" accept=".xlsx, .xls, .csv" hidden />
								<a id="nama_ukt" class="nama_dokumen" target="_blank">No File</a>
							</span>
						</form>
						<button type="button" class="custom-btn">
							<i class="iconify text-primary" data-icon="bx:bx-cloud-upload" data-inline="false"></i>
						</button>
					</div>
				</div>
				<div class="modal_button mt-4-5 d-flex justify-content-between">
					<button type="button" class="btn btn-outline-danger rounded-sm w-100 mr-2 mr-md-3"
						data-dismiss="modal">Batal</button>
					<button type="button" onclick="importDataUKT()" class="btn btn-success rounded-sm w-100 ml-2 ml-md-3">Simpan</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="importCicilanModal" tabindex="-1" aria-labelledby="uploadPerjanjianModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content padding--medium">
				<div class="perjanjian_pembayaran">
					<h1 class="modal-title text-center mt-2">Import Cicilan UKT</h1>
					<p class="mt-5"><a target="_blank" href="{{url('/template/template-upload-cicilan.xlsx')}}">Download Template Upload Cicilan UKT</a></p>
					<div style="cursor: pointer;" class="pilih-file detail_dokumen upload-perjanjian d-flex align-items-center justify-content-between">
						<form>
							<span>
								<i class="iconify mr-2" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
								<input type="file" id="file_cicilan" accept=".xlsx, .xls, .csv" hidden />
								<a id="nama_cicilan" class="nama_dokumen" target="_blank">No File</a>
							</span>
						</form>
						<button type="button" class="custom-btn">
							<i class="iconify text-primary" data-icon="bx:bx-cloud-upload" data-inline="false"></i>
						</button>
					</div>
				</div>
				<div class="modal_button mt-4-5 d-flex justify-content-between">
					<button type="button" class="btn btn-outline-danger rounded-sm w-100 mr-2 mr-md-3"
						data-dismiss="modal">Batal</button>
					<button type="button" onclick="importDataCicilan()" class="btn btn-success rounded-sm w-100 ml-2 ml-md-3">Simpan</button>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow padding--small">
				<div class="card-header p-0">
					<div class="row align-items-center">
						<div class="col-12 col-md-4">
							<h2 class="mb-0 text-center text-md-left">Riwayat Pembayaran</h2>
						</div>
						<div class="col-12 col-md-8 text-center text-md-right">
							{{-- <button type="button" class="btn btn-warning_transparent mt-3 mt-md-0">
								<i class="iconify-inline mr-1" data-icon="bx:bx-filter-alt"></i>
								Filter
							</button> --}}
							<button type="button" onclick="importCicilanModal()" class="btn btn-info_transparent mt-3 mt-md-0 ml-md-2 text-primary">
								<i class="iconify-inline mr-1" data-icon="bx:bx-upload"></i>
								Import Cicilan
							</button>
							<button type="button" onclick="importDataModal()" class="btn btn-info_transparent mt-3 mt-md-0 ml-md-2 text-primary">
								<i class="iconify-inline mr-1" data-icon="bx:bx-upload"></i>
								Import
							</button>
							{{--  <a class="btn btn-success mt-3 mt-md-0" target="_blank" href="{{url('/template/Template Upload UKT.xlsx')}}">
								<i class="iconify-inline mr-1" data-icon="bx:bx-download"></i>
								Template Import UKT
							</a> --}}
							{{-- <div class="dropdown">
								<button class="btn btn-primary dropdown-toggle mt-3 mt-md-0 ml-md-2" type="button"
									id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="iconify-inline mr-1" data-icon="bx:bx-printer"></i>
									<span class="mr-1">Cetak</span>
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<button type="button" class="dropdown-item" data-toggle="modal"
										data-target="#cetakRekapPembayaranModal">Cetak Rekap</button>
								</div>
							</div> --}}
						</div>
					</div>
				</div>
				<hr class="mt-4">

				<div class="table-responsive">
					<table class="table align-items-center table-flush table-borderless table-hover" id="datatable">
						<thead class="table-header">
							<tr>
								<th scope="col" class="text-center">Tanggal</th>
								<th scope="col" class="text-center">NIM</th>
								<th scope="col">Nama</th>
								<th scope="col" class="text-right">Nominal</th>
								<th scope="col" class="text-center">Pembayaran</th>
								<th scope="col">Keterangan</th>
								{{-- <th scope="col" class="text-center">Aksi</th> --}}
							</tr>
						</thead>
						<tbody class="table-body"></tbody>
					</table>
				</div>

			</div>
		</div>
	</div>
</section>
@endsection

@section('js')
<script type="text/javascript">
	dt_url = `${url_api}/keuangan/riwayat-pembayaran`;
	dt_opt = {
		"processing": true,
		"columns": [
			{
				className : 'text-center',
        data: 'created_at',
        render: (data, type, row, meta) => {
        	return moment(data).format('DD MMMM YYYY');
        }
    	},
			{ data: "nrp", className : 'text-center', },
			{ data: "nama", className : 'text-capitalize', },
			{
				className : 'font-weight-bold text-right',
				data: "nominal",
				render: (data, type, row, meta) => {
					return formatAngka(data);
				}
			},
			{	
				className : 'text-center',
				data: null,
				render: (data, type, row, meta) => {
					if (data.kategori === 'UKT') {
						if (data.semester) {
							return data.kategori+' semester '+data.semester;
						}else{
							return data.kategori
						}
					} else {
						return data.kategori;
					}
				}
			},
			{ data: "keterangan", className : 'text-right', },
			// { 
			// 	className : 'text-center',
			// 	data: null,
			// 	render: (data, type, row, meta) => {
			// 		return `
			// 			<i class="iconify edit-icon mr-2" data-icon="bx:bx-edit-alt"></i>
			// 			<i class="iconify delete-icon" data-icon="bx:bx-trash"></i>
			// 		`;
			// 	}
			// }
		]
	};

	inputRiwayat = document.getElementById('file_ukt');
	namaRiwayat = document.getElementById('nama_ukt');
	function importDataModal() {
		$('#importDataModal').modal('show');
	}
	$('#importDataModal .pilih-file').on('click', function(){
		inputRiwayat.click();
	})
	inputRiwayat.addEventListener("change", function () {
		if (inputRiwayat.value) {
			let fileName = inputRiwayat.value.match(/[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/)[0];
			namaRiwayat.innerHTML = fileName;
		} else {
			namaRiwayat.innerHTML = "tidak ada file dipilih";
		}
	});
	function importDataUKT() {
		let file_data = $('#file_ukt').prop('files')[0];   
		let form_data = new FormData();                  
		form_data.append('file', file_data);

		$.ajax({
			url: url_api+"/keuangan/upload-riwayat",
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,                         
			type: 'post',
			success: function(res){
				location.reload()
			}
		});
	}

	inputCicilan = document.getElementById('file_cicilan');
	namaCicilan = document.getElementById('nama_cicilan');
	function importCicilanModal() {
		$('#importCicilanModal').modal('show');
	}
	$('#importCicilanModal .pilih-file').on('click', function(){
		inputCicilan.click();
	})
	inputCicilan.addEventListener("change", function () {
		if (inputCicilan.value) {
			let fileName = inputCicilan.value.match(/[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/)[0];
			namaCicilan.innerHTML = fileName;
		} else {
			namaCicilan.innerHTML = "tidak ada file dipilih";
		}
	});
	function importDataCicilan() {
		let file_data = $('#file_cicilan').prop('files')[0];   
		let form_data = new FormData();                  
		form_data.append('file', file_data);

		$.ajax({
			url: url_api+"/keuangan/upload-riwayat-cicilan",
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,                         
			type: 'post',
			success: function(res){
				location.reload()
			}
		});
	}
</script>
@endsection