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
						<div class="col-12 col-md-3 offset-md-3 text-center text-md-right mt-3 mt-md-0">
              <button type="button" onclick="cetak()" class="btn btn-warning">
                <i class="iconify-inline mr-1" data-icon="bx:bx-printer"></i>
                Cetak Data
              </button>
            </div>
					</div>
				</div>
				<hr class="my-4 mt">
				<form class="form-select rounded-0">
					<div class="form-row">
						<div class="col-md-12 form-group mt-3 mt-md-0">
							<label for="status-mahasiswa">Status Mahasiswa</label>
							<select class="form-control" id="status" name="status" onchange="reset_filter(['program','jurusan', 'angkatan']);get_program();"></select>
						</div>
						<div class="col-md-4 form-group">
							<label for="jenjang-pendidikan">Jenjang Pendidikan</label>
							<select class="form-control" disabled id="program" name="program" onchange="reset_filter(['jurusan', 'angkatan']);get_jurusan();">
								<option value=""> - </option>
							</select>
						</div>
						<div class="col-md-4 form-group">
							<label for="jenjang-pendidikan">Jurusan</label>
							<select class="form-control" disabled id="jurusan" name="jurusan" onchange="reset_filter(['angkatan']);get_angkatan();">
								<option value=""> - </option>
							</select>
						</div>
						<div class="col-md-4 form-group">
							<label for="jenjang-pendidikan">Angkatan</label>
							<select class="form-control" disabled id="angkatan" name="angkatan">
								<option value=""> - </option>
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
	var f_status = document.getElementById('status');
	var f_program = document.getElementById('program');
	var f_jurusan = document.getElementById('jurusan');
	var f_angkatan = document.getElementById('angkatan');
	$(document).ready(function() {
		// set status option
		let optStatus = '';
		$.each(dataGlobal['status'],function (key,row) {
			optStatus += `<option value="${row.kode}">${row.status} - ${row.jenis}</option>`
		})
		$('#status').html(optStatus);

		get_program();
		setDatatable();
	});
	function cari_btn() {
		var url = `${url_api}/mahasiswa-lama?${where()}`;    
		dt.ajax.url(url).load();
	}
	function get_program() {
		$.ajax({
			url: url_api + `/program-mahasiswa?${where()}`,
			type: 'get',
			dataType: 'json',
			success: function(res) {
				if (res.status == "success") {
					let optProgram = `<option value=""> - </option>`;
					$.each(res.data,function (key,row) {
						optProgram += `<option value="${row.nomor}">${row.program} </option>`
					})
					$('#program').html(optProgram)
					f_program.disabled = false;
				}
				return true;
			}
		});
		return true;
	}
	function get_jurusan() {
		$.ajax({
			url: url_api + `/jurusan-mahasiswa?${where()}`,
			type: 'get',
			dataType: 'json',
			success: function(res) {
				if (res.status == "success") {
					let optJurusan = `<option value=""> - </option>`;
					$.each(res.data,function (key,row) {
						optJurusan += `<option value="${row.nomor}">${row.jurusan} </option>`
					})
					$('#jurusan').html(optJurusan);
					f_jurusan.disabled = false;
				}
				return true;
			}
		});
		return true;
	}
	function get_angkatan() {
		$.ajax({
			url: url_api + `/mahasiswa-angkatan?${where()}`,
			type: 'get',
			dataType: 'json',
			success: function(res) {
				if (res.status == "success") {
					let optAngkatan = `<option value=""> - </option>`;
					$.each(res.data,function (key,row) {
						optAngkatan += `<option value="${row.angkatan}">${row.angkatan} </option>`
					})
					$('#angkatan').html(optAngkatan);
					f_angkatan.disabled = false;
				}
				return true;
			}
		});
		return true;
	}
	function setDatatable() {
		dt_url = `${url_api}/mahasiswa-lama?${where()}`;
		dt_opt = {
			serverSide: true,
			order: [[0, 'desc']]
		}
		load_datatable();
	}
	function where(){
		return `status=${f_status.value}&program=${f_program.value}&jurusan=${f_jurusan.value}&angkatan=${f_angkatan.value}`
	};
	function reset_filter(opt){
		for(const i of opt){
			let obj = document.getElementById(i);
			obj.disabled = true;
			obj.selectedIndex = 0;
		}
	}
	function cetak() {
		window.open(url_api+"/mahasiswa-export?"+where(),'_blank');
	}
</script>
@endsection