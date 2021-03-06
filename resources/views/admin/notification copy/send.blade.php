<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Ruangan Menghantar Proses <span class="bold">Notifikasi</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
                <form id='form-edit' role="form" method="post" action="{{ route('admin.notification.send', $notification->id) }}">
                    @include('components.input', [
                        'name' => 'code',
                        'label' => 'Kod Notifikasi',
                        'mode' => 'required',
                        'value' => $notification->code,
                        'readonly' => true,
                    ])

                    @include('components.input', [
                        'name' => 'name',
                        'label' => 'Nama Notifikasi',
                        'mode' => 'required',
                        'value' => $notification->name,
                        'readonly' => true,
                    ])

                    @include('components.textarea', [
                        'name' => 'message',
                        'label' => 'Notifikasi',
                        'mode' => 'required',
                        'value' => str_replace("<br>", "\n", $notification->message)
                    ])

                    @include('components.input', [
                        'name' => 'email',
                        'label' => 'Emel Hendak Dihantar Kepada',
                        'mode' => 'required',
                        'type' => 'email',
                    ])
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-info send_notification" onclick="submitForm('form-edit')"><i class="fa fa-check m-r-5"></i> Hantar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$('#modal-edit').modal('show');
$(".modal form").validate();

$("#form-edit").submit(function(e) {
    e.preventDefault();
    var form = $(this);

    if(!form.valid())
       return;

    $.ajax({
        url: form.attr('action'),
        method: form.attr('method'),
        data: new FormData(form[0]),
        dataType: 'json',
        async: true,
        contentType: false,
        processData: false,
        beforeSend: function() {
            $('.send_notification').html('<i class=\"fa fa-spinner fa-pulse fa-fw\"></i> Hantar');
        },
        success: function(data) {
            swal(data.title, data.message, data.status);
            $("#modal-edit").modal("hide");
        }
    });
});
</script>
