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
							<button type="button" id="btn_simpan" class="btn btn-primary mt-3 mt-md-0 ml-0 ml-md-3">
								<span>Simpan</span>
							</button>
						</div>
					</div>
				</div>
				<hr class="my-4">
				<form class="form-select ">
					<div class="form-row">
						<div class="col-md-4 form-group">
							<label for="program-studi">Program Studi</label>
							<div id="info-program-studi">...</div>
						</div>
						<div class="col-md-4 form-group">
							<label for="matakuliah">Mata Kuliah</label>
							<div id="info-matakuliah">...</div>
						</div>
						<div class="col-md-4 form-group mt-3 mt-md-0">
							<label for="kelas">Kelas</label>
							<div id="info-kelas">...</div>
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
								<td class="text-center px-3">
									<input type="text" class="form-control persentase-count" placeholder="0" id="persentase_uts" >
								</td>
								<td class="text-center px-3">
									<input type="text" class="form-control persentase-count" placeholder="0" id="persentase_uas" >
								</td>
								<td class="text-center px-3">
									<input type="text" class="form-control persentase-count" placeholder="0" id="persentase_tugas" >
								</td>
								<td class="text-center px-3">
									<input type="text" class="form-control persentase-count" placeholder="0" id="persentase_kuis" >
								</td>
								<td class="text-center px-3">
									<input type="text" class="form-control persentase-count" placeholder="0" id="persentase_kehadiran">
								</td>
								<td class="text-center px-3">
									<input type="text" class="form-control persentase-count" placeholder="0" id="persentase_praktikum" >
								</td>
								<td class="text-center px-3">
									<input type="text" class="form-control persentase-count" placeholder="0%" id="total_persentase"  disabled>
								</td>
								<td colspan="4"></td>
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
</section>
@endsection

@section('js')
<script>
var countData, range;
var searchParams = new URLSearchParams(window.location.search);

$(document).ready(function() {
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
			<input type="text" class="form-control" id="keterangan_${i}" value="${row.keterangan}">
		</td>
		</tr>`
		$('.list-nilai').append(html)
	})
	$('.text-range').css('display','block')
	$('#btn_setting').attr('hidden','false')
	countData = i;
	return true;
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
		'total' : $('#total_persentase').val()
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

function set_edit(){
	if(!searchParams.get('nomor_nilai')) return;
	$('#title-page').text(`Nilai Mahasiswa Tahun ${searchParams.get('tahun')}`)
	$.ajax({
		url: "{{url('api/v1/nilai/get-nim')}}",
		type: 'get',
		dataType: 'json',
		data: { nomor_nilai: searchParams.get('nomor_nilai') },
		success: function(res) {
			if (res.status=="success") {
				$('#info-program-studi').text(res.data.program_studi);
				$('#info-kelas').text(res.data.kelas);
				$('#info-matakuliah').text(res.data.matakuliah);
				setSiswa(res.data.nilai);
				setPersentase(res.data.persentase);
				range = res.data.range;
				$.each(range,function (key,row) {
					var html = `
						<span class="font-weight-bold text-danger ml-1">
							${row.nh} = ${row.na}-${row.na_atas}${(key+1) < range.length ? ',' : ''} 
						</span>`;
					$('#list_range').append(html);
				})
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