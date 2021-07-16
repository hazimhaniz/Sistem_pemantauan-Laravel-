
<!-- Modal -->
<div class="modal fade" id="modal-userpassword" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Kemaskini <span class="bold">Kata Laluan</span></h5>
                <small class="text-muted">Sila isi maklumat pada ruangan di bawah.</small>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-t-20">
            	<form id='form-userpassword' role="form" method="post" action="{{ route('admin.user.external.password.form', request()->id) }}">
                @include('components.input', [
                    'name' => 'password',
                    'label' => 'Kata Laluan Baru',
                    'mode' => 'required',
                    'type' => 'password'
                ])

                @include('components.input', [
                    'name' => 'password_confirmation',
                    'label' => 'Pengesahan Kata Laluan Baru',
                    'mode' => 'required',
                    'type' => 'password'
                ])
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-info" onclick="submitForm('form-userpassword')"><i class="fa fa-check m-r-5"></i> Hantar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">


$('#modal-userpassword').modal('show');
$(".modal form").validate();

$("#form-userpassword").submit(function(e) {
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
        success: function(data) {
            swal(data.title, data.message, data.status);
            $("#modal-userpassword").modal("hide");
            table.api().ajax.reload(null, false);
        }
    });
});
</script>