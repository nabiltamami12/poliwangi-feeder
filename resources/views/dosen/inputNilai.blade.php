@extends('layouts.main')

@section('content')
<!-- Header -->
<header class="header"></header>
<style>
.text-range{
	padding-left:3%;
	display:none;
}
.table-body input{
	margin-left: auto;
	margin-right: auto;
}
.input-nilai{
	width: 82px;
}
</style>
<!-- Page content -->
<section class="page-content container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow padding--small">
				<div class="card-header p-0 m-0">
					<div class="row align-items-center">
						<div class="col-lg-5">
							<h3 class="mb-0 text-center text-lg-left font-weight-bold" id="title-page">Nilai Mahasiswa</h3>
						</div>
						<div class="col-12 col-lg-7 text-center text-md-right">
							<button type="button" id="btn_cetak" class="btn btn-icon btn-warning mt-3 mt-md-0">
								<span class="btn-inner--icon"><span class="iconify" data-icon="bx:bx-printer"></span></span>
								<span class="btn-inner--text">Cetak Data</span>
							</button>
							<button type="button" id="btn_publish" class="btn btn-icon btn-secondary mt-3 mt-md-0 ml-0 ml-md-3">
								<span class="btn-inner--icon"><span class="iconify" data-icon="bx:bx-share-alt"></span></span>
								<span class="btn-inner--text">Publish Nilai</span>
							</button>
							<button type="button" id="btn_simpan" class="btn btn-primary mt-3 mt-md-0 ml-0 ml-md-3">
								<span>Simpan</span>
							</button>
						</div>
					</div>
				</div>
				<hr class="my-4">
				<form class="form-select ">
					<div class="form-row">
						<div class="col-md-6 form-group">
							<label for="program-studi">Program Studi</label>
							<select class="form-control" id="prodi">
							</select>
						</div>
						<div class="col-md-6 form-group mt-3 mt-md-0">
							<label for="jenjang">Semester</label>
							<select class="form-control" id="semester">
								<option value="1">Semester Gasal</option>
								<option value="2">Semester Genap</option>
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 form-group mt-3 mt-md-0">
							<label for="kelas">Kelas</label>
							<select class="form-control" id="kelas">
							</select>
						</div>
						<div class="col-md-6 form-group">
							<label for="matakuliah">Mata Kuliah</label>
							<select class="form-control" id="matkul">
								
							</select>
						</div>
					</div>
				</form>

				<hr class="my-4">
				
				<span>
					Konversi Nilai :
					<span class="ml-3" id="list_range">

					</span>
				</span>
				<div class="table-responsive">
					<table class="table align-items-center table-flush table-borderless table-hover mt-4">
						<thead class="table-body">
							<tr id="table-persentase">
								<td colspan="3" class="font-weight-bold">
									Setting Persentase
									<input type="hidden" id="id_persentase" name="id">
								</td>
								<td class="text-center px-3 input-nilai">
									<input type="text" class="form-control persentase-count" placeholder="0" id="persentase_uts" >
								</td>
								<td class="text-center px-3 input-nilai">
									<input type="text" class="form-control persentase-count" placeholder="0" id="persentase_uas" >
								</td>
								<td class="text-center px-3 input-nilai">
									<input type="text" class="form-control persentase-count" placeholder="0" id="persentase_tugas" >
								</td>
								<td class="text-center px-3 input-nilai">
									<input type="text" class="form-control persentase-count" placeholder="0" id="persentase_kuis" >
								</td>
								<td class="text-center px-3 input-nilai">
									<input type="text" class="form-control persentase-count" placeholder="0" id="persentase_kehadiran">
								</td>
								<td class="text-center px-3 input-nilai">
									<input type="text" class="form-control persentase-count" placeholder="0" id="persentase_praktikum" >
								</td>
								<td class="text-center px-3 input-nilai">
									<input type="text" class="form-control persentase-count" placeholder="0%" id="total_persentase"  disabled>
								</td>
								<td class="input-nilai"></td>
								<td class="input-nilai"></td>
								<td class="input-nilai"></td>
								<td class="input-nilai"></td>
							</tr>
						</thead>
						<thead class="table-header">
							
						</thead>
						
						<tbody class="table-body list-nilai" id="table-nilai-list">

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="keteranganModal" tabindex="-1" aria-labelledby="keteranganModalLabel"
    aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content p-0 padding--medium">
			<div class="modal-header">
				<p class="text-center">
					<h5 class="modal-title text-warning text-center">Keterangan</h5>
				</p>
			</div>
			<div class="modal-body">
			<input type="hidden" id="keterangan_index">
			<textarea class="form-control mb-5" id="keterangan_modal"></textarea>
			<div class="row">
				<div class="col-md-6">
					<button type="button" class="btn btn-modal-cancel w-100" data-dismiss="modal">Batal</button>
				</div>
				<div class="col-md-6">
					<button type="button" class="btn btn-primary w-100" onclick="func_simpan_ket()">Simpan</button>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
