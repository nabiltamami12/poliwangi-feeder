<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <input type="hidden" id="id_delete">
        <input type="hidden" id="endpoint">

        <div class="modal-header">
            <p class="text-center">
                <h5 class="modal-title text-warning text-center">Peringatan</h5>
            </p>
        </div>
        <div class="modal-body">
          <p class="text-center font-weight-bold">Apakah anda yakin mau menghapus data <span id="context_hapus"></span> :</p>
          <h2 class="text-center mb-4"><span id="text_hapus"></span></h2>
          <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-modal-cancel w-100" data-dismiss="modal">Batal</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary w-100" id="btn_modal_hapus" onclick="delete_func()">Hapus data</button>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<script>
    if (localStorage.getItem("globalData") === null) {
        getGlobalData(1);
    }

    function update_btn(id) {
        window.location.href = window.location.href+"/cu/"+id;
    }
    function add_btn() {
        window.location.href = window.location.href+"/cu/";
    }
    function delete_btn(id,endpoint,context,text) {
        $('#deleteModal').modal('show')
        $('#id_delete').val(id)
        $('#endpoint').val(endpoint)
        $('#context_hapus').text(context)
        $('#text_hapus').text(text)
    }
    function delete_func() {
        var endpoint = $('#endpoint').val();
        var id = $('#id_delete').val();
        $.ajax({
            url: `${url_api}/${endpoint}/${id}`,
            type: 'delete',
            dataType: 'json',
            data: {},
            success: function(res) {
                $('#deleteModal').modal('hide');
                if (res.status=="success") {
                    dt.ajax.reload();                
                } else {
                    // alert gagal
                }
                ;
            }
        });
    }

    function formatAngka(number) {
        var number = Intl.NumberFormat("id-ID", { style : 'currency', currency:'IDR', minimumFractionDigits: 0 }).format(number);
        if (isNaN(number)) {
            return number;
        }else{
            return 0;
        }
    }

    function formatTanggal(date) {
        var list_bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']
        var new_date = new Date(date);
        var tgl = new_date.getDate();
        var bln = list_bulan[new_date.getMonth()];
        var thn = new_date.getFullYear();
        return tgl+" "+bln+" "+thn;
    }

    function loading(status) {
        if (status=="show") {
            $(".loaderScreen-wrapper").fadeIn("fast");
        } else {
            $(".loaderScreen-wrapper").fadeOut("slow");
        }
    }

    function round(num, decimalPlaces = 0) {
        num = Math.round(num + "e" + decimalPlaces);
        return Number(num + "e" + -decimalPlaces);
    }
</script>