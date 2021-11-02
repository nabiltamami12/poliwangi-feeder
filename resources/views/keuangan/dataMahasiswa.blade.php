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
							<select class="form-control select-filter" id="program_studi" name="program_studi">

							</select>
						</div>
						<div class="col-md-4 form-group">
							<label for="kelas">Kelas</label>
							<select class="form-control select-filter" id="kelas" name="kelas">

							</select>
						</div>
						<div class="col-md-4 form-group mt-3 mt-md-0">
							<label for="status-mahasiswa">Status Mahasiswa</label>
							<select class="form-control select-filter" id="status" name="status">

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
		$('.select-filter').on('change',function (e) {
			var url = `${url_api}/pendaftar/mahasiswa?program_studi=${$('#program_studi').val()}&status=${$('#status').val()}&kelas=${$('#kelas').val()}`;
			dt.ajax.url(url).load();
		})
	} );

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
		dt_url = `${url_api}/pendaftar/mahasiswa?program_studi=${$('#program_studi').val()}&status=A&kelas=${$('#kelas').val()}`;
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
					
					var id = data['nomor']
					var status_sudah = `
					
						<span id="btn_${id}" style="cursor:pointer" onclick="func_modal('${data['program_studi']}','${id}','${data['nrp']}','${data['nama']}','${data['prodi']}','${data['ukt_kelompok']}')" data-id="${id}" class="badge btn-info_transparent text-primary">
							<i class="iconify-inline" data-icon="ant-design:setting-outlined"></i>
							<span class="text-capitalize text-primary">Setting</span>
						</span>`

					res = status_sudah;
					return res;
				}
			},
			]
		}
	}
</script>
@endsection