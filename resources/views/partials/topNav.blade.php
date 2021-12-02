<!-- Topnav -->
<nav id="navbar" class="navbar navbar-top navbar-expand border-bottom">
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Navbar links -->
			<ul class="navbar-nav d-xl-none">
				<li class="nav-item">
					<!-- Sidenav toggler -->
					<div class="pr-3 sidenav-toggler sidenav-toggler-light" data-action="sidenav-pin"
						data-target="#sidenav-main">
						<div class="sidenav-toggler-inner">
							<i class="sidenav-toggler-line"></i>
							<i class="sidenav-toggler-line"></i>
							<i class="sidenav-toggler-line"></i>
						</div>
					</div>
				</li>
			</ul>

			@php
				use App\Models\Periode;
				$tahunSemester = Periode::get();
				$semester = Periode::where('status', 1)->first();
			@endphp

			<div class="navbar-title">
				{{-- Butuh Authentication --}}
				{{-- @if (Auth()->user()->name != "akademik" || Auth()->user()->name != "admin") --}}
					{{-- <h1><span id="txt_semester_topnav"></span> <span id="txt_tahun_topnav"></span> Studi Ilmu Kedokteran Gigi Anak</h1> --}}
				{{-- @else --}}
					<div class="form-row">
						<div class="col-md-7 col-12">
							<div class="form-group row mb-0">
								<select class="form-control custom-select" id="select_semester" name="select_semester">
									<option value="1" {{ $semester->semester == 1 ? "selected" : "" }}>Semester Gasal</option>
									<option value="2" {{ $semester->semester == 2 ? "selected" : "" }}>Semester Genap</option>
								</select>
							</div>
						</div>
						<div class="col-md-5 col-12">
							<div class="form-group row mb-0">
								<select class="form-control custom-select" id="select_tahun_semester" name="select_tahun_semester">
									@foreach ($tahunSemester as $item)
										<option value="{{ $item->nomor }}" {{ $item->status == 1 ? "selected" : "" }}>{{ $item->tahun }}/{{ $item->tahun+1 }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				{{-- @endif --}}
			</div>

			<ul class="navbar-nav align-items-center ml-auto ml-md-0">
				<li class="nav-item dropdown">
					<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false">
						<div class="media align-items-center">
							<span class="avatar avatar-md rounded-circle">
								<img src="{{ url('images') }}/Brian_Wijaya.png" alt="">
							</span>
							<div class="media-body ml-2 d-none d-lg-block">
								<h1>Brian Wijaya</h1>
							</div>
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<!-- Authentication -->
						<form method="POST">
							@csrf
							<a href="javascript:logout()" class="dropdown-item">
								<i class="iconify" data-icon="bx:bxs-exit" data-inline="false"></i>
								<span>{{ __('Keluar') }}</span>
							</a>
						</form>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
<script type="text/javascript">
	function logout() {
		localStorage.removeItem('pmb')
		localStorage.removeItem('globalData')
		window.location.href = "{{url('/')}}"
	}
	$('#select_semester').on('change', function () { 
		let semesterVal = $('#select_semester').find(':selected').val();
		let tahunSemesterVal = $('#select_tahun_semester').find(':selected').val();
		let globalData = JSON.parse(localStorage.getItem('globalData'));
		let periode = globalData['periode'];
		periode['semester'] = semesterVal;
		
		localStorage.setItem('globalData', JSON.stringify(globalData));
		$.ajax({
			type: "put",
			url: "/api/v1/periode/change_semester/" + tahunSemesterVal + "/" + semesterVal,
			dataType: "json",
			success: function (response) {
				if (response.status == "success") {
					location.reload();
				} else {

				}
			}
		});
	});

	$('#select_tahun_semester').on('change', function() {
		let tahunSemesterVal = $('#select_tahun_semester').find(':selected').val();
		$.ajax({
			type: "put",
			url: "/api/v1/periode/change_status/" + tahunSemesterVal,
			dataType: "json",
			success: function (response) {
				if (response.status == "success") {
					location.reload();
				} else {
					
				}
			}
		});
	});
</script>