</section>
@endsection

@section('js')
<script>
	var dataFilter, countData, id_dosen, range;
	var searchParams = new URLSearchParams(window.location.search);
	var id_dosen = searchParams.get('nim') ? null : dataGlobal['user']['nomor'];
	var nama = dataGlobal['user']['nama'];

	$(document).ready(function() {
		getFilter(id_dosen);

		$('#prodi').on('change',function (e) {
			var program_studi = $(this).val()
			var semester = $('#semester').val()
			getKelas(program_studi,semester)

			$('.table-header').html('')
			$('.list-nilai').html('')
			return true;
		})
		$('#semester').on('change',function (e) {
			var semester = $(this).val();
			var program_studi = $('#prodi').val();
			getKelas(program_studi,semester);

			$('.table-header').html('')
			$('.list-nilai').html('')
			return true;
		})
		$('#matkul').on('change',function (e) {
			$('.table-header').html('')
			$('.list-nilai').html('')
			var id_kelas = $('#kelas').val()
			var matakuliah = $('#matkul').val()

			let uri = url_api+"/nilai?kelas="+id_kelas+"&matakuliah="+matakuliah
			if (searchParams.get('tahun')) uri += `&tahun=${searchParams.get('tahun')}`;
			$.ajax({
				url: uri,
				type: 'get',
				dataType: 'json',
				data: {},
				success: function(res) {
					var data = res.data.data;
					range = res.data.range_nilai;
					var persentase = res.data.persentase_nilai;
					if (res.status=="success") {
						setSiswa(data);
						setPersentase(res.data.persentase_nilai);
						persen_nilai();
						let html = '';
						$.each(range,function (key,row) {
							html += `
							<span class="font-weight-bold text-danger ml-1">
							${row.nh} = ${row.na}-${row.na_atas}${(key+1) < range.length ? ',' : ''} 
							</span>`;
						})
						$('#list_range').html(html);
						$.each(persentase,function (key,row) {
							$('#'+key).val(row)
						})
					} else {
						// alert gagal
					}

				}
			})
		})
		$('#kelas').on('change',function (e) {
			var kelas = $(this).val()
			var kelas = $.grep(dataFilter['matakuliah'], function(e){ return e.kelas == kelas; });

			$('#matkul').html('')
			var optMatkul = `<option value=""> - </option>`;
			$.each(kelas,function (key,row) {
				optMatkul += `<option value="${row.nomor}">${row.matakuliah}</option>`
			})
			$('#matkul').append(optMatkul)
		})

		$('#btn_setting').on('click',function (e) {
			$('#settingModal').modal('show')
		})

		$('#btn_cetak').on('click',function (e) {
			var id_kelas = $('#kelas').val()
			var matakuliah = $('#matkul').val()

			var arr = {
				'semester' : $('#semester').val(),
				'prodi' : $('#prodi :selected').text(),
				'kelas' : $('#kelas :selected').text(),
				'id_kelas' : id_kelas,
				'matakuliah' : $('#matkul :selected').text(),
				'id_matakuliah' : matakuliah,
				'dosen' : nama,
				'tahun' : searchParams.get('tahun') || new Date().getFullYear()
			}
			localStorage.setItem('cetak-eval', JSON.stringify(arr));
			window.open(`{{url('dosen/cetak-evaluasi-nilai')}}?${$.param(arr)}`,'_blank');
		})

		$('#btn_publish').on('click',function (e) {
			var dataSimpan = [];
			for (let index = 1; index <= countData; index++) {
				var arr = {
					'nomor' : $('#id_nilai_'+index).val(),
					'is_published' : 1,
					'publisher' : id_dosen,
				}
				dataSimpan.push(arr)
			}
			$.ajax({
				url: url_api+"/nilai/publish",
				type: 'put',
				dataType: 'json',
				data: {"data":dataSimpan},
				success: function(res) {
					if (res.status=="success") {
					} else {
							// alert gagal
						}

					}
				});
		})
		$('#btn_simpan').on('click',function (e) {
			var dataSimpan = [];
			for (let index = 1; index <= countData; index++) {
				var arr = {
					'nomor' : $('#id_nilai_'+index).val(),
					'kuliah' : $('#id_kuliah_'+index).val(),
					'mahasiswa' : $('#id_mahasiswa_'+index).val(),
					'quis1' : $('#uts_'+index).val(),
					'quis2' : $('#uas_'+index).val(),
					'tugas' : $('#tugas_'+index).val(),
					// 'ujian' : $('#ujian_'+index).val(),
					'na' : $('#na_'+index).val(),
					// 'her' : $('#her_'+index).val(),
					'nh' : $('#nh_'+index).val(),
					'keterangan' : $('#keterangan_'+index).val(),
					'nhu' : $('#nhu_'+index).val(),
					// 'nsp' : $('#nsp_'+index).val(),
					'kuis' : $('#kuis_'+index).val(),
					'praktikum' : $('#praktikum_'+index).val(),
				}
				dataSimpan.push(arr)
			}
			$.ajax({
				url: url_api+"/nilai",
				type: 'post',
				dataType: 'json',
				data: {"data":dataSimpan},
				success: function(res) {
					if (res.status=="success") {
					} else {
						// alert gagal
					}
				}
			});
		})

		set_edit();

	});

