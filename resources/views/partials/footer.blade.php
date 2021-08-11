<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-0 padding--medium">
        <input type="hidden" id="id_delete">
        <input type="hidden" id="endpoint">

        <div class="modal-header">
          <h5 class="modal-title text-warning text-center">Peringatan</h5>
        </div>
        <div class="modal-body">
          <p class="text-center">Apakah anda yakin mau menghapus data <span id="context_hapus"></span> :</p>
          <h2 class="text-center"><span id="text_hapus"></span></h2>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-modal-cancel" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn--blue btn-modal-ok" id="btn_modal_hapus" onclick="delete_func()">Hapus data</button>
        </div>
      </div>
    </div>
</div>

<script>

    if (localStorage.getItem("globalData") === null) {
        getGlobalData();
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
            beforeSend: function(text) {
                // loading func
                loading("show");
                console.log("loading")
            },
            success: function(res) {
                $('#deleteModal').modal('hide');
                if (res.status=="success") {
                    dt.ajax.reload();                
                } else {
                    // alert gagal
                }
                loading("hide");
            }
        });
    }
    function loading(status) {
        if (status=="show") {
            $(".loaderScreen-wrapper").fadeIn("fast");
            console.log('show')
        } else {
            console.log('hide')
            $(".loaderScreen-wrapper").fadeOut("slow");
        }
    }

    // AMBIL DATA GLOBAL
    async function getGlobalData() {
        await $.ajax({
            url: url_api+"/globaldata/",
            type: 'get',
            dataType: 'json',
            data: {},
            beforeSend: function(text) {
                    // loading func
                    console.log("loading")
                    loading("show");
            },
            success: function(res) {
                if (res.status=="success") {
                    localStorage.setItem('globalData', JSON.stringify(res['data']));
                } else {
                    // alert gagal
                }
                loading("hide");
            }
        });
    }
</script>