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

			<div class="navbar-title">
				<h1><span id="txt_semester_topnav"></span> <span id="txt_tahun_topnav"></span>{{--, Program Studi Ilmu Kedokteran Gigi Anak --}}</h1>
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
		window.location.href = "{{url('/')}}"
	}
</script>