function setSiswa(data) {
	var html = '';
	$('.table-header').html('')
	$('.list-nilai').html('')
	$('.table-header').append(`<tr>
		<th scope="col" class="text-center pl-2 pr-0">No</th>
		<th scope="col" class="text-center px-3">NIM</th>
		<th scope="col" class="pl-1" style="width: 15%">Nama</th>
		<th scope="col" class="text-center px-1">UTS</th>
		<th scope="col" class="text-center px-1">UAS</th>
		<th scope="col" class="text-center px-1">Tugas</th>
		<th scope="col" class="text-center px-1">Kuis</th>
		<th scope="col" class="text-center px-1">Kehadiran</th>
		<th scope="col" class="text-center px-1">Praktikum</th>
		<th scope="col" class="text-center px-1">NA</th>
		<th scope="col" class="text-center px-1">UP</th>
		<th scope="col" class="text-center px-1">NHU</th>
		<th scope="col" class="text-center px-1">NH</th>
		<th scope="col" class="text-center px-2">Keterangan</th>
		</tr>`)
	var i = 0;
	$.each(data,function (key,row) {
		if (row.nomor==null) {
			var id_nilai = 0;
		}else{
			var id_nilai = row.nomor;
		}
		i++;
		html = `<tr>
		<td class="text-center pl-2 pr-0">
			${i}
			<input type="hidden" id="id_mahasiswa_${i}" value="${row.id_mahasiswa}">
			<input type="hidden" id="id_kuliah_${i}" value="${row.id_kuliah}">
			<input type="hidden" id="id_nilai_${i}" value="${row.nomor}">
		</td>
		<td class="text-center px-3">${row.nim}</td>
		<td class="font-weight-bold text-capitalize pl-1">${row.nama}</td>
		<td class="text-center px-3">
			<input type="text" class="form-control" onkeyup="persen_nilai()" id="uts_${i}" value="${row.quis1}">
		</td>
		<td class="text-center px-3">
			<input type="text" class="form-control" onkeyup="persen_nilai()" id="uas_${i}" value="${row.quis2}">
		</td>
		<td class="text-center px-3">
			<input type="text" class="form-control" onkeyup="persen_nilai()" id="tugas_${i}" value="${row.tugas}">
		</td>
		<td class="text-center px-3">
			<input type="text" class="form-control" onkeyup="persen_nilai()" id="kuis_${i}" value="${row.kuis}">
		</td>
		<td class="text-center px-3">
			<input type="text" class="form-control" onkeyup="persen_nilai()" id="kehadiran_${i}" disabled>
		</td>
		<td class="text-center px-3">
			<input type="text" class="form-control" onkeyup="persen_nilai()" id="praktikum_${i}" value="${row.praktikum}">
		</td>
		<td class="text-center px-3">
			<input type="text" class="form-control" id="na_${i}" value="${row.na}" disabled>
		</td>
		<td class="text-center px-3">
			<input type="text" class="form-control" id="up_${i}" value="${row.her}" disabled>
		</td>
		<td class="text-center px-3">
			<input type="text" class="form-control" id="nhu_${i}" value="${row.nhu}" disabled>
		</td>
		<td class="text-center px-3">
			<input type="text" class="form-control" id="nh_${i}" value="${row.nh}" disabled>
		</td>
		<td class="text-center px-3">
			<input type="text" class="form-control" id="keterangan_${i}" data-index="${i}" onclick="func_modal(this)" value="${row.keterangan}">
		</td>
		</tr>`
		$('.list-nilai').append(html)
	})
	$('.text-range').css('display','block')
	$('#btn_setting').attr('hidden','false')
	countData = i;
	return true;
}

