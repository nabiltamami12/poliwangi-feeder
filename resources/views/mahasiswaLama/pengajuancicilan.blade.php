@extends('layouts.mainAkademik')

@section('style')
<style>
  .calendar {
    margin: auto;
  }

  .calendar_header {
    width: 100%;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .calendar_header h2 {
    font-weight: 600;
    font-size: 1.3125rem;
    line-height: 1.22em;
    color: #041f2f;
  }

  .calendar_header .switch-month {
    border: 0;
    background-color: transparent;
  }

  .calendar_header .switch-month .iconify {
    font-size: 2rem;
  }

  .calendar_header .switch-month:focus {
    outline: 0;
  }

  .calendar_content {
    background: #fff;
    border: 1px solid #999999;
  }

  .calendar_content div {
    border: 1px solid #999999;
    float: left;
    position: relative;
    z-index: 0;
  }

  .calendar_content div.blank {
    border: 1px solid #999999;
    width: calc(100% / 7);
    height: 5rem;
    position: relative;
  }

  .calendar_content div.today {
    color: #fff;
  }

  .calendar_content div.today:after {
    position: absolute;
    top: 0.3rem;
    left: 0.3rem;
    content: "";
    width: 1.75rem;
    height: 1.75rem;
    border-radius: 50%;
    background: #28a3eb;
    z-index: -1;
  }

  .calendar_content div.libur {
    color: #F46A6A;
  }

  .calendar_weekdays div {
    display: inline-block;
  }

  .calendar_content,
  .calendar_weekdays,
  .calendar_header {
    position: relative;
    overflow: hidden;
  }

  .calendar_weekdays div,
  .calendar_content div {
    width: calc(100% / 7);
    overflow: hidden;
    padding: 0.5rem;
    background-color: transparent;
    font-weight: 500;
    font-size: 1.125rem;
    line-height: 1.22em;
    color: #041f2f;
  }

  .calendar_content div {
    height: 5rem;
  }

  h2.aside_title {
    font-weight: 600;
    font-size: 1.125rem;
    line-height: 1.5em;
    color: #041f2f;
  }

  ::placeholder {
    font-weight: 400;
    font-size: 0.875rem;
    line-height: 1.21em;
    color: #041f2f;
  }

  .customSelect {
    position: relative;
    display: inline-block;
    width: 100%;
  }

  .customSelect-trigger {
    font-size: 14px;
    font-weight: 500;
    line-height: 17px;
    color: #000;
    padding: 0.5rem 0.75rem;
    background-color: #fff;
    position: relative;
    display: block;
    border-radius: 0.25rem;
    cursor: pointer;
    border: 1px solid #999;
  }

  .customSelect-trigger:after {
    content: "";
    background-image: url("https://api.iconify.design/bx/bx-chevron-down.svg?color=%23000");
    background-repeat: no-repeat;
    background-position: center;
    position: absolute;
    display: block;
    pointer-events: none;
    width: 10px;
    height: 10px;
    top: 50%;
    right: 0.75rem;
    transform: translateY(-50%);
  }

  .custom-options {
    position: absolute;
    display: block;
    top: 100%;
    left: 0;
    right: 0;
    border: 1px solid rgba(153, 153, 153, 0.2);
    box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.15);
    box-sizing: border-box;
    background: #fff;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    border-radius: 0.25rem 0.25rem 0.5rem 0.5rem;
  }

  .customSelect.opened .custom-options {
    position: relative;
    opacity: 1;
    visibility: visible;
    pointer-events: all;
  }

  .custom-option {
    position: relative;
    display: block;
    padding: 0.5rem;
    font-size: 14px;
    font-weight: 400;
    line-height: 17px;
    color: #000;
    cursor: pointer;
  }

  .custom-option:hover {
    background: rgba(40, 163, 235, 0.5);
  }

  .custom-option.selection {
    background: rgba(40, 163, 235, 0.5);
  }

  .selecton {
    border-color: #28a3eb;
  }

  .textarea_notresize {
    resize: none;
  }

  .textarea_notresize:focus {
    border-color: #28a3eb;
  }

  .uploadSuratKeputusan {
	cursor: pointer;
    border: 1px solid #C4C4C4;
  }

  .uploadSuratKeputusan .iconify {
    font-size: 1.5rem;
    color: #000;
  }

  #custom-btn {
    background-color: transparent;
    border: none;
    outline: none;
  }

  .rounded-top-left {
    border-radius: 0.5rem 0 0 0;
  }

  .nama_dokumen {
    font-size: 1.125rem;
    line-height: 1.22em;
    color: #041f2f;
  }

  .fc-unthemed td.fc-today span {
    color: #28A3EB !important;
  }

  .fc-unthemed td.fc-today {
    background: transparent !important;
  }

  .fc-day-top.fc-sat,.fc-day-top.fc-sun,.fc-libur {
    color: #F46A6A !important;
  }
  .form-group {
    padding-left: 0 !important;
  }
  .page-content .card {
    margin-top: 0.5rem !important;
  }
