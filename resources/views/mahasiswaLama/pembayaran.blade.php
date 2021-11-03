@extends('layouts.main')

@section('content')
<style type="text/css">
	.lunas, .belum-lunas{
		display: none;
	}
</style>
<script type="text/javascript">
	var form_data = new FormData();
	form_data.append('id_mahasiswa', id_mahasiswa)
	$.ajax({
		url: url_api+"/keuangan/tagihan-mahasiswa",
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,                         
		type: 'post',
		beforeSend: function(text) {
			// loading('show')
		},
		success: function(res){
			if (res.data.nomor_va) {
				$('.generate-va').prop('disabled', true)
			}
			if (res.data.tipe == 'cicilan') {
				$('.tipe').text('Cicilan')
				$('.jatuh-tempo').text('Tanggal Jatuh Tempo')
				$('#bulan-pembayaran').val(res.data.tanggal)
				$('#total-tagihan').val(formatAngka(res.data.nominal))
				$('#va-aktif').val(res.data.nomor_va)
				$('.nomor_va').text(res.data.nomor_va)
				$('.belum-lunas').show()
			}else if(res.data.tipe == 'ukt'){
				$('#total-tagihan').val(formatAngka(res.data.nominal))
				$('#va-aktif').val(res.data.nomor_va)
				$('.nomor_va').text(res.data.nomor_va)
				$('.belum-lunas').show()
			}else{
				$('.lunas').show()
			}
			// console.log(res)
			// location.reload()
			// loading('hide')
		}
	});
</script>
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow padding--medium">
				<div class="card-header p-0 pt-3">
					<div class="row">
						<div class="col">
							<h3 class="mb-0 font-weight-bold">Pembayaran <span class="tipe"></span></h3>
						</div>
					</div>
				</div>
				<hr class="my-4">
				<div class="card-body p-0 lunas">
					Lunas
				</div>
				<div class="card-body p-0 belum-lunas">
					<div class="rincian_pembayaran">
						<div class="row">
							<div class="col-12 col-md-6 pr-auto pr-md-1">
								<div class="form-group">
									<label for="bulan-pembayaran" class="jatuh-tempo">Pembayaran</label>
									<input type="text" class="form-control pl-2" id="bulan-pembayaran" value="UKT" disabled>
								</div>
							</div>
							<div class="col-12 col-md-6 pl-auto pl-md-1 mt-3 mt-md-0">
								<div class="form-group">
									<label for="total-tagihan">Total Tagihan</label>
									<input type="text" class="form-control pr-2 text-right" id="total-tagihan" value=""
									disabled>
								</div>
							</div>
						</div>
					</div>
					<button type="button" class="btn btn-primary w-100 mt-4 generate-va" onclick="javascript:generateVA()">Generate VA Pembayaran</button>
					<hr class="mt-4">
					<div class="va_aktif">
						<div class="form-group">
							<label class="mt-4-5">VA Aktif Saat Ini</label>
							<div class="field_kode mt-2">
								<input type="text" class="form-control pl-2" id="va-aktif" value="1281928746273601" readonly>
								<button class="salin_kode btn btn-primary">Salin Kode</button>
							</div>
						</div>
					</div>

					<div class="informasi_pembayaran">
						<div class="instruksi_pembayaran mt-4-5">
							<ul>
								<li>Pilih Transaksi Lain > Pembayaran > Lainnya > Virtual Account BNI</li>
								<li>Masukkan Nomor VA <span class="nomor_va"></span> kemudian pilih Benar</li>
								<li>Periksa informasi yang tertera di layar. Pastikan Merchant adalah Politeknik Negeri
									Banyuwangi, <br> Total tagihan sudah benar dan username. Jika benar, pilih Ya.
								</li>
							</ul>
						</div>
						<h6 class="mb-0 font-italic mt-3">Konfirmasi Pembayaran akan dicek secara otomatis 10 menit setelah pembayaran berhasil</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('js')
<script>
	const input = document.getElementById('va-aktif');
	const coppyBtn = document.querySelector('.salin_kode');
	coppyBtn.onclick = () => {
		input.select();
		if (document.execCommand("copy")) {
			coppyBtn.innerText = "Kode Disalin";
			setTimeout(() => {
				window.getSelection().removeAllRanges();
				coppyBtn.innerText = "Salin Kode";
			}, 3000);
		}
	};
	function generateVA () {
		//belum finish, menunggu va bni
		var form_data = new FormData();
		form_data.append('id_mahasiswa', id_mahasiswa)
		form_data.append('generate_va', 1)
		$.ajax({
			url: url_api+"/keuangan/tagihan-mahasiswa",
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,                         
			type: 'post',
			beforeSend: function(text) {
				// loading('show')
			},
			success: function(res){
				if (res.data.nomor_va) {
					$('.generate-va').prop('disabled', true)
					$('#va-aktif').val(res.data.nomor_va)
					$('.nomor_va').text(res.data.nomor_va)
				}
				// loading('hide')
			}
		});
	}
</script>
@endsection