function func_modal(e) {
	$('#keterangan_index').text($(e).data('index'))
	$('#keterangan_modal').text($(e).val())
	$('#keteranganModal').modal('show')
}

function func_simpan_ket() {
	var index = $("#keterangan_index").text();
	var keterangan = $("#keterangan_modal").val();

	$('#keterangan_'+index).val(keterangan);
	$('#keteranganModal').modal('hide')
}

function setPersentase(obj_persentase) {
	if(!obj_persentase) return false;
	for(const i in obj_persentase){
		if(i==='id') $('#table-persentase input#id_persentase').val(obj_persentase[i]);
		else if(i==='total') $('#table-persentase input#total_persentase').val(obj_persentase[i]);
		else $('#table-persentase input#'+i).val(obj_persentase[i]);
	}
	return true;
}

$('.persentase-count').on('keyup',function (e) {
	countPersentase(this)
})
$('.persentase-count').on('change',function (e) {
	var dataPersentase = {
		'id' : $('#id_persentase').val(),
		'matakuliah' : $('#matkul').val(),
		'persentase_uts' : $('#persentase_uts').val(),
		'persentase_uas' : $('#persentase_uas').val(),
		'persentase_tugas' : $('#persentase_tugas').val(),
		'persentase_kuis' : $('#persentase_kuis').val(),
		'persentase_kehadiran' : $('#persentase_kehadiran').val(),
		'persentase_praktikum' : $('#persentase_praktikum').val(),
		'total' : $('#total_persentase').val(),
		'dosen' : id_dosen,
	}
	$.ajax({
		url: url_api+"/persentase-nilai",
		type: 'post',
		dataType: 'json',
		data: dataPersentase,
		success: function(res) {
			if (res.status=="success") {
				persen_nilai();
			} else {
						// alert gagal
					}

				}
			});
})