</style>
@endsection
@section('content')
<!-- Header -->
<header class="header"></header>
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
				<div class="col-xl-12">
					<div class="card shadow padding--small">
						<div class="card_header">
							<h2 class="aside_title mb-0">Upload Surat Keputusan Kalender Akademik</h2>
							<hr class="mt-3 mb-4">
						</div>
						<div class="card_content">
							<div class="uploadSuratKeputusan rounded p-3 d-flex justify-content-center align-items-center">
								<form class="align-items-center d-none">
									<i class="iconify mr-1" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
									<input type="file" id="file" hidden onchange="example()" />
									<span id="custom-text" class="d-inline-block nama_dokumen">tidak ada file dipilih</span>
								</form>
								<button type="button" id="custom-btn">
									<i class="iconify text-primary" data-icon="bx:bx-cloud-upload" data-inline="false"></i>
								</button>
							</div>
							<button type="button" class="btn btn-primary mt-4 w-100" id="upload"> <i class="iconify mr-1" data-icon="bx:bx-save"></i> Simpan</button>
						</div>
					</div>
				</div>

				{{--
                <div class="col-xl-12">
                    <div class="card padding--small">
                        <div class="card-header p-0 m-0 border-0 ">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="mb-0">SK Kalender Akademik</h2>
                                </div>
                            </div>

                            <hr class="mt-3">
                            <div class="row align-items-center ml-1 mb-3">
                                <input type="hidden" id="tanggal">
                                <div class="col-sm-12 col-12">
                                    <div class="form-group row mb-0">
                                        <input type="file" id="file">
                                        <a href="{{asset('documents/sk_hari_aktif.pdf')}}" target="_blank">Preview </a>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col text-right">
                                <button type="button" class="btn btn-primary" id="upload">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
				--}}

                
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>

// Upload SK
const inputFile = document.getElementById("file");
const customBtn = document.getElementById("custom-btn");
const customText = document.getElementById("custom-text");
const formUpload = document.querySelector(".uploadSuratKeputusan form");
const formWrapper = document.querySelector('.uploadSuratKeputusan');
formWrapper.addEventListener("click", function () {
	inputFile.click();
});
inputFile.addEventListener("change", function () {
if (inputFile.value) {
	let fileName = inputFile.value.match(/[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/)[0];
	customText.innerHTML = fileName;
} else {
	customText.innerHTML = "tidak ada file dipilih";
}
});
function example(){
formUpload.classList.remove("d-none");
formUpload.classList.add("d-flex");
formWrapper.classList.remove("justify-content-center");
formWrapper.classList.add("justify-content-between");
let formWrapper_width = formWrapper.offsetWidth-100;
document.querySelector('.nama_dokumen').style.maxWidth = formWrapper_width + "px"
}
// End upload sk

$(document).ready(function () {
    arrHari=[];
    calendar = $('#calendar').fullCalendar({
        monthNames: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
        monthNamesShort: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
        dayNames: ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'],
        dayNamesShort: ['Min','Sen','Sel','Rab','Kam','Jum','Sab'],
        events: arrHari,
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
            var status = $('.fc-day-top[data-date="'+start+'"]').data('status');
            var keterangan = $('.fc-day-top[data-date="'+start+'"]').data('keterangan');
            console.log(start+" - "+status+" - "+keterangan)
            $('#libur').val(status).change();
            $('#tanggal').val(start);
            $('#keterangan').val((keterangan==undefined||keterangan=="")?"":keterangan);
        }
    });

    getData();
    $('#simpan').on('click',function (e) {
        var tanggal = $('#tanggal').val();
        var keterangan = $('#keterangan').val();
        var libur = $('#libur').val();
        $.ajax({
            url: url_api+"/hariaktifkuliah",
            type: 'post',
            dataType: 'json',
            data: {tanggal:tanggal,keterangan:keterangan,libur:libur},
            beforeSend: function(text) {
                    // loading func
                    // console.log("loading")
                    loading('show')
            },
            success: function(res) {
                change_date(tanggal,libur)
                if (keterangan!="") {
                    calendar.fullCalendar('renderEvent',
                    {
                        id: tanggal,
                        title: keterangan,
                        start: tanggal
                    },true);
                    // console.log('tambah event')
                }else{
                    // console.log('hapus event')
                    calendar.fullCalendar('removeEvents',tanggal);
                }
                $('.fc-day-top[data-date="'+tanggal+'"]').attr('data-status',libur);
                $('.fc-day-top[data-date="'+tanggal+'"]').attr('data-keterangan',keterangan);

                loading('hide')
            }
        })
    })
    $('#upload').on('click', function() {
        var file_data = $('#file').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        // console.log(file_data);                             
        // console.log(form_data);                             
        $.ajax({
            url: url_api+"/hariaktifkuliah/upload",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(res){
                location.reload()
            }
        });
    });
});
function change_date(tanggal,status) {
    if (status=="1" || status=="3") {
        $('.fc-day-top[data-date="'+tanggal+'"]').addClass('fc-libur');
    } else {
        $('.fc-day-top[data-date="'+tanggal+'"]').removeClass('fc-libur');
    }
    
}
function getData(){
    $.ajax({
        url: url_api+"/hariaktifkuliah",
        type: 'get',
        dataType: 'json',
        data: {},
        beforeSend: function(text) {
                // loading func
                console.log("loading")
                loading('show')
        },
        success: function(res) {
            $.each(res.data,function (key,row) {
                if(row.keterangan!=null){
                    if (row.keterangan!="") {
                        arr = {
                            id: row.tanggal.split(" ")[0],
                            title: row.keterangan,
                            start: row.tanggal.split(" ")[0],
                        }
                        // console.log(arr)
                        calendar.fullCalendar('renderEvent',arr)
                    }
                }
                change_date(row.tanggal.split(" ")[0],row.libur)
                $('.fc-day-top[data-date="'+row.tanggal.split(" ")[0]+'"]').attr('data-status',row.libur);
                $('.fc-day-top[data-date="'+row.tanggal.split(" ")[0]+'"]').attr('data-keterangan',row.keterangan);
                // loading('hide')
            })
        }
    })
}
</script>

@endsection