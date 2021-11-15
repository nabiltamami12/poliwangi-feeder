// SIDEBAR - submenu
jQuery(function ($) {
	// 	if (dataGlobal !== null) {
	// 		$('#txt_semester_topnav').html((dataGlobal['periode']['semester']==1)?"Semester Gasal":"Semester Genap");
	// 		$('#txt_tahun_topnav').html(dataGlobal['periode']['tahun']+"/"+(Number(dataGlobal['periode']['tahun'])+1));
	// 	}
	$(".date-input").datepicker({
		format: "dd MM yyyy",
		autoclose: true
	});
	$('.timepicker').timepicker({
		timeFormat: 'HH:mm',
        'scrollDefaultNow'      : 'true',
        'closeOnWindowScroll'   : 'true',
        'showDuration'          : false,
        'ignoreReadonly'        : true,
	 })

  // jquery ajax global event handler
  $( document ).ajaxComplete(function() {
	  loading('hide');
	});
	$( document ).ajaxSend(function() {
	  loading('show');
	});

	// datatable
	var dt_init = document.getElementById("datatable");
	if ( dt_init && !$.fn.DataTable.isDataTable('#datatable') ) {
		_load_datatable();
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

function load_datatable(){
	document.getElementById('datatable-pending').setAttribute('id', 'datatable');
	_load_datatable();
}

function _load_datatable(){
	dt = $('#datatable').DataTable({
		"processing": true,
		"ajax": {
			url: dt_url,
			type: dt_type,
			data: {},
			...dt_src,
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

if (typeof moment !== 'undefined') {
	moment.locale('id');
}

function reformat_date(val) {
	if (!val) return '';
	const init_date = new Date(val);
  const mm = init_date.getMonth() + 1; // getMonth() is zero-based
  const dd = init_date.getDate();
  return `${init_date.getFullYear()}-${(mm>9 ? '' : '0') + mm}-${(dd>9 ? '' : '0') + dd}`;
};