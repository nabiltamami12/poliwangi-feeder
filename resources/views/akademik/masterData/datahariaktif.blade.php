@extends('layouts.mainAkademik')

@section('content')
<style>
.fc-unthemed td.fc-today span {
    color: #28A3EB!important;
}
.fc-unthemed td.fc-today {
    background: transparent!important;
}
.fc-libur{
    color:#F46A6A!important;
}
</style>
<!-- Header -->
<header class="header">

</header>
<section class="page-content page-content__akademik container-fluid" id="akademik_datajurusan">
    <div class="row">
        <div class="col-xl-8">
            <div class="card padding--small">
                <div id='calendar'></div>
            </div>   
        </div>   
        <div class="col-xl-4">
            <div class="card padding--small">
                <div class="card-header p-0 m-0 border-0 rounded-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="mb-0">Detail Kalender</h2>
                        </div>
                    </div>

                    <hr class="mt">
                    <div class="row align-items-center ml-1">
                        <input type="hidden" id="tanggal">
                        <div class="col-sm-12 col-12">
                            <div class="form-group row mb-0">
                                <span>Keterangan</span>
                                <textarea class="form-control" id="keterangan"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-12">
                            <div class="form-group row mb-0">
                                <span>Status</span>
                                <select class="form-control" id="libur">
                                    <option value="0">Hari aktif</option>
                                    <option value="1">Hari libur</option>
                                    <option value="3">Hari libur Nasional</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-12">
                            <div class="form-group row mb-0">
                                <div class="col text-right">
                                    <button type="button" class="btn--blue add-btn">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</section>   
<script>
var calendar;
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
    $('.add-btn').on('click',function (e) {
        var tanggal = $('#tanggal').val();
        var keterangan = $('#keterangan').val();
        var libur = $('#libur').val();
        $.ajax({
            url: url_api+"/hariaktifkuliah/",
            type: 'post',
            dataType: 'json',
            data: {tanggal:tanggal,keterangan:keterangan,libur:libur},
            beforeSend: function(text) {
                    // loading func
                    console.log("loading")
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
                    console.log('tambah event')
                }else{
                    console.log('hapus event')
                    calendar.fullCalendar('removeEvents',tanggal);
                }
                $('.fc-day-top[data-date="'+tanggal+'"]').attr('data-status',libur);
                $('.fc-day-top[data-date="'+tanggal+'"]').attr('data-keterangan',keterangan);

            }
        })
    })
});
function change_date(tanggal,status) {
    if (status=="1" || status=="3") {
        $('.fc-day-top[data-date="'+tanggal+'"]').addClass('fc-libur');
    } else {
        $('.fc-day-top[data-date="'+tanggal+'"]').removeClass('fc-libur');
    }
    
}
async function getData(){
    await $.ajax({
        url: url_api+"/hariaktifkuliah/",
        type: 'get',
        dataType: 'json',
        data: {},
        beforeSend: function(text) {
                // loading func
                console.log("loading")
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
                        console.log(arr)
                        calendar.fullCalendar('renderEvent',arr)
                    }
                }
                change_date(row.tanggal.split(" ")[0],row.libur)
                $('.fc-day-top[data-date="'+row.tanggal.split(" ")[0]+'"]').attr('data-status',row.libur);
                $('.fc-day-top[data-date="'+row.tanggal.split(" ")[0]+'"]').attr('data-keterangan',row.keterangan);
            })
        }
    })
}
</script>
  
@endsection