function countPersentase(e) {
	
	var persentase_uts = $('#persentase_uts').val()
	var persentase_uas = $('#persentase_uas').val()
	var persentase_tugas = $('#persentase_tugas').val()
	var persentase_kuis = $('#persentase_kuis').val()
	var persentase_kehadiran = $('#persentase_kehadiran').val()
	var persentase_praktikum = $('#persentase_praktikum').val()
	var total = Number(persentase_uts)+Number(persentase_uas)+Number(persentase_tugas)+Number(persentase_kuis)+Number(persentase_kehadiran)+Number(persentase_praktikum)
	$('#total_persentase').val(total)
	if (total>100) {
		$(e).val("");
		$('#total_persentase').val("");
	}
}

function getKelas(prodi,semester) {
	var kelas = $.grep(dataFilter['kelas'], function(e){ return e.program_studi == prodi; });
	$('#kelas').html('')
	var optKelas = `<option value=""> - </option>`;
	$.each(kelas,function (key,row) {
		optKelas += `<option value="${row.nomor}">${row.kode}</option>`;
	});
	$('#kelas').append(optKelas);
	return true;
}
async function getFilter(id_dosen) {
	var semester = $('#semester').val()
	$.ajax({
		url: url_api+"/dosen/filter/"+id_dosen+"/"+semester,
		type: 'get',
		dataType: 'json',
		data: {},
		success: function(res) {
			if (res.status=="success") {
				var data = res['data'];
				dataFilter = data;
				$('#prodi').html('')              
				var optProdi = `<option value=""> - </option>`;
				$.each(data['prodi'],function (key,row) {
					optProdi += `<option value="${row.nomor}">${row.nama_program} ${row.program_studi}</option>`
				})
				$('#prodi').append(optProdi)
			} else {
						// alert gagal
					}
					return true;
				}
			});
}

function set_edit(){
	if(!searchParams.get('nim')) return;
	$('#title-page').text(`Nilai Mahasiswa Tahun ${searchParams.get('tahun')}`)

	$.ajax({
		url: "{{url('api/v1/nilai/get-nim')}}",
		type: 'get',
		dataType: 'json',
		data: {
			nim: searchParams.get('nim'),
			
		},
		success: function(res) {
			if (res.status=="success") {
				let semester = searchParams.get('semester');
				let prodi = res.data.program_studi;
				$('#prodi').val(prodi).trigger("change");
				$('#semester').val(semester).trigger("change");
				$('#kelas').val(searchParams.get('kelas')).trigger("change");
				$('#matkul').val(searchParams.get('matkul')).trigger("change");
			} else {
				alert('Silahkan cek ulang program studi mahasiswa.')
			}

		}
	});
}

function persen_nilai() {
	const arr_item = ['uts', 'uas', 'tugas', 'kuis', 'kehadiran', 'praktikum'];
	$('#table-nilai-list tr').each(function(key, row){
		const k = (key+1)
		let _na = 0;
		for(const i of arr_item){
			const init_persen = Number($('#persentase_'+i).val());
			const value_nilai = Number($('#'+i+'_'+k).val());
			_na += (init_persen * value_nilai / 100);
		}
		
		// set nilai yang lain
		for(const i of range){
			if(_na >= Number(i.na) && _na <= Number(i.na_atas)){
				$('#nh_'+k).val(i.nh);
			}
			const val_up = $('#up_'+k).val();
			let _up = Number(val_up);
			_up = (val_up === '' || val_up === null || val_up < 1 )  ? _na : _up;
			if(_up >= Number(i.na) && _up <= Number(i.na_atas)){
				$('#nhu_'+k).val(i.nh);	
			}
		}

		$('#na_'+k).val(round(_na, 2));
	});
	return true;
}
</script>
@endsection