// SIDEBAR - submenu
jQuery(function ($) {
	$('#txt_semester_topnav').html((dataGlobal['periode']['semester']==1)?"Semester Gasal":"Semester Genap");
	$('#txt_tahun_topnav').html(dataGlobal['periode']['tahun']+"/"+(Number(dataGlobal['periode']['tahun'])+1));
	$(".date-input").datepicker({
		format: "dd MM yyyy",
		autoclose: true
	});

  // jquery ajax global event handler
  $( document ).ajaxComplete(function() {
	  loading('hide');
	});
	$( document ).ajaxSend(function() {
	  loading('show');
	});

	var dt_init = document.getElementById("datatable");
	// datatable
	if (dt_init) {
		console.log(dt_url)
		dt = $('#datatable').DataTable({
			"processing": true,
			"ajax": {
				url: dt_url,
				type: 'GET',
				data: {},
				headers: {
					"Authorization": window.localStorage.getItem('token')
				}
			},
			...dt_opt,
			// "dom": 'lfrtip',
			"language": {
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
	}

	// $(".nav-item-dropdown-content").css("display", "none");
	$(".nav-link").click(function () {
		$(".nav-link").not(this).removeClass("open");
		$(".nav-link").not(this).next().slideUp(300);
		$(this).toggleClass("open");
		$(this).next().slideToggle(300);
	});

	$(".nav-link-submenu").click(function () {
		$(".nav-link-submenu").not(this).removeClass("open");
		$(".nav-link-submenu").not(this).next().slideUp(300);
		$(this).toggleClass("open");
		$(this).next().slideToggle(300);
	});

	// mini sidebar as default
	if ($("body").hasClass("g-sidenav-pinned")) {
		$("body").removeClass("g-sidenav-pinned g-sidenav-show");
		$("body").addClass("g-sidenav-hidden");
		$(".sidenav-toggler").removeClass("active");
		$(".navbar-brand").addClass("d-none");
	}

	$(".sidenav").hover(function () {
		$(".navbar-brand").removeClass("d-none");
	});
});

moment.locale('id');
