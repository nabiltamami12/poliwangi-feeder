<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <input type="hidden" id="id_delete">
            <input type="hidden" id="endpoint">

            <div class="modal-header">
                <b>KONFIRMASI HAPUS</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    Apakah anda yakin menghapus <span id="context_hapus"></span> <b><span id="text_hapus"></span></b> ?
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button id="btn_modal_hapus" onclick="delete_func()">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
                console.log("loading")
            },
            success: function(res) {
                $('#deleteModal').modal('hide');
                if (res.status=="success") {
                    dt.ajax.reload();                
                } else {
                    // alert gagal
                }
            }
        });
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
            },
            success: function(res) {
                if (res.status=="success") {
                    dataGlobal = res['data'];
                } else {
                    // alert gagal
                }
            }
        });
    }
</script>