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
						<div class="col-md-4 form-group mt-3 mt-md-0">
							<label for="status-mahasiswa">Status Mahasiswa</label>
							<select class="form-control select-filter" id="status" name="status" onchange="reset_filter(['program_studi','angkatan', 'kelas']);get_prodi();">

							</select>
						</div>
						<div class="col-md-4 form-group">
							<label for="jenjang-pendidikan">Jenjang Pendidikan</label>
							<select class="form-control select-filter" disabled id="program_studi" name="program_studi" onchange="reset_filter(['angkatan', 'kelas']);get_angkatan();">
								<option value=""> - </option>
							</select>
						</div>
						<div class="col-md-2 form-group">
							<label for="jenjang-pendidikan">Angkatan</label>
							<select class="form-control select-filter" disabled id="angkatan" name="angkatan" onchange="reset_filter(['kelas']);get_kelas();">
								<option value=""> - </option>
							</select>
						</div>
						<div class="col-md-2 form-group">
							<label for="kelas">Kelas</label>
							<select class="form-control select-filter" disabled id="kelas" name="kelas">
								<option value=""> - </option>
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
								<th scope="col">NIM</th>
								<th scope="col">Nama</th>
								<th scope="col" class="align-right">UKT</th>
								<th scope="col" class="text-center">No. Telp</th>
								<th scope="col" class="text-center">Email</th>
								<th scope="col" class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody class="table-body"></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<div class="modal fade" id="konfirmModal" tabindex="-1" aria-labelledby="konfirmModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content p-0 padding--medium">
			<input type="hidden" id="id_delete">
			<input type="hidden" id="endpoint">

			<div class="modal-header">
				<p class="text-center">
					<h5 class="modal-title text-warning text-center">Detail Pendaftar</h5>
				</p>
			</div>
			<div class="modal-body">
			<input type="hidden" id="id_mahasiswa">
				<h4 class="mb-0 mb-2" id="prodi">NIM Mahasiswa</h4>
				<h5 class="mb-0 mb-3" id="nomor_mahasiswa" style="font-weight:400;">201231248</h5>
				<h4 class="mb-0 mb-2" id="prodi">Nama Mahasiswa</h4>
				<h5 class="mb-0 mb-3" id="nama_mahasiswa" style="font-weight:400;">201231248</h5>
				<h4 class="mb-0 mb-2" id="prodi">Program Studi Mahasiswa</h4>
				<h5 class="mb-0 mb-3" id="prodi_mahasiswa" style="font-weight:400;">201231248</h5>
				<h4 class="mb-0 mb-2" id="prodi">Biaya SPI</h4>
				<h5 class="mb-0 mb-3" id="spi_mahasiswa" style="font-weight:400;">201231248</h5>
				<h4 class="mb-0 mb-2" id="prodi">Kelompok UKT</h4>
				<select class="form-control mb-3" id="kelompok_ukt" name="kelompok_ukt">

				</select>
				<div class="row">
					<div class="col-md-6">
						<button type="button" class="btn btn-modal-cancel w-100" data-dismiss="modal">Batal</button>
					</div>
					<div class="col-md-6">
						<button type="button" class="btn btn-primary w-100" onclick="func_simpan()">Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="rangkumanModal" tabindex="-1" aria-labelledby="rangkumanModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content p-0 padding--medium">
			<input type="hidden" id="id_delete">
			<input type="hidden" id="endpoint">

			<div class="modal-header">
				<p class="text-center">
					<h5 class="modal-title text-warning text-center">Rangkuman Pembayaran</h5>
				</p>
			</div>
			<div class="modal-body">
			<input type="hidden" id="id_mahasiswa">
				<h4 class="mb-0 mb-2">NIM Mahasiswa</h4>
				<h5 class="mb-0 mb-3 nomor_mahasiswa" style="font-weight:400;">201231248</h5>
				<h4 class="mb-0 mb-2">Nama Mahasiswa</h4>
				<h5 class="mb-0 mb-3 nama_mahasiswa" style="font-weight:400;">201231248</h5>
				<h4 class="mb-0 mb-2">Program Studi Mahasiswa</h4>
				<h5 class="mb-0 mb-3 prodi_mahasiswa" style="font-weight:400;">201231248</h5>
				<table class="table">
					<thead>
						<tr>
							<th>Semester</th><th>Nominal</th><th>Tanggal</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
				<div class="row">
					<div class="col-md-12">
						<button type="button" class="btn btn-modal-cancel" data-dismiss="modal">Tutup</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<script>
	var f_status = document.getElementById('status');
	var f_prodi = document.getElementById('program_studi');
	var f_angkatan = document.getElementById('angkatan');
	var f_kelas = document.getElementById('kelas');
	$(document).ready(function() {
		// set status option
		let optStatus;
		$.each(dataGlobal['status'],function (key,row) {
			optStatus += `<option value="${row.kode}">${row.status} - ${row.jenis}</option>`
		})
		$('#status').append(optStatus);

		get_prodi();
		setDatatable();

		$('.select-filter').on('change',function (e) {
			var url = `${url_api}/keuangan/atur-mahasiswa?status=${f_status.value}&program_studi=${f_prodi.value}&angkatan=${f_angkatan.value}&kelas=${f_kelas.value}`;
			dt.ajax.url(url).load();
		})
	});

	function func_centang(e,id_selected,poltek) {
		$('.centang-pilihan').removeClass('text-success')
		$('.centang-pilihan').addClass('text-placeholder')
		$(e).find('.centang-pilihan').removeClass('text-placeholder')
		$(e).find('.centang-pilihan').addClass('text-success')
		prodi_selected = id_selected;
		poltek_selected = poltek;
	}
	function func_modal(id_prodi,id_mahasiswa,nim,nama,prodi,ukt_kelompok) {
		$.ajax({
			url: url_api+"/keuangan/detail?program_studi="+id_prodi,
			type: 'get',
			dataType: 'json',
			data: {},
			headers: {},
			success: function(res) {
				if (res.status=="success") {
					$('#id_mahasiswa').val(id_mahasiswa);
					$('#nama_mahasiswa').text(nama);
					$('#nomor_mahasiswa').text(nim);
					$('#prodi_mahasiswa').text(prodi);
					$('#spi_mahasiswa').text(formatAngka(res.data[0].spi));
					$('#kelompok_ukt').html('');
					var html = `
						<option data-nominal="${res.data[0].kelompok_1}" value="1">Kelompok 1 - ${formatAngka(res.data[0].kelompok_1)}</option>
						<option data-nominal="${res.data[0].kelompok_2}" value="2">Kelompok 2 - ${formatAngka(res.data[0].kelompok_2)}</option>
						<option data-nominal="${res.data[0].kelompok_3}" value="3">Kelompok 3 - ${formatAngka(res.data[0].kelompok_3)}</option>
						<option data-nominal="${res.data[0].kelompok_4}" value="4">Kelompok 4 - ${formatAngka(res.data[0].kelompok_4)}</option>
						<option data-nominal="${res.data[0].kelompok_5}" value="5">Kelompok 5 - ${formatAngka(res.data[0].kelompok_5)}</option>
						<option data-nominal="${res.data[0].kelompok_6}" value="6">Kelompok 6 - ${formatAngka(res.data[0].kelompok_6)}</option>
						<option data-nominal="${res.data[0].kelompok_7}" value="7">Kelompok 7 - ${formatAngka(res.data[0].kelompok_7)}</option>
						<option data-nominal="${res.data[0].kelompok_8}" value="8">Kelompok 8 - ${formatAngka(res.data[0].kelompok_8)}</option>
					`
					$('#kelompok_ukt').append(html);
						// console.log(index+" == "+res.data.pendaftar.program_studi)
						// if (index==res.data.pendaftar.program_studi) {
						// 	console.log("sama")
						// 	$('#centang_'+row.id).removeClass('text-placeholder');
						// 	$('#centang_'+row.id).addClass('text-success');
						// }
					
				}
				$('#konfirmModal').modal('show')
			}
		});
	}

	function rangkuman_modal(id_mahasiswa,nim,nama,prodi) {
		$.ajax({
			url: url_api+"/keuangan/rangkuman/"+id_mahasiswa,
			type: 'get',
			dataType: 'json',
			data: {},
			headers: {},
			success: function(res) {
				if (res.status=="success") {	
					$('#rangkumanModal .nama_mahasiswa').text(nama)
					$('#rangkumanModal .nomor_mahasiswa').text(nim)
					$('#rangkumanModal .prodi_mahasiswa').text(prodi)
					for (var i = res.data.length - 1; i >= 0; i--) {
						$('#rangkumanModal table tbody').append('<tr><td>'+res.data[i].semester+'</td><td>'+formatAngka(res.data[i].nominal)+'</td><td>'+formatTanggal(res.data[i].created_at)+'</td></tr>')	
					}
				}
				$('#rangkumanModal').modal('show')
			}
		});
	}

	function func_simpan() {
		var id_mahasiswa = $('#id_mahasiswa').val()
		var kelompok_ukt = $('#kelompok_ukt').val()
		var ukt = $('#kelompok_ukt :selected').data('nominal')

		$.ajax({
			url: url_api+"/keuangan/set-ukt/"+id_mahasiswa,
			type: 'put',
			dataType: 'json',
			data: {'kelompok_ukt':kelompok_ukt,'ukt':ukt},
			success: function(res) {
				console.log(res)
				if (res.status=="success") {
					$('#konfirmModal').modal('hide');
				} else {
					// alert gagal
				}
			}
		});
	}
	function setDatatable() {
		dt_type = 'post'
		dt_url = `${url_api}/keuangan/atur-mahasiswa?status=${f_status.value}&program_studi=${f_prodi.value}&angkatan=${f_angkatan.value}&kelas=${f_kelas.value}`;
		dt_opt = {
			serverSide: true,
			order: [[0, 'desc']],
			columnDefs: [{
				"render": function (data, type, row) {
					return formatAngka(data);
				},
				"targets": [3]
			}]
		};
		load_datatable();
	}
	function get_prodi() {
		$.ajax({
			url: url_api + `/prodi-mahasiswa?status=${f_status.value}`,
			type: 'get',
			dataType: 'json',
			success: function(res) {
				if (res.status == "success") {
					let optProdi = `<option value=""> - </option>`;
					$.each(res.data,function (key,row) {
						optProdi += `<option value="${row.program_studi}">${row.program} ${row.jurusan}</option>`
					})
					$('#program_studi').html(optProdi)
					f_prodi.disabled = false;
				}
				return true;
			}
		});
		return true;
	}
	function get_angkatan() {
		$.ajax({
			url: url_api + `/mahasiswa-angkatan?status=${f_status.value}&program_studi=${f_prodi.value}`,
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
	function get_kelas() {
		$.ajax({
			url: url_api + `/mahasiswa-kelas?status=${f_status.value}&program_studi=${f_prodi.value}&angkatan=${f_angkatan.value}`,
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